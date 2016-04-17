<?php

use \Phalcon\Validation;
use \Phalcon\Validation\Validator\StringLength;

Class PostsController extends ControllerBase{

    public function indexAction()
    {
        $logged_user = $this->session->get('logged_user_my_twitter');
        if(!$logged_user){
            $this->response->redirect('signin');
        }
    }
    
    public function createAction(){
        
    }

    public function addPostAction(){

        $logged_user = $this->session->get('logged_user_my_twitter');
        $post_message =  $this->request->getPost('message');

        $validation = new Validation();

        $validation->add('message', new StringLength(array(
                        'messageMinimum'=>'Post is too short (minimum 5 characters)',
                        'min'=>5
                    )))
                    ->add('message', new StringLength(array(
                        'messageMinimum'=>'Post is too long (maximum 255 characters)',
                        'max'=>255
                    )));

        $messages = $validation->validate($_POST);

        if(count($messages)) {
            $message_list = "";
            foreach ($messages as $message) {
                $message_list .= "<li>" . $message . "</li>";
            }
            $this->session->set('message', $message_list);
            $this->response->redirect('posts/create');
        }else{
            $post = new Posts();
            $post->message = $post_message;
            $post->user_mail = $logged_user['email'];
            $post->user_id = $logged_user['id'];

            $result = $post->create();

            if($result){
                $this->session->set('message','Post created');
                $this->response->redirect('posts');
            }else{
                $this->session->set('message','Something went wrong. Please try again.');
                $this->response->redirect('posts/create');
            }

        }

    }


}

?>