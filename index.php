<?php 
require('header.html');
session_start();
?>

<div id="landing-page-wrapper">
  <div id="landing-page-photo">
    <form id="form-search" action="search_result.php" method="GET">
      <input name="produto" class="input-search" placeholder=" Search by name, brand or type" required><button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
    </form>
    <div class="main-text">
      Share your thoughts about all kinds of products and see other people's opinions when shopping
    </div>
  </div>
</div>

<?php 
require('footer.html');

