<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "users";

    $conn = mysqli_connect($host,$user,$pass,$db);

    $login = "";

    session_start();



    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['submit'])){
        if($_POST['username'] == ""){
            $login = "Username em branco";
        }else if($_POST['password'] == ""){
            $login = "Password em branco";
        }else if($_POST['submit'] == "Criar"){
            $sql = "SELECT * FROM usuarios WHERE uname='".$_POST['username']."'";
            $result = mysqli_query($conn,$sql);
            $tem = mysqli_num_rows($result);
            if($tem >= 1){
                $login = "Usuario ja existente!";
            }else{
                $sql = "INSERT INTO usuarios (uname , pass) VALUES ('".$_POST['username']."' , '".md5($_POST['password'])."')";
                $result = mysqli_query($conn,$sql); 
                $login = "Criado com sucesso";
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['password'] = md5($_POST['password']);
                header('locate: login.php')
            }
        }
    }


?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login - DEV</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <section class="form-section">
      <h1>Register for DEV's</h1>

      <div class="form-wrapper">
        <form action="register.php" method="post">
          <div class="input-block">
            <label for="login-email">Login.Name(</label>
            <input type="text" name="username" id="login-email" />
            <label for="login-email">);</label>
          </div>
          <div class="input-block">
            <label for="login-password">Login.Password(</label>
            <input type="password" name="password" id="login-password" />
            <label for="login-password">);</label>
          </div>
          <input type="submit" class="btn-login" name="submit" value="Criar">
          <h4 style="color = 'black';"><?php echo $login; ?></h4>
        </form>
      </div>
    </section>

   
  </body>
</html
