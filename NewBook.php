<?php 
include('includes/header.php'); 
include('includes/LoginCheck.php'); 
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
        <div class="container">
            <h1 class="title">Add a New Book</h1>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

            <fieldset>

            <label>Title</label>
            <input class="input is-small" type="text" name="Title" placeholder="Title" value="<?php if(isset($_POST['Title'])) echo $_POST['Title']; ?>">

            <div class="frmSearch">
                <label>Author</label>
                <input id="search-box" class="input is-small" type="text" name="Author" placeholder="Author" value="<?php if(isset($_POST['Author'])) echo $_POST['Author']; ?>">
                <input type="hidden" id="authorID" name="authorID" value="<?php if(isset($_POST['authorID'])) echo $_POST['authorID']; ?>">
                <div id="suggesstion-box"></div>
            </div>

            <div class="frmSearchGenre">
                <label>Genre </label>
                <input id="search-box-genre" class="input is-small" type="text" name="Genre" placeholder="Genre" value="<?php if(isset($_POST['Genre'])) echo $_POST['Genre']; ?>">
                <input type="hidden" id="genreID" name="genreID" value="<?php if(isset($_POST['genreID'])) echo $_POST['genreID']; ?>">
                <div id="suggesstion-box-genre"></div>
            </div>
                
            <div class="box">
                <button type="submit" class="button is-primary" name="reg_book">Add Book</button>
                
                <p class="subtitle">See all of our books<a href="BookList.php"> here</a></p>
            </div>
            <div class="content">
                <?php include('includes/server.php'); ?>
            </div>
            </fieldset>
        </form>
        
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
        <script> //For Author
            $(document).ready(function(){
                $("#search-box").keyup(function(){
                    $.ajax({
                    type: "POST",
                    url: "includes/readName.php",
                    data:'keyword='+$(this).val(),
                    success: function(data){
                        $("#suggesstion-box").show();
                        $("#suggesstion-box").html(data);
                        $("#search-box").css("background","#FFF");
                    }
                    });
                });
            });

            function selectName(val) {
            $("#search-box").val(val);
            $("#suggesstion-box").hide();
            }
            function nameID(val) {
            $("#authorID").val(val);
            }
        </script>

        <script> //For Genre
            $(document).ready(function(){
                $("#search-box-genre").keyup(function(){
                    $.ajax({
                    type: "POST",
                    url: "includes/readGenre.php",
                    data:'genrekeyword='+$(this).val(),
                    success: function(data){
                        $("#suggesstion-box-genre").show();
                        $("#suggesstion-box-genre").html(data);
                        $("#search-box-genre").css("background","#FFF");
                    }
                    });
                });
            });

            function selectGenre(val) {
            $("#search-box-genre").val(val);
            $("#suggesstion-box-genre").hide();
            }
            function genreID(val) {
            $("#genreID").val(val);
            }
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
