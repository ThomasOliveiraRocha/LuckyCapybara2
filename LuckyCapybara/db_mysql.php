<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?php

function executarSQL($db, $sql){

	try {

		if($db->query($sql)){
			//echo "<h3>SQL: [". $sql ."] realizada com sucesso!</h3>";
		} else {
			//echo "<h3>ERRO na SQL: ". $sql ." </h3>";
		}

	} catch(PDOException $e){
		echo '<h3>EXCEPTION1: ' . $e->getMessage() . '</h3>';
	}
}

function imprimir($db, $tabela){
	$res = $db->query("SELECT * FROM $tabela");
	if($res){
		$res->setFetchMode(PDO::FETCH_OBJ);

		while( $tupla = $res->fetch() ){ //recupera uma linha por vez
			echo '<h3>';
			foreach($tupla as $coluna){
				echo $coluna . ", ";
			}
			echo '</h3><br>';
		}
		echo "<h3>SELECT: Consulta realizada com sucesso!</h3>";
	} else {
		echo "<h3>ERRO6: Erro na consulta.</h3>";
	}
}

function lerArquivoCidades($db, $fp, $fname){
	
	$separador = ',';
	$delimitador = '"'; //aspas duplas

	//Ignora a primeira linha (cabecalho do arquivo)
	if(is_resource($fp))
		$linha = fgetcsv($fp, 0, $separador, $delimitador); //$linha eh um vetor

	//Leh as demais linhas
	$status = true;
	while(!feof($fp)){
		
		//Ler uma linha do arquivo
		$linha = fgetcsv($fp, 0, $separador, $delimitador); //$linha eh um vetor

		if($linha!=NULL){
			//var_dump($linha);
			if($status)
				echo '<div class="selecionado">';
			else
				echo '<div>';

			echo 'Estado: ' . $linha[0] . ' CodigoCidade: ' . $linha[2] . ' Nome: ' . $linha[3];
			
			//Consulta a tabela de 'T_ESTADOS' para buscar o 'id_estado'
			$sql = 'SELECT id FROM T_ESTADOS WHERE sigla=\'' . $linha[0] .'\';';
			//echo $sql;
			//executarSQL($db,$sql);

			$res = $db->query($sql);
			if($res){
				$res->setFetchMode(PDO::FETCH_OBJ);

				while( $tupla = $res->fetch() ){ //recupera uma linha por vez
			
					foreach($tupla as $coluna){
						echo ' ID_Estado: ' . $coluna;
						$id_estado = $coluna;
					}
				}
				echo "<h3>SELECT: Consulta realizada com sucesso!</h3>";
			} else {
				echo "<h3>ERRO6: Erro na consulta.</h3>";
			}

			$status = !$status; //Apenas para exibir no CSS
		
			$nome = $linha[3];
			$codigo_cidade = $linha[2];
			executarSQL($db, 'INSERT INTO T_CIDADES(nome,codigo_cidade,id_estado) VALUES ( "' . 
			$nome . '", "' . 
			$codigo_cidade . '", "' . 
			$id_estado . '");', $status);
			
			echo '</div>';
		}

	}

	echo '<h3>Fim da leitura do arquivo: [' . $fname . ']</h3><br>';
	
}

function lerArquivoEstados($db, $fp, $fname){
	
	$separador = '|';
	$delimitador = '"'; //aspas duplas

	//Ignora a primeira linha (cabecalho do arquivo)
	if(is_resource($fp))
		$linha = fgetcsv($fp, 0, $separador, $delimitador); //$linha eh um vetor

	//Leh as demais linhas
	$status = true;
	while(!feof($fp)){
		
		if($status)
			echo '<div class="selecionado">';
		else
			echo '<div>';

		//Ler uma linha do arquivo
		$linha = fgetcsv($fp, 0, $separador, $delimitador); //$linha eh um vetor

		if($linha!=NULL){
			//var_dump($linha);
			/*echo $linha[0] . ' ' . $linha[1];
			for($i=0;$i<count($linha);$i++){
				$linha[i] = utf8_encode($linha[i]);
				echo '<h3>' . $linha[i] . '</h3><br>';

			}*/
			$status = !$status;

			executarSQL($db, 'INSERT INTO T_ESTADOS(sigla,nome) VALUES ( "' . \ 
			utf8_encode($linha[0]) . '", "' . \
			utf8_encode($linha[1]) . '");', $status);
		
		}
		echo '</div>';
	}

	echo '<h3>Fim da leitura do arquivo: [' . $fname . ']</h3><br>';
	
}

function fecharArquivo($fp,$fname){
	
	echo '<h3>'.var_dump($fp).'</h3><br>';
	fclose($fp);
	echo '<h3>'.var_dump($fp).'</h3><br>';
	if(is_resource($fp)){ //Da documentacao do PHP
		echo '<h3>ERRO: Erro ao fechar o arquivo: [' . $fname . ']</h3><br>';
	} else {
		echo '<h3>Arquivo: [' . $fname . '] fechado com sucesso!</h3><br>';
	}
}

function abrirArquivo($db,$fname){

	$fp = fopen($fname, 'r');
	var_dump($fp);
	if(!$fp){
		echo '<h3>ERRO: Erro na leitura do arquivo: ' . $fname . '</h3><br>';
	} else {
		echo '<h3>Arquivo: [' . $fname . '] aberto com sucesso!</h3><br>';
	}
	return $fp;
}

function limparTabelas($db){

	echo '<div class="selecionado"><h3>TODO12</h3>';
	
	executarSQL($db, "drop table T_CIDADES");
	executarSQL($db, "drop table T_ESTADOS");

	echo '</div>';
}


function definirUTF8($db){
	
	//Gravar com UTF-8
	//echo '<div><h3>TODO3</h3>';
	executarSQL($db, "SET CHARACTER SET utf8");
	executarSQL($db, "SET NAMES utf8"); 
	//echo '</div>';
}

function criarTabelas($db){

	echo '<div class="selecionado">';
	var_dump($db);
	executarSQL($db, "CREATE TABLE T_ESTADOS( 
						id int primary key not null auto_increment, 
						sigla varchar(50) not null, 
						nome varchar(50) not null);");
	executarSQL($db, "CREATE TABLE T_CIDADES( id int primary key not null auto_increment, 
						nome varchar(50) not null, 
						codigo_cidade varchar(50) not null, 
						id_estado int not null, 
						foreign key(id_estado) references T_ESTADOS(id))"); 
	echo '</div>';

}


function main(){
	
	echo '<h3>TODO1</h3>';
	$DATABASE = "mysql";
	$HOST = "localhost";
	$DBNAME = "db_cidades"; //mysql> create database db_cidades;
	$USER = "ubuntu";
	$PASSWORD = "capivaradasorte";
	
	
	try {
		// Exercício 1
		$db = new PDO("$DATABASE: host=$HOST; dbname=$DBNAME", $USER, $PASSWORD); //Para o MySQL
		var_dump($db);
		echo '<div><h1>Conexão com banco dados realizada com sucesso</h1>';
	}
	catch(PDOException $e){
		echo '<h3>EXCEPTION1: ' . $e->getMessage() . '</h3>';
	}
	

	// Exercício 2
	criarTabelas($db);
	echo '<div><h1>Tabelas criadas com sucesso</h1>';

	definirUTF8($db);

	// Exercício 3
	$fname = 'estados.txt';
	$fp = abrirArquivo($db,$fname);
	
	lerArquivoEstados($db,$fp,$fname);
	
	imprimir($db, "T_ESTADOS");
	echo '<div><h1>Dados do arquivo estados.txt para o banco de dados</h1>';

	fecharArquivo($fp,$fname);
		
	// Exercício 4
	$fname = 'municipios.csv';
	$fp = abrirArquivo($db,$fname);

	lerArquivoCidades($db,$fp,$fname);
	
	imprimir($db, "T_CIDADES");
	echo '<div><h1>Dados de municipios.csv copiados com sucesso</h1>';

	fecharArquivo($fp,$fname);

	// limparTabelas($db);

	
	

}

	//Invoca as funcoes
	main();
?>



	
</body>
</html>
	