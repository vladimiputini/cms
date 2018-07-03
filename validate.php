<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 25/06/18
 * Time: 22:32
 */
require_once 'dbconnection.php';

if(isset($_POST['submit'])) {
//    function_exists($_POST['call']) ? call_user_func($_POST['call']) : exit(404);

        userCheck();
}

//userCheck();
function userCheck(){

$username = $_POST['username'];
$password = $_POST['password'];

    if ($username !='' and $password != ''){
    if(isset($_POST['submit'])){


        $username = $_POST['username'];
        $password = $_POST['password'];
            //call function db
            db();
            //preparing a SQL query
            $stmt = db()->prepare( "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'");
            $result = $stmt->setFetchMode(PDO::FETCH_NUM);
            $stmt->execute();

            if (!$result){
                die('No Query:');
            }
//            var_dump($result);
//            exit();

            $aantal = $stmt->fetch(PDO::FETCH_NUM);

            if ($aantal != false){
                session_start();
                $user = mysqli_fetch_row($aantal);
                $_SESSION['ingelogd'] = 'ja';
                $_SESSION['username'] = $user[1];
                echo "Caution this website's front end is developed by an Back-end developer";
                header("refresh:5;url=paginaBeheer.php");
                exit();

            } else {
                echo 'Uw gebruikersnaam of ww is niet goed';
                header("refresh:3;url=index.php");
            }
//        var_dump($aantal);
    }
    } else {
        echo 'vul uw gegevens in';
        header("refresh:1;url=index.php");
        exit();
    }
}
//
