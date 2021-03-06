<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require('header.html');
require('class_products.php');

session_start();
$login = $_SESSION['login'];
if (isset($login)) {
  $produto = new produtos();
  $resultado = $produto->listar_meus_produtos($login);
?>
  <div class="row grad-bgnd">
    <div class="col-9" id="message-delete_product"></div>
    <div id="div-table-search">
      <table>
        <thead>
          <th>Type</th>
          <th>Name/Brand</th>
          <th>Rate</th>
          <th>Comments</th>
          <th>Remove</th>
        </thead>
        <tbody>
          <?php 
          if ($resultado != []) {
            foreach ($resultado as $row) {
              echo "<tr>                
                     <td>" .$row['type']. "</td>
                     <td>" .$row['brand']. "</td>
                     <td>" .$row['rate']. "</td>
                     <td>" .$row['comments']. "</td>
                     <td><button class='delete-product' type='button' id='" .$row['id']. "'><i class='fa fa-eraser fa-lg'></i></button></td>
                    </tr>";    
            }  
          }
          else {
            echo "<tr><td colspan='5'>No results found</td></tr>";
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
