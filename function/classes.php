<?php
require_once("function/config.php");
require_once("function/sanitizer.php");
class Users
{

    
    private $con;
    private $errorArray = array();


    public function __construct($con)
    {
        $this->con = $con;
    }



    public function showAllUsers()
    {

        $query = $this->con->prepare("SELECT * FROM users");

        $query->execute();

        $html = "";
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $html .= $this->getUsersHtml($row, null);
        }
        return $html;
    }


    private function getUsersHtml($sqlData, $title)
    {
        $no = $sqlData['no'];
        $name = $sqlData['name'];
        $surna = $sqlData['surna'];
        $date = $sqlData['date'];
        $depar = $sqlData['depar'];



        $html = "<tr>
        <td>{$no}</td>
        <td>{$name}</td>
        <td>{$surna}</td>
        <td>{$date}</td>
        <td>{$depar}</td>
        <td>
      

        <a href='update.php?no={$no}' class='btn btn-primary'  >
        <i class='fas fa-pencil'></i>edit</a>

    
        <a href='index.php?no={$no}' class='btn btn-danger'  >
        <i class='far fa-trash-alt'></i>delete</a>

        </td>



    </tr>";

        return $html;
    }


    public function addUsers($name, $surna, $date, $depar)
    {
        $querys = $this->con->prepare("INSERT INTO users SET  
        name=:fn,
        surna=:sn,
        date=:dt,
        depar=:dpt");

        $querys->bindValue(":fn", $name);
        $querys->bindValue(":sn", $surna);
        $querys->bindValue(":dt",  $date);
        $querys->bindValue(":dpt", $depar);
        return $querys->execute();
    }
    public function updateUsers($name, $surna,  $date, $depar)
    {
        $querys = $this->con->prepare("UPDATE users SET
          name=:name,
          surna=:surna ,
          date=:date,
          depar=:depar
        WHERE no=:no");

        $querys->bindValue(":name", $name);
        $querys->bindValue(":surna", $surna);
        $querys->bindValue(":date",  $date);
        $querys->bindValue(":depar", $depar);
        $querys->bindValue(":no", $_GET['no']);
        return $querys->execute();
    }

    public function deleteUser($no)
    {
        $stmt = $this->con->prepare("DELETE  FROM users where no=:no");
        $stmt->bindValue(":no", $no);
        return $stmt->execute();
    }

    public function getError($error)
    {
        if (in_array($error, $this->errorArray)) {
            return $error;
        }
    }
}
?>