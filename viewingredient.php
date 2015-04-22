<?php
  include("app.php");
  include("header.php");
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    getIngredientDetail($id);
  } 
  include("footer.php");
?>