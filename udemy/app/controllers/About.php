<?php

// About Class

class About extends Controller
{
    public function index()
    {
        $data = [];
        $booking = new Booking();
        $user = new User();
        $show = new Show();
        $cat = new Cat();
        $data['users'] = $user->findAll();
        $data['cats'] = $cat->findAll();
        $data['shows'] = $show->findAll();
        $data['bookings'] = $booking->findAll();
        $data['total_bookings'] = count($data['bookings']);
        $data['total_users'] = count($data['users']);
        $data['total_shows'] = count($data['shows']);
        $data['total_cats'] = count($data['cats']);
        $data['title'] = "About Page";

        $this->view('about', $data);
    }
}
