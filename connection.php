<?php
include_once('include/Database.php');
define('SS_DB_NAME', 'db_uas');
define('SS_DB_USER', 'root');
define('SS_DB_PASSWORD', '');
define('SS_DB_HOST', 'localhost');

$dsn	= 	"mysql:dbname=".SS_DB_NAME.";host=".SS_DB_HOST."";
$pdo	=	"";
try {
	$pdo = new PDO($dsn, SS_DB_USER, SS_DB_PASSWORD);
}catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
$db 	=	new Database($pdo);

$koneksi = mysqli_connect(SS_DB_HOST,SS_DB_USER,"",SS_DB_NAME);

    if(mysqli_connect_errno($koneksi))
    {
        echo"koneksi Gagal". mysqli_connect_error();
    }
?>