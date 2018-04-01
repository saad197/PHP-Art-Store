<!DOCTYPE html>
<html>
<?php include("includes/head.inc.php"); ?>
<head>
    <script>
            function SearchArtists()
            {
                var str = document.getElementById("input").value;
                console.log(str);
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function()
                {
                if (this.readyState == 4 && this.status == 200){
                    document.getElementById("suggestion").innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("GET","artists.list.php",true);
                xmlhttp.send();
            }
    </script>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Assign 1 </a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="about.php">About us</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        pages
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="artists.php">Artists</a>
                        </li>
                        <li>
                            <a href="works.php">Art Work</a>
                        </li>
                        <li>
                            <a href="#">Genres</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-right">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Search Painting" name="search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </nav>
    <div class="container">
        <h1>Search Result</h1>
        <form class = "well">
            <div class = "radio">
                <label><input type = "radio" name = ""> Filter by Title
            </div>
            <div class = "form-group">
                <input type="text" class = "form-control" id="input">
            </div>
            <div class = "radio">
                <label><input type = "radio" name = ""> Filter by Description
            </div>
            <div class = "radio">
                <label><input type = "radio" name = ""> No Filter (show all art works)
            </div>
            <button class="btn btn-primary" type="button" onclick="SearchArtists()">Filter
            </button>
        </form>
        <p id="suggestion"></p>
    </div>
<?php include("includes/scripts.inc.php"); ?>
</body>
</html>