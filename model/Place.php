<?php

require_once '../class/sqldb_connection.php';
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 05.05.2017
 * Time: 21:12
 */
class Place
{
    public function place_singleview($id){

        if($id==""){
            return array('error' => "Failed id");
        }else{
            $array = sqldb_connection::Place_singleview($id);
            array_push($array, array('Author' => sqldb_connection::Authorplace_multiview($id)));
            array_push($array, array('Photo' => sqldb_connection::MultiPhoto_Place($id)));
            return $array;
        }
    }

    public function place_multiview(){
        $array = sqldb_connection::Place_multiview();
        if(count($array) == 0){
            return array('error' => "Nothing to show");
        }
        else{
            return $array;
        }
    }
}