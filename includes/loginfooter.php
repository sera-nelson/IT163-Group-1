<?php
if(!isset($_SESSION['UserName'])) { ?>
    <li><a class="button is-warning my-3" href="login.php">Log In</a></li>
    <li><a class="button is-warning" href="register.php">Register</a></li>
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
            <li><a class="button is-warning" href="index.php?logout='1'">Log Out</a></li>
        <?php endif ?>
    </div>
<?php } ?>