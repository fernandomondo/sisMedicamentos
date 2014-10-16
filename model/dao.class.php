<?php
	
	abstract class Dao
	{
		private $tableName;
		private $rs=NULL;
		private $rowsSelectaffected;
		
		public function __construct($tableName)
		{
			require_once("connection.class.php");
			$this->tableName = $tableName;
		}
		public function insert($fields, $values)
		{
			//faz a conexão com o BD
			Connection::connect();
			
			//monta o comando INSERT
			$sql = "INSERT INTO $this->tableName ($fields) VALUES
			        ($values)";
			//inserir os dados na tabela
			$result=mysql_query($sql) or die("<h3>Erro não foi possível gravar os dados na tabela de $this->tableName. 
			   Verifique os dados informados!</h3>");
			//busca a quantidade de linhas afetadas pelo comando SQL

			$rows_affected = mysql_affected_rows();
			
			Connection::disconnect();
			
			return $rows_affected;
			
		}
		public function update($fieldsValues, $filter)
		{
			//faz a conexão com o BD
			
			Connection::connect();
			
			$filterOrigin = $filter;
			if ($filter != "")
				$filter = "WHERE $filter";
				
			//monta o comando UPDATE
			$sql = "UPDATE $this->tableName SET $fieldsValues $filter ";
			
			//inserir os dados na tabela
			mysql_query($sql) or die("<h3>Erro não foi possível alterar os dados na tabela de $tableName. 
			Verifique os dados informados!</h3>");
			//busca a quantidade de linhas afetadas pelo comando SQL

			$rows_affected = mysql_affected_rows();			
			
			Connection::disconnect();		
			
			return $rows_affected;
		}
		
		public function delete($filter)
		{
			//abrir conexão
			
			Connection::connect();
			
			if ($filter != "")
				$filter = "WHERE $filter";
		
			//monta o comando DELETE
			$sql="DELETE FROM 
			  $this->tableName $filter";
			  
			mysql_query($sql) or 
			 die("<h3>Não foi possível
			 excluir.
			 Verifique!</h3>");  			
			  
			//verifica se conseguiu 
			//excluir o funcionário
			$rows_affected = mysql_affected_rows();  
				
			Connection::disconnect();
				  
			return $rows_affected; 
		}
		public function find($columns, $filter)
		{
		    //faz a conexão com o BD
			
			Connection::connect();
			
			if ($filter != "")
				$filter = "WHERE $filter";
				
			$sql = "SELECT $columns FROM 
			        $this->tableName  
					 $filter ";	
		 	
			$this->rs=mysql_query($sql) or die("Erro ao consultar");
			$this->rowsSelectaffected = mysql_affected_rows();
			
			Connection::disconnect();
			
			return $this->rowsSelectaffected;			
			
		}
		public function getRecordSet()
		{
			$return = NULL;
			if ($this->rs==NULL)
				return NULL;

				while($row = mysql_fetch_assoc($this->rs))
					 $return[] = $row;
			//}
			if (empty($return))
				return NULL;
			else
				return  $return;
		}
	
	}

?>