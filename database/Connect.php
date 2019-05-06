<?php

namespace database;

class Connect
{
    protected $database;
    protected $password;
    protected $server;
    protected $user;

    protected $mysqli_connect_error;
    protected $mysqli_query_error;

    public function __construct($user, $database, $password, $server)
    {
        $this->database = $database;
        $this->password = $password;
        $this->server = $server;
        $this->user = $user;

    }

    public function getConnect()
    {
        return mysqli_connect(
            $this->server,
            $this->user,
            $this->password,
            $this->database
        );
    }

    public function getQuery($query)
    {
        $this->getConnect()->query($query);

        return $this;
    }
}



