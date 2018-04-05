 <?php 
    if(session_status() == PHP_SESSION_NONE){         
         session_start();    
    }
    $titleSearch = $_GET['search'];
    $title = trim($titleSearch);
?>
<!DOCTYPE html>
<html>
<?php include("includes/head.inc.php"); ?>
<head>
    <script>
            function searchArtists()
            {
                var search = document.getElementById("input").value;
                var filterValue = $("input:radio[name=filter]:checked").val();
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("suggestion").innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("POST","async-request/search-results.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("search="+search+"&filter="+filterValue);
            }
    </script>
</head>
<body>
    <?php include('includes/primary-navigation.inc.php');?>
    <div class="container">
        <h1>Search Result</h1>
        <form class = "well">
            <div class = "radio">
                <label><input type = "radio" name = "filter" value= "title" checked> Filter by Title
            </div>
            <div class = "form-group">
                <input type="text" class = "form-control" id="input" value = "<?php echo $title; ?>">
            </div>
            <div class = "radio">
                <label><input type = "radio" name = "filter" value="desc"> Filter by Description
            </div>
            <div class = "radio">
                <label><input type = "radio" name = "filter" value=" "> No Filter (show all art works)
            </div>
            <button class="btn btn-primary" type="button" onclick="searchArtists()">Filter
            </button>
        </form>
        <p id="suggestion"></p>
    </div>
</body>
</html>