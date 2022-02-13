<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      a{
        display: none;
      }
    </style>
  </head>
  
  <?php
      
      function debug_to_console($data)
      {
          $output = $data;
          if (is_array($output)) {
              $output = implode(',', $output);
          }
    
          echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
      };

    
      // ECHO serve para printar algo na tela
      // echo "Hello World 2";

      // 1.Variaveis
      $nome = "Guilherme";
      // 2.Variaveis de variaveis
      $$nome = "Carlos";
      // 2.1 Script dentro de variável
      $script = '<script>alert("óla");</script>';
      // echo $script;
      // 3. If statement
      // if ($Guilherme === "Carlos") {
      //     debug_to_console("carlos");
      // };
      // 4. LAÇO DE REPETIÇÃO
      $num = 0;
      while ($num <= 10) {
          echo $num;
          $num++;
      }

      // PRINT_R => Imprime informação sobre uma variável de forma legível
      // print_r($_POST)

      // ISSET => FUNÇÃO DATICA PARA VERIFICAR SE EXISTE DETERMINADA VARIAVEL
      // if (isset($_POST['acao'])) {
      //     echo $_POST['nome'];
      // };

      // CRIANDO NOVO ARQUIVO
      // if (isset($_POST['acao'])) {
      //     $nome = $_POST['nome'];
      //     $conteudo = $_POST['conteudo'];

      //     file_put_contents(
      //         $nome.'.html',
      //         '<h1>'.$nome.'</h1>
      //         <p>'.$conteudo.'</p>'
      //     );
      //     echo "Conteúdo criado com sucesso";
      // };

      // PEGANDO/LENDO ARQUIVO
      // if (isset($_POST['acao'])) {
      //     if (file_exists($_POST['nome'])) {
      //         echo file_get_contents($_POST['nome']);
      //     } else {
      //         echo "Arquivo não existe";
      //     }
      // }

    ?>

  <body>
    <!-- CRIA ARQUIVO NOVO -->
    <!-- <form method="post">
      <input type="text" placeholder="Digite seu nome" name="nome">
      <textarea name="conteudo" placeholder="Digite o conteúdo do arquivo"></textarea>
      <button type="submit" name="acao">
        Enviar Uuário
      </button>
    </form> -->

    <!-- VERIFICA E LÊ ARQUIVO EXISENTE -->
      <form method="post">
      <input type="text" placeholder="Digite nome do arquivo que deseja ler" name="nome">
      <button type="submit" name="acao">
        Enviar Uuário
      </button>
      </form>

  </body>
</html>