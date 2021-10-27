<?php
    class Model {

        public function set($property, $value)
        {
            $this->$property=$value;
        }
        public function get($property)
        {
            return $this->$property;    
        }
    }