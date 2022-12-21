<?php
    require_once 'class/rb-mysql.php';
$conn = R::setup( 'mysql:host=localhost;dbname=sistema_gestao', 'root', 'aluno');
   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href="css/style.css">
    <script src="https://kit.fontawesome.com/cc9f72a45c.js" crossorigin="anonymous"></script>
    <title>Gestão de desenvolvedores e respectivas tarefas em projetos</title>
</head>
<body>
<header><p style="text-align: center;opacity:75%;font-size:10pt;">&copy; Clara Ribeiro e Lucas Emanuel ~ 2022</p><h1 style='text-align:center;'>Sobre</h1></header>

    <p>Clara Gonçalves Ribeiro <a href='https://github.com/AbokadoWell' target="_blank"><i class="fa-brands fa-github"></i></a></p>
    <p>Lucas Emanuel Rodrigues Silva Maia <a href='https://github.com/Lucas-Emanuel-360' target="_blank"><i class="fa-brands fa-github"></i></a></p>

<?php
    require_once 'template/menu.php';
  
    R::close();
?>
</body>
</html>