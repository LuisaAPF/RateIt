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
					<?php $types = ["juice", "beer", "wine", "coffee", "cake", "bread", "milk", "sauce"];?>
					<div class="col-3">
						<label>Type: </label>	
					</div>
					<div class="col-9">
						<select name="type" class="input-lg" selected=<?php echo "\"$types[0]\""; ?>>
						<?php foreach ($types as $type) {
							echo "<option value=\"$type\">$type</option>";
						} ?>
						</select>				
					</div>	
				</div>
				<div class="row">
					<div class="col-3">
						<label>Name/Brand: </label>
					</div>
					<div class="col-9">
						<input name="brand" class="input-lg" required maxlength="40">	
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<label>Rate: </label>
					</div>
					<div class="col-9">
						<select name="rate" selected="ruim" class="input-lg">
						<?php $rates = ["excellent", "good", "ok", "bad"];
							foreach ($rates as $rate){
								echo "<option value=\"$rate\">$rate</option>";
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
						<textarea name="comments" rows="4" cols="30" class="input-lg" maxlength="300"></textarea>
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