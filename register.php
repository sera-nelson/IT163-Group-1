<?php
include('includes/server.php');
include('includes/header.php');
?>

        <div class="container">
            <h1 class="title">Register</h1>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

        <fieldset>

            <label>First Name</label>
            <input class="input is-normal" type="text" name="FirstName" placeholder="First Name" value="<?php if(isset($_POST['FirstName'])) echo $_POST['FirstName']; ?>">

            <label>Last Name</label>
            <input class="input is-normal" type="text" name="LastName" placeholder="Last Name" value="<?php if(isset($_POST['LastName'])) echo $_POST['LastName']; ?>">

            <label>Username</label>
            <input class="input is-normal" type="text" name="UserName" placeholder="Username" value="<?php if(isset($_POST['UserName'])) echo $_POST['UserName']; ?>">

            <label>Email</label>
            <input class="input is-normal" type="email" name="Email" placeholder="Email" value="<?php if(isset($_POST['Email'])) echo $_POST['Email']; ?>">

            <label>ZipCode</label>
            <input class="input is-normal" type="text" name="ZipCode" placeholder="ZipCode" value="<?php if(isset($_POST['ZipCode'])) echo $_POST['ZipCode']; ?>">

            <label>Password</label>
            <input class="input is-normal" type="password" name="Password_1" placeholder="Confirm Password">

            <label>Confirm Password</label>
            <input class="input is-normal" type="password" name="Password_2" placeholder="Confirm Password">

            <div class="box">
                <button type="submit" class="button is-dark" name="reg_user">Register</button>
                <p class="subtitle">Already a member? <a href="login.php">Sign in</a></p>
            </div>

            <?php
          include('includes/errors.php');
            ?>
    </fieldset>
   
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