<?php 
// Dados da conexão com o banco de dados
define('SERVER', 'localhost');
define('DBNAME', 'mydb');
define('USER', 'root');
define('PASSWORD', '');

// Recebe os parâmetros enviados via GET
$acao = (isset($_POST['acao'])) ? $_POST['acao'] : '';
$parametro = (isset($_POST['parametro'])) ? $_POST['parametro'] : '';

// Configura uma conexão com o banco de dados
$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
$conexao = new PDO("mysql:host=".SERVER."; dbname=".DBNAME, USER, PASSWORD, $opcoes);

// Verifica se foi solicitado uma consulta para o autocomplete
if($acao == 'autocomplete'):
	$where = (!empty($parametro)) ? ' name LIKE ? LIMIT 0,10000' : '';
	$sql = "Select name, icon from categories UNION ALL SELECT name, 'fa fa-building' as icon from companies UNION ALL Select name, icon from subcategories";

	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, '%'.$parametro.'%');
	$stm->execute();
	$result = $stm->fetchAll(PDO::FETCH_ASSOC);
	$dados = ['Categoria'	=>	array(),'Subcategoria'	=>	Array(),'Compania'	=>	Array()];

	for ($i=0; $i < count($result); $i++) { 
		$result[$i]['icon'] = "<i class='".$result[$i]['icon']."'></i>";
	}
	$json = json_encode($result);
	echo $json;
endif;

if($acao == 'location'):
	$where = (!empty($parametro)) ? ' nome LIKE ? LIMIT 0,10000' : '';
	$sql = "Select nome as name, uf as description from cities
		WHERE EXISTS (SELECT province from companies where cities.uf = companies.province)";

	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, '%'.$parametro.'%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);
	echo $json;
endif;

if($acao == 'a'):
	$where = (!empty($parametro)) ? 'WHERE nome LIKE ?' : '';
	$sql = "Select nome,id,uf from cities " . $where;

	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, '%'.$parametro.'%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);
	echo $json;
endif;

// Verifica se foi solicitado uma consulta para preencher os campos do formulário
if($acao == 'consulta'):
	$sql = "SELECT * FROM categories ";
	$sql .= "WHERE titulo LIKE ? LIMIT 1";

	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, $parametro.'%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);
	echo $json;
endif;