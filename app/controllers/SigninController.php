<?php

use \Phalcon\Validation;
use \Phalcon\Validation\Validator\StringLength;
use \Phalcon\Validation\Validator\PresenceOf;
use \Phalcon\Validation\Validator\Email;

Class SigninController extends ControllerBase{
    
    public function indexAction(){
        
        
        
    }
    
    public function doLoginAction(){
        
        $this->view->disable();
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = Users::findFirstByEmail($email);

        if($user){
            if($this->security->checkHash($password,$user->password)){
                $this->session->set('logged_user_my_twitter',[
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email
                ]);
                $this->response->redirect('index');
            }
        }else{
            $this->session->set('message','Wrong username or password');
            $this->response->redirect('signin');
        }
        
    }
    
    public function doSigninAction(){

        $this->view->disable();
        
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $password_again = $this->request->getPost('password_again');

        $validation = new Validation();

        $validation->add('name', new PresenceOf(array(
                        'message'=>'You must enter your name.',
                        'cancelOnFail'=>true
                    )))
                    ->add('email', new PresenceOf(array(
                        'message'=>'You must enter your email address.',
                        'cancelOnFail'=>true
                    )))
                    ->add('email', new Email(array(
                        'message'=>'You must enter a correct email address.',
                        'cancelOnFail'=>true
                    )))
                    ->add('password', new PresenceOf(array(
                        'message'=>'You must enter your password.',
                        'cancelOnFail'=>true
                    )))
                    ->add('password_again', new PresenceOf(array(
                        'message'=>'You must repeat your.',
                        'cancelOnFail'=>true
                    )))
                    ->add('password', new StringLength(array(
                        'messageMinimum'=>'Password is too short (minimum 4 characters)',
                        'min'=>4
                    )))
                    ->add('password', new StringLength(array(
                        'messageMinimum'=>'Password is too long (maximum 12 characters)',
                        'max'=>12
                    )));

        $messages = $validation->validate($_POST);

        if(count($messages)){
            $message_list = "";
            foreach ($messages as $message) {
                $message_list .= "<li>" . $message . "</li>";
            }
            $this->session->set('message', $message_list);
            $this->response->redirect('signin');
        }elseif($password == $password_again){
            $user = new Users();
            $user->name =  $name;
            $user->email =  $email;
            $user->password =  $this->security->hash($password);
            
            $result = $user->create();
            
            if($result){
                $this->session->set('logged_user_my_twitter',[
                   'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email
                ]);
                $this->response->redirect('index');
            }
            
        }else{
            $this->session->set('message','Your passwords does not match');
            $this->response->redirect('signin');
        }
        
    }

    public function doLogoutAction(){
        $this->session->remove('logged_user_my_twitter');
        $this->response->redirect('signin');
    }
    
}


?>