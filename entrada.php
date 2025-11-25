<?php
// =========================================
// PROCESSAMENTO DO FORMULÁRIO DE CÁLCULO
// =========================================
$resultado = "";
$milhasInformadas = "";
$companhiaEscolhida = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["milhas"])) {

    $milhas = floatval($_POST["milhas"]);
    $companhia = $_POST["escolha"];

    $milhasInformadas = $milhas;
    $companhiaEscolhida = $companhia;

    // Valores fictícios por companhia
    $valorMilhaTabela = [
        "gol"   => 2.0,
        "latam" => 1.8,
        "azul"  => 2.2,
        "cvc"   => 1.6
    ];

    if (isset($valorMilhaTabela[$companhia])) {
        $valorMilha = $valorMilhaTabela[$companhia];
    } else {
        $valorMilha = 1.8;
    }

    // Cotação fixa apenas como exemplo
    $dolar = 5.50;

    // Cálculo
    $resultado = number_format(($milhas * $dolar) / $valorMilha, 2, ",", ".");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas milhas.com</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <h1>Minhas milhas.com <img src="aviao_img.png" alt=""></h1>
    <nav>
       
        <a  href="#circuloint03">O que são Pontos</a>
        <a href="#apoio"><button>Empresas que apoiam</button></a>
    </nav>
      <br><br>
    <div class="echo">
     
    <div class="echo">
        <?php
        // Verificar se nome e senha existem antes de usar
        $nome = $_REQUEST["nome"] ?? null;
        $senha = $_REQUEST["senha"] ?? null;

        if ($nome && $senha === "12345") {
            echo "<p>Olá, Seja bem-vindo $nome!</p>";
        } elseif ($nome) {
            echo "Usuário não encontrado!";
        }
        ?>
    </div>

    </header>
</form>
<section class="planofundo">
<br><br><br>

<section id="areacalculo">
    <div class="circulocalculo"></div>

    <form action="" method="POST" class="areacalculo">

        <h2>Calcule aqui as suas <ins>MILHAS</ins></h2>
        <br>

        <select name="escolha" required>
            <option value="">Escolha a Companhia</option>
            <option value="gol"   <?= $companhiaEscolhida=="gol"?"selected":"" ?>>GOL</option>
            <option value="latam" <?= $companhiaEscolhida=="latam"?"selected":"" ?>>LATAM</option>
            <option value="azul"  <?= $companhiaEscolhida=="azul"?"selected":"" ?>>AZUL</option>
            <option value="cvc"   <?= $companhiaEscolhida=="cvc"?"selected":"" ?>>CVC</option>
        </select>

        <br><br>

        <label for="milhas">Informe suas Milhas:</label><br>
        <input type="number" required step="0.001" name="milhas" id="milhas" value="<?= $milhasInformadas ?>">
        <br><br>

        <button type="reset">Limpar</button>
        &nbsp;&nbsp;&nbsp;
        <button type="submit">Calcular</button>

        <!-- EXIBE RESULTADO NA MESMA PÁGINA -->
        <p id="exp">
            <br>
            <?php if ($resultado !== ""): ?>
                <em>SUAS MILHAS EQUIVALEM A:<br><br><br> <span id="inf">  R$ <?= $resultado ?></span></em>
            <?php endif; ?>
        </p>

    </form>
</section>



<br><br><br>




    <section class="mais">
        <!-- style="background-image: url(nuvens-brancas-em-um-ceu-azul.jpg); background-size: 100%; -->
         <h3 id="apoio">APOIO:</h3>
        <div class="topicos">
            <div id="circuloint"></div>


                <img style="width: 10%; height: 10%; box-shadow: none;margin-top: 4%;" src="lgogGOL02.png" alt="">
                <img style="width: 25%; height: 10%; box-shadow: none;" src="logoLATAM02.png" alt="">
                <img style="width: 25%; box-shadow: none;" src="logoAZUL02.png" alt="">
                <img style="width: 20%; height: 25%; box-shadow: none;z-index: 2;" src="logoCVC02.png" alt="">


        </div>
        <div class="topicos" style="padding: 4.5%;">
            <div id="circuloint02"></div>
            <p><span style="font-size: 3vh; color: #021E73;text-decoration: underline; margin-left: -15vh;">O que são os pontos das <br> companhias aéreas?</span></p>
                <p><span style="color: #b77d01;">Pontos de companhias aéreas</span> são um tipo de recompensa de programas de fidelidade que podem <br>ser trocados por passagens aéreas, upgrades de classe, hospedagem, aluguel de carros, produtos e outros benefícios.</p>
        </div>
        <div class="topicos" style="padding: 4.5%;" >
            <div id="circuloint03"></div>
            <p><span style="font-size: 3vh; color: #021E73;text-decoration: underline; margin-left: -15vh; ">Quanto equivale uma Milha <br> em relação a KM?</span></p>
            <p><span style="color: #b77d01;">Uma milha terrestre</span> equivale a aproximadamente 1,609344 quilômetros (km).<br>
               Para fins práticos e cálculos rápidos, é comum arredondar este valor para 1,6 km.</p>
            <br>

        </div>
        <img id="atr42AZUL" src="atr42AZUL.png" alt="">
        <br><br><br>
        </section>

    </section>

</body>
<footer>
    <br><br><br>
    <!-- <img class="brb" src="aviaofrente-removebg-preview.png" alt="">
    <img class="brb2" src="testepilot.png" alt="">  Empresas que fornecem Pontos #b70138 -->
   <p><sup>&copy;</sup> Matheus Azevedo & Rafael Machado </p>
   
</footer>
</html>
