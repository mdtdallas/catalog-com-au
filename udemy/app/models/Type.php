<?php

// Type Model

class Type extends Model
{
    public $errors = [];
    protected $table = "type";

    protected $allowedColumns = [
        'type'
    ];
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['type'])) {
            $this->errors['type'] = 'A type is required';
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    

}
