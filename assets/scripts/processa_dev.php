<?php 
include ("config.php");

if(isset($_POST['nome'])){

	extract($_POST);
    $senha = md5($senha);
	if($resultado = $conexao->query("INSERT INTO tb_desenvolvedoras (dev_nome,dev_idioma,dev_cpf, dev_nac_codigonacionalidade, dev_datnasc,dev_areaatuacao,dev_condicaoespecial,dev_formacaoacademica,dev_senha,dev_email) VALUES ('$nome','$idioma', '$cpf','$nacionalidade','$data','$area','$condicoes','$formacao','$senha','$email')")){

		$consulta_codigo = $conexao->query("SELECT dev_cod_dev from tb_desenvolvedoras where dev_cpf = '$cpf'");
        $codigo = $consulta_codigo->fetch_assoc();

        $checkbox = $_POST['linguagens'];

        foreach($checkbox as $_valor) {

            $linguagem = $conexao->query("INSERT INTO tb_linguagem_das_desenvolvedoras (lin_dev_cod_dev,lin_lig_codigolinguagem) VALUES ('$codigo[dev_cod_dev]','$_valor')");
  
	    }

        header("Location: ../index.html");

}
	else {

		echo "Não foi possível cadastrar!";
	}
}

?>