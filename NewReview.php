<?php
include('includes/LoginCheck.php');
include('includes/header.php');
?>

<div class="columns is-centered">
    <div class="column is-half has-background-info-light p-5 m-3">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <fieldset>
        <div class="field">
            <div class="frmSearchBook control">
                <label for="search-box-book">Book Title</label>
                <input id="search-box-book" class="input has-text-centered" type="text" name="Book" placeholder="Book Title" value="<?php if(isset($_POST['Book'])) echo $_POST['Book']; ?>">
                <input type="hidden" id="bookID" name="bookID" value="<?php if(isset($_POST['bookID'])) echo $_POST['bookID']; ?>">
                <div id="suggesstion-box-book" class="box"></div>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <label for="Rating">Rating</label>
                <label>1</label>
                <input class="slider has-output-tooltip is-fullwidth" id="Rating" step="0.5" min="1" max="5" value="50" type="range" name="Rating">
                <label>5</label>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <label for="review">Review</label>
                <textarea id="review" class="textarea" name="Review" placeholder="Leave your review here!" rows="8" value="<?php if(isset($_POST['Review'])) echo $_POST['Review']; ?>"></textarea>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-warning" name="reg_review">Submit Review</button>
            </div>
        </div>
        <?php include('includes/server.php'); ?>
        </fieldset>
    </form>
    </div>
</div>
<?php include('includes/footer.php'); ?>