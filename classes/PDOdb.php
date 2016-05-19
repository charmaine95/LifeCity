<?php
require_once('ICRUD.php');
class PDOdb implements ICRUD {
    private $dbh;
    private $sql;
    
    public function __construct($dsn, $user, $password){
        try{
             $this->dbh = new PDO($dsn,$user,$password);  
      }  
      catch(PDOException $e)
      {
             echo "Failed to connect. ".$e->getMessage();
      }

  }

  public function getDB(){
    return $this->dbh;
  }

  public function update($table, array $cols, array $values, $flag){
         $sql = "UPDATE ".$table." SET ";
         
         $valuesArray = array();
         $numCols = count($cols);
         $numVals = count($values);

         $count = 1;
         //parse the set updates
         foreach($cols as $key=>$value){
              $sql .= $key." = ?";
              $valuesArray[] = $value;
              if($count <= $numCols-1)
                  $sql .= ", ";

              $count++;  
         }         

         unset($count);

         $sql .= " WHERE ";

         $count = 1;
         foreach($values as $key=>$value){
             $sql .= $key." = ?";
             $valuesArray[] = $value;
             if($count == $numVals-1){
                 if($flag == 1)
                     $sql .= " OR ";
                 elseif ($flag == 2)
                     $sql .= " AND ";
             }

             $count++;       
         }

         $sql .= ";";
         
         // echo $sql;
         //var_dump($valuesArray);

         $statement = $this->dbh->prepare($sql);
         $statement->execute($valuesArray);

         $result = $statement->rowCount();
         return $result;          
  }



  public function show($table,$order=null){
          $values = array();
          
          if(!$order)
             $sql = "SELECT * FROM ".$table;
          else {
             $values[] = $order; 
             $sql = "SELECT * FROM ".$table." ORDER BY $order ASC";
          }

          //echo $sql;

          $statement = $this->dbh->prepare($sql);

           
          if(!$order) 
             $statement->execute();
          else
             $statement->execute($values);  

           $result = $statement->fetchAll(PDO::FETCH_ASSOC);

           return $result;    
  }

  public function search_name($table_user,array $values){
   //sa searchbox
    $username=$_POST['username'];
    

        $query = "SELECT * FROM user WHERE username = '$username'";  
        $result = $this->dbh->prepare($query);  
        $result ->execute();  

        return $result;
    }

     public function insert($table,array $values){
           $sql = "INSERT INTO ".$table." VALUES (";

           $numElements = count($values);  
           //echo $numElements;

           $count = 1;
           //?,?,?,?,?,?)
           
           while($count <= $numElements){
               $sql .= "?";
               if($count <= ($numElements-1)){
                    $sql .= ", ";
               }
               $count++;  
           }


           $sql .= ");";  
  
            echo $sql;

           $statement = $this->dbh->prepare($sql);
           $statement->execute($values);

           $result = $statement->rowCount();

           return $result;
  }
  public function search($table,$search){
           $sql = "SELECT * FROM ".$table." WHERE ";

           $values = array();

           foreach($search as $key=>$value){
                 $values[] = $value;
                 $sql .= $key."=?;"; 
           }


           $statement = $this->dbh->prepare($sql);
           $statement->execute($values);

           $result = $statement->fetch(PDO::FETCH_ASSOC);

           return $result;
  }


}