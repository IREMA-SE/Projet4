<?php

namespace OpenClassrooms\Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=irema_tpblog;charset=utf8', 'dbuser', '');
        return $db;
    }
}