<?php include('includes/genre-utilities.inc.php');
$genreResult = getGenresFromDB();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/common.css">
        <script>
            function searchArtists()
            {
                var search = document.getElementById("input").value;
                var filterValue = $("input:radio[name=filter]:checked").val();
                var selectedValue = $('#selected').find(":selected").val();
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("searchResult").innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("POST","async-request/advanced-search-result.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("search="+search+"&filter="+filterValue+"&select="+selectedValue);
            }
    </script>
   </head>
<body>
    <?php

    if(isset($_POST["artWork"]))
    {
        echo'
        <div class="form-container">
        <form>
            <fieldset class = "fieldset-container">
                <legend id = "legendLabel">Advanced Art Work Search</legend>
                <div class = "advanced-select">
                    <ul class="listStyle">
                        <li>
                            <input type= "text" placeholder="search title" id="input">
                            subject:
                            <input type="radio" name = "filter" value="history"> History
                            <input type="radio" name = "filter" value="person"> Person
                            <input type="radio" name = "filter" value="landscape"> Landscape
                            <select id = "selected" >
                            <option>select genre</option>';
                      
                            foreach($genreResult as $key=>$value)
                            {
                                echo "<option>".$value->getGenreName()."</option>";
                            }
                       
                            echo '</select>
                            <button type="button" onclick="searchArtists()">fitler</button>
                        </li>
                    </ul>
                </div>
                <br>
                <div class = "advanced-select">
                    <ul class="listStyle">
                        <li>
                            <select>
                                <option>__select__</option>
                            </select>
                            <button>Apply to all</button>
                        </li>
                    </ul>
                </div>
                <p id="searchResult"></p>
            </fieldset>
        </form>
    </div>';
    }
    else{
        echo'
        <div class="form-container">
        <form>
            <fieldset class = "fieldset-container">
                <legend id = "legendLabel">Advanced Art Work Search</legend>
                <div class = "advanced-select">
                    <ul class="listStyle">
                        <li>
                            <input type= "text" placeholder="search artists" id="input">
                            <button type="button" onclick="searchArtists()">fitler</button>
                        </li>
                    </ul>
                </div>
                <br>
                <div class = "advanced-select">
                    <ul class="listStyle">
                        <li>
                            <select>
                                <option>__select__</option>
                            </select>
                            <button>Apply to all</button>
                        </li>
                    </ul>
                </div>
                <p id="searchResult"></p>
            </fieldset>
        </form>
    </div>';

    }
     ?>
     <?php include("includes/scripts.inc.php"); ?>
</body>
</html>