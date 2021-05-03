<?php
ob_start();
define('DEBUG', 'TRUE');
include('credentials.php');

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

function myerror($myFile, $myLine, $errorMsg){
    if(defined('DEBUG') && DEBUG){
        echo 'Error in file: <b> '.$myLine.' </b> on line: <b>'.$myLine.' </b>';
        echo 'Error message: <b> '.$errorMsg.'</b>';
        die();
    } else {
        echo 'issue';
        die();
    }
}


