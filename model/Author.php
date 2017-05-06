<?php

/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 05.05.2017
 * Time: 21:12
 */
class Author
{
    public function author_singleview($id){

        if($id=""){
            return array('error' => "Failed id");
        }

        return "author_singleview"; //coment
    }
}