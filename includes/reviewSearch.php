<?php 
    $indexParam = $_GET['param'];
?>

<form action="reviews.php" method="post" class="mb-3">
    <label for="search" class="subtitle pt-2">search reviews by book</label>
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
                        <option value="TitleParam" <?php echo (isset($_POST['SearchParams']) && $_POST['SearchParams'] == 'TitleParam' || $indexParam == 'TitleParam') ? 'selected' : ''; ?>>Search Options</option>
                        <option value="TitleParam" <?php echo (isset($_POST['SearchParams']) && $_POST['SearchParams'] == 'TitleParam' || $indexParam == 'TitleParam') ? 'selected' : ''; ?>>Title</option>
                        <option value="AuthorParam" <?php echo (isset($_POST['SearchParams']) && $_POST['SearchParams'] == 'AuthorParam' || $indexParam == 'AuthorParam') ? 'selected' : ''; ?>>Author</option>
                        <option value="GenreParam" <?php echo (isset($_POST['SearchParams']) && $_POST['SearchParams'] == 'GenreParam' || $indexParam == 'GenreParam') ? 'selected' : ''; ?>>Genre</option>
        <!--            <option value="">Review (PLACEHOLDER)</option>-->
                    </select>
                </div>
            </div>
            <div class="control">
                <button class="button is-dark" type="submit" value="Submit" name="searchReview">Submit</button>
            </div>
        </div>
</form>

<?php
if(isset($_POST['searchReview'])) {
    if(!empty($_REQUEST['search'])) {
        if(isset($_POST['SearchParams'])){
            if($_POST['SearchParams'] == 'AuthorParam'){
                $sqlA = "SELECT r.*, b.*, a.Name, u.UserName FROM ReviewList r INNER JOIN BookList b ON r.BookID=b.BookID INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN Users u ON r.UserID=u.UserID WHERE a.Name LIKE '%".$_POST['search']."%'";
                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
                $resultA = mysqli_query($iConn,$sqlA) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
                echo '<p></p>';
                while($rowA = mysqli_fetch_array($resultA)) {
                        echo '<div class="box">';
                        echo '<div class="columns">';
                        echo '<div class="column is-half">';
                        $coverImg = $rowA['CoverPic'];
                        if($coverImg == 'NULL'){
                            echo '<img src="images/noImg.png" alt="'.$rowA['Title'].'">';
                        }else{
                            echo '<img src="'.$rowA['CoverPic'].'" alt="'.$rowA['Title'].'">';
                        }
                        echo '</div>';
                        echo '<div class="column cent">';
                        echo '<ul>';
                        echo '<li><b>Title:</b> '.$rowA['Title'].' by '.$rowA['Name'].' </li>';
                        echo '<li><b>Reviewer:</b> '.$rowA['UserName'].' </li>';
                        echo '<li><b>Rating:</b> '.$rowA['Rating'].' </li>';
                        echo '<li><b>Review:</b> '.$rowA['Review'].' </li>';
                        echo '</ul>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        $Feedback = '';
                }//while
            }elseif($_POST['SearchParams'] == 'GenreParam'){
                $sqlG = "SELECT r.*, b.*, a.Name, u.UserName FROM ReviewList r INNER JOIN BookList b ON r.BookID=b.BookID INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN Users u ON r.UserID=u.UserID WHERE g.Genre LIKE '%".$_POST['search']."%'";
                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
                $resultG = mysqli_query($iConn,$sqlG) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
                echo '<p></p>';
                while($rowG = mysqli_fetch_array($resultG)) {
                        echo '<div class="box">';
                        echo '<div class="columns">';
                        echo '<div class="column is-half">';
                        $coverImg = $rowG['CoverPic'];
                        if($coverImg == 'NULL'){
                            echo '<img src="images/noImg.png" alt="'.$rowG['Title'].'">';
                        }else{
                            echo '<img src="'.$rowG['CoverPic'].'" alt="'.$rowG['Title'].'">';
                        }
                        echo '</div>';
                        echo '<div class="column cent">';
                        echo '<ul>';
                        echo '<li><b>Title:</b> '.$rowG['Title'].' by '.$rowG['Name'].' </li>';
                        echo '<li><b>Reviewer:</b> '.$rowG['UserName'].' </li>';
                        echo '<li><b>Rating:</b> '.$rowG['Rating'].' </li>';
                        echo '<li><b>Review:</b> '.$rowG['Review'].' </li>';
                        echo '</ul>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        $Feedback = '';
                }//while
            }else{
                $sqlT = "SELECT r.*, b.*, a.Name, u.UserName FROM ReviewList r INNER JOIN BookList b ON r.BookID=b.BookID INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN Users u ON r.UserID=u.UserID WHERE b.Title LIKE '%".$_POST['search']."%'";
                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
                $resultT = mysqli_query($iConn,$sqlT) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
                echo '<p></p>';
                while($rowT = mysqli_fetch_array($resultT)) {
                        echo '<div class="box">';
                        echo '<div class="columns">';
                        echo '<div class="column is-half">';
                        $coverImg = $rowT['CoverPic'];
                        if($coverImg == 'NULL'){
                            echo '<img src="images/noImg.png" alt="'.$rowT['Title'].'">';
                        }else{
                            echo '<img src="'.$rowT['CoverPic'].'" alt="'.$rowT['Title'].'">';
                        }
                        echo '</div>';
                        echo '<div class="column cent">';
                        echo '<ul>';
                        echo '<li><b>Title:</b> '.$rowT['Title'].' by '.$rowT['Name'].' </li>';
                        echo '<li><b>Reviewer:</b> '.$rowT['UserName'].' </li>';
                        echo '<li><b>Rating:</b> '.$rowT['Rating'].' </li>';
                        echo '<li><b>Review:</b> '.$rowT['Review'].' </li>';
                        echo '</ul>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        $Feedback = '';
                }//while
            }
        }     
    }else{//if search bar is empty
        $sqlE = "SELECT r.*, b.*, a.Name, u.UserName FROM ReviewList r INNER JOIN BookList b ON r.BookID=b.BookID INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN Users u ON r.UserID=u.UserID";
                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
                $resultE = mysqli_query($iConn,$sqlE) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
                echo '<p></p>';
                while($rowE = mysqli_fetch_array($resultE)) {
                        echo '<div class="box">';
                        echo '<div class="columns">';
                        echo '<div class="column is-half">';
                        $coverImg = $rowE['CoverPic'];
                        if($coverImg == 'NULL'){
                            echo '<img src="images/noImg.png" alt="'.$rowE['Title'].'">';
                        }else{
                            echo '<img src="'.$rowE['CoverPic'].'" alt="'.$rowE['Title'].'">';
                        }
                        echo '</div>';
                        echo '<div class="column cent">';
                        echo '<ul>';
                        echo '<li><b>Title:</b> '.$rowE['Title'].' by '.$rowE['Name'].' </li>';
                        echo '<li><b>Reviewer:</b> '.$rowE['UserName'].' </li>';
                        echo '<li><b>Rating:</b> '.$rowE['Rating'].' </li>';
                        echo '<li><b>Review:</b> '.$rowE['Review'].' </li>';
                        echo '</ul>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        $Feedback = '';
            }
    }
}