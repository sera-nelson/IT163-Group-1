<?php
if(!isset($_SESSION['UserName'])) { ?>
<div class="navbar-item">
    <a class="button is-warning m-3" href="login.php">Log In</a>
    <a class="button is-warning m-3" href="register.php">Register</a>
</div>
<?php
}else{
    if(isset($_SESSION['success'])): ?>
    <div class="error success">
        <p>
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </p>
    </div>
    <?php endif ?>

    <div class="error success navbar-item">
        <?php if(isset($_SESSION['UserName'])): ?>
            <h3>Welcome, <?php echo $_SESSION['UserName']; ?></h3>
            <a class="button is-warning m-3" href="index.php?logout='1' ">Log out</a>
        <?php endif ?>
    </div>
<?php } ?>