<?php namespace Belsrc\RestEasy;

    interface IRestful {

        /**
         * Makes an HTTP GET request.
         *
         * @param  string $url     The request url.
         * @param  array  $headers An array of all http headers to send.
         */
        public function get( $url, array $headers );

        /**
         * Make an HTTP POST request.
         *
         * @param  string $url     The request url.
         * @param  array  $headers An array of all http headers to send.
         * @param  mixed  $data    The data to send with request.
         */
        public function post( $url, array $headers=array(), $data=null );

        /**
         * Make an HTTP PUT request.
         *
         * @param  string $url     The request url.
         * @param  array  $headers An array of all http headers to send.
         * @param  mixed  $data    The data to send with request.
         */
        public function put( $url, array $headers=array(), $data=null );

        /**
         * Make an HTTP DELETE request.
         *
         * @param  string $url     The request url.
         * @param  array  $headers An array of all http headers to send.
         */
        public function delete( $url, array $headers=array() );
    }
