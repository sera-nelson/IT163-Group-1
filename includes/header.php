<?php

session_start();

//if the user clicks log out, log them out and redirect to login.php
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['UserName']);
    header('Location: login.php');
};

//set page to current file - ie index.php
$page = basename($_SERVER['PHP_SELF']);
//switch case - different page title, heading, and here class depending on the page
//(used for identifying current page in the nav bar)
switch($page) {
    //home page
    case 'index.php':
        $title='Home | The Bookshelf';
        $heading = 'Home';
        $here = 'home';
        break;
    //view books page
    case 'BookList.php':
        $title = 'Books | The Bookshelf';
        $heading = 'View All Books';
        $here = 'books';
        break;
    //add new book (form) page
    case 'NewBook.php':
        $title = 'Add New Book | The Bookshelf';
        $heading = 'Add New Book';
        $here ='newbook';
        break;
    //create an account page (form)
    case 'register.php':
        $title = 'Create Account | The Bookshelf';
        $heading = 'Create Account';
        $here = 'register'; 
        break;
    //login page (form)
    case 'login.php':
        $title = 'Login | The Bookshelf';
        $heading = 'Log In';
        $here = 'login';
        break;
    //view reviews page
    case 'reviews.php':
        $title = 'Reviews | The Bookshelf';
        $heading = 'View All Reviews';
        $here = 'reviews';
        break;
    //add new review (form) page
    case 'NewReview.php':
        $title = 'Add New Review | The Bookshelf';
        $heading = 'Add New Review';
        $here = 'newreview';
        break;
    //default / cases not accounted for
    default:
        $title = 'The Bookshelf';
        $heading = 'The Bookshelf';
        $here = 'default';
        break;
};
?>

<!--HTML to be inserted in the header of each page-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--insert $title from switch case (above) - insert contextual page title-->
        <title><?php echo $title; ?></title>
        <meta charset="utf-8">
        <meta name="description" content="Book Descriptions and Reviews">
        <meta name="keywords" content="books, reviews, fiction, nonfiction, bookshelf">
        <meta name="author" content="Hannah Eberts (design), Rory Hackney (front-end), Dominick Nelson (back-end)">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--favicon links-->
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
        `<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">`
        <!--CDNs, stylesheet-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
        <script src="/node_modules/bulma-extensions/bulma-slider/dist/bulma-slider.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body class="has-background-info">
        <header class="has-background-info"> 
            <div class="columns">
                <div class="column is-2 p-5 ml-3 is-one-half-mobile">
                    <a class="logo" href="index.php"><img src="images/logo.svg" alt="The Bookshelf Logo"></a>
                </div>               
                <div id="mynavdiv" class="column mb-4">
                    <nav class="navbar is-transparent" aria-label="main navigation">
                        <div class="navbar-brand">
                            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
                                <span aria-hidden="true"></span>
                                <span aria-hidden="true"></span>
                                <span aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- TODO: add is-active class on mobile with the hamburger menu toggle to display these on mobile-->
                        <div class="navbar-menu has-background-info">
                            <div class="navbar-start">
                                <!--if the current page is the home page, add the is-active class to the page in the nav-->
                                <a class="navbar-item
                                    <?php if($here === 'home'){echo ' is-active';}?>
                                " href="index.php">Home</a>
                                <!--if current page is books, add is-active to books in nav-->
                                <a class="navbar-item
                                    <?php if($here === 'books'){echo ' is-active';}?>
                                " href="BookList.php">Books</a>
                                <!--if current page is reviews, add is-active to reviews in nav-->
                                <a class="navbar-item
                                    <?php if($here === 'reviews'){echo ' is-active';}?>
                                " href="reviews.php">Reviews</a>
                            </div>
                            <div class="navbar-end">
                                <!--TODO: add form action for headersearch-->
                                <?php include('headerSearch.php');?>
                                <a class="navbar-item" href="">Dark/Light Mode</a>
                                <?php include('loginHeader.php'); ?>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <hr class="has-background-warning m-0">
        <main class="has-background-info-light p-6">
            <h1 class="title has-text-centered"><?php echo $heading; ?></h1>