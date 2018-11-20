<?Php 

/* Crear nuevo empleado */
function nuevoEmpleado($Values){
	global $cox;
	
	$Insert = "INSERT INTO empleados (nombre,salario,contacto,
						rol,sexo,fecha_ingreso,
						estado,usuario,clave)
			 VALUES ('{$Values['nombre']}','{$Values['salario']}','{$Values['contacto']}',
					'{$Values['rol']}','{$Values['sexo']}','{$Values['fecha_ingreso']}',
					'{$Values['estado']}','{$Values['usuario']}','{$Values['clave']}')";

	$cox->query($Insert);
	return "Empleado creado";
}

/* Modifico datos del empleado*/
function modificoEmpleado($Values){
	global $cox;
	
	$Update = "UPDATE empleados SET 
				nombre = '{$Values['nombre']}',
				salario = '{$Values['salario']}',
				contacto = '{$Values['contacto']}',
				rol = '{$Values['rol']}',
				sexo = '{$Values['sexo']}',
				fecha_ingreso = '{$Values['fecha_ingreso']}',
				estado = '{$Values['estado']}',
				usuario = '{$Values['usuario']}',
				clave = '{$Values['clave']}'
			WHERE 
				id = {$Values['empleado']} ";

	$cox->query($Update);
	return "Empleado modificado";
}


/* Valida credenciales del usuario */
function valida_usuario($usuario, $contrasena)
{
	global $cox;

	// Realizar una consulta SQL
	$sql = "SELECT id, usuario, clave 
				FROM empleados 
					WHERE usuario = '".$usuario."' 
						AND clave = '".$contrasena."' 
						AND estado = 'A' ";
	$results = $cox->query($sql);
	$vals = $results->fetch_assoc();
	
	if ($results->num_rows == 1){
		return $vals['id'];
	} else {
		return 0;
	}
}

function getUsuario($id)
{
	global $cox;

	// Realizar una consulta SQL
	$sql = "SELECT * 
				FROM empleados 
					WHERE id = '".$id."'
						AND estado = 'A' ";
	$results = $cox->query($sql);
	return $results->fetch_assoc();
}

function getRoles()
{
	global $cox;
	$vals = array();

	// Realizar una consulta SQL
	$sql = "SELECT * 
				FROM roles 
					WHERE estado = 'A' ORDER BY id ASC ";
	$results = $cox->query($sql);	
	while($row = $results->fetch_assoc()) {
	  $vals[] = $row;
	}	
	return $vals;	
}

function getEmpleados($empleado = null)
{
	global $cox;
	$vals = array();

	$condicion = "";
	if($empleado != null)
		$condicion = " AND e.id = ".$empleado;		
	
	// Realizar una consulta SQL
	$sql = "SELECT e.*, r.nombre as rol, e.rol as rol_id
				FROM empleados e
					JOIN roles r on r.id = e.rol
					WHERE e.estado = 'A' {$condicion} ORDER BY id ASC ";
	$results = $cox->query($sql);	
	while($row = $results->fetch_assoc()) {
	  $vals[] = $row;
	}	
	return $vals;	
}


?>	
