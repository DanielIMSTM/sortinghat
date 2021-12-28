<?php
    function makeConnectionWithDatabase() {
         $hostname = "localhost";
         $username = "root";
         $password = "root";
         $database = "sortinghat";
         
         

        $conn = mysqli_connect($hostname, $username, $password, $database);

        // Checken of ik connectie heb met de DB
        if ($conn == false) {
            echo "ik kan de database niet bereiken";
            die();
        }

        // connectie terug geven
        return $conn;
    }

    function getQuery($conn, $query) {
        return mysqli_query($conn, $query)->fetch_all(MYSQLI_ASSOC);
    }

    function insertQuery($conn, $query) {
        mysqli_query($conn, $query);
    }

    function closeConnection($conn) {
        $conn->close();
    }