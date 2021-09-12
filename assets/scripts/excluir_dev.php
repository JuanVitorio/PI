<?php
    include("config.php");
    include("verifica_login.php");

    $codigo = $_SESSION['codigo'];

    if($deletar = $conexao->query("delete from tb_desenvolvedoras where dev_cod_dev = '$codigo'")){

        header("Location: cad_dev.php");
    }

    else{
        echo "Não foi possível excluir seu usuário!";
    }
?>