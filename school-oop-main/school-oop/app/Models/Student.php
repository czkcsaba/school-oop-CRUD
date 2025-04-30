<?php

namespace App\Models;

class Student extends Model
{
    public string|null $name = null;

    public int|null $class_id = null;

    protected static $table = 'students';

    public function __construct(?string $name = null, ?int $class_id = null)
    {
        parent::__construct();
        if ($name) {
            $this->name = $name;
        }

        if ($class_id) {
            $this->class_id = $class_id;
        }
    }
}
