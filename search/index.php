<?php
  include("../app.php");
  include("../header.php");
  if (!empty($_REQUEST['term'])) {
    $term = $_REQUEST['term'];
  }
?>
<div class="intro">
  <div class="container">
    <h1>
        Searching for: <?php echo $term; ?>
    </h1>
  </div>
</div>
<div class="container"><br><br>
    <?php
      $mysqli = mysqli_connect("23.253.61.96", "dbRoth", "A00893496;", "dbRoth", 3306);
      if($mysqli->connect_errno > 0){
        die('Unable to connect to database [' . $db->connect_error . ']');
      }
      if (!empty($_REQUEST['term'])) {
        $sql = "SELECT * FROM `recipes` WHERE `title` LIKE '%".$term."%' OR `description` LIKE '%".$term."%'"; 
        $result = $mysqli->query($sql);
        if ($result->num_rows === 0){
            echo "<h4>No recipes matched your search term.</h4>";
        } else {
          while ($obj = $result->fetch_object()){
            $resultTable = "<div class='intro_box'>";
            $resultTable = $resultTable . "<a class='recipeLink' href='/recipes/".$obj->idrecipes."'><h2 class='page-header'>" . $obj->title . "</h2></a>";
            $resultTable = $resultTable . "<p>" . $obj->description . "</p>";
            $resultTable = $resultTable . "</div><br><br>";
            echo $resultTable;
          }
        }
        $mysqli->close();
      }
      else {
          echo "<h4>You forgot to specify a search term!</h4>";
      }
    ?>
</div>
<?php
  include("../footer.php");
?>