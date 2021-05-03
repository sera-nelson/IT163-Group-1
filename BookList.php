<?php

include('includes/config.php');

echo '<a href="NewBook.php">Add More Books</a>';
$sql = 'SELECT * FROM OldBookList';

$iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));

$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));

if(mysqli_num_rows($result) > 0) { //checks to see if theres content in the database
    while($row = mysqli_fetch_assoc($result)){ //as long as there are entries in the database it will populate the page with them
            $Title = stripslashes($row['Title']);
            $Author = stripslashes($row['Author']);
            $Genre = stripslashes($row['Genre']);
            
            echo '<ul>';
            echo '<li><b>Title:</b> '.$Title.' </li>';
            echo '<li><b>Author:</b> '.$Author.' </li>';
            echo '<li><b>Genre:</b> '.$Genre.' </li>';
            echo '  ________________';
            echo '</ul>';
            $Feedback = '';
    }//while
} else {
    $Feedback = 'Error';
}

?>
<aside>
    
<?php
    
if($Feedback == ''){
    echo '';
} else {
    echo $Feedback;
}
    
?>
</aside>
    