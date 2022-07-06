<?php

// Show Model

class Show extends Model
{
    public $errors = [];
    protected $table = "shows";

    protected $afterSelect = [
        'get_user',
        'get_council',
        'get_sponsor'
    ];
    protected $beforeUpdate = [];

    protected $allowedColumns = [
        'image',
        'showTitle',
        'showDate',
        'showTime',
        'entryClosingDate',
        'council',
        'sponsorName',
        'location',
        'map',
        'additionalInformation',
        'rulesPath',
        'covidPath',
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
        'managersName',
        'managersPhone',
        'managersEmail',
        'entryTicketPrice',
        'entryTicketCount',
        'secondEntryTicketPrice',
        'smallCagePrice',
        'largeCagePrice',
        'cataloguePrice',
        'rafflePrice',
        'raffleTicketCount',
        'created',
        'updated_on',
        'userEmail',
        'user_id',
        'approved',
        'published',
        'draft'

    ];
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['showTitle'])) {
            $this->errors['showTitle'] = 'A title is required';
        }

        if (empty($data['showDate'])) {
            $this->errors['showDate'] = 'A date is required';
        }

        if (empty($data['showTime'])) {
            $this->errors['showTime'] = 'A time is required';
        }

        if (empty($data['location'])) {
            $this->errors['location'] = 'A location is required';
        }

        if (empty($data['entryTicketPrice'])) {
            $this->errors['entryTicketPrice'] = 'A ticket price is required';
        } else
        if ($data['entryTicketPrice'] < 1) {
            $this->errors['entryTicketPrice'] = 'Ticket price must be greater than 1';
        }

        if (empty($data['entryTicketCount'])) {
            $this->errors['entryTicketCount'] = 'A ticket amount is required';
        } else
        if ($data['entryTicketCount'] < 1) {
            $this->errors['entryTicketCount'] = 'Ticket amount must be greater than 1';
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function edit_validate($data, $id = null)
    {
        $this->errors = [];

        if (empty($data['showTitle'])) {
            $this->errors['showTitle'] = 'A title is required';
        } 

        if (empty($data['showDate'])) {
            $this->errors['showDate'] = 'A date is required';
        }

        if (empty($data['showTime'])) {
            $this->errors['showTime'] = 'A time is required';
        }

        // if (empty($data['image'])) {
        //     $this->errors['image'] = 'An image is required';
        // }

        if (empty($data['location'])) {
            $this->errors['location'] = 'A location is required';
        }

        if (empty($data['entryTicketPrice'])) {
            $this->errors['entryTicketPrice'] = 'A ticket price is required';
        } else
        if ($data['entryTicketPrice'] < 1) {
            $this->errors['entryTicketPrice'] = 'Ticket price must be greater than 1';
        }

        if (empty($data['entryTicketCount'])) {
            $this->errors['entryTicketCount'] = 'A ticket amount is required';
        } else
        if ($data['entryTicketCount'] < 1) {
            $this->errors['entryTicketCount'] = 'Ticket amount must be greater than 1';
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

    protected function get_council($rows)
    {
        $db = new Database();
        if(!empty($rows[0]->council))
        {
            
            foreach($rows as $key => $row)
            {
                $query = 'SELECT * FROM councils where id = :id limit 1';
                $council = $db->query($query,['id'=>$row->council]);
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
        if(!empty($rows[0]->sponsorName))
        {
            
            foreach($rows as $key => $row)
            {
                $query = 'SELECT * FROM sponsors where id = :id limit 1';
                $sponsor = $db->query($query,['id'=>$row->sponsorName]);
                if(!empty($sponsor)) {
                    $rows[$key]->sponsor_row = $sponsor[0]; 
                }
            }
        }
        return $rows;
    } 
}
