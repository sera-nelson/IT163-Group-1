<?php
if(!isset($_SESSION['UserName'])) {
    $_SESSION['msg'] = 'You must login first';
    header('Location: login.php');
}