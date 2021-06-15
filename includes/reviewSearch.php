<?php 
    $indexParam = $_GET['param'];
    $searchBar = $_GET['searchBar'];
?>

<form action="reviews.php" method="post" class="mb-3">
    <div class="field-label has-text-centered">
        <label for="search" class="subtitle pt-2 is-size-4 has-text-centered">search reviews by book</label>
    </div>
    <div class="field my-4">
        <div class="control has-icons-right">
            <input id="search" class="input has-text-centered" type="text" name="search" placeholder="Search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : '' ?>">
            <span class="icon is-right"><i title="search" class="fas fa-search"></i></span>
        </div>
    </div>
    <div class="field is-grouped">
            <div class="control">
                <div class="select">
                    <select name="SearchParams">
                        <option value="AllParam" <?php echo (isset($_POST['SearchParams']) && $_POST['SearchParams'] == 'AllParam' || $indexParam == 'AllParam') ? 'selected' : ''; ?>>Search Options</option>
                        <option value="TitleParam" <?php echo (isset($_POST['SearchParams']) && $_POST['SearchParams'] == 'TitleParam' || $indexParam == 'TitleParam') ? 'selected' : ''; ?>>Title</option>
                        <option value="AuthorParam" <?php echo (isset($_POST['SearchParams']) && $_POST['SearchParams'] == 'AuthorParam' || $indexParam == 'AuthorParam') ? 'selected' : ''; ?>>Author</option>
                        <option value="GenreParam" <?php echo (isset($_POST['SearchParams']) && $_POST['SearchParams'] == 'GenreParam' || $indexParam == 'GenreParam') ? 'selected' : ''; ?>>Genre</option>
                        <option value="AllParam" <?php echo (isset($_POST['SearchParams']) && $_POST['SearchParams'] == 'AllParam' || $indexParam == 'AllParam') ? 'selected' : ''; ?>>All</option>
                    </select>
                </div>
            </div>
            <div class="control">
                <button class="button is-warning" type="submit" value="Submit" name="searchReview">Submit</button>
            </div>
        </div>
</form>



<?php

if(isset($searchBar)){
        $sqlSB = "SELECT r.*, b.*, a.Name, u.UserName, g.Genre FROM ReviewList r INNER JOIN BookList b ON r.BookID=b.BookID INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN GenreList g ON b.GenreID=g.GenreID INNER JOIN Users u ON r.UserID=u.UserID WHERE b.Title LIKE '%".$searchBar."%' OR g.Genre LIKE '%".$searchBar."%' OR a.Name LIKE '%".$searchBar."%'";
        $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
            or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
        $resultSB = mysqli_query($iConn,$sqlSB) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
        echo '<div class="box">';
        echo '<div class="columns is-multiline">';
        while($rowSB = mysqli_fetch_array($resultSB)) {
            echo '<div class="column is-one-third">';
                $coverImg = $rowSB['CoverPic'];
                if($coverImg == 'NULL'){
                    echo '<img src="images/noImg.png" alt="'.$rowSB['Title'].'" class="bookCovers">';
                }else{
                    echo '<img src="'.$rowSB['CoverPic'].'" alt="'.$rowSB['Title'].'" class="bookCovers">';
                }
                echo '<ul>';
                echo '<li class="bookText"><b>Title:</b> '.$rowSB['Title'].' by '.$rowSB['Name'].' </li>';
                echo '<li class="bookText"><b>Reviewer:</b> '.$rowSB['UserName'].' </li>';
                echo '<li class="bookText"><b>Rating:</b> '.$rowSB['Rating'].' </li>';
                echo '<li class="bookText"><b>Review:</b> '.$rowSB['Review'].' </li>';
                echo '</ul>';
                echo '</div>';
                $Feedback = '';
        }
        echo '</div>'; //end columns
        echo'</div>'; //end box
}

else if(isset($_POST['searchReview'])) {
    if(!empty($_REQUEST['search'])) {
        if(isset($_POST['SearchParams'])){
            if($_POST['SearchParams'] == 'AuthorParam'){
                $sqlA = "SELECT r.*, b.*, a.Name, u.UserName, g.Genre FROM ReviewList r INNER JOIN BookList b ON r.BookID=b.BookID INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN GenreList g ON b.GenreID=g.GenreID INNER JOIN Users u ON r.UserID=u.UserID WHERE a.Name LIKE '%".$_POST['search']."%'";
                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
                $resultA = mysqli_query($iConn,$sqlA) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
                echo '<div class="box">';
                echo '<div class="columns is-multiline">';
                while($rowA = mysqli_fetch_array($resultA)) {
                    echo '<div class="column is-one-third">';
                        $coverImg = $rowA['CoverPic'];
                        if($coverImg == 'NULL'){
                            echo '<img src="images/noImg.png" alt="'.$rowA['Title'].'" class="bookCovers">';
                        }else{
                            echo '<img src="'.$rowA['CoverPic'].'" alt="'.$rowA['Title'].'" class="bookCovers">';
                        }
                        echo '<ul>';
                        echo '<li class="bookText"><b>Title:</b> '.$rowA['Title'].' by '.$rowA['Name'].' </li>';
                        echo '<li class="bookText"><b>Reviewer:</b> '.$rowA['UserName'].' </li>';
                        echo '<li class="bookText"><b>Rating:</b> '.$rowA['Rating'].' </li>';
                        echo '<li class="bookText"><b>Review:</b> '.$rowA['Review'].' </li>';
                        echo '</ul>';
                        echo '</div>';
                        $Feedback = '';
                }//while
            }elseif($_POST['SearchParams'] == 'GenreParam'){
                $sqlG = "SELECT r.*, b.*, a.Name, u.UserName, g.Genre FROM ReviewList r INNER JOIN BookList b ON r.BookID=b.BookID INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN GenreList g ON b.GenreID=g.GenreID INNER JOIN Users u ON r.UserID=u.UserID WHERE g.Genre LIKE '".$_POST['search']."%'";
                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
                $resultG = mysqli_query($iConn,$sqlG) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
                echo '<div class="box">';
                echo '<div class="columns is-multiline">';
                while($rowG = mysqli_fetch_array($resultG)) {
                    echo '<div class="column is-one-third">';
                        $coverImg = $rowG['CoverPic'];
                        if($coverImg == 'NULL'){
                            echo '<img src="images/noImg.png" alt="'.$rowG['Title'].'" class="bookCovers">';
                        }else{
                            echo '<img src="'.$rowG['CoverPic'].'" alt="'.$rowG['Title'].'" class="bookCovers">';
                        }
                        echo '<ul>';
                        echo '<li class="bookText"><b>Title:</b> '.$rowG['Title'].' by '.$rowG['Name'].' </li>';
                        echo '<li class="bookText"><b>Reviewer:</b> '.$rowG['UserName'].' </li>';
                        echo '<li class="bookText"><b>Rating:</b> '.$rowG['Rating'].' </li>';
                        echo '<li class="bookText"><b>Review:</b> '.$rowG['Review'].' </li>';
                        echo '</ul>';
                        echo '</div>';
                        $Feedback = '';
                }//while
            }else{
                $sqlT = "SELECT r.*, b.*, a.Name, u.UserName, g.Genre FROM ReviewList r INNER JOIN BookList b ON r.BookID=b.BookID INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN GenreList g ON b.GenreID=g.GenreID INNER JOIN Users u ON r.UserID=u.UserID WHERE b.Title LIKE '%".$_POST['search']."%'";
                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
                $resultT = mysqli_query($iConn,$sqlT) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
                echo '<div class="box">';
                echo '<div class="columns is-multiline">';
                while($rowT = mysqli_fetch_array($resultT)) {
                    echo '<div class="column is-one-third">';
                        $coverImg = $rowT['CoverPic'];
                        if($coverImg == 'NULL'){
                            echo '<img src="images/noImg.png" alt="'.$rowT['Title'].'" class="bookCovers">';
                        }else{
                            echo '<img src="'.$rowT['CoverPic'].'" alt="'.$rowT['Title'].'" class="bookCovers">';
                        }
                        echo '<ul>';
                        echo '<li class="bookText"><b>Title:</b> '.$rowT['Title'].' by '.$rowT['Name'].' </li>';
                        echo '<li class="bookText"><b>Reviewer:</b> '.$rowT['UserName'].' </li>';
                        echo '<li class="bookText"><b>Rating:</b> '.$rowT['Rating'].' </li>';
                        echo '<li class="bookText"><b>Review:</b> '.$rowT['Review'].' </li>';
                        echo '</ul>';
                        echo '</div>';
                        $Feedback = '';
                }//while
                echo '</div>';
                echo '</div>';
            }
        }     
    }else{//if search bar is empty
        $sqlE = "SELECT r.*, b.*, a.Name, u.UserName, g.Genre FROM ReviewList r INNER JOIN BookList b ON r.BookID=b.BookID INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN GenreList g ON b.GenreID=g.GenreID INNER JOIN Users u ON r.UserID=u.UserID";
                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
                $resultE = mysqli_query($iConn,$sqlE) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
                echo '<div class="box">';
                echo '<div class="columns is-multiline">';
                while($rowE = mysqli_fetch_array($resultE)) {
                    echo '<div class="column is-one-third">';
                        $coverImg = $rowE['CoverPic'];
                        if($coverImg == 'NULL'){
                            echo '<img src="images/noImg.png" alt="'.$rowE['Title'].'" class="bookCovers">';
                        }else{
                            echo '<img src="'.$rowE['CoverPic'].'" alt="'.$rowE['Title'].'" class="bookCovers">';
                        }
                        echo '<ul>';
                        echo '<li class="bookText"><b>Title:</b> '.$rowE['Title'].' by '.$rowE['Name'].' </li>';
                        echo '<li class="bookText"><b>Reviewer:</b> '.$rowE['UserName'].' </li>';
                        echo '<li class="bookText"><b>Rating:</b> '.$rowE['Rating'].' </li>';
                        echo '<li class="bookText"><b>Review:</b> '.$rowE['Review'].' </li>';
                        echo '</ul>';
                        echo '</div>';
                        $Feedback = '';
            }
            echo '</div>';
            echo '</div>';
    }
}
else{
    include('includes/randReview.php');
}