<?php
    require_once '../medicine-manager/src/config/database.php';
    require_once '../medicine-manager/src/models/medicine.php';

    $medicines = Medicine::getAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Medicamentos</title>
    <link rel="stylesheet" href="public/assets/css/index.css">
</head>
<body>
    <h1>Lista de Medicamentos</h1>
    <a href="add_medicine.php">Adicionar Medicamento</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Estoque</th>
            <th>Data de Validade</th>
        </tr>
        <?php foreach ($medicines as $medicine): ?>
            <tr>
                <td><?= $medicine['id'] ?></td>
                <td><?= $medicine['name'] ?></td>
                <td><?= $medicine['description'] ?></td>
                <td><?= $medicine['stock'] ?></td>
                <td><?= $medicine['expiry_date'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
