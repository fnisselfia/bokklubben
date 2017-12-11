<?php 
include("config.php"); 
include("header.php"); ?>

        <div class="contactBack">
            <div class="container">
  <form>

    <label for="fname"><h5>First Name</h5></label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname"><h5>Last Name</h5></label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="subject"><h5>Subject</h5></label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:100px"></textarea>

    <input type="submit" value="Submit">

  </form>
</div>
        </div>
    </body>
    <footer>
        <h4>Copywright etc</h4>
    </footer>
</html>