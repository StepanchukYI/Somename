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

        $error = array();

        if ($id == "") {
            array_push($error, 'Failed id');
        }

        $array = sqldb_connection::Place_singleview($id);

        if (count($array) == 0 || $array == false) {
            array_push($error, 'Nothing');
        }

        if (count($error) == 0) {
            $photo = sqldb_connection::MultiPhoto_Place($id);

            if (count($photo) == 0) {
                array_push($array, array('Photo' => "Haven`t photo"));
            } else {
                array_push($array, array('Photo' => $photo));
            }

            return $array;

        } else {
            return array('error' => $error[0]);
        }
    }


    public function place_multiview(){
        $array = sqldb_connection::Place_multiview();
        if(count($array) == 0 || $array == false){
            return array('error' => "Nothing to show");
        }
        else{
            return $array;
        }
    }
}