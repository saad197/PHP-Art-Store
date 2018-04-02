        <div class="row">
            <div>
                <br>
                <h1 class="google-font">This Week's Best-Selling Artists</h1>
            </div>
            <div class="alert alert-warning">
                Each week we show you who are our best selling artists...
            </div>
        </div>
        <div class="row">
            <?php showBestSellingArtist(); ?>
        </div>
        <button class="btn btn-primary" onclick="showElement()">
            Show All Artists
        </button>
        <hr>
        <div class="row" id="show-artists">  
            <?php showAllArtist(); ?>
        </div>
        <script>
            showElement();
            function showElement() {
                var showArtists = document.getElementById("show-artists");
                if (showArtists.style.display === "none") {
                    showArtists.style.display = "block";
                } else {
                    showArtists.style.display = "none";
                }
            }
        </script>
</div>
<div class="container">
    <div>
        <h3 class="google-font">Artists by Genre</h3>
        <div class="progress">
            <div class="progress-bar progress-bar-info" role="progressbar" style="width:5%">
                Gothic
            </div>

            <div class="progress-bar progress-bar-success" role="progressbar" style="width:30%">
                Renaissance
            </div>
            <div class="progress-bar progress-bar-warning" role="progressbar" style="width:15%">
                Baroque
            </div>
            <div class="progress-bar progress-bar-danger" role="progressbar" style="width:20%">
                Pre-Modern
            </div>
            <div class="progress-bar" role="progressbar" style="width:30%">
                Modern
            </div>
        </div>
    </div>
</div>
        