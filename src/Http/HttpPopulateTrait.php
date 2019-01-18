<?php
    namespace App\Http;

    trait HttpPopulateTrait
    {
        protected $data = [];


        public function __set($key, $val)
        {
            $this->data[$key] = $val;
        }

        public function __get($key) {
            return $this->data[$key];
        }
    }