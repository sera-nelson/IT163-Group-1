<?php 
    $indexParam = $_GET['param'];
    
?>

<form action="BookList.php" method="post" class="mb-3"> 
        <label for="search" class="subtitle pt-2">find books on the shelf</label>
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
                <button class="button is-dark" type="submit" value="Submit" name="searchBook">Submit</button>
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
                echo '<p></p>';
                while($rowHS = mysqli_fetch_array($resultHS)){
                        echo'<div class="box">';
                        echo '<div class="columns">';
                        echo '<div class="column is-half">';
                        $coverImg = $rowHS['CoverPic'];
                        if($coverImg == 'NULL'){
                            echo '<img src="images/noImg.png" alt="'.$rowHS['Title'].'">';
                        }else{
                            echo '<img src="'.$rowHS['CoverPic'].'" alt="'.$rowHS['Title'].'">';
                        }
                        echo '</div>';
                        echo '<div class="column cent">';
                        echo '<ul>';
                        echo '<li><b>Title:</b> '.$rowHS['Title'].' </li>';
                        echo '<li><b>Author:</b> '.$rowHS['Name'].' </li>';
                        echo '<li><b>Genre:</b> '.$rowHS['Genre'].' </li>';
                        echo '</ul>';
                        echo '</div>';
                        echo '</div>'; //end columns
                        echo'</div>'; //end box
                        $Feedback = '';
                }//while
    
}


if(isset($_POST['searchBook'])){
    if (!empty($_REQUEST['search'])) {
        if(isset($_POST['SearchParams'])){
            if($_POST['SearchParams'] == 'AuthorParam'){
                $sqlA = "SELECT b.*, a.Name, g.Genre FROM BookList b INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN GenreList g ON b.GenreID=g.GenreID WHERE a.Name LIKE '%".$_POST['search']."%'"; 
                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
                $resultA = mysqli_query($iConn,$sqlA) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
                echo '<p></p>';
                while($rowA = mysqli_fetch_array($resultA)){
                        echo'<div class="box">';
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
                        echo '<li><b>Title:</b> '.$rowA['Title'].' </li>';
                        echo '<li><b>Author:</b> '.$rowA['Name'].' </li>';
                        echo '<li><b>Genre:</b> '.$rowA['Genre'].' </li>';
                        echo '</ul>';
                        echo '</div>';
                        echo '</div>'; //end columns
                        echo'</div>'; //end box
                        $Feedback = '';
                }//while
            }elseif($_POST['SearchParams'] == 'GenreParam'){
                $sqlG = "SELECT b.*, a.Name, g.Genre FROM BookList b INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN GenreList g ON b.GenreID=g.GenreID WHERE g.Genre LIKE '%".$_POST['search']."%'"; 
                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
                $resultG = mysqli_query($iConn,$sqlG) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
                echo '<p></p>';
                while($rowG = mysqli_fetch_array($resultG)){
                        echo'<div class="box">';
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
                        echo '<li><b>Title:</b> '.$rowG['Title'].' </li>';
                        echo '<li><b>Author:</b> '.$rowG['Name'].' </li>';
                        echo '<li><b>Genre:</b> '.$rowG['Genre'].' </li>';
                        echo '</ul>';
                        echo '</div>';
                        echo '</div>'; //end columns
                        echo'</div>'; //end box
                        $Feedback = '';
                }//while
            }else{
                $sqlT = "SELECT b.*, a.Name, g.Genre FROM BookList b INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN GenreList g ON b.GenreID=g.GenreID WHERE b.Title LIKE '%".$_POST['search']."%'"; 
                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
                $resultT = mysqli_query($iConn,$sqlT) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
                echo '<p></p>';
                while($rowT = mysqli_fetch_array($resultT)){
                        echo'<div class="box">';
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
                        echo '<li><b>Title:</b> '.$rowT['Title'].' </li>';
                        echo '<li><b>Author:</b> '.$rowT['Name'].' </li>';
                        echo '<li><b>Genre:</b> '.$rowT['Genre'].' </li>';
                        echo '</ul>';
                        echo'</div>';
                        echo'</div>'; //close columns
                        echo'</div>'; //close box
                        $Feedback = '';
                }//while
            }//else 
        }
    }
}
