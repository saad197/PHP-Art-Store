<script>
    function updateFramePrice() {
        var title = document.getElementsByName('FrameTitle')[0].value;

        //async request
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var framePrice = this.responseText;
                document.getElementsByName('framePrice')[0].value = "$"+extractNum(framePrice);
                updateFinalPrices(extractNum(framePrice));
            }
        };
        xhttp.open("POST", "async-request/price-update.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("Title="+title);

        //update color and style select option
        if (title != "None") {
            //enable color and style if title is not default
            document.getElementsByName('FrameColor')[0].disabled = false;
            document.getElementsByName('FrameStyle')[0].disabled = false;
            document.getElementsByName('FrameColor')[0][4].selected = true
            document.getElementsByName('FrameStyle')[0][1].selected = true;
        }
        else {
            //show default for color and style if title is back to default
            document.getElementsByName('FrameColor')[0].disabled = true;
            document.getElementsByName('FrameStyle')[0].disabled = true;
            document.getElementsByName("FrameColor")[0].selectedIndex = 0;
            document.getElementsByName("FrameStyle")[0].selectedIndex = 0;
            document.getElementsByName('FrameColor')[0][0].selected = true
            document.getElementsByName('FrameStyle')[0][0].selected = true;
            
        }
    }
    
    function updateFinalPrices(framePrice) {
        var glassPrice = extractNum(document.querySelector('input[name="GlassType"]:checked').value);
        var mattPrice = extractNum(document.getElementsByName("MattPrice")[0].value);
        var itemPrice = extractNum(document.getElementsByName('ItemPrice')[0].value);
        var customizePrice = glassPrice + framePrice + mattPrice;
        var totalPrice = itemPrice + customizePrice;
        document.getElementsByName("CustomizePrice")[0].value = "$"+customizePrice;
        document.getElementsByName("TotalPrice")[0].value = "$" + (totalPrice);
    }
    
    function extractNum(str) {
        var n = str.indexOf('$');
        str = str.slice(n+1); 
        return Number(str);
    }

    function changeColor() {
        var index = document.getElementsByName('colorPicker')[0].selectedIndex;
        var color = document.getElementsByName('colorPicker')[0].childNodes[index].value;
        document.getElementById('color-picker').setAttribute("style", "background-color: #"+color+";");
    }

    function resetColorPicker() {
        document.getElementById('color-picker').setAttribute("style", "background-color: none;");
    }
            
</script>