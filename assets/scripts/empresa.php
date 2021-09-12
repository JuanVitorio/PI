<?php
include("config.php");
$consulta = $conexao->query("select * from tb_empresas join tb_paisessede on emp_pai_codigopais = pai_codigopais ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../img/logo/LogoDefinitivaPI2.png" />
  <link rel="stylesheet" href="../css/style_info.css">
  <title>Informações-Empresa</title>
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
<?php while($resultado = $consulta->fetch_assoc() ) { ?>
<div class = "box">
<img src="../img/imgbody/perfil2.png" alt="" width="250" class = "empresa">
<h3 >Nome:<?php echo $resultado['emp_nome']; ?><br></h3>
<h3 >Email:<?php echo $resultado['emp_email']; ?><br></h3>
<h3 >Plataforma de apresentação:<?php echo $resultado['emp_plataforma_apresentacao']; ?><br></h3>
<h3 >Áreas que abordam:<?php echo $resultado['emp_are_atuacao']; ?><br></h3>
<h3 >País sede da empresa:<?php echo $resultado['pai_paissede']; ?><br></h3>
</div>
<?php } ?>
</main>

</body>
</html>