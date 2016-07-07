<?php 
session_start();
require('header.html');

?>
<div id="landing-page-wrapper">
  <div id="landing-page-photo">
    <form id="form-search" action="resultado_busca.php" method="POST">
      <input name="search-product" class="input-search" placeholder=" Buscar por nome, categoria ou marca"><button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
    </form>
    <div class="main-text">
      Compartilhe sua opinião sobre produtos diversos e acesse a avaliação de outros consumidores no momento da compra
    </div>
  </div>

<?php 
require('footer.html');

