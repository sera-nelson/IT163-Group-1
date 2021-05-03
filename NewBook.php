<?php

?>

<h1>Add Book</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

    <fieldset>
    
    <label>Title</label>
    <input type="text" name="Title" value="<?php if(isset($_POST['Title'])) echo $_POST['Title']; ?>">
    
    <label>Author</label>
    <input type="text" name="Author" value="<?php if(isset($_POST['Author'])) echo $_POST['Author']; ?>">
    
    <label>Genre</label>
    <input type="text" name="Genre" value="<?php if(isset($_POST['Genre'])) echo $_POST['Genre']; ?>">

    <button type="submit" class="btn" name="reg_book">Add Book</button>
        
    <button type="button" onclick="window.location.href = '<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">RESET</button> <!--not working currently
    
    <?php
        include('includes/server.php');
        include('includes/errors.php');
    ?>
</fieldset>
</form>
<a href="BookList.php">List of Books</a>;
<!--<p class="center">Already a member? <a href="login.php">Sign in</a></p>-->

<?php

?>