<?php 

class Login extends Controller{

    
    public function index()
    {

        if( @$_SESSION['userLogin'] ) {

            if( $_SESSION['status'] != 0) {
                $location = 'dashboard';
            } else {
                $location = 'userpage';
            }

            header('Location: ' . BASEURL . '/' .$location);
            exit; 
        }

        $data['judul'] = 'Login';

        $this->view('tamplates/headerlogin', $data);
        $this->view('login/index', $data);
        $this->view('tamplates/footer');

        
        
    }

    public function logout(){
        session_destroy();
        session_unset();
        $_SESSION = [];

        header('location: '. BASEURL . '/login');
        exit;
    }   

    public function user()
    {

        $username = $_POST['username'];
        $password = $_POST['password'];

        if( !empty($username) || !empty($password) ) {

            if( $this->model('Login_model')->cekUserTrue($username) > 0 ) {

                
                $data = $this->model('Login_model')->ambilDataUser($username);
                $passwordDb = $data['password'];

                if( password_verify($password, $passwordDb) ) {

                    // account admin@gmail.com
                    // admin : 12345
                    // account User biasa
                    // bijana : qwerty

                    $_SESSION['userLogin'] = "success";
                    $_SESSION['status'] = $data['level'];
                    $_SESSION['username'] = $data['username'];

                    if( $data['level'] != 0 ) {
                        $location = "dashboard";
                    } else {
                        $location = "userpage";
                    }

                } else {
                    echo 'password salah';
                }

            } else {
                echo 'gagal menemukan user';
            }

        } else {
            echo 'isikan data terlebih dahulu';
        }

        header('Location: ' . BASEURL . '/' . $location);
        exit;
        
    }

}