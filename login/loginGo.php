<?php

session_start(); //globalny pojemnik na dane

require_once "connect.php"; // cos takie go jak include, roznica: 'wymagaj' pliku, 
                            //once-wczytuje jessli jeszcze nie byl wczytany

$DBconnection = @new mysqli($host, $user_DB, $password_DB, $name_DB);

//@ - operator kontroli bledu

if($DBconnection->connect_errno!=0)
{
    echo "Error no: ".$DBconnection->connect_errno;
}
else{
    $login = $_POST['loginInput'];
    $haslo = $_POST['hasloInput'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8"); // zamienia znaki jakie jak np < na encje (&lt;)

    // $sql = "SELECT * FROM users WHERE user = '$login' AND password = '$haslo'";
    // if($result = @$DBconnection->query($sql)){

    if($result = @$DBconnection->query(
        sprintf("SELECT * FROM users WHERE user = '%s'", // printf, string
        mysqli_real_escape_string($DBconnection,$login))))
        {
            $how_users = $result->num_rows;
            if($how_users>0){
                $row = $result->fetch_assoc();

                if(password_verify($haslo,$row['password']))
                {

                    $_SESSION['online'] = true;

                    $_SESSION['user'] = $row['user'];

                    unset($_SESSION['error']);
                    $result->close();
                    header('Location: drawing.php');
                }
                else
                {
                    $_SESSION['error'] = '<span style="color:red">Zły login lub hasło !</span>';
                    header('Location: login.php');
                }
        
            }
            else
            {
                $_SESSION['error'] = '<span style="color:red">Zły login lub hasło !</span>';
                header('Location: login.php');
            }
        }

    @$DBconnection->close();
}


?>