<?php
  include("../app.php");
  include("../header.php");
?>
<div class="intro">
  <div class="container">
    <h1>Ingredients</h1>
  </div>
</div>
<div class="container">
  <br>
<?php
  getIngredients();
  echo "
  <button class='btn btn-lg btn-default btn-block'>Submit New Ingredient</button>
  <br>
  ";
  include("../footer.php");
?>