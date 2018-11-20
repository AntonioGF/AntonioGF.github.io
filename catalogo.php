<?Php 
	
	if(!isset($_SESSION['usuario']))
		header('Location: /proyecto6');

	$nombres = getEmpleados(); 
	
	/*
	echo "<pre>";
	print_r($nombres);
	echo "</pre>"; */
	

?>

<html>
	<head>
		<title><?Php echo $titulo; ?></title>		
	</head>
	<body>
		<br>
		<br>
		<center>
			<a href="form_empleado.php?form=new"><button>Crear empleado</button></a>
			<table border width="300px">
				<tr>
					<th> <center>id</center></td>
					<th> <center>Nombre</center></td>
					<th> <center>Contacto</center></td>
					<th> <center>Rol</center></td>
					<th> <center>Sexo</center></td>
					<th> <center>Salario</center></td>
					<th> <center>Fecha Ing.</center></td>
				<tr>
				<?Php 
						foreach($nombres as $nom){ 
												
						?>
					<tr>
						<td><center><?Php echo $nom['id']; ?></center></td>
						<td><center><?Php echo $nom['nombre']; ?></center></td>
						<td><center><?Php echo $nom['contacto']; ?></center></td>
						<td><center><?Php echo $nom['rol']; ?></center></td>
						<td><center><?Php echo $nom['sexo']; ?></center></td>
						<td><center><?Php echo $nom['salario']; ?></center></td>
						<td><center><?Php echo $nom['fecha_ingreso']; ?></center></td>
				
						<td>
						<a href="form_empleado.php?empleado=<?Php echo $nom['id'];  ?>&form=edit">Editar</a> - 
							<!-- <a href="index.php?a=a<?Php ?>">Eliminar</a> -->
							
							</td>
					<tr>
				<?Php   } ?>
			</table>
		<center>
	</body>
</html>

