<?php
    include("config.php");
    include("verifica_login.php");

    $codigo = $_SESSION['codigo'];

    if($deletar = $conexao->query("delete from tb_empresas where emp_codigoempresa = '$codigo'")){

        header("Location: cad_emp.php");
    }

    else{
        echo "Não foi possível excluir seu usuário!";
    }
?>