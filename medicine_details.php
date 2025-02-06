<?php 
    require_once '../medicine-manager/src/config/database.php';
    require_once '../medicine-manager/src/models/medicine.php';

    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        die("ID inválido!");
    }

    $id = $_GET['id'];
    $medicine = Medicine::getById($id);

    if (!$medicine) {
        die("Medicamento não encontrado!");
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= htmlspecialchars($medicine['name']) ?></title>
        <link rel="stylesheet" href="public/assets/css/index.css">
    </head>
    <body>
        <header>
            <h1>Medicamento: <?= htmlspecialchars($medicine['name']) ?></h1>
        </header>
        
        <main>
            <table>
                <tr>
                    <th>ID</th>
                    <td><?= htmlspecialchars($medicine['id']) ?></td>
                </tr>
                <tr>
                    <th>Nome</th>
                    <td><?= htmlspecialchars($medicine['name']) ?></td>
                </tr>
                <tr>
                    <th>Descrição</th>
                    <td><?= htmlspecialchars($medicine['description']) ?></td>
                </tr>
                <tr>
                    <th>Estoque</th>
                    <td><?= htmlspecialchars($medicine['stock']) ?></td>
                </tr>
                <tr>
                    <th>Data de Validade</th>
                    <td><?= htmlspecialchars($medicine['expiry_date']) ?></td>
                </tr>
            </table>
        </main>

        <div>
            <a href="index.php">Voltar</a>       
            <a href="#" onclick="confirmDelete(<?= $medicine['id'] ?>)" class="red-a">Deletar</a>            
            <a href="#" onclick="openModal()" class="danger-a">Modificar</a>
        </div>

        <div id="editModal" class="modal" style="display: none;">
            <form action="medicine_update.php" method="post">
                <input type="hidden" name="idMedicine" value="<?= $id ?>">
                <label>Nome:</label>
                <input type="text" name="name" value="<?= htmlspecialchars($medicine['name']) ?>" required>
                
                <label>Descrição:</label>
                <input type="text" name="description" value="<?= htmlspecialchars($medicine['description']) ?>" required>
                
                <label>Estoque:</label>
                <input type="number" name="stock" value="<?= htmlspecialchars($medicine['stock']) ?>" required>
                
                <label>Data de Validade:</label>
                <input type="date" name="expiry_date" value="<?= htmlspecialchars($medicine['expiry_date']) ?>" required>
                
                <div>
                    <button type="submit">Salvar Alterações</button>
                </div>
            </form>
            <div>
                <button onclick="closeModal()">Fechar</button>
            </div>
        </div>

        <script src="./public/assets/js/index.js"></script>
    </body>
</html>
