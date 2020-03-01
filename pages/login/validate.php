<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "users";

    $conn = mysqli_connect($host,$user,$pass,$db);

    session_start();

    if($conn){
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            $sql = "SELECT * FROM usuarios WHERE uname='".$_SESSION['username']."' and pass='".$_SESSION['password']."' ";
            $result = mysqli_query($conn,$sql);
            $tem = mysqli_num_rows($result);
            if($tem >= 1){
                while($row = mysqli_fetch_assoc($result)){
                    $userlog = $row['uname'];
                    echo "Ola ". $row['uname'];
                }
            }
        }else{
            echo "Nao logado";
        }
    }

    if(isset($_POST['submit'])){
        if($_POST['submit'] == 'LOGOUT'){
            session_destroy();
            unset($_SESSION['username']);
            unset($_SESSION['password']);
            header('location: test.php');
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate</title>
</head>
<body>
    <form action="validate.php" method="post">
        <input type="submit" name="submit" value="LOGOUT">
    </form>
</body>
</html>