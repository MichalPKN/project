console.log("cool games");

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        // Typical action to be performed when the document is ready:
        document.getElementById("game").innerHTML = xhttp.responseText;
    }
};
xhttp.open("GET", "app/database.php", true);
xhttp.send();