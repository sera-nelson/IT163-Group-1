<?php 

session_start();
include('loginConfig.php');

$FirstName = '';
$LastName = '';
$UserName = '';
$Email = '';
$ZipCode = '';

$Title = '';
$Author = '';
$Genre = '';

$message = '';

$errors = array();
$success = 'Logged in';
    
$db = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if(isset($_POST['reg_user'])){
    $FirstName = @mysqli_real_escape_string($db, $_POST['FirstName']);
    $LastName = @mysqli_real_escape_string($db, $_POST['LastName']);
    $UserName = @mysqli_real_escape_string($db, $_POST['UserName']);
    $Email = @mysqli_real_escape_string($db, $_POST['Email']);
    //$ZipCode = @mysqli_real_escape_string($db, $_POST['ZipCode']);
    
    $Password_1 = @mysqli_real_escape_string($db, $_POST['Password_1']);
    $Password_2 = @mysqli_real_escape_string($db, $_POST['Password_2']);
    
    
    if(empty($FirstName)){
        array_push($errors, 'First Name is required');
    }
    if(empty($UserName)){
        array_push($errors, 'User Name is required');
    }
    if(empty($Email)){
        array_push($errors, 'Email is required');
    }
    if(empty($Password_1)){
        array_push($errors, 'Password is required');
    }
    if($Password_1 != $Password_2) {
        array_push($errors, 'Passwords do not match!');
    }


$user_check_query = "SELECT * FROM Users WHERE UserName= '$UserName' OR Email= '$Email' LIMIT 1";
$result = @mysqli_query($db, $user_check_query);
$user = @mysqli_fetch_assoc($result);

if($user) {
    if($user['UserName'] == $UserName ){
        array_push($errors, 'Username already exists');
    } 
    if($user['Email'] == $Email ){
        array_push($errors, 'Email already exists');
    }  
    if($user['Email'] == $Email ){
        array_push($errors, 'Email already exists');
    } 
} //if user

if(count($errors) == 0){
    $Password = md5($Password_1);
    
    $query = "INSERT INTO Users (FirstName, LastName, UserName, Email, Password) VALUES ('$FirstName', '$LastName', '$UserName', '$Email', '$Password') ";
    
    mysqli_query($db, $query);
        $_SESSION['UserName'] = $UserName;
        $_SESSION['success'] = $success;
    
    header('Location: login.php');
}//count
}//isset


if(isset($_POST['login_user'])){
    $UserName = mysqli_real_escape_string($db, $_POST['UserName']);
    $Password = mysqli_real_escape_string($db, $_POST['Password']);

    if(empty($UserName)){
        array_push($errors, 'User Name is required');
    }
    if(empty($Password)){
        array_push($errors, 'Password is required');
    }
    
    if(count($errors) == 0){
        $Password = md5($Password);
        
        $query = "SELECT * FROM Users WHERE UserName = '$UserName' AND Password = '$Password' ";
        
        $results = mysqli_query($db, $query);
        
        if(mysqli_num_rows($results) == 1) {
            $_SESSION['UserName'] = $UserName;
            $_SESSION['success'] = $success;
            
            header('Location: index.php');
        } else{
            array_push($errors, 'Wrong username/password');
        }
    }//count

}//isset
 
if(isset($_POST['reg_book'])){ //reads the info in the text boxes on the addbook page when the submit button is pressed
    $Title = @mysqli_real_escape_string($db, $_POST['Title']);
    $Author = @mysqli_real_escape_string($db, $_POST['authorID']);
    $Genre = @mysqli_real_escape_string($db, $_POST['genreID']);
    
    $AuthorName = @mysqli_real_escape_string($db, $_POST['Author']);
    $GenreName = @mysqli_real_escape_string($db, $_POST['Genre']);

    if(empty($Title)){
        array_push($errors, 'Title is required');
    }
    if(empty($AuthorName)){
        array_push($errors, 'Author Name is required');
    }
    if(empty($GenreName)){
        array_push($errors, 'Genre is required');
    }


    $result = @mysqli_query($db, $user_check_query);
    $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
            or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
    
    if(count($errors) == 0){ //if there are no errors it adds the new book
        $Bookquery = "SELECT * FROM BookList WHERE Title = '$Title'";
        $BQR = mysqli_query($iConn,$Bookquery) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));

        $Authquery = "SELECT * FROM AuthorList WHERE Name='$AuthorName'";
        $AQR = mysqli_query($iConn,$Authquery) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
        
        $Genquery = "SELECT * FROM GenreList WHERE Genre='$GenreName'";
        $GQR = mysqli_query($iConn,$Genquery) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
        
        $query = "INSERT INTO BookList (AuthorID, GenreID, Title) VALUES ('$Author', '$Genre', '$Title') "; //adds the book to the database
        $Aquery = "INSERT INTO AuthorList (Name) VALUES ('$AuthorName') ";
        $Gquery = "INSERT INTO GenreList (Genre) VALUES ('$GenreName') ";
        
        
        if(mysqli_num_rows($BQR) > 0){//title check
            $message .= "<p>".$Title." already exists";
        //TITLE WAS NOT NEW, CHECK AUTHOR
                if(mysqli_num_rows($AQR) > 0){//author name check
                    $message .= ", as well as author: ".$AuthorName."";
                //AUTHOR WAS NOT NEW, CHECK GENRE
                        if(mysqli_num_rows($GQR) > 0){
                            $_SESSION['UserName'] = $UserName;
                            $_SESSION['success'] = $success;
                            $message .= " and genre: ".$GenreName.".</p>";
                            $message .= "<p>Keep adding new books!</p>";
                            echo $message;
                            echo "<br>";
                        }else{
                            mysqli_query($db, $Gquery);
                            $_SESSION['UserName'] = $UserName;
                            $_SESSION['success'] = $success;
                            $message .= ", but genre: ".$GenreName." is new, and will be added to our system!";
                            echo $message;
                            echo "<br>";
                        }//genre else end
                 
                    }else{//insert author name $ author name check end
                        $message .= ", but not author: ".$AuthorName."";
                    //AUTHOR WAS NEW, CHECK GENRE  
                            if(mysqli_num_rows($GQR) > 0){
                            mysqli_query($db, $Aquery);
                            $_SESSION['UserName'] = $UserName;
                            $_SESSION['success'] = $success;
                            $message .= "! Genre: ".$GenreName." does exist already though.</p>";
                             $message .= "<p>".$AuthorName." will be added to our system!</p>";
                            $message .= "<p>Keep adding new books!</p>";
                            echo $message;
                            echo "<br>";
                        }else{
                            mysqli_query($db, $Aquery);
                            mysqli_query($db, $Gquery);
                            $_SESSION['UserName'] = $UserName;
                            $_SESSION['success'] = $success;
                            $message .= " or genre: ".$GenreName.", and they will be added to our system!";
                            echo $message;
                            echo "<br>";
                        }//genre else end
                    }//author else end
            
        }else{//insert book $ title check end
            $message .= "<p>".$Title." has been added";
        //TITLE WAS NEW, CHECK AUTHOR
                if(mysqli_num_rows($AQR) > 0){//author name check
                   $message .= ", with author: ".$AuthorName."";
                //AUTHOR WAS NOT NEW, CHECK GENRE
                        if(mysqli_num_rows($GQR) > 0){//genre type check
                            mysqli_query($db, $query);
                            $_SESSION['UserName'] = $UserName;
                            $_SESSION['success'] = $success;
                            $message .= ", and genre: ".$GenreName.".</p>";
                            echo $message;
                            echo "<br>";
                        }else{//insert genre type $ genre type check end
                            mysqli_query($db, $query);
                            mysqli_query($db, $Gquery);
                            $_SESSION['UserName'] = $UserName;
                            $_SESSION['success'] = $success;
                            $message .= ", and genre: ".$GenreName.".</p>";
                            $message .= "".$GenreName." is new, and will be added to our system!";
                            echo $message;
                            echo "<br>";
                        }//genre else end
                    
                }else{//insert author name $ author name check end
                    $message .= ", with author: ".$AuthorName."";
                //AUTHOR WAS NEW, CHECK GENRE
                        if(mysqli_num_rows($GQR) > 0){//genre type check
                            mysqli_query($db, $query);
                            mysqli_query($db, $Aquery);
                            $_SESSION['UserName'] = $UserName;
                            $_SESSION['success'] = $success;
                            $message .= ", and genre: ".$GenreName.".</p>";
                            $message .= "".$AuthorName." was new, and will be added to our system!";
                            echo $message;
                            echo "<br>";
                        }else{//insert genre type $ genre type check end
                            mysqli_query($db, $query);
                            mysqli_query($db, $Aquery);
                            mysqli_query($db, $Gquery);
                            $_SESSION['UserName'] = $UserName;
                            $_SESSION['success'] = $success;
                            $message .= ", and genre: ".$GenreName.".</p>";
                            $message .= "".$AuthorName." and ".$GenreName." are new, and will be added to our system!";
                            echo $message;
                            echo "<br>";
                        }//genre else end
                }//author else end
        }//title else end
    }//count
}//isset

if(isset($_POST['reg_review'])){
//    $GetName = $_SESSION['UserName'];
//    $UserNameQ = "SELECT * FROM Users WHERE UserName = '$GetName'";
//    $result = $db_handle->runQuery($UserNameQ);
//    foreach($result as $uname) {
//        $UQR = $uname['UserID'];
//    }
    if($_POST['Recc'] == 'Yes'){
        $Yes = "Yes";
        $Recc = @mysqli_real_escape_string($db, $Yes);
    }else{
        $No = "No";
        $Recc = @mysqli_real_escape_string($db, $No);
    }
//    $ReviewerName = @mysqli_real_escape_string($db, $UQR);
    $Book = @mysqli_real_escape_string($db, $_POST['bookID']);
    $Rating = @mysqli_real_escape_string($db, $_POST['Rating']);
    $Review = @mysqli_real_escape_string($db, $_POST['Review']);

    if(empty($Book)){
        array_push($errors, 'Book Title is required');
    }
    if(empty($Rating)){
        array_push($errors, 'User Name is required');
    }
    
    
    
    $query = "INSERT INTO ReviewList (BookID, Rating, Reccomend, Review) VALUES ('$Book', '$Rating', '$Recc', '$Review') ";
    
    mysqli_query($db, $query);
    $_SESSION['UserName'] = $UserName;
    $_SESSION['success'] = $success;
}
