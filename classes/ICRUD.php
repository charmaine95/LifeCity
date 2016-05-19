<?php 
 

interface ICRUD {
	
	public function show($table);
    public function insert($table,array $values);
    public function update($table, array $cols, array $values, $flag);
}