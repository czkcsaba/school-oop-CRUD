<?php

namespace App\Models;

class Grade extends Model
{
    public int|null $student_id = null;

    public int|null $subject_id = null;

    public int|null $mark = null;

    public string|null $date = null;

    protected static $table = 'marks';

    public function __construct(?int $student_id = null, ?int $subject_id = null, ?int $mark = null, ?string $date = null)
    {
        parent::__construct();
        if ($student_id !== null) {
            $this->student_id = $student_id;
        }

        if ($subject_id !== null) {
            $this->subject_id = $subject_id;
        }

        if ($mark !== null) {
            $this->mark = $mark;
        }

        if ($date) {
            $this->date = $date;
        }
    }
}
