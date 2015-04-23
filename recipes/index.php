<?php
  include("../app.php");
  include("../header.php");
?>
<div class="intro">
  <div class="container">
    <h1>Recipes</h1>
    <a href="/recipes/new" class="btn btn-lg btn-new-item"><p class="plus">+</p></a>
  </div>
</div>
<div class="container">
  <br>
<?php
  if ($_POST != null) {
    $post = $_POST;
    addRecipe($post);
    getRecipes();
  } else { 
    getRecipes();
  }
  echo "<a href='/recipes/new' class='btn btn-lg btn-success btn-block'>Submit New Recipe</a><br>";
  echo "<br>";
  include("../footer.php");
?>