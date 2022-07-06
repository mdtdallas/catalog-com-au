<?php

// Colour Model

class Colour extends Model
{
    public $errors = [];
    protected $table = "colours";

    protected $allowedColumns = [
        'breed', 'colour'
    ];
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['breed'])) {
            $this->errors['breed'] = 'A breed is required';
        }

        if (empty($data['colour'])) {
            $this->errors['colour'] = 'A colour is required';
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

}
