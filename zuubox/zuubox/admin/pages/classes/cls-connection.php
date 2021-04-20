<?php
session_start(); 
error_reporting(0);

	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'tech599_zenatten');
	define('DB_PASSWORD', 'Dev@123$');
	define('DB_DATABASE', 'tech599_zenattend');
	define('SITEROOT','http://104.37.185.20/~tech599/tech599.com/johnanil/zenattend');
	define('SITEEMAIL','mike111taylor@gmail.com');


abstract class Connection
{
	private $mysql;
	public $row,$result;
	
	public function __construct()
	{
		try
		{
			$this->mysql=mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die('Oops connection error -> ' . mysql_error());
        	mysql_select_db(DB_DATABASE, $this->mysql) or die('Database error -> ' . mysql_error());
		
		}
		catch(Exception $e)
		{
			echo "Error  in connection : ".$e->getMessage();
		}
	}
	
	public function query($sql,$debug=0)
	{
		if($debug==1)
		{
			echo $sql;die;
		}
		
		return $this->result=mysql_query($sql);
	}
	
	public function getRow()
	{
		if($this->row=mysql_fetch_assoc($this->result))
		{
			return $this->row;
		}
		return false;
	}
	
	public function getRecords($table,$fields_string='',$condition='',$order_by='',$limit='',$debug=0)
	{
		if($fields_string=='')
		{
			$fields_string='*';
		}
		$sql="";
		$sql.="select ".$fields_string." from ".$table;
		
		if($condition!="")
		{
			$sql.=" where ".$condition;
		}
		
		if($order_by!="")
		{
			$sql.=" order by ".$order_by;
		}
		
		if($limit!="")
		{
			$sql.=" limit ".$limit;
		}
		$result_array=array();
		$this->result=$this->query($sql,$debug);
		
		while($row=$this->getRow())
		{
			$result_array[]=$row;
		}
		
		if($debug==2)
		{
			echo "<pre>";
				print_r($result_array);
			echo "</pre>";	
			die;
		}
		
		return $result_array;
	}
	
	public function insertRow($table,$insert_data,$debug)
	{
		$value_string='';
		$field_string='';
		$sql='';
		if(count($insert_data)>0)
		{
			foreach($insert_data as $field=>$value)
			{
				if($field_string == "")
				{
					$field_string.="`".$field."`";
				}
				else
				{
					$field_string.=",`".$field."`";
				}
				
				if($value_string == "")
				{
					$value_string.="'".$value."'";
				}
				else
				{
					$value_string.=",'".$value."'";
				}
				}
				
				$sql.="insert into ".$table." (".$field_string.") values(".$value_string.")";
				
				$this->query($sql,$debug);
				return $this->lastInsertId();
		}
	}
	
	public function lastInsertId()
	{
		return mysql_insert_id($this->mysql);
	}
	
	public function updateRow($table,$update_data,$condition='',$debug=0)
	{
		$set_string='';
		$sql='';
		if(count($update_data)>0)
		{
			foreach($update_data as $key=>$value)
			{
				if($set_string=='')
				{
					$set_string.="`".$key."`='".$value."'";
				}
				else
				{
					$set_string.=",`".$key."`='".$value."'";
				}
			}
			
			$sql.="update ".$table." set ".$set_string;
			
			if($condition!="")
			{
				$sql.=" where ".$condition;
			}
			
			$this->query($sql,$debug);
			return 1;
		}
		else 
		{
			return 0;
		}
	}
	
	public function deleteRow($table,$condition='',$debug=0)
	{
		$sql='';
		$sql.="delete from ".$table;
		
		if($condition!="")
		{
			$sql.=" where ".$condition;
		}
		
		return $this->query($sql,$debug);
	}
	
}
?>