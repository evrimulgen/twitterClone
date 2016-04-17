<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $logged_user = $this->session->get('logged_user_my_twitter');
        if(!$logged_user){
            $this->response->redirect('signin');
        }
    }

}

