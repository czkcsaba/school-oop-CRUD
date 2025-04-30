<?php
namespace App\Controllers;
use App\Models\Student;
use App\Views\Display;

class StudentController extends Controller {

    public function __construct()
    {
        $student = new Student();
        parent::__construct($student);
    }

    public function index(): void
    {
        $students = $this->model->all(['order_by' => ['name, class_id'], 
            'direction' => ['DESC']]);
        $this->render('students/index', 
            ['students' => $students]);
    }

    public function create(): void
    {
        $this->render('students/create');
    }
    public function edit(int $id): void
    {
        $student = $this->model->find($id);
        if (!$student) {
            // Handle invalid ID gracefully
            $_SESSION['warning_message'] = "A tanuló a megadott azonosítóval: $id nem található.";
            $this->redirect('/students');
        }
        $this->render('students/edit', ['student' => $student]);
    }

    public function save(array $data): void
    {
        if (empty($data['name'])) {
            $_SESSION['warning_message'] = "Az tanuló neve kötelező mező.";
            $this->redirect('/students/create'); // Redirect if input is invalid
        }
        if (empty($data['class_id'])) {
            $_SESSION['warning_message'] = "Az tanuló osztálya kötelező mező.";
            $this->redirect('/students/create'); // Redirect if input is invalid
        }
        // Use the existing model instance
        $this->model->name = $data['name'];
        $this->model->class_id = $data['class_id'];
        $this->model->create();
        $this->redirect('/students');
    }

    public function update(int $id, array $data): void
    {
        $student = $this->model->find($id);
        if (!$student || empty($data['name']) || empty($data['class_id'])) {
            // Handle invalid ID or data
            $this->redirect('/students');
        }
        $student->name = $data['name'];
        $student->class_id = $data['class_id'];
        $student->update();
        $this->redirect('/students');
    }

    function show(int $id): void
    {
        $student = $this->model->find($id);
        if (!$student) {
            $_SESSION['warning_message'] = "A tanuló a megadott azonosítóval: $id nem található.";
            $this->redirect('/students'); // Handle invalid ID
        }
        $this->render('students/show', ['student' => $student]);
    }

    function delete(int $id): void
    {
        $student = $this->model->find($id);
        if ($student) {
            $result = $student->delete();
            if ($result) {
                $_SESSION['success_message'] = 'Sikeresen törölve';
            }
        }

        $this->redirect('/students'); // Redirect regardless of success
    }

}
