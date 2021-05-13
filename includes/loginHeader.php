<?php
if(!isset($_SESSION['UserName'])) { ?>
    <a href="login.php">Log In</a>
    <a href="register.php">Register</a>
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
    <?php 
        if(isset($_SESSION['UserName'])): ?>
            <h3> Welcome, 
                <?php echo $_SESSION['UserName']; ?>
            </h3>
        <p><a href="index.php?logout='1' ">Log out</a></p>
    </div>
    <?php endif ?>
<?php } ?>

 
     