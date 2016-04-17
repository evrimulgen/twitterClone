<?php

use \Phalcon\Validation;
use \Phalcon\Validation\Validator\StringLength;
use \Phalcon\Paginator\Adapter\Model as PaginatorModel;

Class PostsController extends ControllerBase{

    public function indexAction()
    {
        $logged_user = $this->session->get('logged_user_my_twitter');
        if(!$logged_user){
            $this->response->redirect('signin');
        }

        $current_page = 1;
        if(isset($_GET['page'])){
            $current_page = (int) $_GET['page'];
        }

        $all_posts = Posts::find();

        $paginator = new PaginatorModel(
            array(
                'data' => $all_posts,
                'limit' => 5,
                'page' => $current_page
            )
        );

        $page = $paginator->getPaginate();

        $this->view->setVars(['page' => $page, 'logged_user_id'=>$logged_user['id']]);
    }
    
    public function createAction(){
        
    }

    public function deletePostAction(){

        $logged_user = $this->session->get('logged_user_my_twitter');
        $post_message =  $this->request->getPost('message');

        $post_id = (int) $_GET['post'];

        $post =  Posts::findFirstById($post_id);

        if(!$post){
            $this->session->set('message','Something went wrong. Please try again.');
            $this->response->redirect('posts');
        }else{
            $post->delete();
            $this->session->set('message','Post deleted.');
            $this->response->redirect('posts');
        }

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