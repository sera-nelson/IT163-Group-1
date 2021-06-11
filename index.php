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
        </div>
        <div class="p-5 m-3 has-background-info-light box modalChange" id="popupSearchBox">
            <h2 class="subtitle mb-0 pt-2">reviews that might interest you</h2>
            <ul>
                <li><a href="javascript:modalAuthSearch();" id="authorPopup"></a></li>
                <li><a href="javascript:modalGenreSearch();" id="genrePopup"></a></li>
                <li><a href="javascript:modalTitleSearch();" id="titlePopup"></a></li>
                <input type="hidden" id="popupSearch" name="popupSearch" value="">
            </ul>
        </div>
    </div>
    <div class ="popup" id="popup">
        <div class="popupSurvey">
            <span onClick="closePopup()">&times;</span><br/>
            <label>What is your favorite author?</label>
            <input type="text" id="favAuthor"><br/>
            <label>What is your favorite book?</label>
            <input type="text" id="favBook"><br/>
            <label>What is your favorite genre?</label>
            <input type="text" id="favGenre"><br/>
            <div class="control">
                <button class="button is-warning" type="submit" value="Submit" name="popupSubmit" onClick="closePopup()">Submit</button>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="ptimeTest">
<?php include('includes/footer.php');?>