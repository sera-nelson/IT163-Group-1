<?php
if(!isset($_SESSION['UserName'])) { ?>
    <li><a class="inv" href="login.php">Log In</a></li>
    <li><a class="inv" href="register.php">Register</a></li>
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
            <li><a class="inv" href="index.php?logout='1' ">Log out</a></li>
        <?php endif ?>
    </div>
<?php } ?>