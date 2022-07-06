<?php

// Role Model

class Role extends Model
{
    public $errors = [];
    protected $table = "roles";

    protected $allowedColumns = [
        'role'
    ];
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['role'])) {
            $this->errors['role'] = 'A role is required';
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

}
