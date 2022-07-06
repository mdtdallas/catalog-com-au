<?php

// Cat Model

class Cat extends Model
{
    public $errors = [];
    protected $table = "cats";

    protected $afterSelect = [
        'get_user',
        'get_sex',
        'get_level',
    ];
    protected $beforeUpdate = [];

    protected $allowedColumns = [
        'name',
        'image',
        'birthDate',
        'sex',
        'registration',
        'breeder',
        'sire',
        'dam',
        'pedigreePath',
        'vaccinationPath',
        'email',
        'colour',
        'breed',
        'dateCreated',
        'csrf_code',
        'level',
        'type',
        'bio',
    ];
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['name'])) {
            $this->errors['name'] = 'A name is required';
        }

        if (empty($data['birthDate'])) {
            $this->errors['birthDate'] = 'A birth date is required';
        }

        if (empty($data['sex'])) {
            $this->errors['sex'] = 'A sex is required';
        }

        if (empty($data['registration'])) {
            $this->errors['registration'] = 'A registration number is required';
        } elseif (!preg_match('/^[0-9]+$/', trim($data['registration']))) {
            $this->errors['registration'] = 'numbers only!';
        }

        if (empty($data['breeder'])) {
            $this->errors['breeder'] = 'A breeder is required';
        }

        if (empty($data['sire'])) {
            $this->errors['sire'] = 'A sire is required';
        }

        if (empty($data['dam'])) {
            $this->errors['dam'] = 'A dam is required';
        }

        if (empty($data['colour'])) {
            $this->errors['colour'] = 'A colour is required';
        }

        if (empty($data['breed'])) {
            $this->errors['breed'] = 'A breed is required';
        }


        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function edit_validate($data)
    {
        $this->errors = [];

        if (empty($data['name'])) {
            $this->errors['name'] = 'A name is required';
        }

        if (empty($data['birthDate'])) {
            $this->errors['birthDate'] = 'A birth date is required';
        }

        if (empty($data['sex'])) {
            $this->errors['sex'] = 'A sex is required';
        }

        if (empty($data['registration'])) {
            $this->errors['registration'] = 'A registration number is required';
        } elseif (!preg_match('/^[0-9]+$/', trim($data['registration']))) {
            $this->errors['registration'] = 'numbers only!';
        }

        if (empty($data['breeder'])) {
            $this->errors['breeder'] = 'A breeder is required';
        }

        if (empty($data['sire'])) {
            $this->errors['sire'] = 'A sire is required';
        }

        if (empty($data['dam'])) {
            $this->errors['dam'] = 'A dam is required';
        }

        if (empty($data['colour'])) {
            $this->errors['colour'] = 'A colour is required';
        }

        if (empty($data['breed'])) {
            $this->errors['breed'] = 'A breed is required';
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    protected function get_user($rows)
    {
        $db = new Database();
        if(!empty($rows[0]->email))
        {
            
            foreach($rows as $key => $row)
            {
                $query = 'SELECT * FROM users where email = :email limit 1';
                $user = $db->query($query,['email'=>$row->email]);
                if(!empty($user)) {
                    $user[0]->name = $user[0]->firstname . ' ' . $user[0]->lastname;
                    $rows[$key]->user_row = $user[0]; 
                }
            }
        }
        return $rows;
    }  

    protected function get_sex($rows)
    {
        $db = new Database();
        if(!empty($rows[0]->sex))
        {
            
            foreach($rows as $key => $row)
            {
                $query = 'SELECT * FROM sex where id = :id limit 1';
                $sex = $db->query($query,['id'=>$row->sex]);
                if(!empty($sex)) {
                    $rows[$key]->sex_row = $sex[0]; 
                }
            }
        }
        return $rows;
    }  

    protected function get_level($rows)
    {
        $db = new Database();
        if(!empty($rows[0]->level))
        {
            
            foreach($rows as $key => $row)
            {
                $query = 'SELECT * FROM level where id = :id limit 1';
                $level = $db->query($query,['id'=>$row->level]);
                if(!empty($level)) {
                    $rows[$key]->level_row = $level[0]; 
                }
            }
        }
        return $rows;
    }  

}
