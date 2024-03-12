<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Book extends Entity{
    //accessors
    // protected function _getBookName($book_name){
    //     return strtoupper($book_name);
    // }

   //mutator chnage will be shown in the database
    protected function _setBookName($book_name){
        return strtoupper($book_name);
    }
}

?>
