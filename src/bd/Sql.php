<?php

namespace creative\bd;

class Sql
{

    private $con;

    public function __construct()
    {
        
        $this->con = new \PDO("mysql:host=localhost;port=3308;dbname=blog","root","1234");

    }
    private function setData($sql, $data)
    {
        foreach($data as $key => $value){

            $sql->bindValue($key, $value);

        }

    }
    public function select($sql, $data = array())
    {
       $query = $this->con->prepare($sql);
       $this->setData($query, $data);
       $query->execute();
       
       return $query->fetch(\PDO::FETCH_ASSOC);
    }
    public function disconnect()
    {
        unset($this->con);
    }


}

?>