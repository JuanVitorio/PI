<?php
include("config.php");
include("verifica_login.php");

$codigo = $_SESSION['codigo'];

$consulta3 = $conexao->query("select *,date_format(dev_datnasc,'%d/%m/%Y') as data2 from tb_desenvolvedoras join tb_nacionalidades on dev_nac_codigonacionalidade = nac_codigonacionalidade join tb_linguagem_das_desenvolvedoras on lin_dev_cod_dev = dev_cod_dev join tb_linguagem_programacao on lin_lig_codigolinguagem = lig_codigolinguagem where dev_cod_dev = '$codigo'");
$resultado3 = $consulta3->fetch_assoc();

$consulta4 = $conexao->query("select * from tb_linguagem_das_desenvolvedoras join tb_linguagem_programacao on lin_lig_codigolinguagem = lig_codigolinguagem where lin_dev_cod_dev = $codigo");

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
          <a href= "empresa.php">EMPRESAS</a>
          <a href="dev.php">DESENVOLVEDORAS</a>
          <a href="edit_dev.php">EDITAR PERFIL</a>
          <a href="excluir_dev.php" onclick="return confirm('Tem certeza?')">EXCLUIR PERFIL</a>
        </div>
      </div>
      <h1 class="nome"> <?php echo $resultado3['dev_nome']?></h1>
      <p class="funcao">Desenvolvedora</p>
    </div>
    <img
      class="iconeperfil"
      src="../img/imgbody/perfil1.png"
      alt=" Fundo circular de cor cinza com a silheuta de humana em cor branca."
    />
    <div class="info">
      <p>Data de nascimento: <?php echo $resultado3['data2']?> </p>
      <p>E-mail: <?php echo $resultado3['dev_email']?> </p>
      <p>Área de atuação: <?php echo $resultado3['dev_areaatuacao']?> </p>
      <p>Idioma(s) que possue conhecimento: <?php echo $resultado3['dev_idioma']?> </p>
      <p>Condições especiais: <?php echo $resultado3['dev_condicaoespecial']?> </p>
      <p>Formação: <?php echo $resultado3['dev_formacaoacademica']?> </p>
      <p>Nacionalidade: <?php echo $resultado3['nac_nacionalidade']?> </p>
      <p>Linguagem(ens) que utiliza: <?php while ($resultado4 = $consulta4->fetch_assoc()){?>
        <?php echo $resultado4['lig_linguagemprogramacao']?></p>
      <?php } ?>

    </div>

  </div>

</body>