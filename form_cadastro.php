<?php  
require('header.html');
require('class_produtos.php');

?>
	<div class="row grad-bgnd">
		<div class="container">	
			<div class="col-9">
			<?php
			if (isset($_POST) and $_POST != []){
				$produto = new produtos();
				if ($produto->inserir_produto()) {
					echo '<p class="alert-success">
									Produto cadastrado com sucesso!
								</p>';
				}
				else {
					echo '<p class="alert-error">
									Ocorreu um erro e a ação não foi concluída.
								</p>';
				}
				$_POST = [];
			}
			?>
		
			<form action="" method="POST">
				<div class="row">	
					<?php $categorias = ["suco", "cerveja", "vinho", "café", "bolo", "pão", "leite", "molho"];?>
					<div class="col-3">
						<label>Categoria: </label>	
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
						<label>Marca/sabor: </label>
					</div>
					<div class="col-9">
						<input name="descricao" class="input-lg" required>	
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<label>Preço: R$</label>
					</div>
					<div class="col-9">
						<input name="preco" class="input-lg">
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<label>Local da compra: </label>
					</div>
					<div class="col-9">
						<input name="local_compra" class="input-lg">	
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<label>Data da compra: </label>
					</div>
					<div class="col-9">
						<input name="data_compra" class="input-lg">	
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<label>Nota: </label>
					</div>
					<div class="col-9">
						<select name="nota" selected="ruim" class="input-lg">
						<?php $notas = ["bom", "excelente", "razoável", "ruim"];
							foreach ($notas as $nota){
								echo "<option value=\"$nota\">$nota</option>";
							}
						 ?>
						</select>	
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<label>Comentários: </label>
					</div>
					<div class="col-9">
						<textarea name="observacoes" rows="4" cols="30" class="input-lg"></textarea>
						<input type="hidden" name="usuario" value="Luisa">
					</div>	
				</div>
				<div class="row">
					<button type="submit" class="btn-green btn-lg right">Enviar</button>
				</div>
			</form>
			</div>
		</div>
	</div>
<?php require('footer.html'); ?>