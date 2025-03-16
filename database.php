<?php
$server = "localhost"; //server name komputer anda
$user = "root"; //username database
$password = ""; //tambahkan password jika ada
$database = "academy"; //nama database yang dituju
$conn = false; //variabel penampung database


try {
    //memanggil koneksi database
    $conn = new PDO("mysql:host=$server;dbname=$database", $user, $password);
    // print "KONEKSI BISAAA COYY";
    return true;
} catch (PDOException $e) {
    print "Error cuyyyy!:" . $e->getMessage() . "<br/>";
    return false;
}
