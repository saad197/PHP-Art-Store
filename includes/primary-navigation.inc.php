<?php

    include 'admin-check.php';
require_once 'config.inc.php';

    if(session_status() == PHP_SESSION_NONE) {         
        session_start();     
    }
    if(isset($_SESSION['cusName'])) {
        $cusName = "Welcome " . $_SESSION['cusName'];
        $btn = "Logout";
        $link = "includes/user-logout.inc.php";

        if (isAdmin($_SESSION['cusID'])) {
            $cbtn = "Customer List";
            $clink = "customer-list.php";

        }
        else {
            $style = "none;";
            $cbtn = "";
            $clink = "#";
        }


    } else {
        $btn = "Login";
        $cusName = "";
        $link = "user-login.php";
        $style = "none;";
    }
?>
<div class="container">
    <div class="row">
        <div id="topHeaderRow">
            <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                    <a class="navbar-brand" id="mainNavText" href="#">Welcome to
                        <b>Art Store</b>
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="update-profile.php">
                            <span class="glyphicon glyphicon-user"></span> My Account</a>
                    </li>
                    <li>
                        <a href="view-favorite-Art-list.php">
                            <span class="glyphicon glyphicon-gift"></span> View Art Wish-List</a>
                    </li>
                    <li>
                        <a href="view-favorite-Artist-list.php">
                            <span class="glyphicon glyphicon-gift"></span> View Artist Wish-List</a>
                    </li>
                    <li style="display: <?php echo $style;?>;">
                        <a href= "<?php echo $clink;?>">
                            <span class="glyphicon glyphicon-list" style="display: <?php echo $style;?>;"></span> <?php echo $cbtn;?></a>
                    </li>
                    <li>
                        <a href="view-shopping-cart.php">
                            <span class="glyphicon glyphicon-shopping-cart"></span> View Cart</a>
                    </li>
                    <li>
                        <a href="<?php echo $link;?>">
                            <span class="glyphicon glyphicon-arrow-right"></span><?php echo $btn;?></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- end topHeaderRow -->
    <div class="row">
        <div id="logoRow">
            <div class="col-md-7">
                <h1>Art Store</h1>
            </div>
            <div class="col-md-3">
                <form action="simple.search.php" method="GET">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search" name="search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!--show customer name-->
            <div><?php echo $cusName;?></div>
        </div>
    </div>
    <!-- end logoRow -->
    <div class="row">
        <div id="mainNavigationRow">
            <nav class="navbar navbar-default">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About Us</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Advanced Search
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <form method = "Post" action="advanced-search.php">
                                    <button type="submit" name="artists"  class="btn btn-link btn-lg">Artists</button>
                                </form>
                            </li>
                            <li>
                                <form method = "Post"  action="advanced-search.php">
                                    <button type="submit" name="artWork"  class="btn btn-link btn-lg">Artwork</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Browse
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="browse-artists.php">Artists</a>
                            </li>
                            <li>
                                <a href="works.php">Art Work</a>
                            </li>
                            <li>
                                <a href="browse-genres.php">Genres</a>
                            </li>
                            <li>
                                <a href="browse-subjects.php">Subjects</a>
                            </li>
                            <li>
                                <a href="browse-gallery.php">Galleries</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

<!-- end mainNavigationRow -->
