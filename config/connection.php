<?php

$conn = mysqli_connect("localhost", "root", "_adit123." , "perpustakaan");

if (!$conn) {
    echo "can not connect to database";
}