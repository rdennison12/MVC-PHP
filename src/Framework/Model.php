<?php
/**
 * Created by Rick Dennison
 * Date:      12/8/23
 *
 * File Name: Model.php
 * Project:   MVC-PHP-2023
 */
declare(strict_types=1);


namespace Framework;

use PDO;
use App\Database;

abstract class Model
{
    protected $table;
    protected array $errors = [];

    protected function validate(array $data): void
    {
    }

    public function getInsertID(): string
    {
        $conn = $this->database->getConnection();
        return $conn->lastInsertId();
    }
    protected function addError(string $field, string $message): void
    {
        $this->errors[$field] = $message;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    private function getTable(): string
    {
        if ($this->table !== null) {
            return $this->table;
        }
        $parts = explode("\\", $this::class);
        return strtolower(array_pop($parts));
    }

    public function __construct(private Database $database)
    {
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        $pdo = $this->database->getConnection();
        $sql = "SELECT *
                FROM {$this->getTable()}";

        $stmt = $pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(string $id): array|bool
    {
        $conn = $this->database->getConnection();
        $sql = "SELECT *
                FROM {$this->getTable()}
                WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert(array $data): bool
    {
        $this->validate($data);
        if (!empty($this->errors)) {
            return false;
        }

        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));

        $sql = "INSERT INTO {$this->getTable()} ($columns)
                VALUES ($placeholders)";
        $conn = $this->database->getConnection();
        $stmt = $conn->prepare($sql);
        $i = 1;
        foreach ($data as $value) {
            $type = match (gettype($value)) {
                "boolean" => PDO::PARAM_BOOL,
                "integer" => PDO::PARAM_INT,
                "NULL" => PDO::PARAM_NULL,
                default => PDO::PARAM_STR
            };
            $stmt->bindValue($i++, $value, $type);
        }

        return $stmt->execute();


    }
}