<?php

session_start();

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['UserName']);
    header('Location: login.php');
};

$page = basename($_SERVER['PHP_SELF']);
switch($page) {
    case 'index.php':
        $title='Home | The Bookshelf';
        $heading = 'Home';
        $here = 'home';
        break;
    case 'BookList.php':
        $title = 'Books | The Bookshelf';
        $heading = 'View All Books';
        $here = 'books';
        break;
    case 'NewBook.php':
        $title = 'Add New Book | The Bookshelf';
        $heading = 'Add New Book';
        $here ='newbook';
        break;
    case 'register.php':
        $title = 'Create Account | The Bookshelf';
        $heading = 'Create Account';
        $here = 'register'; 
        break;
    case 'login.php':
        $title = 'Login | The Bookshelf';
        $heading = 'Log In';
        $here = 'login';
        break;
    case 'reviews.php':
        $title = 'Reviews | The Bookshelf';
        $heading = 'View All Reviews';
        $here = 'reviews';
        break;
    case 'NewReview.php':
        $title = 'Add New Review | The Bookshelf';
        $heading = 'Add New Review';
        $here = 'newreview';
        break;
    default:
        $title = 'The Bookshelf';
        $heading = 'The Bookshelf';
        $here = 'default';
        break;
};

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="utf-8">
        <meta name="description" content="Book Descriptions and Reviews">
        <meta name="keywords" content="books, reviews, fiction, nonfiction, bookshelf">
        <meta name="author" content="Hannah Eberts (design), Rory Hackney (front-end), Dominick Nelson (back-end)">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <header>
            <p>LOGO</p>
            <p class="subtitle">The Bookshelf | Books and Reviews By and For You!</p>
            <?php include('loginHeader.php'); ?>
            <p id="styleToggle">Toggle Dark Mode</p>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="BookList.php">View Books</a></li>
                    <li><a href="NewBook.php">New Book</a></li>
                    <li><a href="reviews.php">View Reviews</a></li>
                    <li><a href="NewReview.php">New Review</a></li>
                </ul>
            </nav>
        </header>
<h1><?php echo $heading; ?></h1>