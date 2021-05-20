<form action="" method="post"> 
            <p style="display:inline-block;">Search Reviews By Book</p>
            <input class="input is-small" type="text" name="search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>"><br> 
            <input class="button is-dark" type="submit" value="Submit" name="searchReview"> 
 
</form>
<?php

if(isset($_POST['searchReview'])){
    if (!empty($_REQUEST['search'])) {
//        $sqlA = "SELECT b.*, a.Name, g.Genre FROM BookList b INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN GenreList g ON b.GenreID=g.GenreID WHERE a.Name LIKE '%".$_POST['search']."%'"; 
        
        $sqlA = "SELECT r.*, b.*, a.Name, u.UserName FROM ReviewList r INNER JOIN BookList b ON r.BookID=b.BookID INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN Users u ON r.UserID=u.UserID WHERE b.Title LIKE '%".$_POST['search']."%'";
//        $sqlA = "SELECT r.*, b.Title FROM ReviewList r INNER JOIN BookList b ON r.BookID=b.BookID WHERE b.Title LIKE '%".$_POST['search']."%'";
        
                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
                $resultA = mysqli_query($iConn,$sqlA) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
                echo '<p></p>';
                while($rowA = mysqli_fetch_array($resultA)){
                        echo'<div class="box">';
                        $coverImg = $rowA['CoverPic'];
                        if($coverImg == 'NULL'){
                            echo '<img src="images/noImg.png" alt="'.$rowA['Title'].'">';
                        }else{
                            echo '<img src="'.$rowA['CoverPic'].'" alt="'.$rowA['Title'].'">';
                        }
                        echo '<ul>';
                        echo '<li><b>Title:</b> '.$rowA['Title'].' by '.$rowA['Name'].' </li>';
                        echo '<li><b>Reviewer:</b> '.$rowA['UserName'].' </li>';
                        echo '<li><b>Rating:</b> '.$rowA['Rating'].' </li>';
                        echo '<li><b>Review:</b> '.$rowA['Review'].' </li>';
                        echo '</ul>';
                        echo'</div>';
                        $Feedback = '';
                }//while
        
    }
    
}    
    
    
    
    
    
//if(isset($_POST['searchBook'])){
//    if (!empty($_REQUEST['search'])) {
//        if(isset($_POST['SearchParams'])){
//            if($_POST['SearchParams'] == 'AuthorParam'){
//                $sqlA = "SELECT b.*, a.Name, g.Genre FROM BookList b INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN GenreList g ON b.GenreID=g.GenreID WHERE a.Name LIKE '%".$_POST['search']."%'"; 
//                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
//                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
//                $resultA = mysqli_query($iConn,$sqlA) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
//                echo '<p></p>';
//                while($rowA = mysqli_fetch_array($resultA)){
//                        echo'<div class="box">';
//                        echo '<ul>';
//                        echo '<li><b>Title:</b> '.$rowA['Title'].' </li>';
//                        echo '<li><b>Author:</b> '.$rowA['Name'].' </li>';
//                        echo '<li><b>Genre:</b> '.$rowA['Genre'].' </li>';
//                        echo '</ul>';
//                        echo'</div>';
//                        $Feedback = '';
//                }//while
//            }elseif($_POST['SearchParams'] == 'GenreParam'){
//                $sqlG = "SELECT b.*, a.Name, g.Genre FROM BookList b INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN GenreList g ON b.GenreID=g.GenreID WHERE g.Genre LIKE '%".$_POST['search']."%'"; 
//                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
//                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
//                $resultG = mysqli_query($iConn,$sqlG) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
//                echo '<p></p>';
//                while($rowG = mysqli_fetch_array($resultG)){
//                        echo'<div class="box">';
//                        echo '<ul>';
//                        echo '<li><b>Title:</b> '.$rowG['Title'].' </li>';
//                        echo '<li><b>Author:</b> '.$rowG['Name'].' </li>';
//                        echo '<li><b>Genre:</b> '.$rowG['Genre'].' </li>';
//                        echo '</ul>';
//                        echo'</div>';
//                        $Feedback = '';
//                }//while
//            }else{
//                $sqlT = "SELECT b.*, a.Name, g.Genre FROM BookList b INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN GenreList g ON b.GenreID=g.GenreID WHERE b.Title LIKE '%".$_POST['search']."%'"; 
//                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
//                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
//                $resultT = mysqli_query($iConn,$sqlT) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
//                echo '<p></p>';
//                while($rowT = mysqli_fetch_array($resultT)){
//                        echo'<div class="box">';
//                        echo '<ul>';
//                        echo '<li><b>Title:</b> '.$rowT['Title'].' </li>';
//                        echo '<li><b>Author:</b> '.$rowT['Name'].' </li>';
//                        echo '<li><b>Genre:</b> '.$rowT['Genre'].' </li>';
//                        echo '</ul>';
//                        echo'</div>';
//                        $Feedback = '';
//                }//while
//            }//else 
//        }
//    }
//}
