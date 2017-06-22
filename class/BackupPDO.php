<?php
class BackupPDO {
    public function backup_tables($db,$program,$tables = '*')
{
        $this->db=$db;
        $this->program=$program;
      //get all of the tables
    if($tables == '*')
    {
        $tables = array();
        $sql='SHOW TABLES';
        $result = $this->db->prepare($sql); 
        $result->execute();
        while($row = $result->fetch(PDO::FETCH_NUM))
        {
            $tables[] = $row[0];
        }
    }
    else
    {
        $tables = is_array($tables) ? $tables : explode(',',$tables);
    }
    $return='';
    //cycle through
    foreach($tables as $table)
    {
        $sql="SELECT * FROM $table";
        $result = $this->db->prepare($sql);
        $result->execute();
        $num_fields = $result->columnCount();//rowCount();

        $return.= 'DROP TABLE IF EXISTS '.$table.';';
        $data=$this->db->prepare("SHOW CREATE TABLE $table");
        $data->execute();
        $row2 = $data->fetch(PDO::FETCH_NUM);
        $return.= "\n\n".$row2[1].";\n\n";

        for ($i = 0; $i < $num_fields; $i++) 
        {
            while($row = $result->fetch(PDO::FETCH_NUM))
            {
                $return.= 'INSERT INTO '.$table.' VALUES(';
                for($j=0; $j<$num_fields; $j++) 
                {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = str_replace("\n","\\n",$row[$j]);
                    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                    if ($j<($num_fields-1)) { $return.= ','; }
                }
                $return.= ");\n";
            }
        }
        $return.="\n\n\n";
    }

    //save file
    $handle = fopen('../backupDB/db-backup-'.date('Y-m-d-Hms').' '.$this->program.'.sql','w+');
    fwrite($handle,$return);
    fclose($handle);
}
}
