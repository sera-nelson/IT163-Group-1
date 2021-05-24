<?php
include('includes/config.php');
include('includes/header.php');
?>
<div class="columns is-centered">
    <div class="column is-two-thirds has-background-info p-5 m-3">
        <h2 class="subtitle has-text-centered">what we're loving this week...</h2>
        <!--TODO: INSERT 6 ITEMS FROM DB - MOST RECENT/MOST REVIEWS/?-->
        <?php include('includes/randReview.php'); ?>
    </div>
    <div class="column p-5 m-3">
        <!--TODO: CHANGE HREFS TO SEARCH DB W/PARAMS-->
        <h2 class="subtitle mb-0 pt-2">browse the bookshelf</h2>
        <ul>
            <li><a href="BookList.php?param=AuthorParam">by author</a></li>
            <li><a href="BookList.php?param=GenreParam">by genre</a></li>
            <li><a href="BookList.php?param=TitleParam">by title</a></li> 
        </ul>
        <h2 class="subtitle mb-0 pt-2">read the reviews</h2>
        <ul>
            <li><a href="reviews.php?param=AuthorParam">by author</a></li>
            <li><a href="reviews.php?param=GenreParam">by genre</a></li>
            <li><a href="reviews.php?param=TitleParam">by title</a></li>
        </ul>
    </div>
</div>
<?php include 'includes/footer.php'; ?>