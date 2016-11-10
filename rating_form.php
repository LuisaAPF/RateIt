<?php  
require('header.html');
session_start();
if(isset($_SESSION['login'])) {
require('class_products.php');
?>
	<div class="row grad-bgnd">
		<div class="container">	
			<div class="col-9">
			<?php
			if (isset($_POST) and $_POST != []){
				$produto = new produtos();
				if ($produto->inserir_produto()) {
					echo '<p class="alert-success">
									Product added!
								</p>';
				}
				else {
					echo '<p class="alert-error">
									Error. Could not add product.
								</p>';
				}
				$_POST = [];
			}
			?>
		
			<form action="" method="POST">
				<div class="row">	
					<?php $categorias = ["juice", "beer", "wine", "coffee", "cake", "bread", "milk", "sauce"];?>
					<div class="col-3">
						<label>Type: </label>	
					</div>
					<div class="col-9">
						<select name="categoria" class="input-lg" selected=<?php echo "\"$categorias[0]\""; ?>>
						<?php foreach ($categorias as $cat) {
							echo "<option value=\"$cat\">$cat</option>";
						} ?>
						</select>				
					</div>	
				</div>
				<div class="row">
					<div class="col-3">
						<label>Name/Brand: </label>
					</div>
					<div class="col-9">
						<input name="descricao" class="input-lg" required>	
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<label>Rate: </label>
					</div>
					<div class="col-9">
						<select name="nota" selected="ruim" class="input-lg">
						<?php $notas = ["excellent", "good", "ok", "bad"];
							foreach ($notas as $nota){
								echo "<option value=\"$nota\">$nota</option>";
							}
						 ?>
						</select>	
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<label>Comments: </label>
					</div>
					<div class="col-9">
						<textarea name="observacoes" rows="4" cols="30" class="input-lg"></textarea>
						<input type="hidden" name="usuario" value="Luisa">
					</div>	
				</div>
				<div class="row">
					<button type="submit" class="btn-green btn-lg right">Send</button>
				</div>
			</form>
			</div>
		</div>
	</div>
<?php 
}
require('footer.html'); ?>