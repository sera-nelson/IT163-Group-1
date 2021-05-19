<?php
if(!isset($_SESSION['UserName'])) { ?>
    <a class="navbar-item button is-dark m-3" href="login.php">Log In</a>
    <a class="navbar-item button is-dark m-3" href="register.php">Register</a>
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

    <div class="error success">
        <?php if(isset($_SESSION['UserName'])): ?>
            <h3 class="navbar-item">Welcome, <?php echo $_SESSION['UserName']; ?></h3>
            <a class="navbar-item button is-dark m-3" href="index.php?logout='1' ">Log out</a>
        <?php endif ?>
    </div>
<?php } ?>