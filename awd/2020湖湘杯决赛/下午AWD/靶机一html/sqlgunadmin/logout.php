<?php
    if(isset($_COOKIE['login'])){
        setcookie('login','no-login');
        exit;	
    }
    else{
        exit;
    }
?>