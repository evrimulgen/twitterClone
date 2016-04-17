{% extends "templates/base.volt" %}

{% block content %}



    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index">TWITER CLONE</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="posts">All posts</a></li>
                    <li class="active"><a href="posts/create">Create post</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="signin/doLogout">Signout</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
<div class="signin-container">
    <?php $logged_user = $this->session->get('logged_user_my_twitter'); ?>
    <h3>Welcome, <?php echo $logged_user['name']; ?></h3>

</div>

{% endblock %}