<?php 
include('includes/config.php');
include('includes/header.php'); 
?>
<div class="columns is-centered">
    <div class="column is-two-thirds has-background-info p-5 m-3">
        <?php include('includes/bookSearch.php'); ?>
        <p><?php if($Feedback == ''){echo '';}
            else {echo $Feedback;}
        ?></p>
    </div>

    <div class="column p-5 m-3">
        <h2 class="subtitle mb-0 pt-2"><a href="NewBook.php">add a book to the shelf</a></h2>
        <p>(login required)</p>
        <h2 class="subtitle mb-0 pt-2">what's new on the bookshelf</h2>
        <!--TODO: INSERT 3 ITEMS FROM DB - MOST RECENT/?-->
    </div>
</div>
<?php include 'includes/footer.php'; ?>