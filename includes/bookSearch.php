<?php 
    $indexParam = $_GET['param'];
    
?>

<form action="BookList.php" method="post" class="mb-3"> 
    <div class="field-label has-text-centered">
        <label for="search" class="subtitle pt-2 has-text-centered is-size-4">find books on the shelf</label>
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
            <button class="button is-warning" type="submit" value="Submit" name="searchBook">Submit</button>
        </div>
    </div>
</form>
<?php
$headSearch = $_GET['headersearch'];

if(isset($headSearch)){
    $sqlHS = "SELECT b.*, a.Name, g.Genre FROM BookList b INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN GenreList g ON b.GenreID=g.GenreID WHERE b.Title LIKE '%".$headSearch."%' OR g.Genre LIKE '%".$headSearch."%' OR a.Name LIKE '%".$headSearch."%'";
    
    $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
                $resultHS = mysqli_query($iConn,$sqlHS) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
                echo '<div class="box">';
                echo '<div class="columns is-multiline">';
                while($rowHS = mysqli_fetch_array($resultHS)){
                        echo '<div class="column is-one-third">';
                        $coverImg = $rowHS['CoverPic'];
                        if($coverImg == 'NULL'){
                            echo '<img src="images/noImg.png" alt="'.$rowHS['Title'].'" class="bookCovers">';
                        }else{
                            echo '<img src="'.$rowHS['CoverPic'].'" alt="'.$rowHS['Title'].'" class="bookCovers">';
                        }
                        echo '<ul>';
                        echo '<li class="bookText"><b>Title:</b> '.$rowHS['Title'].' </li>';
                        echo '<li class="bookText"><b>Author:</b> '.$rowHS['Name'].' </li>';
                        echo '<li class="bookText"><b>Genre:</b> '.$rowHS['Genre'].' </li>';
                        echo '</ul>';
                        echo '</div>';
                        $Feedback = '';
                }//while
                echo '</div>'; //end columns
                echo'</div>'; //end box
    
}


if(isset($_POST['searchBook'])){
    if (!empty($_REQUEST['search'])) {
        if(isset($_POST['SearchParams'])){
            if($_POST['SearchParams'] == 'AuthorParam'){
                $sqlA = "SELECT b.*, a.Name, g.Genre FROM BookList b INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN GenreList g ON b.GenreID=g.GenreID WHERE a.Name LIKE '%".$_POST['search']."%'"; 
                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
                $resultA = mysqli_query($iConn,$sqlA) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
                echo '<div class="box">';
                echo '<div class="columns is-multiline">';
                while($rowA = mysqli_fetch_array($resultA)){
                        echo '<div class="column is-one-third">';
                        $coverImg = $rowA['CoverPic'];
                        if($coverImg == 'NULL'){
                            echo '<img src="images/noImg.png" alt="'.$rowA['Title'].'" class="bookCovers">';
                        }else{
                            echo '<img src="'.$rowA['CoverPic'].'" alt="'.$rowA['Title'].'" class="bookCovers">';
                        }
                        echo '<ul>';
                        echo '<li class="bookText"><b>Title:</b> '.$rowA['Title'].' </li>';
                        echo '<li class="bookText"><b>Author:</b> '.$rowA['Name'].' </li>';
                        echo '<li class="bookText"><b>Genre:</b> '.$rowA['Genre'].' </li>';
                        echo '</ul>';
                        echo '</div>';
                        $Feedback = '';
                }//while
            }elseif($_POST['SearchParams'] == 'GenreParam'){
                $sqlG = "SELECT b.*, a.Name, g.Genre FROM BookList b INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN GenreList g ON b.GenreID=g.GenreID WHERE g.Genre LIKE '%".$_POST['search']."%'"; 
                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
                $resultG = mysqli_query($iConn,$sqlG) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
                echo '<div class="box">';
                echo '<div class="columns is-multiline">';
                while($rowG = mysqli_fetch_array($resultG)){
                        echo '<div class="column is-one-third">';
                        $coverImg = $rowG['CoverPic'];
                        if($coverImg == 'NULL'){
                            echo '<img src="images/noImg.png" alt="'.$rowG['Title'].'" class="bookCovers">';
                        }else{
                            echo '<img src="'.$rowG['CoverPic'].'" alt="'.$rowG['Title'].'" class="bookCovers">';
                        }
                        echo '<ul>';
                        echo '<li class="bookText"><b>Title:</b> '.$rowG['Title'].' </li>';
                        echo '<li class="bookText"><b>Author:</b> '.$rowG['Name'].' </li>';
                        echo '<li class="bookText"><b>Genre:</b> '.$rowG['Genre'].' </li>';
                        echo '</ul>';
                        echo '</div>';
                        $Feedback = '';
                }//while
            }else{
                $sqlT = "SELECT b.*, a.Name, g.Genre FROM BookList b INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN GenreList g ON b.GenreID=g.GenreID WHERE b.Title LIKE '".$_POST['search']."%'"; 
                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
                $resultT = mysqli_query($iConn,$sqlT) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
                echo '<div class="box">';
                echo '<div class="columns is-multiline">';
                while($rowT = mysqli_fetch_array($resultT)){
                        echo '<div class="column is-one-third">';
                        $coverImg = $rowT['CoverPic'];
                        if($coverImg == 'NULL'){
                            echo '<img src="images/noImg.png" alt="'.$rowT['Title'].'" class="bookCovers">';
                        }else{
                            echo '<img src="'.$rowT['CoverPic'].'" alt="'.$rowT['Title'].'" class="bookCovers">';
                        }
                        echo '<ul>';
                        echo '<li class="bookText"><b>Title:</b> '.$rowT['Title'].' </li>';
                        echo '<li class="bookText"><b>Author:</b> '.$rowT['Name'].' </li>';
                        echo '<li class="bookText"><b>Genre:</b> '.$rowT['Genre'].' </li>';
                        echo '</ul>';
                        echo'</div>';
                        $Feedback = '';
                }//while
            }//else
            echo '</div>'; //end columns
            echo'</div>'; //end box
        }
    }else{//if search bar is empty
         $sqlE = "SELECT b.*, a.Name, g.Genre FROM BookList b INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN GenreList g ON b.GenreID=g.GenreID"; 
                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
                $resultE = mysqli_query($iConn,$sqlE) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
                echo '<div class="box">';
                echo '<div class="columns is-multiline">';
                while($rowE = mysqli_fetch_array($resultE)){
                        echo '<div class="column is-one-third">';
                        $coverImg = $rowE['CoverPic'];
                        if($coverImg == 'NULL'){
                            echo '<img src="images/noImg.png" alt="'.$rowE['Title'].'" class="bookCovers">';
                        }else{
                            echo '<img src="'.$rowE['CoverPic'].'" alt="'.$rowE['Title'].'" class="bookCovers">';
                        }
                        echo '<ul>';
                        echo '<li class="bookText"><b>Title:</b> '.$rowE['Title'].' </li>';
                        echo '<li class="bookText"><b>Author:</b> '.$rowE['Name'].' </li>';
                        echo '<li class="bookText"><b>Genre:</b> '.$rowE['Genre'].' </li>';
                        echo '</ul>';
                        echo'</div>';
                        $Feedback = '';
            }
    }
    echo '</div>'; //end columns
    echo'</div>'; //end box
}
else{
    include('includes/randBook.php');
}