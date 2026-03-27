<?php

declare(strict_types=1);

class RegistrationController extends Controller
{
    public function index(): void
    {
        $model = new Registration();
        $errors = [];

        if (isPost()) {
            $data = [
                'first_name' => trim($_POST['first_name'] ?? ''),
                'middle_name' => trim($_POST['middle_name'] ?? ''),
                'last_name' => trim($_POST['last_name'] ?? ''),
                'age' => trim($_POST['age'] ?? ''),
                'gender' => trim($_POST['gender'] ?? ''),
                'email' => trim($_POST['email'] ?? ''),
                'address' => trim($_POST['address'] ?? ''),
                'contact_number' => trim($_POST['contact_number'] ?? ''),
            ];

            $errors = $model->validate($data);

            if ($errors === []) {
                if ($model->create($data)) {
                    $_SESSION['flash_message'] = 'Student registration saved successfully.';
                    header('Location: index.php?page=registrations');
                    exit;
                }

                $errors['database'] = 'Database connection failed. Import the SQL file and update credentials in Database.php.';
            }
        }

        $message = $_SESSION['flash_message'] ?? null;
        unset($_SESSION['flash_message']);

        $this->render('registration/index', [
            'errors' => $errors,
            'message' => $message,
            'records' => $model->all(),
            'databaseReady' => $model->isAvailable(),
        ]);
    }
}
