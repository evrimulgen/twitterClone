{% extends "templates/base.volt" %}

{% block content %}

<div class="signin-container">

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/twitter">TWITER CLONE</a>
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
        <form class="form-signin" method="post" action="{{ url('signin/doLogin') }}">
            <input name="email" type="text" class="form-control" placeholder="Email address" >
            <input name="password" type="password" class="form-control" placeholder="Password">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </div>

    <div class="signin-form">
        <h3>Register</h3>
        <form class="form-signin" method="post" action="{{ url('signin/doSignin') }}">
            <input name="name" type="text" class="form-control" placeholder="Name" autofocus>
            <input name="email" type="text" class="form-control" placeholder="Email address" >
            <input name="password" type="password" class="form-control" placeholder="Password">
            <input name="password_again" type="password" class="form-control" placeholder="Repeat password">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
     </div>

</div>

{% endblock %}