<?php

        $sqlA = "SELECT r.*, b.*, a.Name, u.UserName FROM ReviewList r INNER JOIN BookList b ON r.BookID=b.BookID INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN Users u ON r.UserID=u.UserID ORDER BY RAND() LIMIT 6";
                
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
