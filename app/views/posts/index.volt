{% extends "templates/base.volt" %}

{% block content %}

<div class="signin-container">

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
                    <li><a href="signin/doLogout">Signout</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <h3>Posts</h3>

</div>

{% endblock %}