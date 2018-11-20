<?Php 


$username = 'root';
$password = '';
$hostname = 'localhost'; 
$db = "curso_db";

$cox = new mysqli($hostname, $username, $password, $db);

if ($cox->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $cox->connect_errno . ") " . $cox->connect_error;
}


?>
