<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TwitterClone App</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="/twitterClone/css/style.css">
    </head>
    <body>
        <div class="container">

            

<div class="signin-container">

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="">TWITER CLONE</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <?php if($this->session->get('message') != ''): ?>
        <div class="message">
            <?php
                echo $this->session->get('message');
                $this->session->set('message','');
            ?>
        </div>
    <?php endif; ?>

    <div class="signin-form">
        <h3>Log in</h3>
        <form class="form-signin" method="post" action="<?= $this->url->get('signin/doLogin') ?>">
            <input name="email" type="text" class="form-control" placeholder="Email address" >
            <input name="password" type="password" class="form-control" placeholder="Password">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </div>

    <div class="signin-form">
        <h3>Register</h3>
        <form class="form-signin" method="post" action="<?= $this->url->get('signin/doSignin') ?>">
            <input name="name" type="text" class="form-control" placeholder="Name" autofocus>
            <input name="email" type="text" class="form-control" placeholder="Email address" >
            <input name="password" type="password" class="form-control" placeholder="Password">
            <input name="password_again" type="password" class="form-control" placeholder="Repeat password">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
     </div>

</div>



        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>