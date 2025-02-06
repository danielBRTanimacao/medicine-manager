<?php
    require_once __DIR__ . '/../config/database.php';

    class Medicine {
        public static function getAll() {
            $stmt = Database::connect()->query("SELECT * FROM medicines");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function addMedicine($name, $description, $stock, $expiry_date) {
            $stmt = Database::connect()->prepare("INSERT INTO medicines (name, description, stock, expiry_date) VALUES (?, ?, ?, ?)");
            return $stmt->execute([$name, $description, $stock, $expiry_date]);
        }
        
        public static function getById($id) {
        $stmt = Database::connect()->prepare("SELECT * FROM medicines WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
        }

    }
?>
