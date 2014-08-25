<?php namespace Belsrc\RestEasy;

    interface IResponse {

        /**
         * Gets the value of the body property.
         */
        public function getBody();

        /**
         * Gets the value of the info property.
         */
        public function getInfo();

        /**
         * Gets the value of the error property.
         */
        public function getError();
    }
