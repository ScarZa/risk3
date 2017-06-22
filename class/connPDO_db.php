<?php
require 'read_conn.php';
class connPDO_db extends read_conn{
    public $dbconfig=array(
        "hostname"=>NULL,
        "username"=>NULL,
        "password"=>NULL,
        "database"=>NULL,
        "port"=>NULL,
        "collation_connection"=>NULL,
        "charector_set"=>NULL
    );
    public $db;
    public function conn_PDO(){
        $conn_db=$this->Read_Text();
        $this->dbconfig["hostname"]= trim($conn_db[0]) ;
        $this->dbconfig["username"]= trim($conn_db[1]) ;
        $this->dbconfig["password"]= trim($conn_db[2]) ;
        $this->dbconfig["database"]= trim($conn_db[3]) ;
        $this->dbconfig["port"]= trim($conn_db[4]) ;
        $this->dbconfig["charector_set"]= trim($conn_db[5]);
        $this->dbconfig["collation_connection"]= "utf8_unicode_ci";

        
        $host=$this->dbconfig["hostname"];
        $user=$this->dbconfig["username"];
        $pass=$this->dbconfig["password"];
        $database=$this->dbconfig["database"];
        $port=$this->dbconfig["port"];
        $char=$this->dbconfig["charector_set"];
        
        try {  
            $this->db = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$database.';charset='.$char,$user,$pass);
            $this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $this->db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES '.$char.'');
            $this->db->exec("set names ".$char."");

        return $this->db;
    }
    catch(PDOException $e) {  
     echo 'ERROR: ' . $e->getMessage();
     return $this->db=FALSE;
    }   
    }
    public function getDb() {
       if ($this->db instanceof PDO) {//ใช้ในการเชคโครงสร้างของตัวแปรที่เป็น object ว่าเป็นของ object นั้นใช่หรือไม่ 
            return $this->db;
       }
 }
  public function close_PDO(){
        $this->db=NULL;
    }
}
?>