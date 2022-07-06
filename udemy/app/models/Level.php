<?php

// Level Model

class Level extends Model
{
    public $errors = [];
    protected $table = "level";

    protected $allowedColumns = [
        'level'
    ];
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['level'])) {
            $this->errors['level'] = 'A level is required';
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

}
