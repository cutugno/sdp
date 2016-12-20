<?php

namespace Model;

use \Gas\Core;
use \Gas\ORM;

class Artists extends ORM {

        public $primary_key = 'id';

        function _init()
        {

                self::$relationships = array (
                        'songs'          =>     ORM::has_many('\\Model\\Songs')
                );

                self::$fields = array(
                        'id'                    =>              ORM::field('int[11]'),
                        'name'             		=>              ORM::field('char[255]'),
                        'url_name'             	=>              ORM::field('char[255]'),
                        'modified_at'           =>              ORM::field('datetime'),
                        'created_at'            =>              ORM::field('datetime'),
                );
                
                $this->ts_fields = array('modified_at', '[created_at]');
        }
}

?>