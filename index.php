<?php
include('includes/config.php');
include('includes/header.php');
?>
<div class="columns is-centered">
    <div class="column is-two-thirds p-5 m-3 has-background-white">
        <h2 class="subtitle has-text-centered is-size-4">what we're loving this week...</h2>
        <!--inserts 6 random books from database-->
        <?php include('includes/randReview.php'); ?>
    </div>
    <div class="column">
        <div class="p-5 m-3 has-background-info-light box">
        <h2 class="subtitle mb-0 pt-2">browse the bookshelf</h2>
        <ul>
            <li><a href="BookList.php?param=AuthorParam">by author</a></li>
            <li><a href="BookList.php?param=GenreParam">by genre</a></li>
            <li><a href="BookList.php?param=TitleParam">by title</a></li> 
        </ul>
        </div>
        <div class="p-5 m-3 has-background-info-light box">
            <h2 class="subtitle mb-0 pt-2">read the reviews</h2>
            <ul>
                <li><a href="reviews.php?param=AuthorParam">by author</a></li>
                <li><a href="reviews.php?param=GenreParam">by genre</a></li>
                <li><a href="reviews.php?param=TitleParam">by title</a></li>
            </ul>
        </div>
    </div>
</div>
<input type="hidden" id="ptimeTest">
<?php include('includes/footer.php');?>