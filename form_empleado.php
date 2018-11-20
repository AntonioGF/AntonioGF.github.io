<?Php 
	include('conexion.php');
	include('lib.php');
	session_start();
	
	/* Variables */
	$hideEmpleado =  false;
	
	if(isset($_GET['form']) and $_GET['form'] == 'new'){		
		unset($_SESSION['form_values']);
	}
	
	if((isset($_GET['form']) and $_GET['form'] == 'edit') OR (isset($_GET['empleado']))){
		unset($_SESSION['form_values']);
		$empleado = $_GET['empleado'];
		$vals_form = getEmpleados($empleado);
		$vals_form = $vals_form[0];
		$hideEmpleado = true;
	}
	
	if(isset($_SESSION['form_values'])){
		$vals_form = $_SESSION['form_values'];
		$vals_form['rol_id'] = $vals_form['rol'];
		//print_r($_SESSION['form_values']);
	}
	
	 echo "<pre>";
	print_r($vals_form);
	echo "</pre>"; 
	
	$roles = getRoles();
	
			$variable = "Favor de ingresar los datos";			
			if(isset($_GET['error']))
				echo "<b style='color:red;'>".$variable."</b>";
		?>	
		<form action="procesa_form.php" method="POST">
		  Nombre :<br>
		  <input type="text" name="nombre" value="<?Php echo (isset($vals_form['nombre']))?$vals_form['nombre']:''; ?>" ><br>
		    Salario :<br>
		  <input type="text" name="salario" value="<?Php echo (isset($vals_form['salario']))?$vals_form['salario']:''; ?>" ><br>
		    Contacto :<br>
		  <input type="text" name="contacto" value="<?Php echo (isset($vals_form['contacto']))?$vals_form['contacto']:''; ?>" ><br>
		    Rol :<br>
		  <select name="rol" >
			<?Php foreach($roles as $rol){ ?>
				<option <?Php echo (isset($vals_form['rol_id']) && $vals_form['rol_id'] == $rol['id'])?'selected':''; ?> value="<?=$rol['id']?>"><?=$rol['nombre']?></option>
			<?Php } ?>
		  </select>
		  
		  
		  <br>
		    Sexo :<br>
		   <input type="radio" name="sexo" value="M" <?Php echo (isset($vals_form['sexo']) && strtoupper($vals_form['sexo'])== 'M')?'checked':''; ?>> Masculino<br>
			<input type="radio" name="sexo" value="F" <?Php echo (isset($vals_form['sexo']) && strtoupper($vals_form['sexo'])== 'F')?'checked':''; ?>> Femenino<br>
			<input type="radio" name="sexo" value="O" <?Php echo (isset($vals_form['sexo']) && strtoupper($vals_form['sexo'])== 'O')?'checked':''; ?>> Otros
		  
		  
		  <br>
		    Fecha ingreso :<br>
		  <input type="date" name="fecha_ingreso" value="<?Php echo (isset($vals_form['fecha_ingreso']))?$vals_form['fecha_ingreso']:''; ?>" ><br>
		     
		  <input type="hidden" name="estado" value="A" ><br>
		  
		  <?Php if($hideEmpleado){ ?>
			<input type="hidden" name="empleado" value="<?Php echo $empleado; ?>" >
		  <?Php }  ?>
		  
		  
		  Usuario :<br>
		  <input type="text" name="usuario" value="<?Php echo (isset($vals_form['usuario']))?$vals_form['usuario']:''; ?>" ><br>
		  Contrase&ntilde;a :<br>
		  <input type="password" name="clave" value="<?Php echo (isset($vals_form['clave']))?$vals_form['clave']:''; ?>"  ><br><br>
		  
		  
		  
		  <input type="submit" value="Enviar"> <input type="button" onclick="window.location='index.php'" value="Cancelar">
		</form>
