	<?Php 
			$variable = "Datos incorrectos";			
			if(isset($_GET['acceso']))
				echo "<b style='color:red;'>".$variable."</b>";
		?>	
		<form action="procesa.php" method="POST">
		  Usuario :<br>
		  <input type="text" name="usuario" ><br>
		  Contrase&ntilde;a :<br>
		  <input type="password" name="contrasena"  ><br><br>
		  <input type="submit" value="Enviar">
		</form>