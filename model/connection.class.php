<?php
	class Connection
	{
		private static $conn;
		private static $hostName="127.0.0.1";
		private static $dataBaseName="dbmedicamento";
		private static $userName="root";
		private static $password="root";
		
		//método para conectar no bd
		public static function connect()
		{
			self::$conn=mysql_connect(self::$hostName, self::$userName, self::$password);
			
			//verificar se não ocorreu erro na conexão
			if (!self::$conn)
			{
				throw new Exception("Erro ao conectar no Servidor do BD. Verifique com ADM!");
				
			}
			//Tenta fazer a seleção conexão com o BD
			$bd=mysql_select_db(
					self::$dataBaseName,
					self::$conn);
			//verifica se selecionou o banco com sucesso
			if (!$bd)
			{
				throw new Exception("Não foi possível selecionar o BD. Verifique com ADM.");
			}
			
		}
		//encerra a conexão com o servidor de BD
		public static function disconnect()
		{
			mysql_close(self::$conn);
		}
						
	}


?>