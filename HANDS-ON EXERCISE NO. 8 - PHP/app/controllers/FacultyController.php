<?php

declare(strict_types=1);

class FacultyController extends Controller
{
    public function index(): void
    {
        $model = new Faculty();
        $errors = [];

        if (isPost()) {
            $data = [
                'first_name' => trim($_POST['first_name'] ?? ''),
                'middle_name' => trim($_POST['middle_name'] ?? ''),
                'last_name' => trim($_POST['last_name'] ?? ''),
                'age' => trim($_POST['age'] ?? ''),
                'gender' => trim($_POST['gender'] ?? ''),
                'address' => trim($_POST['address'] ?? ''),
                'position' => trim($_POST['position'] ?? ''),
                'salary' => trim($_POST['salary'] ?? ''),
            ];

            $errors = $model->validate($data);

            if ($errors === []) {
                if ($model->create($data)) {
                    $_SESSION['flash_message'] = 'Faculty record saved successfully.';
                    header('Location: index.php?page=faculty');
                    exit;
                }

                $errors['database'] = 'Database connection failed. Import the SQL file and update credentials in Database.php.';
            }
        }

        $message = $_SESSION['flash_message'] ?? null;
        unset($_SESSION['flash_message']);

        $this->render('faculty/index', [
            'errors' => $errors,
            'message' => $message,
            'records' => $model->all(),
            'databaseReady' => $model->isAvailable(),
        ]);
    }
}
