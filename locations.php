<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <link rel="icon" href="images/favicon.ico" type="image/ico">
    <title>Locations</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body class="is-preload">
<div id="page-wrapper">

    <!-- Header -->
    <?php include("header.php"); ?>
    <table id='locations-table'>
        <!-- <tr><td><p>Okay oO</p>Wow</td></tr>
        <tr><td>Gang!</td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr> -->
    </table>
    <?php?>

    <?php include("footer.php"); ?>

</div>

<!-- Scripts -->
<script>
    function requestLocations() {
        var xmlhttp = new XMLHttpRequest();
        return new Promise ((resolve, reject) => {
    
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                let data = JSON.parse(xmlhttp.responseText);
                return resolve(data);
            }
        }
        let url = "./locationsdata.php?data=true";

        xmlhttp.open("GET", url, true);
        xmlhttp.send();
        });
    }

    const writeTable = (locations) => {
        let table = document.getElementById('locations-table');
        for(let location of locations) {
            console.log(location);
            let finalLocation = location.laddrstr + ", " + location.laddrcity + ", " + location.laddrstate + ", " + location.laddrzip;
            let newTr = document.createElement('tr');
            let newTd = document.createElement('td');
            
            let address = "Address: " + finalLocation;
            let addressElem = document.createElement('p');
            addressElem.innerHTML = address;
            
            let cashier = "Cashier: ";
            let cashierElem = document.createElement('p');
            cashierElem.innerHTML = cashier;
            
            let drivers = "Drivers: ";
            let driversElem = document.createElement('p');
            driversElem.innerHTML = drivers;
            
            newTd.appendChild(addressElem);
            newTd.appendChild(cashierElem);
            newTd.appendChild(driversElem);
            
            newTr.appendChild(newTd);
            table.appendChild(newTr);
        }
        if (locations.length == 0) {
            let newTr = document.createElement('tr');
            let newTd = document.createElement('td');
            newTd.innerHTML = "No Locations Have Been Made.";
            newTr.appendChild(newTd);
            table.appendChild(newTr);
        }
    };

    requestLocations().then((data) => {
        writeTable(data);
    });
</script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
