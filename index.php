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

  <!-- Modais para Receitas (adicione conforme necessário) -->
  <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Vitamina de Banana com Maçã</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <img src="./imgs/vitaminab.png" alt="Vitamina de Banana" class="img-fluid mb-2">
          <p>Receita completa da vitamina...</p>
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
          <img src="imgs/macaamor.png" alt="Maçã do amor">
          <button type="button" class="btn btn-primary botao-saiba" data-bs-toggle="modal" data-bs-target="#modalMacaAmor">
            Veja receita completa
          </button>
        </div>
        <div class="card">
          <p>Morango com chocolate</p>
          <img src="./imgs/mochoco.png" alt="Morango com chocolate">
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

