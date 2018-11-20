<?Php 
include('conexion.php');
include('lib.php');
session_start();

/* Array de Valores */
$Values = $_POST;
$_SESSION['form_values'] = $Values;

/*
 echo "<pre>";
	print_r($Values);
	echo "</pre>"; 

exit;	
	*/


/* Validad si campo viene vacio */
if($Values['nombre'] == "" 
	OR $Values['salario'] == ""
	OR $Values['contacto'] == ""
	OR $Values['sexo'] == ""
	OR $Values['usuario'] == ""
	OR $Values['clave'] == ""){
	
	/* Redirecciona */
	header('Location: /proyecto6/form_empleado.php?error=1');
	exit;
}

if (isset($Values['empleado'])) {
	$exito = modificoEmpleado($Values);
} else {
	$exito = nuevoEmpleado($Values);
}

echo $exito;
exit;

?>	
