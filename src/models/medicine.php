<?php
    require_once '../src/Config/database.php';

    class Medicine {
        public static function getAll() {
            $stmt = Database::connect()->query("SELECT * FROM medicines");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function addMedicine($name, $description, $stock, $expiry_date) {
            $stmt = Database::connect()->prepare("INSERT INTO medicines (name, description, stock, expiry_date) VALUES (?, ?, ?, ?)");
            return $stmt->execute([$name, $description, $stock, $expiry_date]);
        }
    }
?>
