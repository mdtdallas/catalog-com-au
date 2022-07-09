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

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $_POST['email'] = $email;
            $_POST['user_id'] = $user_id;
            $_POST['show_id'] = $id;
            $_POST['created'] = Date('jS M Y H:i:s');
            $_POST['show_date'] = $row->showDate;
            


            $headers = 'Return-Path: tickets@cat-a-log.com.au' . "\r\n";
            $headers .= 'From: Sender <tickets@cat-a-log.com.au>' . "\r\n";
            $subject = 'Cat-a-log.com.au' .  "\r\n";
            $subject .= 'Cat Show Booking Confirmation' . ' ' .  "\r\n";

            $entryTicket = 'Here is your ticket for show ' . $_POST['show_id'] . ' ' . $row->showTitle . "\r\n" . "\r\n";
            $firstCageSize = 'Here is your ticket for a ' . $_POST['firstCageSize'] . ' cage ' . "\r\n" . "\r\n";
            $secondEntryTicket = 'Here is your second ticket for ' .  $_POST['show_id'] . ' ' . $row->showTitle . ' ' .  "\r\n" . "\r\n";
            $secondCageSize = 'Here is your ticket for a ' . $_POST['secondCageSize'] . ' cage ' . "\r\n" . "\r\n";
            $catalogueTicket = 'Here is a ticket for a catalogue' . ' ' .  "\r\n" . "\r\n";
            $raffleTicket = 'You can collect ' . $_POST['raffleQty'] . ' raffle tickets from the ticket booth at the ' . $row->location . ' ' .  "\r\n" . "\r\n";

            if ($_POST['cat_id'] && $_POST['firstCageSize']) {

                $messageText = $entryTicket;
                $messageText .= $firstCageSize;
            }

            if ($_POST['second_cat_id'] && $_POST['secondCageSize']) {

                $messageText .= $secondEntryTicket;
                $messageText .= $secondCageSize;
            }

            if (!empty($_POST['catalogue'])) {

                $messageText .= $catalogueTicket;
            }

            if ($_POST['raffleQty'] >= 1) {

                $messageText .= $raffleTicket;
                $raffleQty = $_POST['raffleQty'];
                $raffleTicketCount = $row->raffleTicketCount;
                $raffleRemaining = $raffleTicketCount - $raffleQty;
                $ticketCount['raffleTicketCount'] = $raffleRemaining;
            }


            $ticketRemaining = $row->entryTicketCount - 1;


            $ticketCount['entryTicketCount'] = $ticketRemaining;


            if (!empty($_POST['second_cat'])) {
                $ticketCount['entryTicketCount'] = $ticketRemaining - 1;
            }
            if ($booking->validate($_POST)) {
                $booking->insert($_POST);
                $show->update($id, $ticketCount);
                //message('Ticket Booked Successfully');
                redirect('shows');
            } else {
                $data['errors'] = $booking->errors;
            }
            
        }

        $this->view('bookings', $data);
    }
}
