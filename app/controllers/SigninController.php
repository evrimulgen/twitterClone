<?php

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
        
        if($password == $password_again){
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
            
        }
        
    }

    public function doLogoutAction(){
        $this->session->remove('logged_user_my_twitter');
        $this->response->redirect('signin');
    }
    
}


?>