<?php
include('includes/server.php');


?>

<h1>Login</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <fieldset>
    
        <label>Username</label>
        <input type="text" name="UserName" value="<?php if(isset($_POST['UserName'])) echo $_POST['UserName']; ?>">
        
        <label>Password</label>
        <input type="password" name="Password">
        
        <?php
        include('includes/errors.php');
        ?>
        
        <button type="submit" class="btn" name="login_user">Login</button>
        
        <button type="button" onclick="window.location.href = '<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>' ">RESET</button>
    </fieldset>
    
</form>

<p><a href="register.php">Register Here</a></p>