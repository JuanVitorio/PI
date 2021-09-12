<?php 
    include("config.php");
    session_start();
    if(isset($_POST['usuario'])){

        extract($_POST);
        $senha=md5($senha);
        $consulta = $conexao->query("select * from tb_desenvolvedoras where dev_email = '$usuario' and dev_senha = '$senha'");
        $consulta2 = $conexao->query("select * from tb_empresas where emp_email = '$usuario' and emp_senha = '$senha'");

        if($resultado = $consulta->fetch_assoc()){
         
         $_SESSION['usuario'] = $resultado['dev_email'];
         $_SESSION['nome'] = $resultado['dev_nome'];
         $_SESSION['codigo'] = $resultado['dev_cod_dev'];
         header('Location: p_dev.php');
        }
        
        elseif($resultado2 = $consulta2->fetch_assoc()){

         $_SESSION['usuario'] = $resultado2['emp_email'];
         $_SESSION['nome'] = $resultado2['emp_nome'];
         $_SESSION['codigo'] = $resultado2['emp_codigoempresa'];
         header('Location: p_emp.php');
        }

        else{
            echo " nada";
        }

         
     
}
?>