<?php

  include ("config.php");
  include ("verifica_login.php");

  $codigo = $_SESSION['codigo'];

  if(isset($_POST['nome'])){

    extract($_POST);
    
    if($consulta = $conexao->query("UPDATE tb_desenvolvedoras SET dev_nome = '$nome', dev_cpf= '$cpf', dev_email= '$email', dev_datnasc = '$data', dev_senha = '$senha', dev_nac_codigonacionalidade = '$nacionalidade', dev_idioma = '$idioma', dev_formacaoacademica = '$formacao', dev_areaatuacao = '$area', dev_condicaoespecial = '$condicoes' WHERE dev_cod_dev = $codigo")){

       $linguagem = $conexao->query("DELETE from tb_linguagem_das_desenvolvedoras  where lin_dev_cod_dev = '$codigo'");
       $checkbox = $_POST['linguagens'];

        foreach($checkbox as $_valor) {
          
          if($linguagem = $conexao->query("INSERT into tb_linguagem_das_desenvolvedoras (lin_dev_cod_dev, lin_lig_codigolinguagem) values ('$codigo','$_valor')")){
           
            header("Location: p_dev.php");

          }
	    }
    }
    else {
      echo "Não foi possível alterar!";
    }
  }

  $consulta2 = $conexao->query("select *, date_format(dev_datnasc,'%d/%m/%Y') as data from tb_desenvolvedoras join tb_nacionalidades on dev_nac_codigonacionalidade join tb_linguagem_das_desenvolvedoras on lin_dev_cod_dev = dev_cod_dev where dev_cod_dev = '$codigo'");
  $resultado = $consulta2->fetch_assoc();

  $consulta3 = $conexao->query("select * from tb_linguagem_programacao");
  $consulta4 = $conexao->query("select * from tb_nacionalidades");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="../img/logo/LogoDefinitivaPI2.png" />
  <title>Femina Tech</title>
  <link rel="stylesheet" href="../css/style_editdev.css" />
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
      <img
      class="iconeperfil"
      src="../img/imgbody/perfil1.png"
      alt=" Fundo circular de cor cinza com a silheuta de humana em cor branca."
    />
    </div>

    <form action="?" method = "POST">
      <div class="nome">
        <input type="text" name="nome" value = "<?php echo $resultado['dev_nome']; ?>"/>
      </div>
      <div class="cad1">
          <label>Data de Nascimento </label>
          <input type="date" name="data" value = "<?php echo $resultado['dev_datnasc']; ?>"required/>
        </div>

        <div class="cad2">
          <label for="email">Email</label>
          <input type="email" name="email" value = "<?php echo $resultado['dev_email']; ?>" required/>
        </div>

        <div class="cad3">
          <label for="senha"><b>Senha</b></label>
          <input type="password"  name="senha" value = "<?php echo $resultado['dev_senha']; ?>"required/>
        </div>

        <div class="cad4">
            <label for="nacionalidade">Nacionalidade</label>
              <select name="nacionalidade" id="nacionalidade">
                  <?php while ($resultado4 = $consulta4->fetch_assoc()){ ?>
                  <option value="<?php echo $resultado4['nac_codigonacionalidade']?>" <?php if($resultado4['nac_codigonacionalidade'] == $resultado['dev_nac_codigonacionalidade'] ) echo "selected";?>> <?php echo $resultado4['nac_nacionalidade'];?> </option>
                  <?php }?>
              </select>
        </div>

        <div class="cad5">
          <label>CPF</label>
          <input type="text" name="cpf" value ="<?php echo $resultado['dev_cpf'];?>" required/>
        </div>

        <div class="cad6">
          <label>Idioma(s) em que é fluente</label>
          <input type="text" name="idioma" value = "<?php echo $resultado['dev_idioma']; ?>" required/>
        </div>

        <div class="cad7">
          <label>Formação Acadêmica</label>
          <input type="text" name="formacao" value = "<?php echo $resultado['dev_formacaoacademica']; ?>"/>
        </div>

        <div class="cad8">
          <label>Área de atuação</label>
          <input type="text" name="area" value = "<?php echo $resultado['dev_areaatuacao']; ?>" required/>
        </div>

        <div class="cad9">
          <label>Condições especiais</label>
          <input type="text" name="condicoes" value = "<?php echo $resultado['dev_condicaoespecial']; ?>"/>
        </div>

        <div class="cad10" >
        <label>Linguagens que utiliza</label><br>
            <?php while ($resultado3 = $consulta3->fetch_assoc()){?>
            <label for="<?php echo $resultado3['lig_codigolinguagem'];?>"><input type="checkbox" name="linguagens[]" value="<?php echo $resultado3['lig_codigolinguagem'];?>"/><?php echo $resultado3['lig_linguagemprogramacao'];?></label>
            <?php }?>
        </div>
    
              <button  class="bt1"><a href='p_dev.php'>Cancelar</a></button>
              <button type="submit" class="bt2">Salvar</button> 
 </form>
   </div>
 

</body>