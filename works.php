<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WIP - Assignment 1</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="css/common.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Bad Script' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Caption" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header>
            <div class="col-md-12">
                <div class="row">
                    <div id="topHeaderRow">
                        <nav class="navbar navbar-inverse">
                            <div class="navbar-header">
                                <a class="navbar-brand" id="mainNavText" href="#">Welcome to
                                    <b>Art Store</b>,
                                    <b>Login</b> or
                                    <b>Create new Account</b>
                                </a>
                            </div>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="#">
                                        <span class="glyphicon glyphicon-user"></span> My Account</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="glyphicon glyphicon-gift"></span> Wish List</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="glyphicon glyphicon-arrow-right"></span> Checkout</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- end topHeaderRow -->
                <div class="row">
                    <div id="logoRow">
                        <div class="col-md-8">
                            <h1>Art Store</h1>
                        </div>
                        <div class="col-md-3">
                            <form action="http://www.randyconnolly.com/tests/process.php" method="post">
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
                                <li class="active">
                                    <a href="works.php">Art Works</a>
                                </li>
                                <li>
                                    <a href="artists.php">Artists</a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Specials
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">Special 1</a>
                                        </li>
                                        <li>
                                            <a href="#">Special 2</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- end mainNavigationRow -->
        </header>
        <div class="row">
            <div class="col-md-10">
                <h2 class="google-font">Self-portrait in a Straw Hat</h2>
                <p>By
                    <a href="#">Louise Elisabeth Lebrun</a>
                </p>
                <div class="row">
                    <div class="col-md-5">
                        <img src="images/113010.jpg" class="img-thumbnail img-responsive" alt="Self-portrait in a Straw Hat" />
                    </div>
                    <div class="col-md-7 row">
                        <p>
                            The painting appears, after cleaning, to be an autograph replica of a picture, the original of which was painted in Brussels
                            in 1782 in free imitation of Rubens's 'Chapeau de Paille', which LeBrun had seen in Antwerp.
                            It was exhibited in Paris in 1782 at the Salon de la Correspondance. LeBrun's original is recorded
                            in a private collection in France.
                        </p>
                        <p class="price">$700</p>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-lg">
                                <a href="#">
                                    <span class="glyphicon glyphicon-gift"></span> Add to Wish List</a>
                            </button>
                            <button type="button" class="btn btn-default btn-lg">
                                <a href="#">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> Add to Shopping Cart</a>
                            </button>
                        </div>
                        <p>&nbsp;</p>
                        <div class="panel panel-default">
                            <div class="panel-heading google-font">
                                Product Details
                            </div>
                            <table class="table">
                                <tr>
                                    <th>Date:</th>
                                    <td>1782</td>
                                </tr>
                                <tr>
                                    <th>Medium:</th>
                                    <td>Oil on canvas</td>
                                </tr>
                                <tr>
                                    <th>Dimensions:</th>
                                    <td>98cm x 71cm</td>
                                </tr>
                                <tr>
                                    <th>Home:</th>
                                    <td>
                                        <a href="#">National Gallery, London</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Genres:</th>
                                    <td>
                                        <a href="#">Realism</a>,
                                        <a href="#">Rococo</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Subjects:</th>
                                    <td>
                                        <a href="#">People</a>,
                                        <a href="#">Arts</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <p>&nbsp;</p>
                <h3 class="google-font">Similar Products </h3>
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 thumbnail">
                            <img src="images/thumbs/116010.jpg" alt="...">
                            <div>
                                <p class="similarTitle">
                                    <a href="#">Artist Holding a Thistle</a>
                                </p>
                                <div class="btn-space">
                                    <button type="button" class="btn btn-primary btn-xs">
                                        <i class="glyphicon glyphicon-info-sign"></i> View</button>
                                    <button type="button" class="btn btn-success btn-xs">
                                        <i class="glyphicon glyphicon-gift"></i> Wish</button>
                                    <button type="button" class="btn btn-info btn-xs">
                                        <i class="glyphicon glyphicon-shopping-cart"></i> Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 thumbnail space">
                            <img src="images/thumbs/120010.jpg" alt="...">
                            <div>
                                <p class="similarTitle">
                                    <a href="#">Portrait of Eleanor of Toledo</a>
                                </p>
                                <div class="btn-space">
                                    <button type="button" class="btn btn-primary btn-xs">
                                        <i class="glyphicon glyphicon-info-sign"></i> View</button>
                                    <button type="button" class="btn btn-success btn-xs">
                                        <i class="glyphicon glyphicon-gift"></i> Wish</button>
                                    <button type="button" class="btn btn-info btn-xs">
                                        <i class="glyphicon glyphicon-shopping-cart"></i> Cart</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 thumbnail space">
                            <img src="images/thumbs/107010.jpg" alt="...">
                            <div>
                                <p class="similarTitle">
                                    <a href="#">Madame de Pompadour</a>
                                </p>
                                <div class="btn-space">
                                    <button type="button" class="btn btn-primary btn-xs">
                                        <i class="glyphicon glyphicon-info-sign"></i> View</button>
                                    <button type="button" class="btn btn-success btn-xs">
                                        <i class="glyphicon glyphicon-gift"></i> Wish</button>
                                    <button type="button" class="btn btn-info btn-xs">
                                        <i class="glyphicon glyphicon-shopping-cart"></i> Cart</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 thumbnail space">
                            <img src="images/thumbs/106020.jpg" alt="...">
                            <div>
                                <p class="similarTitle">
                                    <a href="#">Girl with a Pearl Earring</a>
                                </p>
                                <div class="btn-space">
                                    <button type="button" class="btn btn-primary btn-xs">
                                        <i class="glyphicon glyphicon-info-sign"></i> View</button>
                                    <button type="button" class="btn btn-success btn-xs">
                                        <i class="glyphicon glyphicon-gift"></i> Wish</button>
                                    <button type="button" class="btn btn-info btn-xs">
                                        <i class="glyphicon glyphicon-shopping-cart"></i> Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="google-font">Cart </h3>
                    </div>
                    <div class="wrapper">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img src="images/tiny/116010.jpg" class="media-object" alt="..." width="32">
                                </a>
                            </div>
                            <div class="media-body">
                                <p>
                                    <a href="#">Artist Holding a Thistle</a>
                                </p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img src="images/tiny/113010.jpg" class="media-object" alt="..." width="32">
                                </a>
                            </div>
                            <div class="media-body">
                                <p>
                                    <a href="#">Self-portrait in a Straw Hat</a>
                                </p>
                            </div>
                        </div>
                        <strong class="cartText">Subtotal:
                            <span>$1200</span>
                        </strong>
                        <div>
                            <button type="button" class="btn btn-primary btn-xs">
                                <i class="glyphicon glyphicon-info-sign"></i> Edit</button>
                            <button type="button" class="btn btn-primary btn-xs">
                                <i class="glyphicon glyphicon-arrow-right"></i> Checkout</button>
                        </div>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="google-font">Popular Artists</h3>
                    </div>
                    <div class="wrapper-list">
                        <ul>
                            <li>
                                <a href="#">Caravaggio</a>
                            </li>
                            <li>
                                <a href="#">Cezanne</a>
                            </li>
                            <li>
                                <a href="#">Matisse</a>
                            </li>
                            <li>
                                <a href="#">Michelangelo</a>
                            </li>
                            <li>
                                <a href="#">Picasso</a>
                            </li>
                            <li>
                                <a href="#">Raphael</a>
                            </li>
                            <li>
                                <a href="#">Van Gogh</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="google-font">Popular Genres</h3>
                    </div>
                    <div class="wrapper-list">
                        <ul>
                            <li>
                                <a href="#">Baroque</a>
                            </li>
                            <li>
                                <a href="#">Cubism</a>
                            </li>
                            <li>
                                <a href="#">Impressionism</a>
                            </li>
                            <li>
                                <a href="#">Renaissance</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="col-md-3">
                <h4 class="google-font">
                    <i class="glyphicon glyphicon-info-sign"></i> About Us</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s.</p>
            </div>
            <div class="col-md-3">
                <h4 class="google-font">
                    <i class="glyphicon glyphicon-earphone"></i> Customer Service
                </h4>
                <div class="row">
                    <div class="wrapper-list">
                        <ul>
                            <li>
                                <a href="#">Delivery Information</a>
                            </li>
                            <li>
                                <a href="#">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#">Shipping</a>
                            </li>
                            <li>
                                <a href="#">Terms and Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h4 class="google-font">
                    <i class="glyphicon glyphicon-shopping-cart"></i> Just Ordered</h4>
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img src="images/tiny/13030.jpg" class="media-object" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <p>
                            <a href="#">Arrangement in Grey and Black</a>
                        </p>
                        <em>5 minutes ago</em>
                    </div>
                </div>
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img src="images/tiny/116010.jpg" class="media-object" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <p>
                            <a href="#">Artist Holding a Thistle</a>
                        </p>
                        <em>11 minutes ago</em>
                    </div>
                </div>
                <div class="media similarTitle">
                    <div class="media-left">
                        <a href="#">
                            <img src="images/tiny/113010.jpg" class="media-object" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <p>
                            <a href="#">Self-portrait in a Straw Hat</a>
                        </p>
                        <em>23 minutes ago</em>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h4 class="google-font">
                    <i class="glyphicon glyphicon-envelope"></i> Contact us</h4>
                <form action="http://www.randyconnolly.com/tests/process.php" method="post">
                    <div class="form-group form-margin">
                        <input class="form-control" type="text" name="name" placeholder="Enter name ...">
                    </div>
                    <div class="form-group form-margin">
                        <input class="form-control" type="email" name="email" placeholder="Enter email ...">
                    </div>
                    <div class="form-group form-margin">
                        <textarea class="form-control" rows="3" name="message" placeholder="Enter message ..."></textarea>
                    </div>
                    <div class="form-group">
                        <button class="form-control btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="copyrightRow">
            <br>
            <p>
                <span id="copyright-message">All images are copyright to their owners. This is just a hypothetical site</span>
                <span id="copyright-symbol">&copy; 2014 Copyright Art Store</span>
            </p>
            <br>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>