<?php
   function showError(  )
   {
       include ('db.inc');
       $connection = mysqli_connect($hostName, $username, $password, $databaseName);
      die("Error " . mysqli_errno($connection) . " : " . mysqli_error($connection));
   }
?>
