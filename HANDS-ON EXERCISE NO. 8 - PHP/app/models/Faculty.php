<?php

declare(strict_types=1);

class Faculty
{
    private ?PDO $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    public function isAvailable(): bool
    {
        return $this->db instanceof PDO;
    }

    public function validate(array $data): array
    {
        $errors = [];

        if ($data['first_name'] === '') {
            $errors['first_name'] = 'First name is required.';
        }

        if ($data['last_name'] === '') {
            $errors['last_name'] = 'Last name is required.';
        }

        if (filter_var($data['age'], FILTER_VALIDATE_INT) === false || (int) $data['age'] < 18) {
            $errors['age'] = 'Age must be at least 18.';
        }

        if ($data['gender'] === '') {
            $errors['gender'] = 'Gender is required.';
        }

        if ($data['address'] === '') {
            $errors['address'] = 'Address is required.';
        }

        if ($data['position'] === '') {
            $errors['position'] = 'Position is required.';
        }

        if (filter_var($data['salary'], FILTER_VALIDATE_FLOAT) === false || (float) $data['salary'] < 0) {
            $errors['salary'] = 'Salary must be a valid non-negative amount.';
        }

        return $errors;
    }

    public function create(array $data): bool
    {
        if (!$this->db instanceof PDO) {
            return false;
        }

        $statement = $this->db->prepare(
            'INSERT INTO faculty (first_name, middle_name, last_name, age, gender, address, position, salary)
             VALUES (:first_name, :middle_name, :last_name, :age, :gender, :address, :position, :salary)'
        );

        return $statement->execute([
            ':first_name' => $data['first_name'],
            ':middle_name' => $data['middle_name'],
            ':last_name' => $data['last_name'],
            ':age' => (int) $data['age'],
            ':gender' => $data['gender'],
            ':address' => $data['address'],
            ':position' => $data['position'],
            ':salary' => (float) $data['salary'],
        ]);
    }

    public function all(): array
    {
        if (!$this->db instanceof PDO) {
            return [];
        }

        $statement = $this->db->query('SELECT * FROM faculty ORDER BY faculty_id DESC');
        return $statement->fetchAll();
    }
}
