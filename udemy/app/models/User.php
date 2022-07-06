<?php

// User Model

class User extends Model
{
    public $errors = [];
    protected $table = "users";

    protected $afterSelect = [
        'get_user',
        'get_role',
    ];

    protected $allowedColumns = [
        'email', 'password', 'firstname', 'lastname', 'phone', 'role', 'created', 'image', 'slug', 'facebook_link',
    ];
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['firstname'])) {
            $this->errors['firstname'] = 'A first name is required';
        } else
        if (preg_match('/^[a-zA-Z]+$/', trim($data['firstname']))) {
            $this->errors['firstname'] = 'Letters with no spaces';
        }

        if (empty($data['lastname'])) {
            $this->errors['lastname'] = 'A last name is required';
        } else
        if (preg_match('/^[a-zA-Z]+$/', trim($data['lastname']))) {
            $this->errors['lastname'] = 'Letters with no spaces';
        }

        if (empty($data['phone'])) {
            $this->errors['phone'] = 'A phone number is required';
        }
        // check email
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'An email is not valid';
        } else
        if ($this->where(['email' => $data['email']])) {
            $this->errors['email'] = 'That email already exsists';
        }

        if (empty($data['email'])) {
            $this->errors['email'] = 'An email is required';
        }

        if (empty($data['password'])) {
            $this->errors['password'] = 'A password is required';
        }

        if ($data['password'] !== $data['confirm']) {
            $this->errors['password'] = 'Passwords do not match';
        }

        if (empty($data['registering'])) {
            $this->errors['registering'] = 'Please accept our terms and conditions';
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function edit_admin_validate($data, $id)
    {
        $this->errors = [];

        if (empty($data['firstname'])) {
            $this->errors['firstname'] = 'A first name is required';
        } 

        if (empty($data['lastname'])) {
            $this->errors['lastname'] = 'A last name is required';
        } 

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'An email is not valid';
        } 

        if (empty($data['email'])) {
            $this->errors['email'] = 'An email is required';
        }

        if (empty($data['role'])) {
            $this->errors['role'] = 'A role is required';
        }

        if (empty($data['phone'])) {
            $this->errors['phone'] = 'A phone number is required';
        }

        if (preg_match('/^[0-9]$/', trim($data['phone']))) {
            if(!filter_var($data['phone'], FILTER_VALIDATE_URL))
            {
                $this->errors['phone'] = 'Phone number not valid';
            }
        }
        
        if(!empty($data['facebook_link']))
        {
            if(!filter_var($data['facebook_link'], FILTER_VALIDATE_URL))
            {
                $this->errors['facebook_link'] = 'Facebook link is not valid';
            }
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function edit_validate($data, $id)
    {
        $this->errors = [];

        if (empty($data['firstname'])) {
            $this->errors['firstname'] = 'A first name is required';
        } 

        if (empty($data['lastname'])) {
            $this->errors['lastname'] = 'A last name is required';
        } 

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'An email is not valid';
        } 

        if (empty($data['email'])) {
            $this->errors['email'] = 'An email is required';
        }

        if (empty($data['phone'])) {
            $this->errors['phone'] = 'A phone number is required';
        }

        if (preg_match('/^[0-9]$/', trim($data['phone']))) {
            if(!filter_var($data['phone'], FILTER_VALIDATE_URL))
            {
                $this->errors['phone'] = 'Phone number not valid';
            }
        }
        
        if(!empty($data['facebook_link']))
        {
            if(!filter_var($data['facebook_link'], FILTER_VALIDATE_URL))
            {
                $this->errors['facebook_link'] = 'Facebook link is not valid';
            }
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    protected function get_role($rows)
    {
        $db = new Database();
        if(!empty($rows[0]->role))
        {
            
            foreach($rows as $key => $row)
            {
                $query = 'SELECT * FROM roles where id = :id limit 1';
                $role = $db->query($query,['id'=>$row->role]);
                if(!empty($roles)) {
                    $rows[$key]->role_row = $role[0]; 
                }
            }
        }
        return $rows;
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
