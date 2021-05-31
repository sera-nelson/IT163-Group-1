<?php 
include('includes/LoginCheck.php');
include('includes/header.php');
?>

<div class="columns is-centered">
<div class="column is-half has-background-info-light p-5 m-3">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <fieldset>
            <div class="field">
                <div class="control">
                    <label for="title">Title</label>
                    <input class="input has-text-centered" id="title" type="text" name="Title" placeholder="Title" value="<?php if(isset($_POST['Title'])) echo $_POST['Title']; ?>">
                </div>
            </div>
            <div class="field">
                <div class="frmSearch control">
                    <label for="search-box">Author</label>
                    <input id="search-box" class="input has-text-centered" type="text" name="Author" placeholder="Author" value="<?php if(isset($_POST['Author'])) echo $_POST['Author']; ?>">
                    <input type="hidden" id="authorID" name="authorID" value="<?php if(isset($_POST['authorID'])) echo $_POST['authorID']; ?>">
                    <div id="suggesstion-box" class="box"></div>
                </div>
            </div>
            <div class="field">
                <div class="frmSearchGenre control">
                    <label for="search-box-genre">Genre</label>
                    <input id="search-box-genre" class="input is-small" type="text" name="Genre" placeholder="Genre" value="<?php if(isset($_POST['Genre'])) echo $_POST['Genre']; ?>">
                    <input type="hidden" id="genreID" name="genreID" value="<?php if(isset($_POST['genreID'])) echo $_POST['genreID']; ?>">
                    <div id="suggesstion-box-genre" class="box"></div>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-warning" name="reg_book">Add Book</button>
                </div>
            </div>
            <?php include('includes/server.php'); ?>
        </div>
        </div>
        </fieldset>
    </form>
</div>
</div>
<?php include('includes/footer.php'); ?>