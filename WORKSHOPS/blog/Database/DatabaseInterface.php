<?php

namespace Database;

interface DatabaseInterface   //make query
{
    public function query(string $query):PreparedStatementInterface;

    public function getLastError();

    public function getLastId();

}