<?php

// Sex Model

class Sex extends Model
{
    public $errors = [];
    protected $table = "sex";

    protected $allowedColumns = [
        'sex'
    ];
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['sex'])) {
            $this->errors['sex'] = 'A sex is required';
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

}
