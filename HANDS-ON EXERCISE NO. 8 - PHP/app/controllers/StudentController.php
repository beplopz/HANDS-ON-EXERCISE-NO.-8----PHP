<?php

declare(strict_types=1);

class StudentController extends Controller
{
    public function create(): void
    {
        $errors = [];
        $student = null;

        if (isPost()) {
            $student = [
                'first_name' => trim($_POST['first_name'] ?? ''),
                'middle_name' => trim($_POST['middle_name'] ?? ''),
                'last_name' => trim($_POST['last_name'] ?? ''),
                'age' => trim($_POST['age'] ?? ''),
                'gender' => trim($_POST['gender'] ?? ''),
                'email' => trim($_POST['email'] ?? ''),
                'address' => trim($_POST['address'] ?? ''),
                'contact_number' => trim($_POST['contact_number'] ?? ''),
            ];

            if ($student['first_name'] === '') {
                $errors['first_name'] = 'First name is required.';
            }

            if ($student['last_name'] === '') {
                $errors['last_name'] = 'Last name is required.';
            }

            if (!filter_var($student['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Enter a valid email address.';
            }

            if (filter_var($student['age'], FILTER_VALIDATE_INT) === false || (int) $student['age'] < 1) {
                $errors['age'] = 'Age must be a valid positive number.';
            }

            if ($student['gender'] === '') {
                $errors['gender'] = 'Please select a gender.';
            }

            if ($student['address'] === '') {
                $errors['address'] = 'Address is required.';
            }

            if (!preg_match('/^[0-9+\-\s]{7,20}$/', $student['contact_number'])) {
                $errors['contact_number'] = 'Enter a valid contact number.';
            }

            if ($errors !== []) {
                $student = null;
            }
        }

        $this->render('student/form', [
            'errors' => $errors,
            'student' => $student,
        ]);
    }
}
