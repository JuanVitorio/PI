<?php
  include("config.php");

  $consulta = $conexao->query("select * from tb_paisessede");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../img/logo/LogoDefinitivaPI2.png" />
    <title>Cadastro Empresarial: Femina Tech</title>
    <link rel="stylesheet" href="../css/style_emp.css" />
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
      <form action="processa_emp.php" method="POST">
      <div class="cad">
        <h1 style="text-align:center">Seu Cadastro</h1>
        <hr>
     <div class='icone'>
        <img class="img" src="../img/img_cadastro/user-female.png" alt="Icone de uma mulher"/>
     </div> 

     <div class="cad1">
     <label for="nome"><b>Nome da Empresa</b> </label>
      <input type="text" placeholder="Digite o nome" name="nome" autofocus/>
    </div>

    <div class="cad6">
      <label for="email"><b>E-mail</b> </label>
      <input type="email" placeholder="Email" name="email" required/>
    </div>

    <div>
      <label for="senha"><b>Senha</b> </label>
       <input type="password" placeholder="Digite a senha" name="senha" required/>
     </div>

      <div class="cad2">
      <label for="cnpj"><b>CNPJ</b> </label>
          <input type="text" placeholder="Digite o CNPJ" name="cnpj" required/>
       </div> 

      <div class="cad3">
          <label for="plataforma"><b>Plataforma de apresentação (link)</b> </label>
          <input type="text" placeholder="Digite a plataforma" name="plataforma"/>
      </div>

        <div class="cad4">
          <label for="areas"><b>Áreas que abordam</b> </label>
          <input type="text" placeholder="Digite as áreas" name="ares" required/>
        </div>

        <div class="cad5">
          <label for="paissede"><b>País sede da empresa</b></label>
            <select name="paissede" id="paissede">
            <?php while($resultado = $consulta->fetch_assoc()){?>
              <option value="<?php echo $resultado['pai_codigopais'];?>"><?php echo $resultado['pai_paissede'];?></option>
            <?php }?>
            </select>
      </div>

        <div>
          <button  class="botao1"><a href='../index.html'>Cancelar</a></button>
          <button type="submit" class="botao2">Pronto</button>
       </div> 
      </div>
      </form>
      </div>
    </body>
    </html>