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
        }else{
            $array = sqldb_connection::Author_singleview($id);
            array_push($array, array('Photo' => sqldb_connection::MultiPhoto_Author($id)));
            return $array;
        }
    }
}