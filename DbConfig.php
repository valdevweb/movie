<?php

    function getdbconnection(){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mms";

        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        }catch(PDOException $e){

            echo "Connection failed: " . $e->getMessage();

        }
    }
