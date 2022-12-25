<?php

class DB
{
    protected function connect()
    {
        try {
            $username = "root";
            $password = "";
            $dbhandler = new PDO('mysql:host=localhost; dbname=creditsite', $username, $password);
            return $dbhandler;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}