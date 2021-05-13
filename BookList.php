<?php 
include('includes/header.php'); 
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add a Book</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <div class="dropdown">
        <div class="dropdown-trigger">
            <button class="button is-dark" aria-haspopup="true" aria-controls="dropdown-menu3">
                <span>Click Me</span>
                <span class="icon is-small">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>
            </button>
        </div>
        <div class="dropdown-menu" id="dropdown-menu3" role="menu">
            <div class="dropdown-content">
                <a href="index.php" class="dropdown-item">Home</a>
                <a href="login.php" class="dropdown-item">Login</a>
                <a href="" class="dropdown-item">Reviews</a>
                <a href="BookList.php" class="dropdown-item">Books</a>
                <a href="NewBook.php" class="dropdown-item">Add a Book</a>
            </div>
        </div>
    </div>
    <div class="content">
        
        <?php
        include('includes/bookSearch.php');

        ?>
        <aside>

        <?php

        if($Feedback == ''){
            echo '';
        } else {
            echo $Feedback;
        }

        ?>
        </aside>
    </div>
            <button class="button is-light modal-trigger">Modal</button>
            <div class="modal">
                <div class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Title</p>
                        <button class="delete" aria-label="close"></button>
                    </header>
                    <section class="modal-card-body">
                        <p>Some text...</p>
                    </section>
                    <footer class="modal-card-foot">
                        <button class="button is-warning">No</button>
                        <button class="button is-success">Yes</button>
                    </footer>
                </div>
            </div>

        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script>
            let drop = document.querySelector('.dropdown');
            drop.addEventListener('click', (event) => {
                event.stopPropagation();
                drop.classList.toggle('is-active');
            });



            let modal = document.querySelector('.modal-trigger');
            let pop = document.querySelector('.modal');
            let close = document.querySelector('.delete');
            let outside = document.querySelector('.modal-background');
            let confirm=document.querySelector('.is-success');
            let cancel=document.querySelector('.is-warning');

            modal.addEventListener('click', (event) => {
                pop.classList.toggle('is-active');
            });
            close.addEventListener('click', (event) => {
                pop.classList.toggle('is-active');
            });
            confirm.addEventListener('click', (event) => {
                pop.classList.toggle('is-active');
            });
            cancel.addEventListener('click', (event) => {
                pop.classList.toggle('is-active');
            });
            window.addEventListener('click', (event) => {
                if(event.target === outside){
                    pop.classList.toggle('is-active');
                }
            });
        </script>
    </body>
</html>
© 2021 GitHub, Inc.
Terms
Privacy
Security
Status
Docs
Contact GitHub
Pricing
API
Training
Blog
About