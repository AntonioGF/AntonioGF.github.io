<?Php 
include('conexion.php');
include('lib.php');

session_start();

$usuario = (isset($_POST['usuario']))? $_POST['usuario'] : $_GET['usuario'];
$contrasena = (isset($_POST['contrasena']))? $_POST['contrasena'] : $_GET['contrasena'];

/* Valores a comparar */
$valida  = valida_usuario($usuario, $contrasena); // array('usuario' => 'manolo','contrasena' => 'abc123');

if($valida){
	echo "Bienvenido al Sistema.";
	$vals = getUsuario($valida);
	$_SESSION['usuario'] = $vals['nombre'];
	header('Location: /proyecto6');
	
} else {
	//echo "Favor de contactar el Administrador.";
	header('Location: /proyecto6/?acceso=error');
	exit;
	// unset($_SESSION['usuario']);
}

?>	
