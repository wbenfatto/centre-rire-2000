<?php


class DB
{
    const HOST = 'localhost';
    const USER = 'admin';
    const PASS = 'password';
    const DB = 'cr2kDB';

    public function connect(){
        $dsn = "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8";

        $options = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        );

        try {
            return new PDO($dsn, self::USER, self::PASS, $options);
        } catch (\PDOException $e) {
            die("Failed to connect DB: " . new \PDOException($e->getMessage(), (int)$e->getCode()));
        }
    }

}