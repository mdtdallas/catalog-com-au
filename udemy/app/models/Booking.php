<?php

// Booking Model

class Booking extends Model
{
    public $errors = [];
    protected $table = "bookings";

    protected $afterSelect = [
        'get_show',
        'get_council',
        'get_sponsor',
        'get_cat',
        'get_second_cat',
    ];
    protected $beforeUpdate = [];

    protected $allowedColumns = [
        'show_id'
        ,'email'
        ,'created'
        ,'cat_id'
        ,'user_id'
        ,'show_date'
        ,'raffleQty'
        ,'catalogue'
        ,'second_cat_id'
        ,'payment_id'
        ,'smallCage'
        ,'largeCage'
        ,'second_cat'
    ];
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['show_id'])) {
            $this->errors['show_id'] = 'A show_id is required';
        }

        if (empty($data['email'])) {
            $this->errors['email'] = 'An email is required';
        }

        if (empty($data['user_id'])) {
            $this->errors['user_id'] = 'A user_id is required';
        }

        if (empty($data['cat_id'])) {
            $this->errors['cat_id'] = 'A cat_id is required';
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    protected function get_show($rows)
    {
        $db = new Database();
        if(!empty($rows[0]->show_id))
        {
            
            foreach($rows as $key => $row)
            {
                $query = 'SELECT * FROM shows where id = :show_id limit 1';
              
                $show = $db->query($query,['show_id'=>$row->show_id]);
               
                if(!empty($show)) {
                    $rows[$key]->show_row = $show[0]; 
                }
            }
        }
        return $rows;
    } 

    protected function get_council($rows)
    {
        $db = new Database();
        if(!empty($rows[0]->show_row->council))
        {
            
            foreach($rows as $key => $row)
            {
                $query = 'SELECT * FROM councils where id = :id limit 1';
                $council = $db->query($query,['id'=>$row->show_row->council]);
                if(!empty($council)) {
                    $rows[$key]->council_row = $council[0]; 
                }
            }
        }
        return $rows;
    }

    protected function get_sponsor($rows)
    {
        $db = new Database();
        if(!empty($rows[0]->show_row->sponsorName))
        {
            
            foreach($rows as $key => $row)
            {
                $query = 'SELECT * FROM sponsors where id = :id limit 1';
                $sponsor = $db->query($query,['id'=>$row->show_row->sponsorName]);
                if(!empty($sponsor)) {
                    $rows[$key]->sponsor_row = $sponsor[0]; 
                }
            }
        }
        return $rows;
    } 

    protected function get_cat($rows)
    {
        $db = new Database();
        if(!empty($rows[0]->cat_id))
        {
            
            foreach($rows as $key => $row)
            {
                $query = 'SELECT * FROM cats where id = :id limit 1';
                $cat = $db->query($query,['id'=>$row->cat_id]);
                if(!empty($cat)) {
                    $rows[$key]->cat_row = $cat[0]; 
                }
            }
        }
        return $rows;
    } 

    protected function get_second_cat($rows)
    {
        $db = new Database();
        if(!empty($rows[0]->second_cat_id))
        {
            
            foreach($rows as $key => $row)
            {
                $query = 'SELECT * FROM cats where id = :id limit 1';
                $secondCat = $db->query($query,['id'=>$row->second_cat_id]);
                if(!empty($secondCat)) {
                    $rows[$key]->second_cat_row = $secondCat[0]; 
                }
            }
        }
        
        return $rows;
    } 

}
