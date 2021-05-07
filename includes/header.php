<?php
session_start();

if(!isset($_SESSION['UserName'])) {
    $_SESSION['msg'] = 'You must login first';
    header('Location: login.php');
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['UserName']);
    header('Location: login.php');
}
?>

    <?php//login/logout info?>
       <section class="rightnavlog"> 
    
<?php 
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
    </section>

