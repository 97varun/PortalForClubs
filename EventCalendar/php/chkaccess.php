<?php
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        session_start();
        extract($_SESSION);
        if ($role == "Admin") {
            echo "admin";
        } else {
            echo "no access";
        }
    }
?>