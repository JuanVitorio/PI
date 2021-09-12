<?php
include("config.php");
include("verifica_login.php");

$codigo = $_SESSION['codigo'];

$consulta3 = $conexao->query("select * from tb_empresas join tb_paisessede on emp_pai_codigopais = pai_codigopais where emp_codigoempresa = '$codigo'");
$resultado3 = $consulta3->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="../img/logo/LogoDefinitivaPI2.png" />
  <title>Femina Tech</title>
  <link rel="stylesheet" href="../css/style_perfil.css" />
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

    <div class="bt1">
      <button id="btlogout" ><a href="sair.php">LOGOUT</a></button>
    </div>
  </header>

  <div class="perfil">
    <div class="decima">
      <div class="menu">
        <button class="dropbtn">MENU</button>
        <div class="dropdown-content">
          <a href="empresa.php">EMPRESAS</a>
          <a href="dev.php">DESENVOLVEDORAS</a>
          <a href="edit_emp.php">EDITAR PERFIL</a>
          <a href="excluir_emp.php" onclick="return confirm('Tem certeza?')">EXCLUIR PERFIL</a>
        </div>
      </div>
      <h1 class="nome"><?php echo $resultado3['emp_nome']; ?></h1>
      <p class="funcao">Empresa</p>
    </div>
    <img
      class="iconeperfil"
      src="../img/imgbody/perfil2.png"
      alt=" Fundo circular de cor cinza com a silheuta de humana em cor branca."
    />
    <div class="info">
      
      <p>Email: <?php echo $resultado3['emp_email']?> </p>
      <p>CNPJ: <?php echo $resultado3['emp_cnpj']?> </p>
      <p>Área de atuação: <?php echo $resultado3['emp_are_atuacao']?> </p>
      <p>Plataforma de apresentação: <a href="<?php echo $resultado3['emp_plataforma_apresentacao']?>" target="_blank"><?php echo $resultado3['emp_nome']?></a> </p>
      <p>País sede: <?php echo $resultado3['pai_paissede']?> </p>
       
    </div>
  </div>

</body>