<?php
    require_once '../medicine-manager/src/config/database.php';
    require_once '../medicine-manager/src/models/medicine.php';

    $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $stock = $_POST['stock'];
        $expiry_date = $_POST['expiry_date'];

        if (Medicine::addMedicine($name, $description, $stock, $expiry_date)) {
            $message = "✅ Medicamento adicionado com sucesso!";
        } else {
            $message = "❌ Erro ao adicionar medicamento.";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Medicamento</title>
    <link rel="stylesheet" href="public/assets/css/index.css">
</head>
<body>
    <h1>Adicionar Medicamento</h1>
    
    <?php if (!empty($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="name">Nome:</label>
        <input type="text" name="name" required>

        <label for="description">Descrição:</label>
        <input type="text" name="description">

        <label for="stock">Estoque:</label>
        <input type="number" name="stock" required>

        <label for="expiry_date">Data de Validade:</label>
        <input type="date" name="expiry_date" required>

        <button type="submit">Salvar</button>
    </form>
    <br>
    <div>
        <a href="index.php">Voltar à Lista</a>
    </div>
</body>
</html>
