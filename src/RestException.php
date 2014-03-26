<?php namespace Belsrc\RestEasy;

    class RestException extends \Exception {

        private $_errors;
        private $_info;

        /**
         * Initializes a new instance of the RestExcetpion class.
         *
         * @param array      $resErrors An array of the request response.
         * @param array      $resInfo   An array of the request information.
         * @param string     $message   The Exception message to throw.
         * @param integer    $code      The Exception code.
         * @param \Exception $previous  The previous exception used for the exception chaining.
         */
        public function __construct( $resErrors, $resInfo, $message='', $code=0, Exception $previous=null ) {
            $this->_errors = $resErrors;
            $this->_info = $resInfo;
            parent::__construct( $message, $code, $previous );
        }

        /**
         * Gets the value of the errors property.
         *
         * @return string The value of the errors property.
         */
        public function getRequestErrors() {
            return $this->_errors;
        }

        /**
         * Gets the value of the info property.
         *
         * @return string The value of the info property.
         */
        public function getRequestInfo() {
            return $this->_info;
        }
    }
