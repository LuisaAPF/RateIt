<?php
require('header.html');

if (isset($_POST) and $_POST != "") {
  require('class_produtos.php');
  $produto = new produtos();
  $resultado = $produto->listar_produtos();
?>
<div class="row grad-bgnd">
  <div id="div-table-search" class="col-8">
    <table>
      <thead>
        <th>Categoria</th>
        <th>Descrição</th>
        <th>Nota</th>
        <th>Observações</th>
      </thead>
      <tbody>
        <?php 
        foreach ($resultado as $row) {
          echo "<tr>";
          foreach ($row as $column) {        
            echo "<td>$column</td>";
          }
          echo "</tr>";    
        }
        ?>
      </tbody>
    </table>
  </div>
</div>  

<?php  
  unset($_POST);
}

require('footer.html'); 
?>