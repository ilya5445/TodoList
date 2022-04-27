<?php

class DB {

    public static function connToDB() {

        try {
            $conn = new \PDO("sqlite:sqlite.db", '', '');
            $conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $conn->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            
            return $conn;

        } catch (PDOException $e) {
            echo "Ошибка подключения к базе данных";
            exit();
        }
    }

}