<?php

// Name Model

class Name extends Model
{
    public $errors = [];
    protected $table = "table";

    protected $afterSelect = [
        'get_value_row',
        
    ];
    protected $beforeUpdate = [];

    protected $allowedColumns = [
        'column'
    ];
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['key'])) {
            $this->errors['key'] = 'A key is required';
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
