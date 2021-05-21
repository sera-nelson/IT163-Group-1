<?php
include('includes/server.php');
include('includes/header.php');
?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <fieldset>

            <label>Username</label>
            <input class="input is-normal" type="text" name="UserName" placeholder="Username" value="<?php if(isset($_POST['UserName'])) echo $_POST['UserName']; ?>">

            <label>Password</label>
            <input class="input is-normal" type="password" name="Password" placeholder="Password" value="<?php if(isset($_POST['Password'])) echo $_POST['Password']; ?>">

            <?php
            include('includes/errors.php');
            ?>

            <div class="box">
                <button type="submit" class="button is-dark" name="login_user">Login</button>
                <p class="subtitle">No account? <a href="register.php">Register Here</a></p>
            </div>

        </fieldset>   
        </form>

        <script>
            let drop = document.querySelector('.dropdown');
            drop.addEventListener('click', (event) => {
                event.stopPropagation();
                drop.classList.toggle('is-active');
            });



            let modal = document.querySelector('.modal-trigger');
            let pop = document.querySelector('.modal');
            let close = document.querySelector('.delete');
            let outside = document.querySelector('.modal-background');
            let confirm=document.querySelector('.is-success');
            let cancel=document.querySelector('.is-warning');

            modal.addEventListener('click', (event) => {
                pop.classList.toggle('is-active');
            });
            close.addEventListener('click', (event) => {
                pop.classList.toggle('is-active');
            });
            confirm.addEventListener('click', (event) => {
                pop.classList.toggle('is-active');
            });
            cancel.addEventListener('click', (event) => {
                pop.classList.toggle('is-active');
            });
            window.addEventListener('click', (event) => {
                if(event.target === outside){
                    pop.classList.toggle('is-active');
                }
            });
        </script>
<?php include('includes/footer.php'); ?>
