<?php include('includes/header.php'); ?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

<script> //For Author
    $(document).ready(function(){
        $("#search-box").keyup(function(){
            $.ajax({
            type: "POST",
            url: "includes/readName.php",
            data:'keyword='+$(this).val(),
            success: function(data){
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
                $("#search-box").css("background","#FFF");
            }
            });
        });
    });

    function selectName(val) {
    $("#search-box").val(val);
    $("#suggesstion-box").hide();
    }
    function nameID(val) {
    $("#authorID").val(val);
    }
</script>

<script> //For Genre
    $(document).ready(function(){
        $("#search-box-genre").keyup(function(){
            $.ajax({
            type: "POST",
            url: "includes/readGenre.php",
            data:'genrekeyword='+$(this).val(),
            success: function(data){
                $("#suggesstion-box-genre").show();
                $("#suggesstion-box-genre").html(data);
                $("#search-box-genre").css("background","#FFF");
            }
            });
        });
    });
    
    function selectGenre(val) {
    $("#search-box-genre").val(val);
    $("#suggesstion-box-genre").hide();
    }
    function genreID(val) {
    $("#genreID").val(val);
    }
</script>

<h1>Add Book</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

    <fieldset>
    
    <label>Title</label>
    &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="Title" value="<?php if(isset($_POST['Title'])) echo $_POST['Title']; ?>">
    
    <div class="frmSearch">
    <label>Author</label>
    <input id="search-box" type="text" name="Author" value="<?php if(isset($_POST['Author'])) echo $_POST['Author']; ?>">
    <input type="hidden" id="authorID" name="authorID" value="<?php if(isset($_POST['authorID'])) echo $_POST['authorID']; ?>">
    <div id="suggesstion-box"></div>
    </div>
        
    <div class="frmSearchGenre">
    <label>Genre </label>
    &nbsp;&nbsp;<input id="search-box-genre" type="text" name="Genre" value="<?php if(isset($_POST['Genre'])) echo $_POST['Genre']; ?>">
    <input type="hidden" id="genreID" name="genreID" value="<?php if(isset($_POST['genreID'])) echo $_POST['genreID']; ?>">
    <div id="suggesstion-box-genre"></div>
    </div>

    <button type="submit" class="btn" name="reg_book">Add Book</button>
        
<button type="reset" value="Clear">RESET</button> <!--    not working currently-->
    
    
</fieldset>
</form>
<?php
        include('includes/server.php');
        include('includes/errors.php');
    ?>
<a href="BookList.php">List of Books</a>

<?php

?>