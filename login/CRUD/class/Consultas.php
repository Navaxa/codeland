<?php
class Usuarios
{
    private static $instancia;
    private $dbh;
 
    private function __construct()
    {
        try {
            #$this->dbh = new PDO('mysql:host=localhost;dbname=areaenergetica', 'root', 'pass1234');
            $this->dbh = new PDO("sqlsrv:server = tcp:enerfy-server.database.windows.net,1433; Database = area-energetica", "nava-admin", "{Pass1234}");
            $this->dbh->exec("SET CHARACTER SET utf8");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }
 
    public static function singleton()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function Insertar($nombre , $email, $pass, $rol)
    {
        try {
           
                $query = $this->dbh->prepare("INSERT INTO usuarios VALUES(null,?,?,?,?)" );
                    $query->bindParam(1, $nombre);
                    $query->bindParam(2, $email);
                    $query->bindParam(3, $pass);
                    $query->bindParam(4, $rol);     
                $query->execute();
                return $query->fetchAll();
                $this->dbh = null;
            
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Insertar_a_datos_proveedor($nombre , $email)
    {
        try {
           
                $query = $this->dbh->prepare("INSERT INTO datos_usuario_proveedor VALUES(null,?,?)" );
                    $query->bindParam(1, $nombre);
                    $query->bindParam(2, $email);   
                $query->execute();
                return $query->fetchAll();
                $this->dbh = null;
            
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Insertar_a_datos_proveedorUpdate($nombre , $empresa, $cel, $cargo, $estado, $calle, $cp, $acerca_de, $url, $email, $nombre_logo)
    {
        try {
           
                $query = $this->dbh->prepare("UPDATE datos_usuario_proveedor SET nombre = ?, empresa = ?, telefono = ?, cargo = ?, estado = ?, calle = ?, cp = ?, acerca_de = ?, sitioweb= ?, logo = ? WHERE email = ?");
                    $query->bindParam(1, $nombre);
                    $query->bindParam(2, $empresa); 
                    $query->bindParam(3, $cel);   
                    $query->bindParam(4, $cargo);
                    $query->bindParam(5, $estado); 
                    $query->bindParam(6, $calle);
                    $query->bindParam(7, $cp);
                    $query->bindParam(8, $acerca_de);
                    $query->bindParam(9, $url);
                    $query->bindParam(10, $nombre_logo);
                    $query->bindParam(11, $email);
                $query->execute();
                return $query->fetchAll();
                $this->dbh = null;
            
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Insertar_a_datos_proveedorPrimeraVez($nombre , $empresa, $cel, $cargo, $estado, $calle, $cp, $acerca_de, $url, $email, $nombre_logo)
    {
        try {
           
                $query = $this->dbh->prepare("INSERT INTO datos_usuario_proveedor VALUES(null, ?,?,?,?,?,?,?,?,?,?,?)");
                    $query->bindParam(1, $nombre);
                    $query->bindParam(2, $empresa); 
                    $query->bindParam(3, $cel);   
                    $query->bindParam(4, $cargo);
                    $query->bindParam(5, $estado); 
                    $query->bindParam(6, $calle);
                    $query->bindParam(7, $cp);
                    $query->bindParam(8, $acerca_de);
                    $query->bindParam(9, $email);
                    $query->bindParam(10, $url);
                    $query->bindParam(11, $nombre_logo);
                    
                $query->execute();
                return $query->fetchAll();
                $this->dbh = null;
            
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Read_a_datos_proveedor($email)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM datos_usuario_proveedor WHERE email = ?");
            $query->bindParam(1, $email);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Read_a_datos_proveedorById($id)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM datos_usuario_proveedor WHERE id = ?");
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }


    public function Read_proveedores()
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM datos_usuario_proveedor");
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function get_Usuario($email, $pass)
    {
        try {
            $query = $this->dbh->prepare("SELECT email, rol, nombre FROM usuarios WHERE email = ? AND pass = ?" );
            $query->bindParam(1, $email);
            $query->bindParam(2, $pass);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Comprueba_email($email)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM usuarios WHERE email = ?");
            $query->bindParam(1, $email);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Update_Usuario($nombre, $email)
    {
        try {
            $query = $this->dbh->prepare("UPDATE usuarios SET nombre = ? WHERE email = ?");
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $email);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
 
    public function get_interese()
    {
        try {
            $query = $this->dbh->prepare("SELECT DISTINCT * FROM intereses" );          
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Insertar_solicitud($nombre, $descipcion, $servicio, $email)
    {
        try {
            $query = $this->dbh->prepare("INSERT INTO intereses VALUES(null,?,?,?,?)"); 
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $descipcion);
            $query->bindParam(3, $servicio);
            $query->bindParam(4, $email);         
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Lee_solicitud($email)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM intereses WHERE email = ?"); 
            $query->bindParam(1, $email);         
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }  

    public function get_numeroDeUsuarios()
    {
        try {
            $query = $this->dbh->prepare("SELECT count(*) FROM usuarios");          
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function get_numeroDeProveedores()
    {
        try {
            $query = $this->dbh->prepare("SELECT count(*) FROM datos_usuario_proveedor");          
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Insertar_notificacion($nombre_Cliente, $email_Cliente, $nombreProveedor, $email, $propuesta,$id_interes, $estado_noticia)
    {
        try {
            $query = $this->dbh->prepare("INSERT INTO notificaciones VALUES(null,?,?,?,?,?,CURRENT_TIMESTAMP,?,?)"); 
            $query->bindParam(1, $nombre_Cliente);
            $query->bindParam(2, $email_Cliente);
            $query->bindParam(3, $nombreProveedor);
            $query->bindParam(4, $email); 
            $query->bindParam(5, $propuesta);
            $query->bindParam(6, $id_interes);
            $query->bindParam(7, $estado_noticia);         
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Lee_notificacion($email_Cliente, $email_proveedor, $id_solicitud)
    {
        try {
            $query = $this->dbh->prepare("SELECT estado_notificacion FROM notificaciones WHERE email_cliente = ? AND email_proveedor = ? AND id_solicitud = ?");          
            $query->bindParam(1, $email_Cliente);
            $query->bindParam(2, $email_proveedor);
            $query->bindParam(3, $id_solicitud);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Cuenta_Solicitudes($id_solicitud)
    {
        try {
            $query = $this->dbh->prepare("SELECT count(*) FROM  notificaciones WHERE id_solicitud = ?");          
            $query->bindParam(1, $id_solicitud);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function detalle_notificacion($id)
    {
        try {
            $query = $this->dbh->prepare("SELECT email_proveedor, propuesta FROM notificaciones WHERE id_solicitud = ?");          
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Insertar_a_datos_clientePrimeraVez($nombre , $dedicacion, $cel, $estado, $calle, $cp, $acerca_de, $email, $url_facebook, $foto_perfil)
    {
        try {
           
                $query = $this->dbh->prepare("INSERT INTO datos_usuario_cliente VALUES(null, ?,?,?,?,?,?,?,?,?,?)");
                    $query->bindParam(1, $nombre);
                    $query->bindParam(2, $dedicacion); 
                    $query->bindParam(3, $cel);
                    $query->bindParam(4, $estado); 
                    $query->bindParam(5, $calle);
                    $query->bindParam(6, $cp);
                    $query->bindParam(7, $acerca_de);
                    $query->bindParam(8, $email);
                    $query->bindParam(9, $url_facebook);
                    $query->bindParam(10, $foto_perfil);
                    
                $query->execute();
                return $query->fetchAll();
                $this->dbh = null;
            
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Insertar_a_datos_clienteUpdate($nombre , $dedicacion, $cel, $estado, $calle, $cp, $acerca_de, $email, $url_facebook, $foto_perfil)
    {
        try {
           
                $query = $this->dbh->prepare("UPDATE datos_usuario_cliente SET nombre = ?, dedicacion = ?, telefono = ?, estado = ?, calle = ?, cp = ?, acerca_de = ?, facebook= ?, foto_perfil = ? WHERE email = ?");
                    $query->bindParam(1, $nombre);
                    $query->bindParam(2, $dedicacion); 
                    $query->bindParam(3, $cel);
                    $query->bindParam(4, $estado); 
                    $query->bindParam(5, $calle);
                    $query->bindParam(6, $cp);
                    $query->bindParam(7, $acerca_de);
                    $query->bindParam(8, $url_facebook);
                    $query->bindParam(9, $foto_perfil);
                    $query->bindParam(10, $email);
                $query->execute();
                return $query->fetchAll();
                $this->dbh = null;
            
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Read_a_datos_cliente($email)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM datos_usuario_cliente WHERE email = ?");
            $query->bindParam(1, $email);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Lee_Contrato($id_cliente, $id_proveedor)
    {
        try {
            $query = $this->dbh->prepare("SELECT id FROM contrato WHERE id_cliente = ? AND id_proveedor = ?");
            $query->bindParam(1, $id_cliente);
            $query->bindParam(2, $id_proveedor);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }  

    public function Hacer_Contrato($nom_cliente, $id_cliente, $nombre_proveedor, $id_proveedor, $id_solicitud)
    {
        try {
            $query = $this->dbh->prepare("INSERT INTO contrato VALUES(null,?,?,?,?)"); 
            $query->bindParam(1, $nom_cliente);
            $query->bindParam(2, $id_cliente);
            $query->bindParam(3, $nombre_proveedor);
            $query->bindParam(4, $id_proveedor);   
            $query->bindParam(4, $id_solicitud);            
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Lee_ContratoExistente($id_solicitud)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM contrato WHERE id_solicitud = ?");
            $query->bindParam(1, $id_solicitud);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }  

    public function Lee_ClienteExistente($id)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM datos_usuario_cliente WHERE id = ?");
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }  

    public function get_NotificacionByEmail($email)
    {
        try {
            $query = $this->dbh->prepare("SELECT * FROM notificaciones WHERE email_proveedor = ?"); 
            $query->bindParam(1, $email);         
            $query->execute();
            return $query->fetchAll();
            $this->dbh = null;
        }catch (PDOException $e) {
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