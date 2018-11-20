<?Php 
include('conexion.php');
include('lib.php');

session_start();
$titulo = "Mi proyecto Web";


?>
<html>
	<head>
		<title><?=$titulo?></title>
	</head>
	<body>	
	
	
		<?Php 
			if(isset($_SESSION['usuario'])){
				// catalogo
				include('menu.php');
				include('catalogo.php');
			} else
				include('login.php');
			
		?>
	

	</body>
</html>