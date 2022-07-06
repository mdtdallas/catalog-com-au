<?php

// MyShows Class

class MyShows extends Controller
{
    public function index()
    {

        if (!Auth::logged_in()) {
            message('Please login');
            redirect('login');
        }
        $show = new Show();
        $booking = new Booking(); 
        $user_id = Auth::getId();

        $data['rows'] = $booking->where(['user_id' => $user_id]);

        $data ['title'] = "My Shows";
        
        $this->view('myshows', $data);
    }

}