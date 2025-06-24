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
  <link rel="stylesheet" href="style.css" /> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <!-- Bootstrap JS Bundle (necessário para modal funcionar) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
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
          <?php foreach ($frutasFrescas as $fruta): ?>
            <li class="frutas swiper-slide">
              <img src="imgs/<?= htmlspecialchars($fruta['imagem']) ?>" alt="<?= htmlspecialchars($fruta['nome']) ?>" class="frutas-image" />
              <h3 class="name"><?= htmlspecialchars($fruta['nome']) ?></h3>
              <a href="#" class="botao-saiba">Saiba mais</a>
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
          <?php foreach ($frutasCongeladas as $fruta): ?>
            <li class="frutas swiper-slide">
              <img src="imgs/<?= htmlspecialchars($fruta['imagem']) ?>" alt="<?= htmlspecialchars($fruta['nome']) ?>" class="frutas-image" />
              <h3 class="name"><?= htmlspecialchars($fruta['nome']) ?></h3>
              <a href="#" class="botao-saiba">Saiba mais</a>
            </li>
          <?php endforeach; ?>
        </ul>
        <div class="swiper-pagination"></div>
        <div class="swiper-slide-button swiper-button-prev"></div>
        <div class="swiper-slide-button swiper-button-next"></div>
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
          <img src="./imgs/vitaminab.png" alt="vitamina Banana">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary botao-saiba" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Veja receita completa
          </button>

          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Receita de Vitamina de Banana com Maçã</h1>
                  
                </div>
                <div class="modal-body">
                  <h2>Ingredientes:</h2>
                  4 copos de leite
                  2 bananas frescas do hortifruti DiMorangos
                  2 maçãs frescas do hortifruti DiMorangos
                  Açúcar a gosto

                  Modo de preparo:
                  1- Descasque as bananas e corte em rodelas.
                  2- Lave bem as maçãs, retire as sementes e corte em pedaços.
                  3- Coloque as frutas no liquidificador junto com o leite e o açúcar.
                  4- Bata tudo até obter uma mistura homogênea.
                  5- Sirva em seguida, bem gelado!
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Understood</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card"><p>Crepioca de morango</p><img src="./imgs/crepe.png" alt="crepe"><a href="#" class="botao-saiba">Veja receita completa</a></div>
        <div class="card"><p>Torta de morango</p><img src="./imgs/torta-de-morango.png" alt="torta-de-morango"><a href="#" class="botao-saiba">Veja receita completa</a></div>
        <div class="card"><p>Maçã do amor</p><img src="imgs/macaamor.png" alt="maçãs do amor"><a href="#" class="botao-saiba">Veja receita completa</a></div>
        <div class="card"><p>Morango com chocolate</p><img src="./imgs/mochoco.png" alt="morango com chocolate"><a href="#" class="botao-saiba">Veja receita completa</a></div>
        <div class="card"><p>Suco de laranja com morango</p><img src="./imgs/vitaminalm.png" alt="suco morango com laranja"><a href="#" class="botao-saiba">Veja receita completa</a></div>
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

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="script.js"></script>
</body>
</html>

