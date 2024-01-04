<?php

$msgErro = "";
$nomeSalvo = "";
if (isset($_FILES['arquivo']['name']) && $_FILES['arquivo']['error'] == 0){ //VERIFICA SE RECEBEMOS O ARQUIVO E SE NÃO TEVE ERRO.
	
	$extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION); //VERIFICAMOS A EXTENSÃO DO ARQUIVO
	$novoNome = ($_FILES['arquivo']['name']);
	$extensao = strtolower($extensao); //CONVERTE A EXTENSÃO PARA MINUSCULO
 
	if (strstr ( '.jpg;.jpeg;.gif;.png', $extensao )) {
		
		//$novoNome = uniqid(time()).'.'.$extensao; //GERAMOS UM NOME ALEATÓRIO
		$destino = 'imagens/'.$novoNome;
 
		if (@move_uploaded_file($_FILES['arquivo']['tmp_name'], $destino)) {
			$nomeSalvo = $novoNome;
		}else{
			$msgErro = "erro 2: não foi possivel salvar a imagem no caminho, verifique as permissões da pasta!";
		}
		
	}else{
		$msgErro = "erro 3: a imagem enviada não é suportada!";
	}
	
}else{
	$msgErro = "erro 4: não recebemos a imagem, ou deu erro ao receber!";
}


if ($msgErro <> ""){
	echo json_encode(array("success"=>false, "erro"=>$msgErro));
}else{
	echo json_encode(array("success"=>true, "imagem"=>$nomeSalvo));
}

?>



