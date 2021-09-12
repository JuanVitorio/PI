<?php
  include("config.php");
  include("verifica_login.php");

  $codigo = $_SESSION['codigo'];

  if(isset($_POST['nome'])){

    extract($_POST);
    
    if($consulta3 = $conexao->query("UPDATE tb_empresas SET emp_nome = '$nome', emp_email= '$email', emp_senha= '$senha', emp_cnpj = '$cnpj', emp_plataforma_apresentacao = '$plataforma', emp_are_atuacao = '$ares', emp_pai_codigopais = '$paissede' WHERE emp_codigoempresa = '$codigo'")){
     
      header("Location: p_emp.php");

	    }
    
      else {
        echo "Não foi possível alterar!";
      }
    }

   
  
  $consulta1 = $conexao->query("select * from tb_empresas where emp_codigoempresa = '$codigo'");
  $resultado1 = $consulta1->fetch_assoc();
  $consulta2 = $conexao->query("select * from tb_paisessede");

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="../img/logo/LogoDefinitivaPI2.png" />
  <title>Femina Tech</title>
  <link rel="stylesheet" href="../css/style_editemp.css" />
</head>

<body>
  <header>
    <h1 class="text1">FEMINA</h1>
    <h2 class="text2">TECH</h2>
    <img
      class="logo"
      src="../img/logo/LOGO.png"
      alt=" Fundo circular de cor pêssego com a silheuta de uma mulher, cercada pelo nome Femina Tech"
    />

    <div class="divisao">
      <hr />
    </div>

  </header>
  
  <div class="perfil">
    <div class="decima">
      <p class="funcao">Empresa</p>
    </div>
    <img
      class="iconeperfil"
      src="../img/imgbody/perfil2.png"
      alt=" Fundo circular de cor cinza com a silheuta de humana em cor branca."
    />

    <form action="?" method="POST">
    <div class="nome">
          <input type="text"  name="nome" value="<?php echo $resultado1['emp_nome'];?>" />
     </div>

      <div class="cad1">
        <label for="email"><b>E-mail</b> </label>
        <input type="email"  name="email" value="<?php echo $resultado1['emp_email'];?>" required/>
      </div>
  
      <div class="cad2">
        <label for="senha"><b>Senha</b> </label>
         <input type="password"  name="senha" value="<?php echo $resultado1['emp_senha'];?>"required/>
       </div>
  
        <div class="cad3">
        <label for="cnpj"><b>CNPJ</b> </label>
            <input type="text"  name="cnpj" value="<?php echo $resultado1['emp_cnpj'];?>" required/>
         </div> 
  
        <div class="cad4">
            <label for="plataforma"><b>Plataforma de apresentação (link)</b> </label>
            <input type="text"  name="plataforma" value="<?php echo $resultado1['emp_plataforma_apresentacao'];?>"/>
        </div>
  
          <div class="cad5">
            <label for="areas"><b>Áreas que abordam</b> </label>
            <input type="text"  name="ares" value="<?php echo $resultado1['emp_are_atuacao'];?>" required/>
          </div>
  
          <div class="cad6">
            <label for="paissede"><b>País sede da empresa</b></label>
              <select name="paissede" id="paissede">
                <?php while($resultado2 = $consulta2->fetch_assoc()){?>
                <option value="<?php echo $resultado2['pai_codigopais'];?>" <?php if($resultado2['pai_codigopais'] == $resultado1['emp_pai_codigopais'] ) echo "selected";?>><?php echo $resultado2['pai_paissede'];?></option>
                <?php }?>
              </select>
        </div>
  
            <button  class="bt1"><a href='p_emp.php'>Cancelar</a></button>
            <button type="submit" class="bt2">Salvar</button> 
    
</form>
    
  </div>

</body>