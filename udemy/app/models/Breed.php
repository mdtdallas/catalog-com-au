<?php

// Breed Model

class Breed extends Model
{
    public $errors = [];
    protected $table = "breeds";

    protected $allowedColumns = [
        'breed'
    ];
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['breed'])) {
            $this->errors['breed'] = 'A breed is required';
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

}
