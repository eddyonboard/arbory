<?php namespace CubeSystems\Leaf\Providers;

use Waavi\Translation\TranslationServiceProvider;

/**
 * Class LeafTranslationServiceProvider
 * @package CubeSystems\Leaf\Providers
 */
class LeafTranslationServiceProvider extends TranslationServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__ . '/../../../../waavi/translation/config/translator.php', 'translator' );
        $this->registerCacheRepository();

        \Illuminate\Translation\TranslationServiceProvider::register();

        $this->registerFileLoader();
        $this->registerCacheFlusher();

        $this->loadTranslationsFrom( __DIR__ . '/../../resources/lang', 'leaf' );
    }
}
