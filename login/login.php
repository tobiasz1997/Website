<?php

session_start();

if((isset($_SESSION['online'])) && ($_SESSION['online']==true))
{
    header('Location: drawing.php');
    exit();
}

if(isset($_POST['emailInput'])){
    $everything_ok = true;

    $login = $_POST['loginInput1'];

    if((strlen($login)<3) || (strlen($login)>20)){
        $everything_ok = false;
        $_SESSION['e_login'] = 'Login mu mieć od 3 do 20 znaków!';
    }

    if(ctype_alnum($login)==false){// znaki alfanumeryczne
        $everything_ok = false;
        $_SESSION['e_login'] = 'Login musi składać się z liter i cyfr!';
    }

    $email = $_POST['emailInput'];
    $emailCorrect = filter_var($email, FILTER_SANITIZE_EMAIL); //zprawdza poprawnosc emaila

    if((filter_var($emailCorrect, FILTER_VALIDATE_EMAIL)==false) || ($emailCorrect!=$email)){
        $everything_ok = false;
        $_SESSION['e_email'] = 'Zły adres email!';
    }

    $pass1 = $_POST['passwordInput'];
    $pass2 = $_POST['passwordInput1'];

    if((strlen($pass1) < 5) || (strlen($pass1) > 20)){
        $everything_ok = false;
        $_SESSION['e_pass'] = 'Hasło musi mieć od 5 do 20 znaków!';
    }

    if($pass1 != $pass2){
        $everything_ok = false;
        $_SESSION['e_pass1'] = 'Hasła się różnią !';
    }

    $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);

    $secret_capture = '6LfBkJ8UAAAAADfQZjgkheEuhgz8bY6jTLsEl-fA';
    $check_capture = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_capture.'&response='.$_POST['g-recaptcha-response']);

    $answear = json_decode($check_capture);

    if($answear->success==false){
        $everything_ok = false;
        $_SESSION['e_capture'] = 'Potwierdź że nie jesteś robotem !';
    }

    require_once "connect.php";
    

    try{
        $DBconnection = new mysqli($host, $user_DB, $password_DB, $name_DB);
        if($DBconnection->connect_errno!=0)
        {
            throw new Exception (mysqli_connect_errno());
        }
        else
        {
            $result1 = $DBconnection->query("SELECT id from users where email='$email'");
            if(!$result1){
                throw new Exception($DBconnection->error);
            }

            $how_many_email = $result1->num_rows;
            if($how_many_email>0){
                $everything_ok = false;
                $_SESSION['e_email'] = 'Taki email juz jest w bazie';
            }

            $result1 = $DBconnection->query("SELECT id from users where user='$login'");
            if(!$result1) throw new Exception($DBconnection->error);

            $how_many_login = $result1->num_rows;
            if($how_many_login>0){
                $everything_ok = false;
                $_SESSION['e_login'] = 'Taki login juz jest w bazie';
            }

            if($everything_ok==true){
                if($DBconnection->query("insert into users values (NULL,'$login','$pass_hash','$email')"))
                {
                    $_SESSION['registerCorrect'] = true;
                    echo 'udało się !!!';
                }
                else{
                    throw new Exception($DBconnection->error);
                }
            }

            $DBconnection->close();
        }
    }
    catch(Exception $e){
        echo 'bład serwera';
        echo '</br> info'.$e;
    }

}

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Grzegorz Tobiasz</title>
    <link rel="stylesheet" type="text/css" media="screen" href="loginAnimation.js">
    <link rel="stylesheet" type="text/css" media="screen" href="loginStyle.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <div class="kontener">
        <h2>Logowanie</h2>
        <form id="loginForm" action="loginGo.php" method="post">
            Login:<br />
            <input type="text" placeholder="login / email" name="loginInput"/><br /><br />
            Hasło: <br />
            <input type="password"  placeholder="hasło"name="hasloInput"/><br /><br />
            
            <input type="submit" value="zaloguj"/>
            <?php
                if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
            ?>
        </form>
        <form id="registrForm" method="post">
            Login:<br />
            <input type="text" placeholder="login" name="loginInput1"/><br /><br />
            <?php
                if(isset($_SESSION['e_login'])){
                    echo '<div class="error">'.$_SESSION['e_login'].'</div>';
                    unset($_SESSION['e_login']);
                }
            ?>
            Email:<br />
            <input type="text" placeholder="email" name="emailInput"/><br /><br />
            <?php
                if(isset($_SESSION['e_email'])){
                    echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                    unset($_SESSION['e_email']);
                }
            ?>
            Hasło: <br />
            <input type="password"  placeholder="hasło"name="passwordInput"/><br /><br />
            <?php
                if(isset($_SESSION['e_pass'])){
                    echo '<div class="error">'.$_SESSION['e_pass'].'</div>';
                    unset($_SESSION['e_pass']);
                }
            ?>
            Powtórz hasło: <br />
            <input type="password"  placeholder="hasło"name="passwordInput1"/><br /><br />
            <?php
                if(isset($_SESSION['e_pass1'])){
                    echo '<div class="error">'.$_SESSION['e_pass1'].'</div>';
                    unset($_SESSION['e_pass1']);
                }
            ?>
            <div class="g-recaptcha" data-sitekey="6LfBkJ8UAAAAAJSB-C1E7SD9iTPme_f4Ue3a91J6"></div>
            <?php
                if(isset($_SESSION['e_capture'])){
                    echo '<div class="error">'.$_SESSION['e_capture'].'</div>';
                    unset($_SESSION['e_capture']);
                }
            ?>
            <input type="submit" value="zarejestruj sie"/>
            

        </form>
    </div>
</body>
</html>