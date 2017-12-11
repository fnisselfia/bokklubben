<?php
            #check if the GET/POST has been used, meaning if the Submit button has been pressed.
            if (isset($_GET) && !empty($_GET)) {
            # Get data from form
                
                #first trim the search, so no white spaces appear prior to the text entered
                $searchtitle = trim($_GET['searchtitle']);
                
                #after that it is wise to use addslashes, it adds slashes if there's an apostrophe or quotation mark
                $searchtitle = addslashes($searchtitle);
                
                
                 #here we create a variable $id and basically say that we want the data from the array matching the search criteria
                $id = array_search($searchtitle, array_column($books, 'title'));
                
                #echo $id;

                echo '<table bgcolor="#bdc0ff" cellpadding="6">';
                echo '<tr><b><td>Title</td> <td>Author</td> <td>Reserve</td> </b> </tr>';
                #now we check if we have the ID or not in our array. If the search was a hit, it will assign something to our DB, if not, then it will not work.
                if ($id !== FALSE) {
                    $book = $books[$id];
                    $title = $book['title'];
                    $author = $book['author'];
                    echo "<tr>";
                    echo "<td> $title </td><td> $author </td>";
                    echo '<td><a href="reserve.php?reservation=' .  urlencode($title) . '"> Reserve </a></td>';
                    echo "</tr>";
                }
                echo "</table>";
            } 
            
            
            # in this else under, you basically show the book-list.
            # above you checked in the GET method has been set, if it has display the results of the "search"
            # if they have not been set, just display the list instead. In this case "book-list" is insufficient
            # all you have to do is merge book-list.php with book-search.php and create one master page
            # define the array at the start in PHP and manipulate it later on.
            
            else 
                
                {                
                echo '<table bgcolor="#bdc0ff" cellpadding="6">';
                echo '<tr><b><td>Title</td> <td>Author</td> <td>Reserve</td> </b> </tr>';
                foreach ($books as $book) {
                    $title = $book['title'];
                    $author = $book['author'];
                    echo "<tr>";
                    echo "<td> $title </td><td> $author </td>";
                    echo '<td><a href="reserve.php?reservation=' . urlencode($title) . '"> Reserve </a></td>';
                    echo "</tr>";
                }
                echo "</table>";
            }
            ?>

            
            
            
            <!--