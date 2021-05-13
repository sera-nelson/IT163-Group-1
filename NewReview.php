<?php 
include('includes/header.php');
?>
<script src="/node_modules/bulma-extensions/bulma-slider/dist/bulma-slider.min.js"></script>
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
            <h1 class="title">Review a Book</h1>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

            <fieldset>

            <div class="frmSearchBook">
                <label>Book </label>
                <input id="search-box-book" class="input is-small" type="text" name="Book" placeholder="Book Title" value="<?php if(isset($_POST['Book'])) echo $_POST['Book']; ?>">
                <input type="hidden" id="bookID" name="bookID" value="<?php if(isset($_POST['bookID'])) echo $_POST['bookID']; ?>">
                <div id="suggesstion-box-book" class="box"></div>
            </div><br>
              
            
            <label>Rating</label>
                <label>1</label>
                <input class="slider has-output-tooltip is-fullwidth" id="Rating" step="0.5" min="1" max="5" value="50" type="range" name="Rating">
                <label>5</label>
                <br><br>
            <div class="control">
            <label>Would you reccomend this book to a friend?</label><br>
                <label class="radio">
                <input type="radio" name="Recc" value="Yes" checked>
                    Yes
                </label>
                
                <label class="radio">
                <input type="radio" name="Recc" value="No">
                    No
                </label>
                <br><br>
            </div>  
            <label>Review</label>
                <textarea class="textarea" name="Review" placeholder="Leave your review here!" rows="8" style="width:600px;" value="<?php if(isset($_POST['Review'])) echo $_POST['Review']; ?>"></textarea>
                
            <div class="box">
                <button type="submit" class="button is-primary" name="reg_review">Submit Review</button>
                
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

        <script> //For Book
            $(document).ready(function(){
                $("#search-box-book").keyup(function(){
                    $.ajax({
                    type: "POST",
                    url: "includes/readTitle.php",
                    data:'bookkeyword='+$(this).val(),
                    success: function(data){
                        $("#suggesstion-box-book").show();
                        $("#suggesstion-box-book").html(data);
                        $("#search-box-book").css("background","#FFF");
                    }
                    });
                });
            });

            function selectBook(val) {
            $("#search-box-book").val(val);
            $("#suggesstion-box-book").hide();
            }
            function bookID(val) {
            $("#bookID").val(val);
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
