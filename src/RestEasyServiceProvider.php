<?php namespace Belsrc\RestEasy;

    use Illuminate\Support\ServiceProvider;

    class RestEasyServiceProvider extends ServiceProvider {

        /**
         * Indicates if loading of the provider is deferred.
         *
         * @var boolean
         */
        protected $defer = false;

        /**
         * Bootstrap the application events.
         *
         * @return void
         */
        public function boot() {
            $this->package( 'belsrc/rest-easy' );
        }

        /**
         * Register the service provider.
         *
         * @return void
         */
        public function register() {
            $this->app['rest-easy'] = $this->app->share( function( $app ) {
                return new RestClient();
            });
        }

        /**
         * Get the services provided by the provider.
         *
         * @return array
         */
        public function provides() {
            return array( 'rest-easy' );
        }
    }
