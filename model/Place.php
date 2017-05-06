<?php

/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 05.05.2017
 * Time: 21:12
 */
class Place
{
    public function place_singleview($id){

        if($id=""){
            $error = array('error' => "Failed id");
        }
        return "place_singleview";
    }

    public function place_multiview(){

        return "place_multiview";
    }//XYQ
}