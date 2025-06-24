<?php
$frutas = file_exists('frutas.json') ? json_decode(file_get_contents('frutas.json'), true) : [];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>DiMorangos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Estilos e Bibliotecas -->
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
</head>
<body>

  <header>
    <h1>🍓 DiMorangos - Frutas com Amor</h1>
  </header>

  <!-- Frutas Frescas -->
  <section class="frutas-section-fresca" id="frutas-frescas">
    <h2>Frutas Frescas</h2>
    <ul class="frutas-list swiper-wrapper">
      <?php foreach ($frutas as $fruta): ?>
        <?php if ($fruta['categoria'] === 'fresca'): ?>
          <li class="frutas swiper-slide">
            <img src="<?= $fruta['imagem'] ?>" alt="<?= $fruta['nome'] ?>" class="frutas-image">
            <h3 class="name"><?= htmlspecialchars($fruta['nome']) ?></h3>
            <a href="#" class="botao-saiba">Saiba mais</a>
          </li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </section>

  <!-- Frutas Congeladas -->
  <section class="frutas-section-gela" id="frutas-congeladas">
    <h2>Frutas Congeladas</h2>
    <ul class="frutas-list swiper-wrapper">
      <?php foreach ($frutas as $fruta): ?>
        <?php if ($fruta['categoria'] === 'congelada'): ?>
          <li class="frutas swiper-slide">
            <img src="<?= $fruta['imagem'] ?>" alt="<?= $fruta['nome'] ?>" class="frutas-image">
            <h3 class="name"><?= htmlspecialchars($fruta['nome']) ?></h3>
            <a href="#" class="botao-saiba">Saiba mais</a>
          </li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </section>

  <!-- Formulário de nova fruta -->
  <section>
    <h2>Adicionar Nova Fruta</h2>
    <form action="salvar_fruta.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="nome" placeholder="Nome da fruta" required><br><br>
      <input type="file" name="imagem" accept="image/*" required><br><br>
      <select name="categoria" required>
        <option value="">Selecione a categoria</option>
        <option value="fresca">Fresca</option>
        <option value="congelada">Congelada</option>
      </select><br><br>
      <button type="submit" class="btn btn-success">Adicionar Fruta</button>
    </form>
  </section>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>
