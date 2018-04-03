<!DOCTYPE html>
<html>
<?php include("includes/head.inc.php"); ?>
<body>
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Advanced result
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li>
          <form method = "Post" action="advanced-search.php">
              <button type="submit" name="artists">Artists</button>
          </form>
      </li>
      <li>
           <form method = "Post"  action="advanced-search.php">
              <button type="submit" name="artWork">Artwork</button>
            </form>
      </li>
      <li><a href="#">JavaScript</a></li>
    </ul>
  </div>
</body>
</html>