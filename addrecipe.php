<?php
  include("app.php");
  include("header.php");
?>

<div class="intro">
  <div class="container">
    <h1>Submit New Recipe</h1>
  </div>
</div>
<br>
<div class="container">
  <div class="intro_box">
    <form method="post" action="/recipes/">
      <div class="form-group">
        <label for="recipeTitle"><h5>Recipe Title</h5></label>
        <input type="text" class="form-control input-lg" id="title" name="title" placeholder="What's this recipe called?">
      </div>
      <div class="form-group">
        <label for="recipeTitle"><h5>Description</h5></label>
        <textarea class="form-control input-lg" rows="3" id="description" name="description" placeholder="What exactly are we making?"></textarea>
      </div>
      <hr>
      <button type="submit" class="btn btn-success btn-lg">Submit</button>
      <button type="reset" class="btn btn-default btn-lg">Clear</button>
    </form>
  </div>
</div>
  
<?php
  include("footer.php");
?>