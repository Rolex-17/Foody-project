<?php

     $db_host = 'localhost';
     $db_server = 'root';
     $db_password = '';
     $db_data = 'foody';

     $conn = false;
     $mysqli = '';
     $result = [];

     function connect()
    {
        if (!$conn) {
           

        } else {
            # code...
        }
        
        
    }

     function insert($table, $para=[]){

       if ($this->table_exist($table)) {
            $tble_key = implode(",",array_keys($para));
            $table_vale = implode("','",$para);
            $sql = "INSERT INTO `$table`($tble_key) VALUES('$table_vale')";
            $sql_result = $this->mysqli->query($sql);

            if ($sql_result) {
                array_push($this->result,$this->mysqli->insert_id);
                return true;
            } else {
                array_push($this->result,"insert ".$this->mysqli->error);
                return false;
            }
       } else {
        array_push($this->result,$table.'does \'t exist');
       }
        
    }

     function login($table,$username,$password){
        
    }

     function table_exist($tb){
        // echo 'ok';
        $sql = "SHOW TABLES FROM $this->db_data LIKE '$tb'";
        $sql_result = $this->mysqli->query($sql);
        if ($sql_result) {
            if ($sql_result->num_rows == 1) {
                return true;
            } else {
                return false;
            }
            
        } else{
            array_push($this->result,"table exist".$this->mysqli->error);
        }
        
      
    }

     function get_result(){
        $val = $this->result;
        $this->result = [];
        return $val;
    }

     function destroy()
    {
        if ($this->conn) {
            $this->mysqli->close();
            $this->conn=false;
            return true;
        } else {
            return false;
        }
        
    }

?>