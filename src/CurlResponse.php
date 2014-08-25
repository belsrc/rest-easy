<?php namespace Belsrc\RestEasy;

    class CurlResponse implements IResponse {

        private $_body;
        private $_error;
        private $_info;

        /**
         * Initializes a new instance of the CurlResponse class.
         *
         * @param mixed $body  The response body of the cURL request.
         * @param array $info  The response information of the cURL request.
         * @param mixed $error The response errors of the cURL request.
         */
        public function __construct( $body, $info, $error=null ) {
            $this->_body = $body;
            $this->_info = $info;
            $this->_error = $error;
        }

        /**
         * Gets the value of the body property.
         *
         * @return string The value of the body property.
         */
        public function getBody() {
            return $this->_body;
        }

        /**
         * Gets the value of the info property.
         *
         * @return string The value of the info property.
         */
        public function getInfo() {
            return $this->_info;
        }

        /**
         * Gets the value of the error property.
         *
         * @return string The value of the error property.
         */
        public function getError() {
            return $this->_error;
        }

        /**
         * Gets a class property.
         *
         * @param  mixed $property The name of the property.
         * @return mixed           The value of the property.
         */
        public function __get( $property ) {
            $m = 'get' . ucfirst( $property );
            if( method_exists( $this, $m ) ) {
                return $this->$m();
            }

            if( property_exists( $this, $property ) ) {
                return $this->$property;
            }

            throw new ErrorException( 'Unknown property', 1 );
        }
    }
