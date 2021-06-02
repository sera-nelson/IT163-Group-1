<?php
include('includes/server.php');
include('includes/header.php');
?>
<div class="has-background-info-light p-5 m-3">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <fieldset>
            <div class="columns is-centered">
            <div class="column is-half">
                <div class="field">
                    <div class="control">
                        <label for="username" class="subtitle">Username</label>
                        <input id="username" class="input has-text-centered" type="text" name="UserName" placeholder="Username" value="<?php if(isset($_POST['UserName'])) echo $_POST['UserName']; ?>">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label for="password" class="subtitle">Password</label>
                        <input id="password" class="input has-text-centered" type="password" name="Password" placeholder="Password" value="<?php if(isset($_POST['Password'])) echo $_POST['Password']; ?>">
                    </div>
                </div>
                <?php include('includes/errors.php'); ?>
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-warning" value="Submit" name="login_user">Login</button>
                    </div>
                </div>
                <p class="subtitle">No account? <a href="register.php">Register Here</a></p>
            </div>
            </div>
        </fieldset>
    </form>
</div>
<?php include('includes/footer.php'); ?>
