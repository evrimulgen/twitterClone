<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TwitterClone App</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= $this->url->get('css/style.css') ?>">
    </head>
    <body>
        <div class="container">

            

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index">TWITER CLONE</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="posts">All posts</a></li>
                    <li class=""><a href="posts/create">Create post</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= $this->url->get('signin/doLogout') ?>">Signout</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

<div class="signin-container">
    <?php if($this->session->get('message') != ''): ?>
        <div class="message">
            <?php
                echo $this->session->get('message');
                $this->session->set('message','');
            ?>
        </div>
    <?php endif ?>

    <nav>
        <ul class="pagination">
            <li><a href="posts">First</a></li>
            <li><a href="posts?page=<?php echo $page->before; ?>">Previous</a></li>
            <li>
                <?php for($i=1;$i<=$page->total_pages;$i++){ ?>
                    <a href="posts?page=<?php echo $i ?>"><?php echo $i; ?></a>
                <?php } ?>
            </li>
            <li><a href="posts?page=<?php echo $page->next; ?>">Next</a></li>
            <li><a href="posts?page=<?php echo $page->last; ?>">Last</a></li>
        </ul>
    </nav>

    <?php $logged_user_by_id = Users::findFirstById($logged_user_id); ?>
        <?php foreach ($page->items as $item) { ?>
            <div class="thumbnail">
                <div class="caption">
                    <?php $user = Users::findFirstById($item->user_id); ?>
                    <h3><?php echo $user->name; ?></h3>
                    <p><?php echo $item->message; ?></p>
                        <?php if($logged_user_by_id->user_type == "admin"){ ?>
                        <p><a href="posts/deletePost?post=<?php echo $item->id; ?>" class="btn btn-default" role="button">Delete</a></p>
                        <?php  }if($user->id == $logged_user_id){ ?>
                        <p><a href="posts/deletePost?post=<?php echo $item->id; ?>" class="btn btn-default" role="button">Delete</a></p>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

</div>



        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>