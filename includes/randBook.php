<?php

        $sql = "SELECT b.*, a.Name, g.Genre FROM BookList b INNER JOIN AuthorList a ON b.AuthorID=a.AuthorID INNER JOIN GenreList g ON b.GenreID=g.GenreID ORDER BY RAND() LIMIT 6";
                
                $iConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) //gets the database credential info
                    or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
                $result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
                echo '<div class="box">';
                echo '<div class="columns is-multiline">';
                while($row = mysqli_fetch_array($result)) {
                    echo '<div class="column is-one-third">';
                    $coverImg = $row['CoverPic'];
                    if($coverImg == 'NULL'){
                        echo '<img src="images/noImg.png" alt="'.$row['Title'].'" class="bookCovers">';
                    }else{
                        echo '<img src="'.$row['CoverPic'].'" alt="'.$row['Title'].'" class="bookCovers">';
                    }
                    echo '<ul>';
                    echo '<li class="bookText"><b>Title:</b> '.$row['Title'].' </li>';
                    echo '<li class="bookText"><b>Author:</b> '.$row['Name'].' </li>';
                    echo '<li class="bookText"><b>Genre:</b> '.$row['Genre'].' </li>';
                    echo '</ul>';
                    echo'</div>';
                    $Feedback = '';
                }//while
                echo '</div>';
                echo '</div>';