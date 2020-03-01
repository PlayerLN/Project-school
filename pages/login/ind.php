<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "users";

    $conn = mysqli_connect($host,$user,$pass,$db);
    
    session_start();

    $userlog = "LOGIN";

    if($conn){
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            $sql = "SELECT * FROM usuarios WHERE uname='".$_SESSION['username']."' and pass='".$_SESSION['password']."' ";
            $result = mysqli_query($conn,$sql);
            $tem = mysqli_num_rows($result);
            if($tem >= 1){
                while($row = mysqli_fetch_assoc($result)){
                    $userlog = $row['uname'];
                }
            }
        }
    }

    if(isset($_GET['submit'])){
        if($_GET['submit'] == 'LOGOUT'){
            session_destroy();
            unset($_SESSION['username']);
            unset($_SESSION['password']);
            header('location: ../../index.php');
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style1.css">
    <title>DEV - Inicio</title>
</head>
<body>
    <header>
        <p>D<span>E</span>V</p>
        <nav>
            <ul>
                <li><a href="#"><div class="sub">HOME</div></a></li>
                <li><a href="#"><div class="sub">SEND</div></a></li>
                <li><a href="https://github.com/PlayerLN"><div class="sub">CONTACT</div></a></li>
                <li>
                    <?php

                        if($conn){
                            if(isset($_SESSION['username']) && isset($_SESSION['password'])){
                                $sql = "SELECT * FROM usuarios WHERE uname='".$_SESSION['username']."' and pass='".$_SESSION['password']."' ";
                                $result = mysqli_query($conn,$sql);
                                $tem = mysqli_num_rows($result);
                                if($tem >= 1){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $userlog = $row['uname'];
                                        echo "<a href='ind.php?submit=LOGOUT'><div class='sub'>".$userlog."</div></a>";
                                    }
                                }
                            }else{
                                echo "<a href='ind.php?submit=LOGOUT'><div class='sub'>".$userlog."</div></a>";
                            }
                        }

                    ?>
                </li>
            </ul>
        </nav>
    </header>
    <div style="display: flex; flex-direction: row; justify-content: center; margin-top: 25px; margin-bottom: 20px; width: 300px; margin: 20px auto;">
        <input type="search" name="search" id="search">
    </div>
    <article class="inicio" style="text-align: center;">
        <h1>Bem vindo,</h1>
        <p>Este é um site de ajuda para DEV's iniciantes</p>
        <hr>
    </article>
    <article class="html">
        <h2>HTML</h2>
        <p style="text-align: center;">HTML é uma linguagem de marcação utilizada na construção de páginas na Web. <br> Documentos HTML podem ser interpretados por navegadores. <br>
            Com HTML você pode criar seu propio site. 
        </p>
        <button class="btn-html">SAIBA MAIS!</button>
    </article>
    <article class="css">
        <h2>CSS</h2>
        <p style="text-align: center;">
            CSS é chamado de linguagem Cascading Style Sheet e é usado para estilizar elementos escritos em uma linguagem de marcação como HTML. <br> O CSS separa o conteúdo da representação visual do site. <br> Pense  na decoração da sua página. <br> Utilizando o CSS é possível alterar a cor do texto e do fundo, fonte e espaçamento entre parágrafos. 
        </p>
        <button class="btn-css">SAIBA MAIS!</button>
    </article>
    <article class="js">
        <h2>JavaScript</h2>
        <p style="text-align: center;">
            JavaScript é uma linguagem de programação que permite a você implementar itens complexos <br> em páginas web — toda vez que uma página da web faz mais do que simplesmente <br> mostrar a você informação estática — mostrando conteúdo que se atualiza em um intervalo de tempo, <br> mapas interativos ou gráficos 2D/3D animados, etc
        </p>
        <button class="btn-js">SAIBA MAIS!</button>
    </article>
    <article class="php">
        <h2>PHP</h2>
        <p style="text-align: center;">
            Numa explicação de poucas palavras, <br> PHP é uma linguagem de programação utilizada por programadores e desenvolvedores para construir sites dinâmicos, <br> extensões de integração de aplicações e agilizar no desenvolvimento de um sistema.
        </p>
        <button class="btn-php">SAIBA MAIS!</button>
    </article>
</body>
</html>
