<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Bokklubb</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>
    <body>
    <header>
        <nav>
            <ul>
                <li>
                    <h2><a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL; ?>" href="index.php"> Home</a></h2>
                </li>
                <li>
                    <h2><a class="<?php echo ($current_page == 'about.php') ? 'active' : NULL; ?>" href="about.php"> About us</a></h2>                </li>            
                <li>
                    <h2><a class="<?php echo ($current_page == 'browse.php' || $current_page == '') ? 'active' : NULL; ?>" href="browse.php"> Browse books</a></h2>
                </li>            
                <li>
                    <h2><a class="<?php echo ($current_page == 'books.php' || $current_page == '') ? 'active' : NULL; ?>" href="books.php"> My books</a></h2>
                </li>            
                <li>
                    <h2><a class="<?php echo ($current_page == 'contact.php' || $current_page == '') ? 'active' : NULL; ?>" href="contact.php"> Contact us</a></h2>
                </li>
                <li>
                    <h2><a class="<?php echo ($current_page == 'gallery.php' || $current_page == '') ? 'active' : NULL; ?>" href="SQLInjection.php">Gallery</a></h2>
                </li>
            </ul>
         </nav>
    </header>             