<?php 
include ("config.php");

if(isset($_POST['nome'])){

	extract($_POST);

    $senha = md5($senha);

	if($resultado3 = $conexao->query("INSERT INTO tb_empresas (emp_nome,emp_cnpj, emp_pai_codigopais,emp_email,emp_plataforma_apresentacao,emp_are_atuacao,emp_senha) VALUES ('$nome','$cnpj','$paissede','$email','$plataforma','$ares','$senha')")){

        header("Location:..//index.html");
}
	else {

		echo "Não foi possível cadastrar!";
	}

}

?>