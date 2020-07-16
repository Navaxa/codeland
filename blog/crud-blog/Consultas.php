﻿<?php
class Usuarios
{
    private static $instancia;
    private $dbh;
 
    private function __construct()
    {
        try {
            $conn = new PDO("sqlsrv:server = tcp:enerfy-server.database.windows.net,1433; Database = area-energetica", "nava-admin", "Pass1234");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            print("Error connecting to SQL Server.");
            die(print_r($e));
        }
        
        // SQL Server Extension Sample Code:
        $connectionInfo = array("UID" => "nava-admin", "pwd" => "Pass1234", "Database" => "area-energetica", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
        $serverName = "tcp:enerfy-server.database.windows.net,1433";
        $conn = sqlsrv_connect($serverName, $connectionInfo);
     }
 
    public static function singleton()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function insertar_usuario_escritor($nombre, $email, $password)
    {
        try {
			$query = $this->dbh->prepare("INSERT INTO usuarios VALUES(null,?,?,?)");
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $email);
            $query->bindParam(3, $password);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function get_escritor($email, $password)
    {
        try {
			$query = $this->dbh->prepare("SELECT * FROM usuarios WHERE email = ? AND pass = ?");
            $query->bindParam(1, $email);
            $query->bindParam(2, $password);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function get_escritorById($id)
    {
        try {
			$query = $this->dbh->prepare("SELECT * FROM usuarios WHERE id = ?");
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function email_existente($email)
    {
        try {
			$query = $this->dbh->prepare("SELECT * FROM usuarios WHERE email = ?");
            $query->bindParam(1, $email);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Insertar_post($titulo, $contenido, $img, $etiqueta, $id_escritor)
    {
        try {
			$query = $this->dbh->prepare("INSERT INTO post VALUES(null, ?,?,?,?,?,CURRENT_TIMESTAMP)");
            $query->bindParam(1, $titulo);
            $query->bindParam(2, $contenido);
            $query->bindParam(3, $img);
            $query->bindParam(4, $etiqueta);
            $query->bindParam(5, $id_escritor);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function get_articulos()
    {
        try {
			$query = $this->dbh->prepare("SELECT * FROM post");
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function get_articulosById($id)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM post WHERE id = ?");
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function get_articulosByIdEscritor($id)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM post WHERE id_escritor = ?");
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    public function delete_usuario($id)
    {
        try {
			$query = $this->dbh->prepare("DELETE FROM usuario WHERE ID = ?");
            $query->bindParam(1, $id);
            $query->execute();
            $this->dbh = null;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }
}
?>
