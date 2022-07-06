<?php

// Sponsor Model

class Sponsor extends Model
{
    public $errors = [];
    protected $table = "sponsors";

    protected $allowedColumns = [
        'sponsor', 'sponsor_image', 'sponsor_url', 'disabled', 'user_id'
    ];
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['sponsor'])) {
            $this->errors['sponsor'] = 'Sponsor\'s name is required';
        }

        if(!empty($data['sponsor_url']))
        {
            if(!filter_var($data['sponsor_url'], FILTER_VALIDATE_URL))
            {
                $this->errors['sponsor_url'] = 'Sponsor link is not valid';
            }
        } else {
            $this->errors['sponsor_url'] = 'Sponsor link is required';
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

}
