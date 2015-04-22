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
  include("../footer.php");
?>