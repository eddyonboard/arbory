<?php

namespace Arbory\Base\Admin\Form\Fields\Concerns;

use Illuminate\Support\Collection;

/**
 * Class HasRelatedOptions
 * @package Arbory\Base\Admin\Form\Fields\Concerns
 */
trait HasRelatedOptions
{
    use HasRelationships;

    /**
     * @var Collection
     */
    protected $options;

    /**
     * @param Collection|array $options
     * @return $this
     */
    public function options( $options )
    {
        if( is_array( $options ) )
        {
            $options = new Collection( $options );
        }

        $this->options = $options;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getOptions(): Collection
    {
        if( $this->options === null )
        {
            $this->options = $this->getOptionsForRelation();
        }

        return $this->options;
    }

    /**
     * @return Collection
     */
    protected function getOptionsForRelation(): Collection
    {
        $options = new Collection();

        foreach( $this->getRelatedItems() as $item )
        {
            $options[$item->getKey()] = (string) $item;
        }

        return $options;
    }
}
