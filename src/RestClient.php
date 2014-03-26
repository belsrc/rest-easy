<?php namespace Belsrc\RestEasy;

    class RestClient implements IRestful {

        /**
         * Make an HTTP request.
         *
         * @param  string $url     The request URL.
         * @param  array  $headers An array of all HTTP headers to send.
         * @param  mixed  $data    The data to send with the request.
         * @throws Belsrc\RestEasy\RestException
         * @return Belsrc\RestEasy\CurlResponse
         */
        private function httpRequest( $url, $method, array $headers=array(), $data=null ) {
            $curl = curl_init();
            curl_setopt( $curl, CURLOPT_URL, $url );
            curl_setopt( $curl, CURLOPT_HEADER, 0 );
            curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
            curl_setopt( $curl, CURLOPT_USERAGENT, "RestEasy Library v1.0" );
            curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
            curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, $method );

            if( $data ) {
                curl_setopt( $curl, CURLOPT_POSTFIELDS, $data );
            }

            $response = new CurlResponse(
                curl_exec( $curl ),
                curl_getinfo( $curl ),
                curl_error( $curl )
            );
            curl_close( $curl );

            // check if any errors were returned
            $body = json_decode( $response->body, true );
            if( isset( $body[0] ) && array_key_exists( 'error_key', $body[0] ) ) {
                throw new RestException( $body, $response->info, $response->body );
            }

            return $response;
        }

        /**
         * Makes an HTTP GET request.
         *
         * @param  string $url     The request url.
         * @param  array  $headers An array of all http headers to send.
         * @return Belsrc\RestEasy\CurlResponse
         */
        public function get( $url, array $headers=array() ) {
            return $this->httpRequest( $url, 'GET', $headers );
        }

        /**
         * Makes an HTTP POST request.
         *
         * @param  string $url     The request url.
         * @param  array  $headers An array of all http headers to send.
         * @param  mixed  $data    The data to send with request.
         * @return Belsrc\RestEasy\CurlResponse
         */
        public function post( $url, array $headers=array(), $data=null ) {
            return $this->httpRequest( $url, 'POST', $headers, $data );
        }

        /**
         * Makes an HTTP PUT request.
         *
         * @param  string $url     The request url.
         * @param  array  $headers An array of all http headers to send.
         * @param  mixed  $data    The data to send with request.
         * @return Belsrc\RestEasy\CurlResponse
         */
        public function put( $url, array $headers=array(), $data=null ) {
            return $this->httpRequest( $url, 'PUT', $headers, $data );
        }

        /**
         * Makes an HTTP DELETE request.
         *
         * @param  string $url     The request url.
         * @param  array  $headers An array of all http headers to send.
         * @return Belsrc\RestEasy\CurlResponse
         */
        public function delete( $url, array $headers=array() ) {
            return $this->httpRequest( $url, 'DELETE', $headers );
        }
    }
