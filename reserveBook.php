<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ("config.php");


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
    
   echo "You are reserving book with the ID:"           .$Isbn;

    // Prepare an update statement and execute it
    $stmt = $db->prepare("UPDATE Book SET onloan=1 WHERE Isbn = ?");
    $stmt->bind_param('i', $Isbn);
    $stmt->execute();
    printf("<br>Book Reserved!");
    printf("<br><a href=browse.php>Search and Book more Books </a>");
    printf("<br><a href=books.php>Return to Reserved Books </a>");
    printf("<br><a href=index.php>Return to home page </a>");
    exit;
    

