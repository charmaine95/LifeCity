<?php

class User {  
	private $db;
    private $table = "neighbor";
    private $table_user = "user";

     public function __construct(PDOdb $db){
            $this->db = $db; 
     }

      public function insert(array $values){
            $result = $this->db->insert($this->table,$values);
            return $result;
     }

    
     public function show(){
            $result = $this->db->show($this->table);
            return $result; 
     }
       public function search_name(array $values){ 
        $result = $this->db->search_name($this->table_user,$values);  
        

        return $result;
    }
     public function update(array $cols,array $values,$flag){
           $result = $this->db->update($this->table,$cols,$values,$flag);
     }
     public function search($search){
            $result = $this->db->search($this->table_user,$search);
            return $result;
     }

}