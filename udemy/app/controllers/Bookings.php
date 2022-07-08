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
            show($_POST);
            

            $headers = 'Return-Path: info@cat-a-log.com.au' . "\r\n";
            $headers .= 'From: Sender <info@cat-a-log.com.au>' . "\r\n";

            $entryTicket = 'Here is your ticket for ' . ' ' . $_POST['show_id'] . ' ' . $row->showTitle . ' ' . '\r\n';
            $secondEntryTicket = 'Here is your ticket for ' . ' ' . $_POST['show_id'] . ' ' . $row->showTitle . ' ' . '\r\n';
            $raffleTicketQty = 'You can collect ' . $_POST['raffleQty'] . 'tickets from the ticket booth at the ' . $row->location . ' ' . '\r\n';
            $catalogueTicket = 'Here is a ticket for a catalogue' . ' ' . '\r\n';
            $secondCageSize = 'Here is your ticket for a ' . $_POST['secondCageSize'] . '\r\n';
            $firstCageSize = 'Here is your ticket for a ' . $_POST['firstCageSize'] . '\r\n';

            $subject = 'Cat-a-log.com.au' . '\r\n';
            $subject .= 'Cat Show Booking Confirmation' . ' ' . '\r\n';



            if (($_POST['cat_id'] && $_POST['firstCageSize'] && $_POST['raffleQty'] >= 1)) {

                $messageText = $entryTicket;
                $messageText .= $firstCageSize;
                $messageText .= $secondEntryTicket;
                $messageText .= $secondCageSize;

                show('first' . ' ' .  mail($email, $subject, $messageText, $headers));

            } else if (($_POST['cat_id'] && $_POST['second_cat'] && $_POST['secondCageSize'] && $_POST['smallCage'] && $_POST['catalogue'])) {

                $messageText = $entryTicket;
                $messageText .= $secondEntryTicket;
                $messageText .= $secondCageSize;
                $messageText .= $catalogueTicket;

                show('second' . mail($email, $subject, $messageText, $headers));

            } else if (($_POST['cat_id'] && $_POST['second_cat'] && $_POST['secondCageSize'] && $_POST['largeCage'] && $_POST['catalogue'])) {

                $messageText = $entryTicket;
                $messageText .= $secondEntryTicket;
                $messageText .= $secondCageSize;
                $messageText .= $catalogueTicket;

                show('second' . mail($email, $subject, $messageText, $headers));

            }else if (($_POST['cat_id'] && $_POST['second_cat'] && $_POST['secondCageSize'] && $_POST['largeCage'] && $_POST['catalogue'] && $_POST['raffleQty'] >= 1)) {

                $messageText = $entryTicket;
                $messageText .= $secondEntryTicket;
                $messageText .= $secondCageSize;
                $messageText .= $catalogueTicket;
                $messageText .= $raffleTicketQty;

                show('third' . mail($email, $subject, $messageText, $headers));
                
            } else if (($_POST['cat_id'] && $_POST['second_cat'] && $_POST['largeCage'] && $_POST['catalogue'] && $_POST['raffleQty'] = 0)) {
                $messageText = $entryTicket;
                show('forth' . mail($email, $subject, $messageText, $headers));
                
            }

            die;

            $ticketRemaining = $row->entryTicketCount - 1;
            $raffleQty = $_POST['raffleQty'];
            $raffleTicketCount = $row->raffleTicketCount;
            $raffleRemaining = $raffleTicketCount - $raffleQty;

            $ticketCount['entryTicketCount'] = $ticketRemaining;
            $ticketCount['raffleTicketCount'] = $raffleRemaining;

            if ($_POST['second_cat']) {
                $ticketCount['entryTicketCount'] = $ticketRemaining - 1;
            }
            $booking->insert($_POST);
            $show->update($id, $ticketCount);
            message('Ticket Booked Successfully');
            redirect('shows');
        }

        $this->view('bookings', $data);
    }
}
