<?php

namespace App\Controllers;

use App\Models\Student;

class StudentController
{
    private $model;
    public function __construct()
    {
        $this->model = new Student();
    }
    public function index(): void
    {
        $students = $this->model->getAll();

        include BASEPATH . "/views/student-list.php";
        session_unset();
    }

    public function create(): void
    {
        include BASEPATH . "/views/student-create.php";
        session_unset();
    }

    public function store(): true
    {
        try {
            $message = $this->model->store($_REQUEST);
            $_SESSION['message'] = $message;
            header("Location: /students");
            return true;
        } catch (\Exception $exception) {
            $_SESSION['message'] = $exception->getMessage();
            header("Location: /student/create");
            return true;
        }
    }

    public function edit($id)
    {
        if (!($id > 0)) {
            $_SESSION['message'] = "Invalid student id";
            header("Location: /students");
            return true;
        }
        try {
            $student = $this->model->find($id);
            include BASEPATH . "/views/student-edit.php";

        } catch (\Exception $exception) {
            $_SESSION['message'] = $exception->getMessage();
            header("Location: /students");
            return true;
        }
    }

    public function update($attributes): true
    {
        if (!($attributes['id'] > 0)) {
            $_SESSION['message'] = "Invalid student id";
            header("Location: /students");
            return true;
        }
        try {
            $message = $this->model->update($attributes, $attributes['id']);
            $_SESSION['message'] = $message;
            header("Location: /students");
            return true;
        } catch (\Exception $exception) {
            $_SESSION['message'] = $exception->getMessage();
            header("Location: /students");
            return true;
        }
    }

    public function destroy($id): true
    {
        if (!($id > 0)) {
            $_SESSION['message'] = "Invalid student id";
            header("Location: /students");
            return true;
        }
        try {

            $message = $this->model->delete($id);
            $_SESSION['message'] = $message;
            header("Location: /students");
            return true;
        } catch (\Exception $exception) {
            $_SESSION['message'] = $exception->getMessage();
            header("Location: /students");
            return true;
        }
    }
}