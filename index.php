<?php
include('includes/config.php');
include('includes/header.php');
$_SESSION['param'] = $indexParam;
?>
<div class="columns is-centered">
    <div class="column is-two-thirds p-5 m-3 has-background-white">
        <h2 class="subtitle has-text-centered is-size-4">what we're loving this week...</h2>
        <!--inserts 6 random books from database-->
        <?php include('includes/randReview.php'); ?>
    </div>
    <div class="column">
        <div class="side-home p-5 mx-3 mb-3 has-background-info-light box">
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
            <button class="button is-warning modal-trigger">Modal</button>
        </div>
        <div class="has-background-info-light p-5 m-3 box" id="popupSearchBox">
            <h2 class="subtitle mb-0 pt-2">reviews that might interest you</h2>
            <ul>
                <li><a href="javascript:modalAuthSearch();" id="authorPopup"></a></li>
                <li><a href="javascript:modalGenreSearch();" id="genrePopup"></a></li>
                <li><a href="javascript:modalTitleSearch();" id="titlePopup"></a></li>
                <input type="hidden" id="popupSearch" name="popupSearch" value="">
            </ul>
        </div>
    </div>
    <div class="modal">
            <div class="modal-background"></div>
            <div class="modal-card has-text-centered">
                <header class="modal-card-head has-background-info-light">
                    <p class="modal-card-title">Welcome to The Bookshelf!</p>
                    <button class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label" for="favAuthor">Who is your favorite author?</label>
                        <div class="control">
                            <input type="text" name="favAuthor" id="favAuthor"><br/>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="favBook">What is your favorite book?</label>
                        <div class="control">
                            <input type="text" name="favBook" id="favBook"><br/>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="favGenre">What is your favorite genre?</label>
                        <div class="control">
                            <input type="text" name="favGenre" id="favGenre"><br/>
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot has-background-info-light">
                    <div class="field width-full">
                        <div class="control">
                            <button id="submitModal" class="button is-warning" type="submit" value="submit">Submit</button>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
</div>
<input type="hidden" id="ptimeTest">
<?php include('includes/footer.php');?>