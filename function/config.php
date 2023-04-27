<?php
/*-mina ecer-
veritabanı bağlantısı oluşturuyoruz */

    $servername = "localhost";
    $dbname ="pdo";
    $username = "root";
    $password = "";
    $con;


   try {
       $con = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
       // set the PDO error mode to exception
       $con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
       // echo "Connected successfully";
   } catch (PDOException $e) {
       echo "Connection failed: " . $e->getMessage();
       exit;
   }


?>