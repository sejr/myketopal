<?php
  include("../app.php");
  include("../header.php");
?>
<div class="intro">
  <div class="container">
    <h1>Recipes</h1>
  </div>
</div>
<div class="container">
  <br><br>
<?php
  getRecipes();
  include("../footer.php");
?>