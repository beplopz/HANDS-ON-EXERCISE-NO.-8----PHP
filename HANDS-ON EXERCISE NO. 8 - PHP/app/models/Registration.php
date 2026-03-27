<?php

declare(strict_types=1);

class Registration
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

        if (filter_var($data['age'], FILTER_VALIDATE_INT) === false || (int) $data['age'] < 1) {
            $errors['age'] = 'Age must be a valid positive number.';
        }

        if ($data['gender'] === '') {
            $errors['gender'] = 'Gender is required.';
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'A valid email is required.';
        }

        if ($data['address'] === '') {
            $errors['address'] = 'Address is required.';
        }

        if (!preg_match('/^[0-9+\-\s]{7,20}$/', $data['contact_number'])) {
            $errors['contact_number'] = 'Enter a valid contact number.';
        }

        return $errors;
    }

    public function create(array $data): bool
    {
        if (!$this->db instanceof PDO) {
            return false;
        }

        $statement = $this->db->prepare(
            'INSERT INTO registrations (first_name, middle_name, last_name, age, gender, email, address, contact_number)
             VALUES (:first_name, :middle_name, :last_name, :age, :gender, :email, :address, :contact_number)'
        );

        return $statement->execute([
            ':first_name' => $data['first_name'],
            ':middle_name' => $data['middle_name'],
            ':last_name' => $data['last_name'],
            ':age' => (int) $data['age'],
            ':gender' => $data['gender'],
            ':email' => $data['email'],
            ':address' => $data['address'],
            ':contact_number' => $data['contact_number'],
        ]);
    }

    public function all(): array
    {
        if (!$this->db instanceof PDO) {
            return [];
        }

        $statement = $this->db->query('SELECT * FROM registrations ORDER BY id DESC');
        return $statement->fetchAll();
    }
}
