<?php

  function query_db($query){
    // create a connection to the database
    $conn = mysqli_connect("localhost","root", "admin", "mygamesdb");
    // check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $result = mysqli_query($conn, $query);
    // close the connection as soon as possible
    mysqli_close($conn);
    return ($result);
  }
?>