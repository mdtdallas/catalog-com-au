<?php

// Cat Class

class Cats extends Controller
{


    public function index($action = null, $id = null)
    {

        if (!Auth::logged_in()) {
            message('Please login');
            redirect('login');
        }
        $data['id'] = $id;
        $cat = new Cat();
        $sex = new Sex();
        $type = new Type();
        $breed = new Breed();
        $colour = new Colour();
        $email = Auth::getEmail();
        $data['row'] = $cat->first(['id' => $id]);
        $data['title'] = "Cat Page";
        $data['action'] = $action;



        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Search query
        }

        if ($action == 'add') {
            $data['breeds'] = $breed->findAll();
            $data['colours'] = $colour->findAll();
            $data['sexes'] = $sex->findAll();
            $data['types'] = $type->findAll();

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

                if ($cat->validate($_POST)) {
                    $allowed = ['image/png', 'image/jpeg', 'image/jpg', 'application/pdf'];

                    if (!empty($_FILES['image']['name'])) {

                        if ($_FILES['image']['error'] == 0) {

                            if (in_array($_FILES['image']['type'], $allowed)) {

                                $destination = $folder . time() . $_FILES['image']['name'];
                                move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                                resize_image($destination);

                                $_POST['image'] = $destination;
                            } else {
                                $cat->errors['image'] = 'Image Files Only';
                            }
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
                    $_POST['email'] = $email;

                    $cat->insert($_POST);
                }
                if (empty($cat->errors)) {
                    message('Cat saved successfully');
                } else {
                    $arr['message'] = 'Please correct these errors';
                    $arr['errors'] = $cat->errors;
                }
            }
        } elseif ($action == 'edit') {

            $data['breeds'] = $breed->findAll();
            $data['colours'] = $colour->findAll();
            $data['sexes'] = $sex->findAll();
            $data['types'] = $type->findAll();
            $data['row'] = $row = $cat->first(['id' => $id]);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Check for CSRF valid
                if ($_SESSION['csrf_code'] == $_POST['csrf_code']) {

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


                    if ($cat->validate($_POST)) {
                        $allowed = ['image/png', 'image/jpeg', 'image/jpg', 'application/pdf'];

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
                                    $cat->errors['image'] = 'Image Files Only';
                                }
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
                        message('Cat Updated Successfully');
                    } else {
                        $data['errors'] = $cat->errors;
                    }
                } else {
                    $data['errors'] = $cat->errors;
                    message('Form is not valid');
                }
            }
        } elseif ($action == 'list') {
            $data['rows'] = $cat->where(['email' => $email]);
            //
        } elseif ($action == 'views') {
            //
            $data['row'] = $cat->first(['id' => $id]);
        }

        $this->view('cats', $data);
    }
}
