
<?php

include("config.php");
include("header.php"); 
?>
        <div class="headerBack">
            <?php
$Isbn = trim($_GET['Isbn']);
echo '<INPUT type="hidden" name="Isbn" value=' . $Isbn . '>';

$Isbn = trim($_GET['Isbn']);      // From the hidden field
$Isbn = addslashes($Isbn);

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }
    
   echo $Isbn;
?>
            <div class="ner">
                <?php
    // Prepare an update statement and execute it
    $stmt = $db->prepare("UPDATE Book SET onloan=0 WHERE Isbn = ?");
    $stmt->bind_param('i', $Isbn);
    $stmt->execute();
    printf("<br>Succesfully returned!");
    printf("<br><a href=browse.php>Search and Book more Books </a>");
    printf("<br><a href=books.php>Return to Reserved Books </a>");
    printf("<br><a href=index.php>Return to home page </a>");
    exit;
?>
            </div>
</div>
<?php
include("footer.php"); 
?>

    


