<?php 

session_start();
include('loginConfig.php');

$Title = '';
$Author = '';
$Genre = '';

$errors = array();
$success = 'Logged in';
$UserName = 'Test';
    
$db = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if(isset($_POST['reg_book'])){ //reads the info in the text boxes on the addbook page when the submit button is pressed
    $Title = @mysqli_real_escape_string($db, $_POST['Title']);
    $Author = @mysqli_real_escape_string($db, $_POST['Author']);
    $Genre = @mysqli_real_escape_string($db, $_POST['Genre']);

    if(empty($Title)){
        array_push($errors, 'Title is required');
    }
    if(empty($Author)){
        array_push($errors, 'Author Name is required');
    }
    if(empty($Genre)){
        array_push($errors, 'Genre is required');
    }


    $result = @mysqli_query($db, $user_check_query);

    if(count($errors) == 0){ //if there are no errors it adds the new book


        $query = "INSERT INTO OldBookList (Title, Author, Genre) VALUES ('$Title', '$Author', '$Genre') "; //adds the book to the database

        mysqli_query($db, $query);
        $_SESSION['UserName'] = $UserName;
        $_SESSION['success'] = $success;
        echo ''.$Title.' has been added!';

    }//count
}//isset
 