<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="salvar_fruta.php" method="POST" enctype="multipart/form-data">
    <h2>Adicionar Nova Fruta</h2>
    <input type="text" name="nome" placeholder="Nome da fruta" required><br><br>
    <input type="file" name="imagem" accept="image/*" required><br><br>
    <select name="categoria" required>
    <option value="fresca">Fresca</option>
    <option value="congelada">Congelada</option>
  </select><br><br>
    <textarea name="descricao" placeholder="Descrição da fruta" required></textarea>
  <br>
  <button type="submit">Adicionar Fruta</button>
</form>

</body>
</html>