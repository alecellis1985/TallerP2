<header class="navbar navbar-inverse navbar-fixed-top">
    <nav role="navigation" >
        <div class="container">
            <div id="alerts"></div>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="homeLink" href="index.php">MyCompany Videos</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a id="allVideosLink" href="videoList.php">All videos</a>
                    </li>
                    <li>
                        <a id="logIn" data-toggle="modal" data-target="#myModal" href="#">Log In</a>
                        <a id="logOut" data-url="logout.php" class="hide" href="">Log Out</a>
                    </li>
                    <li class="privateComponent" style="display:none;">
                        <a id="manageVideosId" href="privateFunctions/manageVideos.php">Manage videos</a>
                    </li>
                    <li class="privateComponent" style="display:none;">
                        <a id="statisticsId" href="privateFunctions/statistics.php">Statistics</a>
                    </li>
                    <li class="privateComponent" style="display:none;">
                        <a id="statisticsId" href="privateFunctions/comments.php">Comments</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</header>

<!-- Modal Log In -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">User Log In</h4>
            </div>
            <form id="logInForm" role="form" action="login.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="userName">User:</label>
                        <input type="text" name="username" class="form-control" id="userName" placeholder="user" required>

                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" name="password" id="pwd" placeholder="password" required>
                    </div>
                    <div class="form-group hide">
                        <span id="logInErrors" class="error"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="closeModal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Log In</button>
                </div>  
            </form>
        </div>
    </div>
</div>
<!-- /.Modal Log In-->

