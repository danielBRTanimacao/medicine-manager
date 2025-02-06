<?php
    require_once '../medicine-manager/src/config/database.php';
    require_once '../medicine-manager/src/models/medicine.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['idMedicine'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $stock = $_POST['stock'];
        $expiry_date = $_POST['expiry_date'];

        if (Medicine::updateMedicine($id, $name, $description, $stock, $expiry_date)) {
            echo "<script>alert('Medicamento atualizado com sucesso!'); window.location.href='medicine_details.php?id=$id';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar medicamento.'); window.history.back();</script>";
        }
    } else {
        echo "Método inválido!";
    }
?>
