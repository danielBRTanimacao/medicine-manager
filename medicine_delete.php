<?php
    require_once '../medicine-manager/src/config/database.php';
    require_once '../medicine-manager/src/models/medicine.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];

        if (Medicine::deleteMedicine($id)) {
            echo json_encode(["success" => true, "message" => "Medicamento deletado com sucesso!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Erro ao deletar medicamento!"]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Método inválido!"]);
    }
?>
