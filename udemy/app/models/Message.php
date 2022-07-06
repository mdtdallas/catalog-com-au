<?php

// Message Model

class Message extends Model
{
    public $errors = [];
    protected $table = "messages";

    protected $afterSelect = [
        'get_user',
        
    ];
    protected $beforeUpdate = [];

    protected $allowedColumns = [
        'message',
        'user_id',
        'email',
        'created',
        'responded',
        'active',
        'name',
        'reply',
    ];
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['message'])) {
            $this->errors['message'] = 'A message is required';
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
