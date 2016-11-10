<?php
require('header.html');
require('class_products.php');

$palavra_chave = $_GET["produto"];
if ($palavra_chave != "") {
  $produto = new produtos();
  $resultado = $produto->listar_produtos($palavra_chave);
?>
  <div class="row grad-bgnd">
    <div id="div-table-search">
      <table>
        <thead>
          <th>Type</th>
          <th>Name/Brand</th>
          <th>Rate</th>
          <th>Comments</th>
        </thead>
        <tbody>
          <?php 
          if ($resultado != []) {
            foreach ($resultado as $row) {
              echo "<tr>";
              foreach ($row as $column) {        
                echo "<td>$column</td>";
              }
              echo "</tr>";    
            }  
          }
          else {
            echo "<tr><td colspan='4'>No results found</td></tr>";
          }          
          ?>
        </tbody>
      </table>
    </div>
  </div>  

<?php 
}

require('footer.html'); 
?>