<?php
namespace App\Controllers;
use App\Models\Grade;
use App\Views\Display;

class GradeController extends Controller {

    public function __construct()
    {
        $grade = new Grade();
        parent::__construct($grade);
    }

    public function index(): void
    {
        $grades = $this->model->all(['order_by' => ['student_id, subject_id, mark, date'], 
            'direction' => ['DESC']]);
        $this->render('grades/index', 
            ['grades' => $grades]);
    }

    public function create(): void
    {
        $this->render('grades/create');
    }
    public function edit(int $id): void
    {
        $grade = $this->model->find($id);
        if (!$grade) {
            // Handle invalid ID gracefully
            $_SESSION['warning_message'] = "Az érdemjegy a megadott azonosítóval: $id nem található.";
            $this->redirect('/grades');
        }
        $this->render('grades/edit', ['grade' => $grade]);
    }

    public function save(array $data): void
    {
        if (empty($data['student_id'])) {
            $_SESSION['warning_message'] = "Az érdemjegy tanulója kötelező mező.";
            $this->redirect('/grades/create'); // Redirect if input is invalid
        }
        if (empty($data['subject_id'])) {
            $_SESSION['warning_message'] = "Az érdemjegy tantárgya kötelező mező.";
            $this->redirect('/grades/create'); // Redirect if input is invalid
        }
        if (empty($data['mark'])) {
            $_SESSION['warning_message'] = "Az érdemjegy jeyge kötelező mező.";
            $this->redirect('/grades/create'); // Redirect if input is invalid
        }
        if (empty($data['date'])) {
            $_SESSION['warning_message'] = "Az érdemjegy dátuma kötelező mező.";
            $this->redirect('/grades/create'); // Redirect if input is invalid
        }
        // Use the existing model instance
        $this->model->student_id = $data['student_id'];
        $this->model->subject_id = $data['subject_id'];
        $this->model->mark = $data['mark'];
        $this->model->date = $data['date'];
        $this->model->create();
        $this->redirect('/grades');
    }

    public function update(int $id, array $data): void
    {
        $grade = $this->model->find($id);
        if (!$grade || empty($data['student_id']) || empty($data['subject_id']) || empty($data['mark']) || empty($data['date'])) {
            // Handle invalid ID or data
            $this->redirect('/grades');
        }
        $grade->student_id = $data['student_id'];
        $grade->subject_id = $data['subject_id'];
        $grade->mark = $data['mark'];
        $grade->date = $data['date'];
        $grade->update();
        $this->redirect('/grades');
    }

    function show(int $id): void
    {
        $grade = $this->model->find($id);
        if (!$grade) {
            $_SESSION['warning_message'] = "Az érdemjegy a megadott azonosítóval: $id nem található.";
            $this->redirect('/grades'); // Handle invalid ID
        }
        $this->render('grades/show', ['grade' => $grade]);
    }

    function delete(int $id): void
    {
        $grade = $this->model->find($id);
        if ($grade) {
            $result = $grade->delete();
            if ($result) {
                $_SESSION['success_message'] = 'Sikeresen törölve';
            }
        }

        $this->redirect('/grades'); // Redirect regardless of success
    }

}
