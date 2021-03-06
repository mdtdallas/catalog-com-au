<?php

// Council Model

class Council extends Model
{
    public $errors = [];
    protected $table = "councils";

    protected $afterSelect = [
        'get_user',
        
    ];
    protected $beforeUpdate = [];

    protected $allowedColumns = [
        'council', 'councilName', 'councilImagePath', 'street', 'suburb', 'state', 'postcode', 'councilPhone', 'councilEmail', 'councilURL', 'dateCreated', 'user_id', 'disabled'
    ];
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['council'])) {
            $this->errors['council'] = 'council\'s name is required';
        } 

        if (empty($data['councilName'])) {
            $this->errors['councilName'] = 'council\'s full name is required';
        } 

        if (empty($data['street'])) {
            $this->errors['street'] = 'Street is required';
        }

        if (empty($data['suburb'])) {
            $this->errors['suburb'] = 'suburb is required';
        }

        if (empty($data['state'])) {
            $this->errors['state'] = 'state is required';
        }

        if (empty($data['postcode'])) {
            $this->errors['postcode'] = 'postcode is required';
        } elseif (!preg_match('/^[0-9]+$/', trim($data['postcode']))) {
            $this->errors['postcode'] = 'numbers only!';
        }

        if (empty($data['councilPhone'])) {
            $this->errors['councilPhone'] = 'Phone is required';
        } elseif (!preg_match('/^[0-9]+$/', trim($data['councilPhone']))) {
            $this->errors['councilPhone'] = 'numbers only!';
        }

        if (!filter_var($data['councilEmail'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['councilEmail'] = 'An email is not valid';
        }

        if(!empty($data['councilURL']))
        {
            if(!filter_var($data['councilURL'], FILTER_VALIDATE_URL))
            {
                $this->errors['councilURL'] = 'Sponsor link is not valid';
            }
        } else {
            $this->errors['councilURL'] = 'Sponsor link is required';
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function edit_validate($data)
    {
        $this->errors = [];

        if (empty($data['council'])) {
            $this->errors['council'] = 'council\'s name is required';
        } 

        if (empty($data['councilName'])) {
            $this->errors['councilName'] = 'council\'s full name is required';
        } 

        if (empty($data['street'])) {
            $this->errors['street'] = 'Street is required';
        }

        if (empty($data['suburb'])) {
            $this->errors['suburb'] = 'suburb is required';
        }

        if (empty($data['state'])) {
            $this->errors['state'] = 'state is required';
        }

        if (empty($data['postcode'])) {
            $this->errors['postcode'] = 'postcode is required';
        } elseif (!preg_match('/^[0-9]+$/', trim($data['postcode']))) {
            $this->errors['postcode'] = 'numbers only!';
        }

        if (empty($data['councilPhone'])) {
            $this->errors['councilPhone'] = 'Phone is required';
        } elseif (!preg_match('/^[0-9]+$/', trim($data['councilPhone']))) {
            $this->errors['councilPhone'] = 'numbers only!';
        }

        if (!filter_var($data['councilEmail'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['councilEmail'] = 'An email is not valid';
        }

        if(!empty($data['councilURL']))
        {
            if(!filter_var($data['councilURL'], FILTER_VALIDATE_URL))
            {
                $this->errors['councilURL'] = 'Sponsor link is not valid';
            }
        } else {
            $this->errors['councilURL'] = 'Sponsor link is required';
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    protected function get_user($rows)
    {
        $db = new Database();
        if(!empty($rows[0]->user_id))
        {
            
            foreach($rows as $key => $row)
            {
                $query = 'SELECT * FROM users where id = :id limit 1';
                $user = $db->query($query,['id'=>$row->user_id]);
                if(!empty($user)) {
                    $user[0]->name = $user[0]->firstname . ' ' . $user[0]->lastname;
                    $rows[$key]->user_row = $user[0]; 
                }
            }
        }
        return $rows;
    } 

}
