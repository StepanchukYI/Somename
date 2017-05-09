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
        if($id==""){
            return array('error' => "Failed id");
        }else{
            $array = sqldb_connection::Author_singleview($id);
            $photo = sqldb_connection::MultiPhoto_Author($id);
            if(count($photo) == 0 ){
                array_push($array, array('error' => "Haven`t photo"));
            }else{
                array_push($array, array('Photo' => $photo));
            }
            return $array;
        }
    }
    public function author_multiview(){
        $array = sqldb_connection::Author_multiview();
        if(count($array) == 0){
            return array('error' => "Nothing to show");
        }
        else{
            return $array;
        }
    }
}