<?php

// Admin Dashboard Class

class Admin extends Controller
{
    public function index()
    {
        if (!Auth::logged_in()) {
            message('Please login to view admin section');
            redirect('login');
        }
        $message = new Message();
        $booking = new Booking();

        $data['messages'] = $message->where(['active' => 'yes']);
        $data['bookings'] = $booking->where(['active' => 'yes']);
        $data['total_messages'] = count($data['messages']);
        $data['total_bookings'] = count($data['bookings']);
        $data['title'] = "Dashboard";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            show($_POST);
            $data['id'] = $_POST['active'];
            $booking->update($id, $data);
        }

        $this->view('admin/dashboard', $data);
    }

    public function profile($id = null)
    {
        if (!Auth::logged_in()) {
            message('Please login to view admin section');
            redirect('login');
        }
        $id = Auth::getId();
        $user = new User();
        $role = new Role();
        $data['id'] = $id;

        $data['row'] = $row = $user->first(['id' => $id, 'id' => $id]);
        $data['roles'] = $role->findAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $row) {

            $folder = 'uploads/images/';
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
                file_put_contents($folder . 'index.php', '<?php // silence');
                file_put_contents('uploads/index.php', '<?php // silence');
            }

            if ($user->edit_admin_validate($_POST, $id)) {

                $allowed = ['image/png', 'image/jpeg', 'image/jpg'];
                if (!empty($_FILES['image']['name'])) {
                    if ($_FILES['image']['error'] == 0) {
                        if (in_array($_FILES['image']['type'], $allowed)) {
                            // All good
                            $destination = $folder . time() . $_FILES['image']['name'];
                            move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                            resize_image($destination);
                            $_POST['image'] = $destination;
                            if (file_exists($row->image)) {
                                unlink($row->image);
                            }
                        } else {
                            $user->errors['image'] = 'Image files only';
                        }
                    } else {
                        $user->errors['image'] = 'upload failed';
                    }
                }
                $user->update($id, $_POST);
            }
            if (empty($user->errors)) {

                message('Profile saved successfully');
                redirect('admin/users');
            } else {
                $arr['message'] = 'Please correct these errors';
                $arr['errors'] = $user->errors;
            }
        }

        $data['title'] = "Profile";
        $data['errors'] = $user->errors;
        $this->view('admin/profile', $data);
    }

    public function shows($action = null, $id = null)
    {
        if (!Auth::logged_in()) {
            message('Please login to view admin section');
            redirect('login');
        }
        $data = [];
        $user_id = Auth::getId();
        $email = Auth::getEmail();
        $show = new Show();
        $cat = new Cat();
        $data['title'] = "Shows";
        $data['action'] = $action;
        $data['id'] = $id;

        $sponsor = new Sponsor();
        $council = new Council();
        $result = new Result();

        if ($action == 'add') {

            $data['sponsors'] = $sponsor->findAll();
            $data['councils'] = $council->findAll();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $folder = 'uploads/images/';
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                    file_put_contents($folder . 'index.php', '<?php // silence');
                    file_put_contents('uploads/index.php', '<?php // silence');
                }

                $allowed = ['image/png', 'image/jpeg', 'image/jpg'];

                if ($show->validate($_POST)) {

                    $_POST['created'] = date('d-m-Y H:i:s');
                    $_POST['user_id'] = $user_id;
                    $_POST['userEmail'] = $email;

                    if (!empty($_FILES['image']['name'])) {
                        if ($_FILES['image']['error'] == 0) {
                            if (in_array($_FILES['image']['type'], $allowed)) {
                                // All good
                                $destination = $folder . time() . $_FILES['image']['name'];
                                move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                                resize_image($destination);
                                $_POST['image'] = $destination;
                            } else {
                                $show->errors['image'] = 'Image files only';
                            }
                        } else {
                            $show->errors['image'] = 'upload failed';
                        }
                    }

                    $show->insert($_POST);
                    $add['R1LHK'] = null;
                    $result->insert($add);
                    redirect('admin/shows');

                    $row = $show->first(['user_id' => $user_id, 'published' => 'off']);

                    message('Your show has been created!');
                    if ($row) {

                        redirect('admin/shows/edit/' . $row->id);
                    } else {

                        redirect('admin/shows');
                    }
                }
                $data['errors'] = $show->errors;
            }
        } elseif ($action == 'edit') {

            $data['sponsors'] = $sponsor->findAll();
            $data['councils'] = $council->findAll();

            // get shows info
            $data['row'] = $row = $show->first(['user_id' => $user_id, 'id' => $id]);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $folder = 'uploads/images/';
                $pdfFolder = 'uploads/pdf/';
                if (!file_exists($folder)) {

                    mkdir($folder, 0777, true);
                    file_put_contents($folder . 'index.php', '<?php // silence');
                    file_put_contents('uploads/index.php', '<?php // silence');
                }

                if (!file_exists($pdfFolder)) {
                    mkdir($pdfFolder, 0777, true);
                    file_put_contents($pdfFolder . 'index.php', '<?php // silence');
                    file_put_contents('uploads/index.php', '<?php // silence');
                }

                if ($show->validate($_POST)) {
                    $allowed = ['image/png', 'image/jpeg', 'image/jpg', 'application/pdf'];

                    if (!empty($_FILES['image']['name'])) {

                        if ($_FILES['image']['error'] == 0) {

                            if (in_array($_FILES['image']['type'], $allowed)) {

                                $destination = $folder . time() . $_FILES['image']['name'];
                                move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                                resize_image($destination);
                                if (file_exists($row->image)) {
                                    unlink($row->image);
                                }
                                $_POST['image'] = $destination;
                            } else {
                                $cat->errors['image'] = 'Image Files Only';
                            }
                        }
                    }
                    if (!empty($_FILES['covidPath']['name'])) {

                        if ($_FILES['covidPath']['error'] == 0) {

                            if (in_array($_FILES['covidPath']['type'], $allowed)) {

                                $destination = $pdfFolder . time() . $_FILES['covidPath']['name'];
                                move_uploaded_file($_FILES['covidPath']['tmp_name'], $destination);
                                $_POST['covidPath'] = $destination;
                                if (file_exists($row->covidPath)) {
                                    unlink($row->covidPath);
                                }
                            } else {
                                $cat->errors['covidPath'] = 'Image Files Only';
                            }
                        }
                    }
                    if (!empty($_FILES['rulesPath']['name'])) {

                        if ($_FILES['rulesPath']['error'] == 0) {

                            if (in_array($_FILES['rulesPath']['type'], $allowed)) {

                                $destination = $pdfFolder . time() . $_FILES['rulesPath']['name'];
                                move_uploaded_file($_FILES['rulesPath']['tmp_name'], $destination);
                                $_POST['rulesPath'] = $destination;
                                if (file_exists($row->rulesPath)) {
                                    unlink($row->rulesPath);
                                }
                            } else {
                                $cat->errors['rulesPath'] = 'Image Files Only';
                            }
                        }
                    }

                    $_POST['id'] = $data['id'];
                    $_POST['updated_on'] = date('d-m-Y H:i:s');
                    $_POST['userEmail'] = $email;
                    $show->update($id, $_POST);
                    message('Show has been updated!');
                    redirect('admin/shows');
                    
                }
                if (empty($show->errors)) {
                    message('Show Updated!');
                } else {
                    $arr['message'] = 'Please correct the errors';
                    $arr['errors'] = $show->errors;
                }
            }
        } elseif ($action == 'results') {

            $data['cats'] = $cat->findAll();
            $data['results'] = $result->first(['id' => $id]);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                if ($result->validate($_POST)) {
                    $_POST['showID'] = $id;
                    $result->update($id, $_POST);
                    redirect('admin/shows');
                }
            }
        } else {
            // shows view
            $data['rows'] = $show->where(['user_id' => $user_id]);
        }
        $data['rows'] = $show->where(['user_id' => $user_id]);
        $this->view('admin/shows', $data);
    }

    public function users($action = null, $id = null)
    {
        if (!Auth::is_admin()) {
            message('Please login to view admin section');
            redirect('login');
        }

        $data = [];
        $data['id'] = $id;
        $data['title'] = "Users";
        $data['action'] = $action;
        $user = new User();
        $role = new Role();


        $data['roles'] = $role->findAll();

        if ($action == 'edit') {

            $data['row'] = $row = $user->first(['id' => $id]);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $folder = 'uploads/images/';
                $allowed = ['image/png', 'image/jpeg', 'image/jpg'];

                if (!empty($_FILES['image']['name'])) {

                    if ($_FILES['image']['error'] === 0) {

                        if (in_array($_FILES['image']['type'], $allowed)) {

                            $destination = $folder . time() . $_FILES['image']['name'];
                            move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                            resize_image($destination);

                            if (file_exists($row->image)) {
                                unlink($row->image);
                            }

                            $_POST['image'] = $destination;
                        } else {
                            $user->errors['image'] = 'Image Files Only!';
                        }
                    }
                }

                $user->update($id, $_POST);
                message('User Updated');
                redirect('admin/users');
            }
        }
        $data['rows'] = $user->findAll();
        $this->view('admin/users', $data);
    }

    public function cats($action = null, $id = null)
    {
        if (!Auth::is_admin()) {
            message('Please login to view admin section');
            redirect('login');
        }

        $data['id'] = $id;
        $data['action'] = $action;
        $type = new Type();
        $cat = new Cat();
        $sex = new Sex();
        $level = new Level();
        $colour = new Colour();
        $breed = new Breed();
        $user_id = Auth::getId();
        $email = Auth::getEmail();
        $data['row'] = $row = $cat->first(['id' => $id]);
        $data['rows'] = $cat->findAll();


        if ($action == 'add') {

            $data['colours'] = $colour->findAll();
            $data['breeds'] = $breed->findAll();
            $data['sexes'] = $sex->findAll();
            $data['types'] = $type->findAll();
            $data['levels'] = $level->findAll();


            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $folder = 'uploads/images/';
                $pdfFolder = 'uploads/pdf/';

                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                    file_put_contents($folder . 'index.php', '<?php // silence');
                    file_put_contents('uploads/index.php', '<?php // silence');
                }
                if (!file_exists($pdfFolder)) {
                    mkdir($pdfFolder, 0777, true);
                    file_put_contents($pdfFolder . 'index.php', '<?php // silence');
                    file_put_contents('uploads/index.php', '<?php // silence');
                }

                $allowed = ['image/png', 'image/jpeg', 'image/jpg', 'application/pdf'];

                if ($cat->validate($_POST)) {

                    if (!empty($_FILES['image']['name'])) {

                        if ($_FILES['image']['error'] == 0) {

                            if (in_array($_FILES['image']['type'], $allowed)) {

                                $destination = $folder . time() . $_FILES['image']['name'];
                                move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                                resize_image($destination);
                                $_POST['image'] = $destination;
                            } else {
                                $cat->errors['image'] = 'Images files only!';
                            }
                        } else {
                            $cat->errors['image'] = 'Upload Failed';
                        }
                    }
                    if (!empty($_FILES['pedigreePath']['name'])) {

                        if ($_FILES['pedigreePath']['error'] == 0) {

                            if (in_array($_FILES['pedigreePath']['type'], $allowed)) {

                                $pdfdestinationPed = $pdfFolder . time() . $_FILES['pedigreePath']['name'];
                                move_uploaded_file($_FILES['pedigreePath']['tmp_name'], $pdfdestinationPed);
                                $_POST['pedigreePath'] = $pdfdestinationPed;
                            } else {
                                $cat->errors['pedigreePath'] = 'Image Files Only';
                            }
                        }
                    }
                    if (!empty($_FILES['vaccinationPath']['name'])) {

                        if ($_FILES['vaccinationPath']['error'] == 0) {

                            if (in_array($_FILES['vaccinationPath']['type'], $allowed)) {

                                $pdfdestinationVac = $pdfFolder . time() . $_FILES['vaccinationPath']['name'];
                                move_uploaded_file($_FILES['vaccinationPath']['tmp_name'], $pdfdestinationVac);
                                $_POST['vaccinationPath'] = $pdfdestinationVac;
                            } else {
                                $cat->errors['vaccinationPath'] = 'Image Files Only';
                            }
                        }
                    }

                    $_POST['dateCreated'] = date('d-m-Y H:i:s');
                    $_POST['email'] = $email;

                    $cat->insert($_POST);
                    message('Cat has been added');
                    redirect('admin/cats');

                }
                $data['errros'] = $cat->errors;
            }
        }

        if ($action == 'edit') {

            $data['colours'] = $colour->findAll();
            $data['breeds'] = $breed->findAll();
            $data['sexes'] = $sex->findAll();
            $data['types'] = $type->findAll();
            $data['levels'] = $level->findAll();


            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $folder = 'uploads/images/';
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                    file_put_contents($folder . 'index.php', '<?php // silence');
                    file_put_contents('uploads/index.php', '<?php // silence');
                }

                $allowed = ['image/png', 'image/jpeg', 'image/jpg', 'application/pdf'];

                if ($cat->validate($_POST)) {

                    if (!empty($_FILES['image']['name'])) {

                        if ($_FILES['image']['error'] == 0) {

                            if (in_array($_FILES['image']['type'], $allowed)) {

                                $destination = $folder . time() . $_FILES['image']['name'];
                                move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                                resize_image($destination);
                                $_POST['image'] = $destination;
                                if (file_exists($row->image)) {
                                    unlink($row->image);
                                }
                            } else {
                                $cat->errors['image'] = 'Images files only!';
                            }
                        } else {
                            $cat->errors['image'] = 'Upload Failed';
                        }
                    }
                    if (!empty($_FILES['pedigreePath']['name'])) {

                        if ($_FILES['pedigreePath']['error'] == 0) {

                            if (in_array($_FILES['pedigreePath']['type'], $allowed)) {

                                $pdfdestinationPed = $pdfFolder . time() . $_FILES['pedigreePath']['name'];
                                move_uploaded_file($_FILES['pedigreePath']['tmp_name'], $pdfdestinationPed);
                                $_POST['pedigreePath'] = $pdfdestinationPed;
                                if (file_exists($row->pedigreePath)) {
                                    unlink($row->pedigreePath);
                                }
                            } else {
                                $cat->errors['pedigreePath'] = 'Image Files Only';
                            }
                        }
                    }
                    if (!empty($_FILES['vaccinationPath']['name'])) {

                        if ($_FILES['vaccinationPath']['error'] == 0) {

                            if (in_array($_FILES['vaccinationPath']['type'], $allowed)) {

                                $pdfdestinationVac = $pdfFolder . time() . $_FILES['vaccinationPath']['name'];
                                move_uploaded_file($_FILES['vaccinationPath']['tmp_name'], $pdfdestinationVac);
                                $_POST['vaccinationPath'] = $pdfdestinationVac;
                                if (file_exists($row->vaccinationPath)) {
                                    unlink($row->vaccinationPath);
                                }
                            } else {
                                $cat->errors['vaccinationPath'] = 'Image Files Only';
                            }
                        }
                    }
                    $_POST['email'] = $email;
                    $cat->update($id, $_POST);
                    message('Cat has been added');
                    redirect('admin/cats');
                }
                $data['errros'] = $cat->errors;
            }
        }

        if ($action == 'delete') {
        }



        $data['title'] = "Cats";

        $this->view('admin/cats', $data);
    }

    public function councils($action = null, $id = null)
    {

        if (!Auth::is_admin()) {
            message('Please login to view admin section');
            redirect('login');
        }

        $data = [];
        $data['id'] = $id;
        $data['action'] = $action;
        $council = new Council();
        
        
        if ($action == 'add') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $folder = 'uploads/images/';
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                    file_put_contents($folder . 'index.php', '<?php // silence');
                    file_put_contents('uploads/index.php', '<?php // silence');
                }
                $allowed = ['image/png', 'image/jpeg', 'image/jpg'];
                if ($council->validate($_POST)) {
                    if (!empty($_FILES['councilImagePath']['name'])) {
                        if ($_FILES['councilImagePath']['error'] == 0) {
                            if (in_array($_FILES['councilImagePath']['type'], $allowed)) {
                                $destination = $folder . time() . $_FILES['councilImagePath']['name'];
                                move_uploaded_file($_FILES['councilImagePath']['tmp_name'], $destination);
                                resize_image($destination);
                                $_POST['councilImagePath'] = $destination;
                            } else {
                                $council->errors['councilImagePath'] = 'Images Files Only';
                            }
                        } else {
                            $council->errors['councilImagePath'] = 'Upload Failed';
                        }
                    }
                    $_POST['user_id'] = Auth::getId();
                    show($_POST);
                    $council->insert($_POST);
                    redirect('admin/councils');
                    message('Cat Council Created');
                } else {
                    $data['errors'] = $council->errors;
                }
            }
        }


        if ($action == 'edit') {
            $data['row'] = $row = $council->first(['id' => $id]);

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $row) {
                $folder = 'uploads/images/';
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                    file_put_contents($folder . 'index.php', '<?php // silence');
                    file_put_contents('uploads/index.php', '<?php // silence');
                }
                $allowed = ['image/png', 'image/jpeg', 'image/jpg'];

                if ($council->edit_validate($_POST)) {
                    if (!empty($_FILES['councilImagePath']['name'])) {
                        if ($_FILES['councilImagePath']['error'] == 0) {
                            if (in_array($_FILES['councilImagePath']['type'], $allowed)) {
                                $destination = $folder . time() . $_FILES['councilImagePath']['name'];
                                move_uploaded_file($_FILES['councilImagePath']['tmp_name'], $destination);
                                resize_image($destination);
                                $_POST['councilImagePath'] = $destination;
                                if (file_exists($row->councilImagePath)) {
                                    unlink($row->councilImagePath);
                                }
                            } else {
                                $council->errors['councilImagePath'] = 'Images Files Only';
                            }
                        } else {
                            $council->errors['councilImagePath'] = 'Upload Failed';
                        }
                    }

                    $_POST['user_id'] = Auth::getId();
                    show($_POST);
                    $council->update($id, $_POST);
                    message('Cat Council Updated');
                } else {
                    $data['errors'] = $council->errors;
                }
            }
        }
        show($data);
        $data['errors'] = $council->errors;
        $data['rows'] = $council->where(['disabled' => 'no']);
        $this->view('admin/councils', $data);
    }

    public function sponsors($action = null, $id = null)
    {

        if (!Auth::is_admin()) {
            message('Please login to view admin section');
            redirect('login');
        }

        $data = [];
        $data['id'] = $id;
        $data['action'] = $action;
        $sponsor = new Sponsor();
        $data['rows'] = $sponsor->findAll();

        if ($action == 'add') {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $folder = 'uploads/images/';
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                    file_put_contents($folder . 'index.php', '<?php // silence');
                    file_put_contents('uploads/index.php', '<?php // silence');
                }


                if ($sponsor->validate($_POST)) {
                    $allowed = ['image/png', 'image/jpeg', 'image/jpg'];
                    if (!empty($_FILES['sponsor_image']['name'])) {
                        if ($_FILES['sponsor_image']['error'] == 0) {
                            if (in_array($_FILES['sponsor_image']['type'], $allowed)) {
                                $destination = $folder . time() . $_FILES['sponsor_image']['name'];
                                move_uploaded_file($_FILES['sponsor_image']['tmp_name'], $destination);
                                resize_image($destination);
                                $_POST['sponsor_image'] = $destination;
                            } else {
                                $sponsor->errors['sponsor_image'] = 'Images Only!';
                            }
                        } else {
                            $sponsor->errors['sponsor_image'] = 'Upload Failed!';
                        }
                    }
                    $_POST['user_id'] = Auth::getId();
                    show($_POST);
                    $sponsor->insert($_POST);
                    redirect('admin/sponsors');
                    message('Sponsor Created');
                } else {

                    $data['errors'] = $sponsor->errors;
                }
            }
        }

        if ($action == 'edit') {

            $data['row'] = $row = $sponsor->where(['id' => $id]);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $folder = 'uploads/images/';
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                    file_put_contents($folder . 'index.php', '<?php // silence');
                    file_put_contents('uploads/index.php', '<?php // silence');
                }


                if ($sponsor->validate($_POST)) {
                    $allowed = ['image/png', 'image/jpeg', 'image/jpg'];
                    if (!empty($_FILES['sponsor_image']['name'])) {
                        if ($_FILES['sponsor_image']['error'] == 0) {
                            if (in_array($_FILES['sponsor_image']['type'], $allowed)) {
                                $destination = $folder . time() . $_FILES['sponsor_image']['name'];
                                move_uploaded_file($_FILES['sponsor_image']['tmp_name'], $destination);
                                resize_image($destination);
                                $_POST['sponsor_image'] = $destination;
                                if (file_exists($row->sponsor_image)) {
                                    unlink($row->sponsor_image);
                                }
                            } else {
                                $sponsor->errors['sponsor_image'] = 'Images Only!';
                            }
                        } else {
                            $sponsor->errors['sponsor_image'] = 'Upload Failed!';
                        }
                    }
                    $_POST['user_id'] = Auth::getId();
                    show($_POST);
                    $sponsor->update($id, $_POST);
                    message('Sponsor Created');
                    redirect('admin/sponsors');
                } else {

                    $data['errors'] = $sponsor->errors;
                }
            }
        }

        $this->view('admin/sponsors', $data);
    }

    public function messages($action = null, $id = null)
    {
        if (!Auth::is_admin()) {
            message('Please login to view admin section');
            redirect('login');
        }

        $message = new Message();
        $data['action'] = $action;
        $user_id = Auth::getId();

        if ($action == 'reply') {

            $data['row'] = $row = $message->first(['id' => $id]);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $_POST['responded'] = 'yes';
                $_POST['active'] = 'no';
                $_POST['user_id'] = $user_id;


                $email = $row->email;
                $headers = 'Return-Path: mdtdallas@hotmail.com' . "\r\n";
                $headers .= 'From: Sender <mdtdallas@hotmail.com>' . "\r\n";

                mail($email, 'Cat A Log - Contact Form Reply', $_POST['reply'], $headers);

                message('Reply Sent!');

                $message->update($id, $_POST);
                redirect('admin/messages');
            }

            $this->view('admin/messages', $data);
        }


        $data['messages'] = $message->where(['active' => 'yes']);
        $data['title'] = "Messages Page";

        $this->view('admin/messages', $data);
    }
}
