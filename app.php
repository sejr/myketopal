<?php

  // Begin application settings
  class app
  {
      public $name = '';
  }
  
  $site = new app;
  $site->name = 'MyKetoPal';
  
  function getRecipes($query)
  {
    $mysqli = mysqli_connect("23.253.61.96", "dbRoth", "A00893496;", "dbRoth", 3306);
    if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $query = 'SELECT * FROM recipes ORDER BY `idrecipes` DESC';
    $result = $mysqli->query($query);
    while ($obj = $result->fetch_object()){
      $resultTable = "<div class='intro_box'>";
      $resultTable = $resultTable . "<h2 class='page-header'><a class='recipeLink' href='/recipes/".$obj->idrecipes."'>" . $obj->title . "</a><span class='pull-right'>
          <button class='btn btn-default' type='submit'>Modify</button>
          <button class='btn btn-danger' type='submit'>Delete</button>
        </span></h2>";
      $resultTable = $resultTable . "<p>" . $obj->description . "</p>";
      $resultTable = $resultTable . "
      </div><br>
      ";
      echo $resultTable;
    }
    $mysqli->close();
  }
  
  function getRecipeDetail($id)
  {
    $mysqli = mysqli_connect("23.253.61.96", "dbRoth", "A00893496;", "dbRoth", 3306);
    if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $query = "SELECT * FROM `recipes` WHERE `idrecipes` = " . strval($id);
    $result = $mysqli->query($query);
    while ($obj = $result->fetch_object()){
      if($obj->authorID == null)
      {
        $authorName = "Unknown";
      }
      else{
        $authorQuery = "SELECT * FROM dbRoth.authors where idauthors = {$obj->authorID}";
        $authorResult = $mysqli->query($authorQuery);
        $authorObj = $authorResult->fetch_object();
        $authorName = $authorObj->username;
      }
      $resultTable =
      "
        <div class='intro'>
          <div class='container'>
            <h1>".$obj->title." <small>&nbsp;submitted by ".$authorName ."</small></h1>
            <p class='introLead'>".$obj->description."</p>
          </div>
        </div>
        <div class='container'>
           
        </div>
      ";
      echo $resultTable;
    }
    $mysqli->close();
  }
  
  function addRecipe($post) {
    $mysqli = mysqli_connect("23.253.61.96", "dbRoth", "A00893496;", "dbRoth", 3306);
    if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $query = "INSERT INTO `recipes` (title, description, dateModified) VALUES ('{$post['title']}', '{$post['description']}', NOW())";
    $result = $mysqli->query($query);
    $mysqli->close();
  }
  
  function getIngredients($query)
  {
    $mysqli = mysqli_connect("23.253.61.96", "dbRoth", "A00893496;", "dbRoth", 3306);
    if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $query = 'SELECT * FROM ingredients ORDER BY `idingredients` DESC';
    $result = $mysqli->query($query);
    while ($obj = $result->fetch_object()){
      $resultTable = "<div class='intro_box'>";
      $resultTable = $resultTable . "<h3><a class='recipeLink' href='/ingredients/".$obj->idingredients."'>" . $obj->name . "</a><span class='pull-right'>
          <button class='btn btn-default' type='submit'>Modify</button>
          <button class='btn btn-danger' type='submit'>Delete</button>
        </span></h3>";
      $resultTable = $resultTable . "</div><br>";
      echo $resultTable;
    }
    $mysqli->close();
  }
  
  function getIngredientDetail($id)
  {
    $mysqli = mysqli_connect("23.253.61.96", "dbRoth", "A00893496;", "dbRoth", 3306);
    if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $query = "SELECT * FROM `ingredients` WHERE `idingredients` = " . strval($id);
    $result = $mysqli->query($query);
    while ($obj = $result->fetch_object()){
      $resultTable =
      "
        <div class='intro'>
          <div class='container'>
            <h1>".$obj->name."</h1>
            <p class='introLead'>".$obj->description."</p>
          </div>
        </div>
        <div class='container'>
        </div>
      ";
      echo $resultTable;
    }
    $mysqli->close();
  }
?>