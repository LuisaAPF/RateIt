<?php
require('class_products.php');

$id = $_GET['id']; 

$produto = new produtos();
$resultado = $produto->remover_produto($id);

if ($resultado) echo '<div class="container"><div class="alert-success">Product removed!</div></div>';
else echo '<div class="container"><div class="alert-error">Error. Could not remove product.</div></div>';




