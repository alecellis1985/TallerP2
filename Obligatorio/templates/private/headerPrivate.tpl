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
                <a class="navbar-brand" id="homeLink" href="../index.php">MyCompany Videos</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a id="allVideosLink" href="../videoList.php">All videos</a>
                    </li>
                    <li>
                        <a id="logIn" data-toggle="modal" data-target="#myModal" href="#">Log In</a>
                        <a id="logOut" data-url="../logout.php" class="hide" href="">Log Out</a>
                    </li>
                    <li class="privateComponent" style="display:none;">
                        <a id="manageVideosId" href="manageVideos.php">Manage videos</a>
                    </li>
                    <li class="privateComponent" style="display:none;">
                        <a id="statisticsId" href="statistics.php">Statistics</a>
                    </li>
                    <li class="privateComponent" style="display:none;">
                        <a id="statisticsId" href="comments.php">Comments</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</header>


