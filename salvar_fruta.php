<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $categoria = $_POST['categoria'];

    // Salvar imagem
    $imagemNome = basename($_FILES['imagem']['name']);
    $imagemTemp = $_FILES['imagem']['tmp_name'];
    $destino = 'imgs/' . $imagemNome;

    if (move_uploaded_file($imagemTemp, $destino)) {
        // Ler frutas existentes
        $arquivo = 'frutas.json';
        $frutas = file_exists($arquivo) ? json_decode(file_get_contents($arquivo), true) : [];

        // Adicionar nova fruta

        $frutas = [
        'nome' => $nome,
        'imagem' => $destino,
        'categoria' => $categoria,
        'descricao' => $_POST['descricao'] ?? 'Sem descrição.'
        ];

        // Salvar frutas atualizadas
        file_put_contents($arquivo, json_encode($frutas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    } else {
        // Falha ao salvar imagem
        // Trate o erro aqui se quiser
    }

    header('Location: index.php');
    exit;
}
?>
