<?php
  include("config.php");

  $consulta = $conexao->query("select * from tb_linguagem_programacao");
  $consulta2 = $conexao->query("select * from tb_nacionalidades");
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="../img/logo/LogoDefinitivaPI2.png"/>
    <title>Cadastro Desenvolvedora: Femina Tech</title>
    <link rel="stylesheet" href="../css/style_caddev.css"/>
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

    <div class= "form">
    <form action="processa_dev.php" method="POST">
      <div class="cad">
        <h1 style="text-align:center">Seu Cadastro</h1>
        <hr/>
        <div class='icone'>
          <img class="img" src="../img/img_cadastro/user-female.png" alt="Icone de uma mulher"/>
        </div>
        <div class="cad1">
          <label for="nome"><b>Nome Completo</b> </label>
          <input type="text" placeholder="Digite o nome" name="nome" autofocus/>

          <div class="cad2">
          <label>Data de Nascimento </label>
          <input type="date" name="data" placeholder="Digite a data" required/>
        </div>

        <div class="cad3">
          <label for="email">Email</label>
          <input type="email" name="email" placeholder="Digite o Email" required/>
        </div>
        <div>
          <label for="senha"><b>Senha</b></label>
          <input type="password" placeholder="Digite a senha" name="senha" required/>
        </div>

        <div class="cad4">
          <form>
            <label for="nacionalidade">Nacionalidade</label>
              <select name="nacionalidade" id="nacionalidade">
              <?php while($resultado2 = $consulta2->fetch_assoc()){?>
                <option value="<?php echo $resultado2['nac_codigonacionalidade'];?>"><?php echo $resultado2['nac_nacionalidade'];?></option>
              <?php }?>
              </select>
          </form>
        </div>

        <div class="cad5">
          <label>CPF</label>
          <input type="text" name="cpf" placeholder="Digite o CPF" required/>
        </div>

        <div class="cad6">
          <label>Idioma(s) em que é fluente</label>
          <input type="text" name="idioma" placeholder="Digite o(s) idioma(s)" required/>
        </div>

        <div class="cad7">
          <label>Formação Acadêmica</label>
          <input type="text" name="formacao" placeholder="Digite a formação"/>
        </div>

        <div class="cad8">
          <label>Área de atuação</label>
          <input type="text" name="area" placeholder="Digite a área de atuação" required/>
        </div>

        <div class="cad9">
          <label>Condições especiais</label>
          <input type="text" name="condicoes" placeholder="Digite as condições"/>
        </div>

        <div class="cad10" style="width: 80%;">
          <label>Linguagens que utiliza</label><br>
          <?php while($resultado1 = $consulta->fetch_assoc()){?>
          <label for="<?php echo $resultado1['lig_codigolinguagem'];?>"><input type="checkbox" name="linguagens[]" value="<?php echo $resultado1['lig_codigolinguagem'];?>"/><?php echo $resultado1['lig_linguagemprogramacao'];?></label>
          <?php }?>
        </div>

        <div>
          <button  class="botao1"><a href='..//index.html'>Cancelar</a></button>
          <button type="submit" class="botao2">Pronto</button>
        </div>
      </div>
    </form>
    </div>
  </body>
</html>