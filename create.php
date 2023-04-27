<?php

require_once("function/config.php");
require_once("function/classes.php"); 
require_once("function/sanitizer.php");

$users = new Users($con);




      if (isset($_POST['ekle'])) {


        
        $name = FormSanitizer::sanitizeFormEmail($_POST["name"]);
        $surna = FormSanitizer::sanitizeFormEmail($_POST["surna"]);
        $date = FormSanitizer::sanitizeFormEmail($_POST["date"]);
        $depar = FormSanitizer::sanitizeFormEmail($_POST["depar"]);


$addUsers = $users->addUsers($name, $surna,   $date, $depar);
header("Location:index.php");

  }

 ?>
 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>

    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                <h1 class="text-center">Users</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="btn-group">
                        <a href="index.php" class="btn btn-outline-primary">List</a>
                        <a href="ekle.php" class="btn btn-outline-primary">Create</a>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <main>
        
    <div class="container">
        <form  method="post" class="row mt-4 g-3">
           
            <div class="col-6">
                <label for="inputText" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" >
            </div>
            <div class="col-6">
                <label for="sad" class="form-label">Surname</label>
                <input type="text" class="form-control" name="surna">
            </div>
            <div class="col-6">
                <label for="class" class="form-label">Country</label>
                <input type="text" class="form-control" name="depar" >
            </div>
            <div class="col-6">
                <label for="bday" class="form-label">Date</label>
                <input type="date" class="form-control" name="date">
            </div>
            
            
            <button type="submit" name="ekle"  class="btn btn-primary">CREATE</button>
        </form>
<?php



 ?>

    </div>
    </main>
    <style>
        .text-center{
            margin-top:50px;
        }
    </style>
    <footer></footer>
</body>
</html>
