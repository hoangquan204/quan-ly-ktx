<?php

namespace Hp\Qlktx\Models;

use PDO;

class Lop
{
    public ?PDO $db;
    public string $ma_lop;
    public string $ten_lop;
    private array $errors = [];

    public function __construct(?PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function fill(array $data): Lop
    {
        $this->ma_lop = $data['ma_lop'] ?? '';
        $this->ten_lop = $data['ten_lop'] ?? '';
        return $this;
    }

    public function getValidationErrors(): array
    {
        return $this->errors;
    }

    public function validate(): bool
    {
        if (empty($this->ma_lop)) {
            $this->errors['ma_lop'] = 'Mã lớp không được để trống';
        }
        if (empty($this->ten_lop)) {
            $this->errors['ten_lop'] = 'Tên lớp không được để trống';
        }
        return empty($this->errors);
    }

    public function save(): bool
    {
        if ($this->exists()) {
            $statement = $this->db->prepare(
                'UPDATE Lop SET ten_lop = :ten_lop WHERE ma_lop = :ma_lop'
            );
            return $statement->execute([
                'ten_lop' => $this->ten_lop,
                'ma_lop' => $this->ma_lop
            ]);
        } else {
            $statement = $this->db->prepare(
                'INSERT INTO Lop (ma_lop, ten_lop) VALUES (:ma_lop, :ten_lop)'
            );
            return $statement->execute([
                'ma_lop' => $this->ma_lop,
                'ten_lop' => $this->ten_lop
            ]);
        }
    }

    public function delete(): bool
    {
        $statement = $this->db->prepare('DELETE FROM Lop WHERE ma_lop = :ma_lop');
        return $statement->execute(['ma_lop' => $this->ma_lop]);
    }

    public function find(string $ma_lop): ?Lop
    {
        $statement = $this->db->prepare('SELECT * FROM Lop WHERE ma_lop = :ma_lop');
        $statement->execute(['ma_lop' => $ma_lop]);
        if ($row = $statement->fetch()) {
            return $this->fillFromDB($row);
        }
        return null;
    }

    protected function fillFromDB(array $row): Lop
    {
        [
            'ma_lop' => $this->ma_lop,
            'ten_lop' => $this->ten_lop
        ] = $row;
        return $this;
    }

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM Lop");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function exists(): bool
    {
        $statement = $this->db->prepare('SELECT COUNT(*) FROM Lop WHERE ma_lop = :ma_lop');
        $statement->execute(['ma_lop' => $this->ma_lop]);
        return $statement->fetchColumn() > 0;
    }
    public function countAllLop(): int
    {
        $statement = $this->db->query("SELECT COUNT(*) FROM Lop");
        return (int) $statement->fetchColumn();
    }
    public function search(array $criteria): array {
        $query = "SELECT * FROM Lop WHERE 1=1";
        $params = [];

        if (!empty($criteria['ma_lop'])) {
            $query .= " AND ma_lop = :ma_lop";
            $params['ma_lop'] = $criteria['ma_lop'];
        }
        if (!empty($criteria['ten_lop'])) {
            $query .= " AND ten_lop = :ten_lop";
            $params['ten_lop'] = $criteria['ten_lop'];
        }

        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}