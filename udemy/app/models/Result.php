<?php

// Result Model

class Result extends Model
{
    public $errors = [];
    protected $table = "results";

    protected $afterSelect = [
        'get_cat',
        'get_show',
        
    ];
    protected $beforeUpdate = [];

    protected $allowedColumns = [
        'R1LHK',
        'R1LHE',
        'R1LHD',
        'R1SHK',
        'R1SHE',
        'R1SHD',
        'R1Companion',
        'R2LHK',
        'R2LHE',
        'R2LHD',
        'R2SHK',
        'R2SHE',
        'R2SHD',
        'R2Companion',
        'R3LHK',
        'R3LHE',
        'R3LHD',
        'R3SHK',
        'R3SHE',
        'R3SHD',
        'R3Companion',
        'R4LHK',
        'R4LHE',
        'R4LHD',
        'R4SHK',
        'R4SHE',
        'R4SHD',
        'R4Companion',
        'R5LHK',
        'R5LHE',
        'R5LHD',
        'R5SHK',
        'R5SHE',
        'R5SHD',
        'R5Companion',
        'R6LHK',
        'R6LHE',
        'R6LHD',
        'R6SHK',
        'R6SHE',
        'R6SHD',
        'R6Companion',
        'showID'
    ];
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['R1LHK'])) {
            $this->errors['R1LHK'] = 'A R1LHK is required';
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    protected function get_cat($rows)
    {
        $db = new Database();
        if(!empty($rows[0]->id))
        {
            
            foreach($rows as $key => $row)
            {
                $query = 'SELECT * FROM cats where id = :id limit 1';
                $cat = $db->query($query,['id'=>$row->id]);
                if(!empty($cat)) {
                    $rows[$key]->cat_row = $cat[0]; 
                }
            }
        }
        return $rows;
    }  


}
