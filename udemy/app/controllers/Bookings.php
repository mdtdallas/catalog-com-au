<?php

// Bookings Class

class Bookings extends Controller
{
    public function index($id)
    {

        if (!Auth::logged_in()) {
            message('Please login');
            redirect('login');
        }

        
        $show = new Show();
        $cat = new Cat();
        $email = Auth::getEmail();
        $user_id = Auth::getId();
        $booking = new Booking();
        $data['id'] = $id;
        $data['title'] = "Bookings Page";
        $data['row'] = $row = $show->first(['id' => $id]);
        $data['rows'] = $cat->where(['email' => $email]);

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            $_POST['email'] = $email;
            $_POST['user_id'] = $user_id;
            $_POST['show_id'] = $id;
            $_POST['created'] = Date('jS M Y H:i:s');
            $_POST['show_date'] = $row->showDate;

            $booking->insert($_POST);

            $headers = 'Return-Path: mdtdallas@hotmail.com' ."\r\n";
            $headers .= 'From: Sender <mdtdallas@hotmail.com>' . "\r\n";

            message('Ticket Booked Seccessfully');
            mail($email, 'Cat Show Booking Confirmation', 'Here is your Ticket to show # '.$_POST['show_id'], $headers);

            $ticketRemaining = $row->entryTicketCount - 1;
            $raffleQty = $_POST['raffleQty'];
            $raffleTicketCount = $row->raffleTicketCount;
            $raffleRemaining = $raffleTicketCount - $raffleQty;

            $ticketCount['entryTicketCount'] = $ticketRemaining;
            $ticketCount['raffleTicketCount'] = $raffleRemaining;

            if($_POST['second_cat']) {
               $ticketCount['entryTicketCount'] = $ticketRemaining - 1;
            }
            
            $show->update($id, $ticketCount);

        }
        
        $this->view('bookings', $data);
    }

}