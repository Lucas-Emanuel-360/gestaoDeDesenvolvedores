<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<footer>
    <p class='up'><i class="fa-solid fa-chevron-up"></i></p>
    <p class='down'><i class="fa-solid fa-chevron-down"></i></p>
        <ul class="fa-ul">
            <li><span class="fa-li"><a href='../credenciamento.php'><i class="fa-solid fa-pen"></i></span>Credenciamento novo</a></li>
            <br>
            <li><span class="fa-li"><a href='../projeto.php'><i class="fa-solid fa-code"></i></span>Novo projeto</a></li>
            <br>
            <li><span class="fa-li"><a href='../listagem-dev.php'><i class="fa-solid fa-list"></i></span>Listagem dos desenvolvedores</a></li>
            <br>
            <li><span class="fa-li"><a href='../listagem-proj.php'><i class="fa-solid fa-clipboard"></i></span>Listagem dos projetos</a></li>
            <br>
            <li><span class="fa-li"><a href='../sobre.php'><i class="fa-solid fa-info-circle"></i></span>Sobre nós</a></li>
            <br>
            <li><span class="fa-li"><a href='../index.php'><i class="fa-solid fa-house"></i></span>Voltar para o início</a></li>
    </ul>
</footer>


<style>
        .up{
            display: var(--display-up);
        }
        .down{
            display: var(--display-down);
        }
        footer{
            --display-up: block;
            --display-down: none;
            position: fixed;
            bottom: -300px;
            transition-duration: 0.6s;
        }
        footer:hover{
            --display-up: none;
            --display-down: block;
            bottom: 0px;
            transition-duration: 0.3s;
        }
    </style>
</body>
</html>