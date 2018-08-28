<?php

require_once '_HELPER.php';
global $db, $gh;

class MysqliDB
{
    protected $_mysqli;

    public function __construct($host, $username, $password, $db, $port = NULL){
        if($port == NULL)
            $port = ini_get('mysqli.default_port');
        
        $this->_mysqli = new mysqli($host, $username, $password, $db, $port)
            or die('There was a problem connecting to the database');

        $this->_mysqli->set_charset('utf8');
    }

    public function __destruct() { 
        $this->_mysqli->close();
    }

    public function execute($query){
   
        global $db, $gh, $outputjson;
        $result = array();
        $stmt = $this->_mysqli->prepare($query);
        if ($stmt) {
            $stmt->execute();
            $meta = $stmt->result_metadata(); 
            while ($field = $meta->fetch_field()) 
            { 
                $params[] = &$row[$field->name]; 
            } 

            call_user_func_array(array($stmt, 'bind_result'), $params); 

            while ($stmt->fetch()) { 
                foreach($row as $key => $val) 
                { 
                    $c[$key] = $val; 
                } 
                $result[] = $c; 
            } 
        
            $stmt->close();
        }
        else{
            trigger_error("Problem preparing query ($query) " 
                . $this->_mysqli->error , E_USER_ERROR);
        }
        return $result;
    }


    public function selectQuery($query){

        global $db, $gh;

        $array = array();
        $result = $this->execute($query);
        $array = $result;
        return $array;    
    }

    public function select($columns, $table, $where) {
        $query = " SELECT ".$columns." FROM ".$table." WHERE ".$where."";
        return $this->selectQuery($query);
    }

    public function insert($table, $tableData){
        
        global $db, $gh, $outputjson;

        $columns = "";
        $values = "";

        foreach ($tableData as $column => $value) {
        
            $columns .= ($columns == "") ? "" : ", ";
            $columns .= $column;
            $values .= ($values == "") ? "" : ", ";
            $values .= "'".$this->_mysqli->real_escape_string($value)."'";
        }

        $query = "insert IGNORE into $table ($columns) values ($values)";


        $result = $this->_mysqli->query($query);
        $cnt = $this->_mysqli->insert_id;
        return $cnt;
    }
     public function delete($table, $whereData){

        global $db, $gh, $outputjson;

        if(is_array($whereData)){
            $where = "1=1";
            foreach ($whereData as $column => $value) {
                $where .= " AND `$column`='".$this->_mysqli->real_escape_string($value)."'";
            }
        }else{
            $where = $whereData;
        }
        
        $query = "DELETE FROM ".$table." WHERE ".$where;
        
        $result = $this->_mysqli->query($query);


        return $result;
    }

    public function update($table, $tableData, $whereData){

        global $db, $gh, $outputjson;

        $columns_values = "";

        foreach ($tableData as $column => $value) {
            $columns_values .= ($columns_values == "") ? "" : ", ";
            if($this->isMySqlFunction($value)) {
                 $columns_values .= "`$column`=$value";
            }
            else {
                $columns_values .= "`$column`='".$this->_mysqli->real_escape_string($value)."'";
            }
        }

        $where = "";
        if(is_array($whereData)){
            $where = "1=1";
            foreach ($whereData as $column => $value) {
                $where .= " AND `$column`='".$this->_mysqli->real_escape_string($value)."'";
            }
        }else{
            $where = $whereData;
        }

        $query = "UPDATE $table SET ".$columns_values." WHERE ".$where;

       

        $result = $this->_mysqli->query($query);
        $cnt = -1;
        if($result == true || $result > 0){
            $cnt = $this->_mysqli->affected_rows;  
        }
        return $cnt;
    }
     public function isMySqlFunction($value){
        $pos = strpos($value, "TIMESTAMPDIFF(");
        return isset($pos) && $pos > -1;
    }
} 
