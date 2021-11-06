<?php
    abstract class BaseView {
        
        protected  $tpl;
        
        function __construct($tpl) {
            $this->tpl = $tpl;
        }

        abstract function show($data);

    }
?>

