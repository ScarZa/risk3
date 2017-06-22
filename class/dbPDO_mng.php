<?php
require 'connPDO_db.php';
class dbPDO_mng extends ConnPDO_db{

    private $sql;
    
    public function __construct(){
        date_default_timezone_set('Asia/Bangkok');
    }
            
    public function imp_sql($sql) {
        $this->sql=$sql;
    }
	//	  ฟังก์ชันสำหรับคิวรี่คำสั่ง sql
    function query($sql2=null) {
        if(!empty($sql2)){
        $this->sql=$sql2;}
        $this->db=$this->conn_PDO();
        $query=array();
       // $this->db=$db;
        try
		{
            $query=$this->db->prepare($this->sql); 
            $query->execute();
            return $query;
        } catch(PDOException $e)
		{
			echo $e->getMessage();	
			return $query=false;
		}
    }

//    ฟังก์ชัน select ข้อมูลในฐานข้อมูลมาแสดงกรณีมีเงื่อนไขหรือมีแค่ record เดียว
    function select_a($execute=null) {
        
        $this->execute=$execute;
        $this->db=$this->conn_PDO();
        $result = array();
        try
		{
        $data = $this->db->prepare($this->sql);
        if(!empty($execute)){ $data->execute($this->execute);}else{ $data->execute();}
                } catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
                if($data->rowCount()>0)
		{
        while ($data_out = $data->fetch(PDO::FETCH_ASSOC)) {
            $result = $data_out;
                }
                       }
        return $result;
    }
//    ฟังก์ชัน select ข้อมูลในฐานข้อมูลมาแสดง
    function select($execute=null) {
        
        $this->execute=$execute;
        $this->db=$this->conn_PDO();
        $result = array();
        try
		{
        $data = $this->db->prepare($this->sql);
        if(!empty($execute)){ $data->execute($this->execute);}else{ $data->execute();}
                } catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
                if($data->rowCount()>0)
		{
        while ($data_out = $data->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $data_out;
                }
                       }
        return $result;
    }
//    ฟังก์ชันสำหรับการ insert ข้อมูล
    function insert($table, $data) {
        $this->table = $table;
        $this->data = $data;
        $this->db=$this->conn_PDO();
        $fields = "";
        $values = "";
        $var = $this->listfield($this->table); //การใช้งาน function ใน class เดียวกัน
        $i = 0;
        array_shift($var); //เอาค่าของ array ตัวแรกออก
        foreach ($this->data as $key => $val) {
            if ($i != 0) {
                $fields.=", ";
                $values.=", ";
            }
            $fields.="$var[$key]";
            $values.="'$val'";
            $i++;
        }
        $this->sql = "INSERT INTO $this->table ($fields) VALUES ($values)";
        try
		{
        $data = $this->db->prepare($this->sql);
        $data->execute(); 
        return $this->db->lastInsertId();
                } catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
    }
    //    ฟังก์ชันสำหรับการ insert ข้อมูล แบบใหม่
    function insert_new($table, $data) {
        $this->table = $table;
        $this->data = $data;
        $this->db=$this->conn_PDO();
        $fields = "";
        $values = "";
        $var = $this->listfield($this->table); //การใช้งาน function ใน class เดียวกัน
        $i = 0;
        array_shift($var); //เอาค่าของ array ตัวแรกออก
        for ($i = 0; $i<count($var);$i++) {
            if ($i != 0) {
                $fields.=", ";
            }
            $fields.="$var[$i]";
        }
        $this->sql = "INSERT INTO $this->table ($fields) VALUES $this->data";
        try
		{
        $data = $this->db->prepare($this->sql);
        $data->execute(); 
        return $this->db->lastInsertId();
                } catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
    }
    //    ฟังก์ชันสำหรับการ insert ข้อมูลหากซ้ำจะ update
    function insert_update($table, $data, $field_chk) {
        $this->table = $table;
        $this->data = $data;
        $this->field_chk = $field_chk;
        $this->db=$this->conn_PDO();
        $fields = "";
        $values = "";
        $var = $this->listfield($this->table); //การใช้งาน function ใน class เดียวกัน
        $i = 0;
        array_shift($var); //เอาค่าของ array ตัวแรกออก
        foreach ($this->data as $key => $val) {
            if ($i != 0) {
                $fields.=", ";
                $values.=", ";
            }
            $fields.="$var[$key]";
            $values.="'$val'";
            $i++;
        }
        $this->sql = "INSERT INTO $this->table ($fields) VALUES ($values) ON DUPLICATE KEY UPDATE $this->field_chk=$this->field_chk+1";
        try
		{
        $data = $this->db->prepare($this->sql);
        $data->execute(); 
        return $this->db->lastInsertId();
                } catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
    }
        //    ฟังก์ชันสำหรับการ insert ข้อมูลหากซ้ำจะ update แบบใหม่
    function insert_update_new($table, $data, $field_chk) {
        $this->table = $table;
        $this->data = $data;
        $this->field_chk = $field_chk;
        $this->db=$this->conn_PDO(); 
        $fields = "";
        $values = "";
        $var = $this->listfield($this->table); //การใช้งาน function ใน class เดียวกัน
        $i = 0;
        array_shift($var); //เอาค่าของ array ตัวแรกออก
        for ($i = 0; $i<count($var);$i++) {
            if ($i != 0) {
                $fields.=", ";
            }
            $fields.="$var[$i]";
        }
        $this->sql = "INSERT INTO $this->table ($fields) VALUES $this->data ON DUPLICATE KEY UPDATE $this->field_chk=$this->field_chk+1";
        try
		{
        $data = $this->db->prepare($this->sql);
        $data->execute(); 
        return $this->db->lastInsertId();
                } catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
    }

//    ฟังก์ชันสำหรับการ update ข้อมูล
    function update($table, $data, $where, $field=null, $execute) {
        
        $this->execute=$execute;
        $this->table = $table;
        $this->data = $data;
        $this->where = $where;
        if(!empty($field)){ $this->field = $field;}
        $this->db=$this->conn_PDO();
        $modifs = "";
        $i = 0;
        if(empty($this->field)){
        $var = $this->listfield($this->table); //การใช้งาน function ใน class เดียวกัน
        array_shift($var); //เอาค่าของ array ตัวแรกออก
        }else{
            $var=  $this->field;
        }
        foreach ($this->data as $key => $val) {
            if ($i != 0) {
                $modifs.=", ";
            }
            /*if (is_numeric($val)) {
                $modifs.=$var[$key] . '=' . $val;
            } else {*/
                $modifs.=$var[$key] . ' = "' . $val . '"';
            //}
            $i++;
        }
        $this->sql = ("UPDATE $this->table SET $modifs WHERE $this->where");
        try
		{
        $data = $this->db->prepare($this->sql);
        $data->execute($this->execute); 
        return true;
                } catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
    }

//    ฟังก์ชันสำหรับการ delete ข้อมูล
    function delete($table, $where,$execute ) {
        $this->table = $table;
        $this->where = $where;
        $this->execute = $execute;
        $this->db=$this->conn_PDO();
        $this->sql = "DELETE FROM $this->table WHERE $this->where";
        try
		{
        $data = $this->db->prepare($this->sql);
        $data->execute($this->execute); 
        return true;
                } catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
    }

//    ฟังก์ชันสำหรับแสดงรายการฟิลด์ในตาราง
    function listfield($table) {
        $this->db=$this->conn_PDO();
        $this->table=$table;
        if(!empty($this->table)){
            $this->sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '".$this->dbconfig["database"]."' AND TABLE_NAME = '$this->table'";
            
        }
///////////////////////////select เฉพาะชื่อ field////////////////////////////////////
            try{
        $data = $this->db->prepare($this->sql);
        $data->execute(); 
                } catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
                if($data->rowCount()>0){
        while ($data_out =  $data->fetch(PDO::FETCH_ASSOC)) {
            if(!empty($this->table)){
            $var[] = $data_out['COLUMN_NAME'];
            }  else {
             $var = array_keys($data_out);   
            }
                }
              return $var;  
            }  else {
                echo 'DO NOT HAVE DATA.';
              return false;  
            }
        
    }
//////นับcolumm    
    function count_field(){
        $this->db=$this->conn_PDO();
        try{
        $data = $this->db->prepare($this->sql);
        $data->execute(); 
                } catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
        $num_fields = $data->columnCount();
        return $num_fields;
    }
/////ตรวจสอบว่าค่านั้นเป็นประเภทวันที่หรือไม่    
    function validateDate($date, $format = 'Y-m-d H:i:s')//หาค่าว่าเป็นชนิด date หรือไม่
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

}

?>