<?php 
include("config.php"); 
include("header.php"); 
 ?>
    <body>
        <div class="search">
            <h1>Search.</h1>

            <div class="containerSearch">
                <form action="browse.php" method="POST">
                    <label for="fname"><h5>Book title</h5></label>
                    <input type="text" name="searchtitle" placeholder="Book title">
                    <label for="name"><h5>Author name</h5></label>
                    <input type="text" name="searchauthor" placeholder="Author">
                    <input type="submit" value="Submit">

                  </form>
                 <div class="table">
            <?php     
                $searchtitle = "";
                $searchauthor = "";

                if (isset($_POST) && !empty($_POST)) {
                # Get data from form
                    $searchtitle = trim($_POST['searchtitle']);
                    $searchauthor = trim($_POST['searchauthor']);
                }

                    if (!$searchtitle && !$searchauthor) {
                      echo "You must specify either a title or an author";
                      exit();
                    }

                $searchtitle = addslashes($searchtitle);
                $searchtitle = htmlspecialchars($searchtitle, ENT_QUOTES, 'UTF-8');
                $searchauthor = addslashes($searchauthor);
                $searchauthor = htmlspecialchars($searchauthor, ENT_QUOTES, 'UTF-8');

                # Open the database
                @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

                if ($db->connect_error) {
                    echo "could not connect: " . $db->connect_error;
                    printf("<br><a href=index.php>Return to home page </a>");
                    exit();
                }

                # Build the query. Users are allowed to search on title, author, or both

                $query = " select Isbn, Title, Author, onloan from Book";
                if ($searchtitle && !$searchauthor) { // Title search only
                    $query = $query . " where Title like '%" . $searchtitle . "%'";
                }
                if (!$searchtitle && $searchauthor) { // Author search only
                    $query = $query . " where Author like '%" . $searchauthor . "%'";
                }
                if ($searchtitle && $searchauthor) { // Title and Author search
                    $query = $query . " where Title like '%" . $searchtitle . "%' and Author like '%" . $searchauthor . "%'"; // unfinished
                }      

                $result = $db->query($query);
                echo "<p> $result->num_rows matching books found </p>";
               
                while($row = $result->fetch_assoc()) {
               
                }
                echo "</table>";


                # Here's the query using bound result parameters
                    // echo "we are now using bound result parameters <br/>";
                    $stmt = $db->prepare($query);
                    $stmt->bind_result($Isbn, $Title, $Author, $onloan);
                    $stmt->execute();

                    echo '<table bgcolor="#dddddd" cellpadding="6">';
                    echo '<tr><b><td>Title</td> <td>Author</td> <td>Reserved?</td><td>Reserve</td> </b> </tr>';
                    while ($stmt->fetch()) {
                        echo "<tr>";
                        echo "<td> $Title </td><td> $Author </td> <td> $onloan </td>";
                        echo '<td><a href="reserveBook.php?Isbn=' . urlencode($Isbn) . '"> Reserve </a></td>';
                        echo "</tr>";
                    }
                    echo "</table>";
                    ?>
                    </div>
                    </div>
                <?php include("footer.php"); ?>
