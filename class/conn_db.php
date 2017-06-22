<?php
//require 'read_conn.php';
//class Conn_DB extends Read_DB{
class conn_db{
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
    public function __construct($conn_db) {
        $this->db = $conn_db;
    }
    public function conn_mysqli(){
        $conn_db=$this->db;
        $this->dbconfig["hostname"]= trim($conn_db[0]) ;
        $this->dbconfig["username"]= trim($conn_db[1]) ;
        $this->dbconfig["password"]= trim($conn_db[2]) ;
        $this->dbconfig["database"]= trim($conn_db[3]) ;
        $this->dbconfig["port"]= trim($conn_db[4]) ;
        $this->dbconfig["collation_connection"]= "utf8_unicode_ci";
        $this->dbconfig["charector_set"]= "utf8";
      
        
        echo $host=$this->dbconfig["hostname"];
        $user=$this->dbconfig["username"];
        $pass=$this->dbconfig["password"];
        $database=$this->dbconfig["database"];
        $port=$this->dbconfig["port"];
        $char=$this->dbconfig["charector_set"];
        
        $this->db=mysqli_connect("$host", "$user", "$pass","", "$port");
       
	if($this->db) {
            mysqli_select_db($this->db, $database);
           $this->db->set_charset($char);  
           return $this->db;
        }/*elseif($this->db==mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
				 E_USER_ERROR);
                        return false;
		}*/
        //mysqli_select_db($this->db, $database);
        //mysql_select_db($database);
        
	
    }
    public function close_mysqli(){
        mysqli_close($this->db);
    }
}
?>