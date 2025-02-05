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
    <a href="../medicine-manager/src/pages/add_medicine.php">Adicionar Medicamento</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Estoque</th>
            <th>Data de Validade</th>
        </tr>
        <?php
            try {
                if (empty($medicines)) {
                    throw new Exception("Adicione os medicamentos!");
                }
            ?>
                <?php foreach ($medicines as $medicine): ?>
                    <tr>
                        <td><?= htmlspecialchars($medicine['id']) ?></td>
                        <td><?= htmlspecialchars($medicine['name']) ?></td>
                        <td><?= htmlspecialchars($medicine['description']) ?></td>
                        <td><?= htmlspecialchars($medicine['stock']) ?></td>
                        <td><?= htmlspecialchars($medicine['expiry_date']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php
            } catch (Exception $e) {
                echo "<tr><td colspan='5'>" . $e->getMessage() . "</td></tr>";
            }
        ?>
    </table>
</body>
</html>
