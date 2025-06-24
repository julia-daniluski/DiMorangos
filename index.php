<?php
// index.php no topo
$arquivo = 'frutas.json';
$frutas = file_exists($arquivo) ? json_decode(file_get_contents($arquivo), true) : [];

$frutasFrescas = array_filter($frutas, fn($f) => $f['categoria'] === 'fresca');
$frutasCongeladas = array_filter($frutas, fn($f) => $f['categoria'] === 'congelada');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Adicionei o CSS do Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css" /> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link rel="shortcut icon" href="imgs/logoDiMorangos.png" type="image/x-icon"> 
  <title>DiMorangos</title>
</head>
<body>
  <header>
    <div class="logo">
      <img src="imgs/logoDiMorangos.png" alt="Logo Di Morangos">
    </div>
    <div class="search-box"> 
      <input class="search-txt" type="text" placeholder="Faça a sua pesquisa">
      <a class="search-btn" href="#"><i class="fas fa-search"></i></a>
    </div>
    <div class="central-text">
      <h1>COLHIDO COM CARINHO</h1>
      <p>ENTREGUE COM AMOR</p>
    </div>
  </header>

  <nav class="menu">
    <ul>
      <li><a href="#sobre ">Sobre Nós</a></li>
      <li><a href="#frutas-frescas">Frutas Frescas</a></li>
      <li><a href="#frutas-congeladas">Frutas Congeladas</a></li>
      <li><a href="#skills">Receitas</a></li>
      <li><a href="#contact">Contato</a></li>
    </ul>
  </nav>

  <section class="texto1" id="sobre">
    <img class="imagem" src="imgs/image (4).png" alt="Estufa de morangos">
    <p>
      A <strong class="dimor">DiMorangos</strong> é uma empresa dedicada ao cultivo e à distribuição de frutas frescas, com um foco especial em morangos. Com produção própria e compromisso com a qualidade, a empresa oferece frutas selecionadas, saborosas e cultivadas com cuidado desde o plantio até a entrega. Embora os morangos sejam o grande destaque, a DiMorangos também trabalha com uma variedade de outras frutas, atendendo feiras, mercados, comércios locais e consumidores finais. Seu diferencial está na frescura dos produtos, no controle rigoroso de cada etapa do processo e na paixão por levar o melhor do campo à mesa.
    </p>
  </section>

  <section class="frutas-section-fresca" id="frutas-frescas">
    <h2 class="titulo"><span class="destaque">FRUTAS</span><br><span class="secundario">frescas</span></h2>
    <div class="section-content swiper">
      <div class="slider-wrapper">
        <ul class="frutas-list swiper-wrapper">
          <?php foreach ($frutasFrescas as $i => $fruta): ?>
            <li class="frutas swiper-slide">
              <img src="imgs/<?= htmlspecialchars($fruta['imagem']) ?>" alt="<?= htmlspecialchars($fruta['nome']) ?>" class="frutas-image" />
              <h3 class="name"><?= htmlspecialchars($fruta['nome']) ?></h3>
              <button class="botao-saiba btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFrutaFresca<?= $i ?>">Saiba mais</button>
            </li>
          <?php endforeach; ?>
        </ul>
        <div class="swiper-pagination"></div>
        <div class="swiper-slide-button swiper-button-prev"></div>
        <div class="swiper-slide-button swiper-button-next"></div>
      </div>
    </div>
  </section>

  <hr>
  

  <section class="frutas-section-gela" id="frutas-congeladas">
    <h2 class="titulo"><span class="destaque">FRUTAS</span><br><span class="secundario">congeladas</span></h2>
    <div class="section-content swiper">
      <div class="slider-wrapper">
        <ul class="frutas-list swiper-wrapper">
          <?php foreach ($frutasCongeladas as $i => $fruta): ?>
            <li class="frutas swiper-slide">
              <img src="imgs/<?= htmlspecialchars($fruta['imagem']) ?>" alt="<?= htmlspecialchars($fruta['nome']) ?>" class="frutas-image" />
              <h3 class="name"><?= htmlspecialchars($fruta['nome']) ?></h3>
              <button class="botao-saiba btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFrutaCongelada<?= $i ?>">Saiba mais</button>
            </li>
          <?php endforeach; ?>
        </ul>
        <div class="swiper-pagination"></div>
        <div class="swiper-slide-button swiper-button-prev"></div>
        <div class="swiper-slide-button swiper-button-next"></div>
      </div>
    </div>
  </section>

  <!-- Modais para Frutas Frescas -->
  <?php foreach ($frutasFrescas as $i => $fruta): ?>
  <div class="modal fade" id="modalFrutaFresca<?= $i ?>" tabindex="-1" aria-labelledby="modalFrutaFrescaLabel<?= $i ?>" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalFrutaFrescaLabel<?= $i ?>"><?= htmlspecialchars($fruta['nome']) ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <img src="imgs/<?= htmlspecialchars($fruta['imagem']) ?>" alt="<?= htmlspecialchars($fruta['nome']) ?>" class="img-fluid mb-2">
          <p><?= nl2br(htmlspecialchars($fruta['descricao'])) ?></p>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>

  <!-- Modais para Frutas Congeladas -->
  <?php foreach ($frutasCongeladas as $i => $fruta): ?>
  <div class="modal fade" id="modalFrutaCongelada<?= $i ?>" tabindex="-1" aria-labelledby="modalFrutaCongeladaLabel<?= $i ?>" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalFrutaCongeladaLabel<?= $i ?>"><?= htmlspecialchars($fruta['nome']) ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <img src="imgs/<?= htmlspecialchars($fruta['imagem']) ?>" alt="<?= htmlspecialchars($fruta['nome']) ?>" class="img-fluid mb-2">
          <p><?= nl2br(htmlspecialchars($fruta['descricao'])) ?></p>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>

  <!-- Modais para Receitas - Vitamina de Banana com Maçã -->
  <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Vitamina de Banana com Maçã</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <img src="./imgs/vitaminab.png" alt="Vitamina de Banana" class="img-fluid mb-2">
          <h3><span>Ingredientes:</span></h3>
          <ul>
            <li>4 copos de leite</li>
            <li>2 bananas frescas do hortifruti DiMorangos</li>
            <li>2 maçãs frescas do hortifruti DiMorangos</li>
            <li>Açúcar a gosto</li>
          </ul>
          <h3><span>Modo de preparo:</span></h3>
          <ol>
            <li>Descasque as bananas e corte em rodelas.</li>
            <li>Lave bem as maçãs, retire as sementes e corte em pedaços.</li>
            <li>Coloque as frutas no liquidificador junto com o leite e o açúcar.</li>
            <li>Bata tudo até obter uma mistura homogênea.</li>
            <li>Sirva em seguida, bem gelado!</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para Suco de Laranja com Morango -->
  <div class="modal fade" id="modalSuco" tabindex="-1" aria-labelledby="modalSucoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalSucoLabel">Suco de Laranja com Morango</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <img src="./imgs/vitaminalm.png" alt="Suco de Laranja com Morango" class="img-fluid mb-2">
          <h3><span>Ingredientes:</span></h3>
          <ul>
            <li>6 laranjas frescas do hortifruti <span>DiMorangos</span></li>
            <li>6 morangos médios frescos do hortifruti <span>DiMorangos</span></li>
            <li>6 cubos de gelo</li>
            <li>1/2 xícara de açúcar</li>
          </ul>
          <h3><span>Modo de preparo:</span></h3>
          <ol>
            <li>Lavar muito bem e secar as laranjas e os morangos.</li>
            <li>Cortar as laranjas ao meio, retirar as sementes e espremê-las para retirar o suco.</li>
            <li>Bater no liquidificador o suco das laranjas, os morangos, o açúcar e o gelo.</li>
            <li>Sirva bem gelado!</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para Torta de Morango -->
  <div class="modal fade" id="modalTorta" tabindex="-1" aria-labelledby="modalTortaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTortaLabel">Torta de Morango</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <img src="./imgs/torta-de-morango.png" alt="Suco de Laranja com Morango" class="img-fluid mb-2">
          <h3><span>Ingredientes:</span></h3>
          <h3><span>Massa:</span></h3>
          <ul>
            <li>2 xícaras de chá de <span>Farinha de Trigo Tradicional Dona Benta</span></li>
            <li>2 gemas de ovo</li>
            <li>200g de manteiga sem sal, em cubos</li>
            <li>4 colheres de sopa de açúcar</li>
            <li>1 colher de sopa de <span>Fermento em Pó Dona Benta</span></li>
          </ul>
          <h3><span>Recheio:</span></h3>
          <ul>
            <li>350ml de leite</li>
            <li>2 colheres de sopa de amido de milho</li>
            <li>1 gema de ovo</li>
            <li>1 lata (395g) de leite condensado</li>
          </ul>
          <h3><span>Cobertura:</span></h3>
          <ul>
            <li>250ml de água quente</li>
            <li>25g de gelatina em pó sabor morango</li>
            <li>250ml de água fria</li>
            <li>250g de morangos frescos do hortifruti <span>DiMorangos</span>, cortados</li>
          </ul>
          <h3><span>Modo de preparo:</span></h3>
          <br>
          <h3><span>Massa:</span></h3>
          <ol>
            <li>Em uma batedeira, adicione a <span>Farinha de Trigo Dona Benta</span>, as gemas, a manteiga, o açúcar e o <span>Fermento Dona Benta</span>.</li>
            <li>Bata até obter uma massa homogênea.</li>
            <li>Distribua a massa em uma forma de fundo removível e fure-a com um garfo para evitar que infle durante o forno.</li>
            <li>Leve ao forno preaquecido a 180°C por cerca de 15 minutos.</li>
            <li>Retire do forno e deixe esfriar.</li>
          </ol>

          <h3><span>Recheio:</span></h3>  
          <ol>
            <li>Em um copo grande, dissolva bem o amido de milho no leite.</li>
            <li>Transfira para uma panela e adicione o leite condensado e a gema de ovo.</li>
            <li>Leve ao fogo médio, mexendo sempre, até engrossar. Reserve.</li>
          </ol>

          <h3><span>Cobertura:</span></h3>
          <ol>
            <li>Ferva a água quente em uma panela e adicione a gelatina de morango.</li>
            <li>Mexa bem até dissolver completamente e, em seguida, adicione a água fria.</li>
            <li>Reserve a gelatina na geladeira por aproximadamente 2 horas, até começar a ganhar consistência, mas sem endurecer totalmente.</li>
          </ol>

          <h3><span>Montagem:</span></h3>
          <ol>
            <li>Espalhe o recheio sobre a massa já fria.</li>
            <li>Distribua os morangos cortados por cima.</li>
            <li>Cubra com a gelatina de morango, espalhando cuidadosamente.</li>
            <li>Leve à geladeira por pelo menos 3 horas antes de servir.</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para Maçã do Amor -->
  <div class="modal fade" id="modalMacaAmor" tabindex="-1" aria-labelledby="modalMacaAmorLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMacaAmorLabel">Maçã do Amor (Rende 12 porções)</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <img src="./imgs/macaamor.png" alt="Maçã do Amor" class="img-fluid mb-2">
          <h3><span>Ingredientes:</span></h3>
          <ul>
            <li>1 kg de açúcar</li>
            <li>500 ml de água</li>
            <li>1 colher (sopa) de vinagre</li>
            <li>Corante vermelho (pó ou líquido), a gosto</li>
            <li>12 maçãs pequenas ou médias frescas do hortifruti <span>DiMorangos</span></li>
            <li>Palitos de sorvete ou churrasco</li>
          </ul>
          <br>
          <h3><span>Modo de preparo:</span></h3>
          <br>
          <h3><span>Preparando as maçãs:</span></h3>
          <ol>
            <li>Lave bem as maçãs e seque-as completamente.</li>
            <li>Espete cada maçã com 1 ou 2 palitos para garantir firmeza na hora de caramelizar.</li>
            <li>Unte levemente formas de alumínio (pode ser forma de bolo) com um pouco de óleo para evitar que as maçãs grudem depois da calda endurecer.</li>
          </ol>

          <h3><span>Preparando a calda:</span></h3>
          <ol>
            <li>Em uma panela grande, adicione o açúcar, a água, o vinagre e o corante vermelho.</li>
            <p><span>Importante:</span> Não mexa a calda com colher para evitar que ela açucare. Misture apenas balançando levemente a panela de vez em quando.</p>
            <li>Leve ao fogo alto até começar a ferver.</li>
            <li>Quando ferver, reduza para fogo médio e deixe cozinhar por cerca de 25 minutos, até atingir o ponto correto de calda.</li>
          </ol>

          <h3><span>Como saber o ponto da calda:</span></h3>
          <ol>
            <li>Mergulhe a ponta de um palito na calda e pingue uma gota em uma forma com água fria.</li>
            <li>Pressione com o dedo: se a calda estiver firme e fizer barulho de sólida ao tocar na forma, está no ponto ideal.</li>
            <li>Nesse momento, desligue o fogo imediatamente.</li>
          </ol>
          
          <h3><span>Finalização:</span></h3>
          <ol>
            <li>Mergulhe as maçãs, uma a uma, na calda quente, girando para cobrir bem.</li>
            <li>Coloque as maçãs sobre a forma untada e deixe esfriar completamente até a calda endurecer.</li>
          </ol>
          <p> <strong>Dica:</strong> Faça esse processo o mais rápido possível, pois a calda endurece naturalmente conforme esfria.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal para Morangos com Chocolate -->
  <div class="modal fade" id="modalMorangochoco" tabindex="-1" aria-labelledby="modalMorangochocoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMorangochocoLabel">Morangos com Chocolate</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <img src="./imgs/morangochocoo.png" alt="Morango com Chocolate" class="img-fluid mb-2">
          <h3><span>Ingredientes:</span></h3>
          <ul>
            <li>20 morangos grandes e frescos do hortifruti<span>DiMorangos</span></li>
            <li>200g de chocolate meio amargo</li>
          </ul>
          <h3><span>Modo de preparo:</span></h3>
          <ol>
            <li>Lave bem os morangos e seque-os completamente com papel toalha. <span>(Importante: eles devem estar bem secos para o chocolate aderir melhor.)</span></li>
            <li>Derreta o chocolate meio amargo em banho-maria ou no micro-ondas (em intervalos de 30 segundos, mexendo a cada vez até ficar completamente derretido).</li>
            <li>Segure cada morango pela folha ou espete com um palito.</li>
            <li>Mergulhe o morango no chocolate derretido, cobrindo-o até a metade ou até onde preferir.</li>
            <li>Coloque os morangos sobre uma assadeira ou travessa forrada com papel manteiga.</li>
            <li>Leve à geladeira por cerca de 20 minutos ou até o chocolate endurecer.</li>
          </ol>
          <p><strong>Dica:</strong> Se quiser, antes de o chocolate secar, pode passar os morangos em granulado, castanhas trituradas ou confeitos coloridos.</p>
        </div>
      </div>
    </div>
  </div>

    <!-- Modal para Crepioca de Chocolate com Morangos  -->
  <div class="modal fade" id="modalCrepioca" tabindex="-1" aria-labelledby="modalCrepiocaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCrepiocaLabel">Crepioca de Chocolate com Morangos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <img src="./imgs/crepe.png" alt="Crepioca de Chocolate com Morangos" class="img-fluid mb-2">
          <h3><span>Ingredientes:</span></h3>
          <ul>
            <li>1 ovo</li>
            <li>2 colheres (sopa) de tapioca hidratada</li>
            <li>2 colheres (sopa) de leite em pó</li>
            <li>2 colheres (sopa) de chocolate em pó 50% cacau (31,5g)</li>
            <li>3 colheres (sopa) de água morna</li>
            <li>1/2 xícara (chá) de morangos frescos e fatiados do hortifruti <span>DiMorangos</span></li>
          </ul>
          <br>
          <h3><span>Modo de preparo:</span></h3>
          <br>
          <h3><span>Massa:</span></h3>
          <ol>
            <li>Em um recipiente, misture o ovo, a tapioca, o leite em pó, o chocolate e a água morna até formar uma massa homogênea.</li>
            <li>Aqueça uma frigideira média em fogo baixo e unte levemente com azeite.</li>
            <li>Despeje a massa, espalhando bem para cobrir todo o fundo da frigideira.</li>
            <li>Deixe a massa firmar, depois vire para dourar do outro lado. Reserve.</li>
          </ol>

          <h3><span>Creme de Chocolate:</span></h3>
          <ol>
            <li>Em outro recipiente, misture bem todos os ingredientes até obter um creme homogêneo.</li>
          </ol>

          <h3><span>Montagem:</span></h3>
          <ol>
            <li>Distribua os morangos fatiados sobre metade da crepioca.</li>
            <li>Cubra com metade do creme de chocolate.</li>
            <li>Dobre a outra metade da crepioca por cima.</li>
            <li>Finalize cobrindo com o restante do creme.</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  
  </section>

  <section class="skills" id="skills">
    <div class="line"></div>
    <div class="tech">
      <h1 id="name">Receitas</h1>
      <div class="techs">
        <div class="card">
          <p>Vitamina de Banana com Maçã</p>
          <img src="./imgs/vitaminab.png" alt="Vitamina de Banana">
          <button type="button" class="btn btn-primary botao-saiba" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Veja receita completa
          </button>
        </div>
        <div class="card">
          <p>Crepioca de morango</p>
          <img src="./imgs/crepe.png" alt="Crepioca de morango">
          <button type="button" class="btn btn-primary botao-saiba" data-bs-toggle="modal" data-bs-target="#modalCrepioca">
            Veja receita completa
          </button>
        </div>
        <div class="card">
          <p>Torta de morango</p>
          <img src="./imgs/torta-de-morango.png" alt="Torta de morango">
          <button type="button" class="btn btn-primary botao-saiba" data-bs-toggle="modal" data-bs-target="#modalTorta">
            Veja receita completa
          </button>
        </div>
        <div class="card">
          <p>Maçã do amor</p>
          <img src="./imgs/macaamor.png" alt="Maçã do amor">
          <button type="button" class="btn btn-primary botao-saiba" data-bs-toggle="modal" data-bs-target="#modalMacaAmor">
            Veja receita completa
          </button>
        </div>
        <div class="card">
          <p>Morango com chocolate</p>
          <img src="./imgs/morangochocoo.png" alt="Morango com chocolate">
          <button type="button" class="btn btn-primary botao-saiba" data-bs-toggle="modal" data-bs-target="#modalMorangochoco">
            Veja receita completa
          </button>
        </div>
        <div class="card">
          <p>Suco de laranja com morango</p>
          <img src="./imgs/vitaminalm.png" alt="Suco de laranja com morango">
          <button type="button" class="btn btn-primary botao-saiba" data-bs-toggle="modal" data-bs-target="#modalSuco">
            Veja receita completa
          </button>
        </div>
      </div>
    </div>
  </section>

  <section class="contact" id="contact">
    <div class="contact-text">
      <div class="main-text">
        <h2>Entre em <span>contato</span></h2>
      </div>
    </div>
    <div class="contact-form">
      <form id="contactForm">
        <input type="text" name="name" id="contact-name" placeholder="Digite seu nome" required>
        <textarea name="message" id="contact-message" cols="35" rows="10" placeholder="Como eu posso te ajudar" required></textarea>
        <br>
        <button class="zap" type="submit">Fale Conosco no WhatsApp</button>
      </form>
      
      </div>
    </div>
  </section>
  <footer class="footer">
  <div class="footer-container">
    <div class="footer-logo">
      <img src="imgs/logoDiMorangos.png" alt="Logo DiMorangos">
    </div>
    
    <div class="footer-info">
      <p>© 2025 DiMorangos. Todos os direitos reservados.</p>
      <p>Feito com ❤️ no Brasil.</p>
    </div>
    
    <div class="footer-social">
      <a href="https://wa.me/5511983747083" target="_blank" title="WhatsApp">
        <i class="fab fa-whatsapp"></i>
      </a>
      <a href="https://instagram.com/seuinstagram" target="_blank" title="Instagram">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="mailto:contato@dimorangos.com" title="Email">
        <i class="fas fa-envelope"></i>
      </a>
    </div>
  </div>
</footer>



  <script>
    document.getElementById("contactForm").addEventListener("submit", function(event) {
      event.preventDefault();
      const name = document.getElementById("contact-name").value;
      const message = document.getElementById("contact-message").value;
      const fullMessage = `Olá! Meu nome é ${name}. Mensagem: ${message}`;
      const encodedMessage = encodeURIComponent(fullMessage);
      const phoneNumber = "5511983747083";
      window.open(`https://wa.me/${phoneNumber}?text=${encodedMessage}`, "_blank");
      document.getElementById("thankyouMessage").style.display = "block";
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="script.js"></script>
</body>
</html>

