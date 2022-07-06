<?php

// Name Class

class Users extends Controller
{
    public function index($id = null)
    {
        if (!Auth::logged_in()) {
            message('Please login to view profile');
            redirect('login');
        }
        $id = Auth::getId();
        $user = new User();
        $role = new Role();
        $data['id'] = $id;
        $data['thisuserpage'] = 'userinfo';
        $data['row'] = $row = $user->first(['id' => $id]);
        $data['roles'] = $role->findAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $row) {
            $folder = 'uploads/images/';
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
                file_put_contents($folder . 'index.php', '<?php // silence');
                file_put_contents('uploads/index.php', '<?php // silence');
            }
          
            if ($user->edit_validate($_POST, $id)) {
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
                
            } else {
                $arr['message'] = 'Please correct these errors';
                $arr['errors'] = $user->errors;
            }

        }

        $data['title'] = "Profile";
        $data['errors'] = $user->errors;
        $this->view('users', $data);
    }

}