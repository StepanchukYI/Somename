<?php

/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 05.05.2017
 * Time: 21:13
 */

class sqldb_connection
{
    /*
        * ИНКАПСУЛИРОВАННАЯ ФУНКЦИЯ, ДЛЯ КОДКЛЮЧЕНИЮ В БАЗЕ(ИНКАПСУЛИРОВАННАЯ!!)
        */
    private function DB_connect()
    {
        $dsn = 'mysql:dbname=Ekaterinoslav;host=127.0.0.1';
        $user = 'root';
        $password = '';

        try {
            $dbh = new PDO($dsn, $user, $password);
            return $dbh;
        } catch (PDOException $e) {
            return 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function Place_multiview(){
        $dbh = sqldb_connection::DB_connect();
        $sth = $dbh->prepare("SELECT p.idPlace, p.title, p.SinglPhoto, l.latitude, l.longitude
                                      FROM place p 
                                      INNER JOIN location l 
                                      ON p.idPlace = l.idPlace");
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function Author_multiview(){
        $dbh = sqldb_connection::DB_connect();
        $sth = $dbh->prepare("SELECT idAuthor, name, biography, SinglPhoto FROM author");
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function Place_singleview($id){
        $dbh = sqldb_connection::DB_connect();
        $sth = $dbh->prepare("SELECT p.idPlace, p.title, p.description, l.latitude, l.longitude
                                      FROM place p 
                                      INNER JOIN location l 
                                      ON p.idPlace = l.idPlace
                                      WHERE p.idPlace = :id");
        $sth->execute(array(':id' => $id));
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public static function Author_singleview($id){
        $dbh = sqldb_connection::DB_connect();
        $sth = $dbh->prepare("SELECT * FROM author WHERE idAuthor = :id");
        $sth->execute(array(':id' => $id));
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public static function Authorplace_multiview($id){
        $dbh = sqldb_connection::DB_connect();
        $sth = $dbh->prepare("SELECT a.idAuthor, a.name,a.SinglPhoto 
                                 FROM author a
                                 INNER JOIN placeauthor pa
                                 ON pa.idAuthor = a.idAuthor
                                 WHERE pa.idPlace = $id");
        $sth->execute(array(':id' => $id));
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function MultiPhoto_Author($id){
        $dbh = sqldb_connection::DB_connect();
        $sth = $dbh->prepare("SELECT url
                                 FROM imageobject
                                 WHERE idAuthor = :id");
        $sth->execute(array(':id' => $id));
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function MultiPhoto_Place($id){
        $dbh = sqldb_connection::DB_connect();
        $sth = $dbh->prepare("SELECT url
                                 FROM imageobject
                                 WHERE idPlace = $id");
        $sth->execute(array(':id' => $id));
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

}