<?php
require 'conn_db.php';
class db_mng extends Conn_DB{

    public $sql;

    public function db_m($sql) {
        $this->sql = $sql;
    }

//	  ฟังก์ชันสำหรับคิวรี่คำสั่ง sql
    function query() {
        $db=$this->conn_mysqli();
        if ($db->query($this->sql)) {
            return true;
        } else {
            die("SQL Error: <br>" . $this->sql . "<br>" . $db->error);
            return false;
        }
    }

//    ฟังก์ชัน select ข้อมูลในฐานข้อมูลมาแสดง
    function select() {
        $db = $this->conn_mysqli();
        $result = array();
        $res = $db->query($this->sql) or die("SQL Error: <br>" . $this->sql . "<br>" . $db->error);
        while ($data = $res->fetch_assoc()) {
            $result[] = $data;
        }
        return $result;
    }

//    ฟังก์ชันสำหรับการ insert ข้อมูล
    function insert($table, $data) {
        $this->table = $table;
        $this->data = $data;
        $db=$this->conn_mysqli();
        $fields = "";
        $values = "";
        $var = $this->listfield($this->table,''); //การใช้งาน function ใน class เดียวกัน
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
        $sql = "INSERT INTO $this->table ($fields) VALUES ($values)";
        if ($db->query($sql)) {
            return true;
        } else {
            die("SQL Error: <br>" . $sql . "<br>" . $db->error);
            return false;
        }
    }

//    ฟังก์ชันสำหรับการ update ข้อมูล
    function update($table, $data, $where, $field) {
        $this->table = $table;
        $this->data = $data;
        $this->where = $where;
        if(!empty($field)){ $this->field = $field;}
        $db=$this->conn_mysqli();
        $modifs = "";
        $i = 0;
        if(empty($this->field)){
        $var = $this->listfield($this->table,''); //การใช้งาน function ใน class เดียวกัน
        array_shift($var); //เอาค่าของ array ตัวแรกออก
        }else{
            $var=  $this->field;
        }
        foreach ($this->data as $key => $val) {
            if ($i != 0) {
                $modifs.=", ";
            }
            if (is_numeric($val)) {
                $modifs.=$var[$key] . '=' . $val;
            } else {
                $modifs.=$var[$key] . ' = "' . $val . '"';
            }
            $i++;
        }
        $sql = ("UPDATE $this->table SET $modifs WHERE $this->where");
        if ($db->query($sql)) {
            return true;
        } else {
            die("SQL Error: <br>" . $sql . "<br>" . $db->error);
            return false;
        }
    }

//    ฟังก์ชันสำหรับการ delete ข้อมูล
    function delete($table, $where) {
        $this->table = $table;
        $this->where = $where;
        $db=$this->conn_mysqli();
        $sql = "DELETE FROM $this->table WHERE $this->where";
        if ($db->query($sql)) {
            return true;
        } else {
            die("SQL Error: <br>" . $sql . "<br>" . $db->error);
            return false;
        }
    }

//    ฟังก์ชันสำหรับแสดงรายการฟิลด์ในตาราง
    function listfield($table,$sql) {
        $db=$this->conn_mysqli();
        if(empty($sql) and (!empty($table))){ $sql = "SELECT * FROM $table LIMIT 1 ";}
 else {$sql=  $this->sql;}
        $res = $db->query($sql) or die("SQL Error: <br>" . $sql . "<br>" . $db->error);
        while ($data = $res->fetch_field()) {
            $var[] = $data->name;
        }
        return $var;
    }
    
    function count_field(){
        $db=$this->conn_mysqli();
        $result=$db->query($this->sql) or die("SQL Error: <br>" . $this->sql . "<br>" . $db->error);
        $num_fields = mysqli_num_fields($result);
        return $num_fields;
    }

}

?>