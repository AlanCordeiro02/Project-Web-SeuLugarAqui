<?php
include('../model/connection.php');

$requestData= $_REQUEST;

$columns = array(
    0 => 'nome_evento' ,
    1 => 'endereco_evento' ,
    2 => 'telefone_evento' ,
    3 => 'descricao_evento' ,
    4 => 'data_evento' ,
    5 => 'hora_evento' 
);

//Obtendo registros de número total sem qualquer pesquisa
$result_user = "SELECT * FROM evento";
$resultado_user =mysqli_query($conexao, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados
$result_usuarios = "SELECT * FROM evento WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios.=" AND nome_evento LIKE '".$requestData['search']['value']."%' ";    
	$result_usuarios.=" OR endereco_evento LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR telefone_evento LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR descricao_evento LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR data_evento LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR hora_evento LIKE '".$requestData['search']['value']."%' ";
}

$resultado_usuarios=mysqli_query($conexao, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);
//Ordenar o resultado
$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_usuarios=mysqli_query($conexao, $result_usuarios);

// Ler e criar o array de dados
$dados = array();
while( $row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {  
	$dado = array(); 
	$dado[] = $row_usuarios["nome_evento"];
	$dado[] = $row_usuarios["endereco_evento"];
	$dado[] = $row_usuarios["telefone_evento"];	
	$dado[] = $row_usuarios["descricao_evento"];	
	$dado[] = $row_usuarios["data_evento"];	
	$dado[] = $row_usuarios["hora_evento"];	
	$dados[] = $dado;
}


//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json



?>