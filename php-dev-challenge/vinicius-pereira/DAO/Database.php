<?php
if (!defined("DS")) {
    define('DS', DIRECTORY_SEPARATOR);
}
if (!defined("BASE_DIR")) {
    define('BASE_DIR', dirname(dirname(__FILE__)) . DS);
}

class Database{
	private static $db;

	function __construct() {
		# Dados para conexão com o banco
		$db_host = "localhost";
		$db_nome = "testepolvo";
		$db_usuario = "testepolvo";
		$db_senha = "";
		$db_driver = "mysql";

		try {
            self::$db = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
            # PDO lança exceções durante erros.
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            # Armazenamento em codificação UFT-8.
            self::$db->exec('SET NAMES utf8');
        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
	}

	# Método estático - acessível sem instanciar objeto.
	public static function conexao() {
        # Garante uma única instância. Se não existe uma conexão, cria uma nova.
        if (!self::$db) {
            new Database();
        }
        # Retorna a conexão.
        return self::$db;
    }
}
?>