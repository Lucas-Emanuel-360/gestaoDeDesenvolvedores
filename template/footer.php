<footer>
    <ul class="fa-ul">
        <li><span class="fa-li"><a href='credenciamento.php'><i class="fa-solid fa-pen"></i></span>Credenciamento novo</a>&nbsp;&nbsp;&nbsp;&nbsp;</li>
        <br>
        <li><span class="fa-li"><a href='listagem.php'><i class="fa-solid fa-list"></i></span>Listagem</a></li>
        <br>
        <li><span class="fa-li"><a href='index.php'><i class="fa-solid fa-house"></i></span>Voltar para o início</a></li>
    </ul>
    <p class='left'><i class="fa-solid fa-chevron-left"></i> Menu</p>
    <p class='right'><i class="fa-solid fa-chevron-right"></i> Menu</p>
</footer>

<head>
    <style>
        .left{
            display: var(--display-left);
        }
        .right{
            display: var(--display-right);
        }
        footer{
            --display-left: block;
            --display-right: none;
            position: fixed;
            right: -260px;
            bottom: 0px;
            transition-duration: 0.6s;
        }
        footer:hover{
            --display-left: none;
            --display-right: block;
            right: 0px;
            transition-duration: 0.3s;
        }
    </style>
</head>