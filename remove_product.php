<?php
require('class_produtos.php');

$produto = new produtos();
$resultado = $produto->remover_produto($id);
if ($resultado) echo 'sim';




