<?php

  // Begin application settings
  class app
  {
      public $name = '';
  }
  
  $site = new app;
  $site->name = 'MyKetoPal';
  
  // $db = mysqli_connect("23.253.61.96", "dbRoth", "A00893496;", "dbRoth", 3306);
  // if($db->connect_errno > 0){
  //   die('Unable to connect to database [' . $db->connect_error . ']');
  // }
  
  function returnRecipes($result) {
    while ($obj = $result->fetch_object()){
      $resultTable = "<div class='intro_box'>";
      $resultTable = $resultTable . "<a class='recipeLink' href='/recipes/".$obj->idrecipes."'><h2 class='page-header'>" . $obj->title . "</h2></a>";
      $resultTable = $resultTable . "<p>" . $obj->description . "</p>";
      $resultTable = $resultTable . "</div><br><br>";
      echo $resultTable;
    }
  }
  
  function returnRecipeDetail($result) {
    while ($obj = $result->fetch_object()){
      $resultTable =
      "
        <div class='intro'>
          <div class='container'>
            <h1>".$obj->title."</h1>
            <p class='introLead'>".$obj->description."</p>
          </div>
        </div>
        <div class='container'>
        </div>
      ";
      echo $resultTable;
    }
  }
  
  function getRecipes($query){
    $mysqli = mysqli_connect("23.253.61.96", "dbRoth", "A00893496;", "dbRoth", 3306);
    if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $query = 'SELECT * FROM recipes';
    $result = $mysqli->query($query);
    echo returnRecipes($result);
    $mysqli->close();
  }
  
  function getRecipeDetail($id) {
    $mysqli = mysqli_connect("23.253.61.96", "dbRoth", "A00893496;", "dbRoth", 3306);
    if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $query = "SELECT * FROM `recipes` WHERE `idrecipes` = " . strval($id);
    $result = $mysqli->query($query);
    echo returnRecipeDetail($result);
    $mysqli->close();
  }
  
  

  
?>