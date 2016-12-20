<?php

namespace Model;

use \Gas\Core;
use \Gas\ORM;

class Songs extends ORM {

        public $primary_key = 'id';

        function _init()
        {

                self::$relationships = array (
                        'artists'          =>     ORM::belongs_to('\\Model\\Artists');
                );

                self::$fields = array(
                        'id'                    =>              ORM::field('int[11]'),
                        'artists_id'            =>              ORM::field('int[11]'),
                        'title'                 =>              ORM::field('char[255]'),
                        'url'                   =>              ORM::field('char[255]'),
                        'modified_at'           =>              ORM::field('datetime'),
                        'created_at'            =>              ORM::field('datetime'),
                );
                
                $this->ts_fields = array('modified_at', '[created_at]');
        }
}

?>