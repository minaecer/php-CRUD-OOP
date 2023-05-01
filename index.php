<?php

require_once("function/config.php");
require_once("function/classes.php"); 
require_once("function/sanitizer.php");

$users = new Users($con);


if (isset($_GET['no'])) {


    if ($users->deleteUser($_GET['no'])) {
       echo "<div class='alert alert-success' role='alert'>
     Silme İşlemi Başarılı.
      </div>";
    } else {


       echo "<div class='alert alert-danger' role='alert'>
      Silinirken Bir Hata Oluştu.
      </div>";
    }
}



?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>

    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class=" text-center">Users</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="btn-group">
                        <a href="index.php" class="btn btn-outline-primary">List</a>
                        <a href="create.php" class="btn btn-outline-primary">Create</a>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <main>
        <div class="container">
            <div class="row mt-4">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Date</th>
                                <th>Country</th>
                                <th></th>

                            </tr>

                        </thead>
                        <tbody>

                        <?php echo $users->showAllUsers();  ?>


                        </tbody>
                    </table>
                </div>
            </div>
            <style>
        .text-center{
            margin-top:50px;
        }
    </style>
        </div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
