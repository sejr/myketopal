<?php
  include("app.php");
  include("header.php");
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    getRecipeDetail($id);
  } 
  include("footer.php");
?>