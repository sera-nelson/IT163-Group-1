<?php 
include('includes/config.php');
include('includes/header.php'); 
?>
<div class="columns is-centered">
    <div class="column is-two-thirds has-background-white p-5 m-3">
        <?php include('includes/bookSearch.php'); ?>
        <p><?php if($Feedback == ''){echo '';}
            else {echo $Feedback;}
        ?></p>
    </div>

    <div class="column">
        <div class="side p-5 mx-3 mb-3 has-background-info-light box">
            <h2 class="subtitle mb-0 pt-2"><a href="NewBook.php">add a book to the shelf</a></h2>
            <p>(login required)</p>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>