<?php
include("config.php");
include("verifica_login.php");
$codigo = $_SESSION['codigo'];
$consulta = $conexao->query("select * from tb_desenvolvedoras join tb_nacionalidades on dev_nac_codigonacionalidade = nac_codigonacionalidade where dev_cod_dev<>'$codigo'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../img/logo/LogoDefinitivaPI2.png" />
  <link rel="stylesheet" href="../css/style_info.css">
  <title>Informações-Desenvolvedora</title>
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

<main class = "caixas">
<?php while($resultado = $consulta->fetch_assoc()) { ?>
<div class = "box">
<img src="../img/imgbody/perfil1.png" alt="" width="250" class = "empresa">
<h3 >Nome:<?php echo $resultado['dev_nome']; ?><br></h3>
<h3 >Nacionalidade:<?php echo $resultado['nac_nacionalidade']; ?><br></h3>
<h3 >Email:<?php echo $resultado['dev_email']; ?><br></h3>
<h3 >Idiomas fluente:<?php echo $resultado['dev_idioma']; ?><br></h3>
<h3 >Formação acadêmica:<?php echo $resultado['dev_formacaoacademica']; ?><br></h3>
<h3 >Área de atuação:<?php echo $resultado['dev_areaatuacao']; ?><br></h3>
<h3 >Condições especiais:<?php echo $resultado['dev_condicaoespecial']; ?><br></h3>
<h3>Linguagens utilizadas:<br><?php
$consulta2 = $conexao->query("select * from tb_desenvolvedoras join tb_linguagem_das_desenvolvedoras on lin_dev_cod_dev = dev_cod_dev join tb_linguagem_programacao on lig_codigolinguagem = lin_lig_codigolinguagem join tb_nacionalidades on dev_nac_codigonacionalidade = nac_codigonacionalidade where dev_cod_dev= ".$resultado ['dev_cod_dev']);
while($resultado2 = $consulta2->fetch_assoc()){
  echo $resultado2['lig_linguagemprogramacao'].'<br>';
  
}?>
</h3>
</div>
<?php }?>
</main>

</body>

</html>