<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TwitterClone App</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">

            



    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index">TWITER CLONE</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class=""><a href="../posts">All posts</a></li>
                    <li class="active"><a>Create post</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="signin/doLogout">Signout</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
<div class="signin-container">
    <h3>Posts</h3>

        <?php if($this->session->get('message') != ''): ?>
            <div class="message">
                <?php
                    echo $this->session->get('message');
                    $this->session->set('message','');
                ?>
            </div>
        <?php endif ?>

        <br/>

        <?php $user=$this->session->get('logged_user'); ?>
        <h2>Hi, <?php echo $user['name']; ?></h2>
        <div class="create-post">
            <h3>Add new post</h3>
            <form class="form-signin" method="post" action="<?= $this->url->get('posts/addPost') ?>">
                <textarea name="message" class="form-control" rows="5"></textarea>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Add post</button>
            </form>
        </div>

</div>
<style>
    .create-post{
        width : 600px;
    }
    .create-post textarea{
        margin: 5px 0;
    }
</style>


        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>