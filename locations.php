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
    <?php
    session_start();
    if(isset($_SESSION['logged_in'])){
        include("LoggedInHeader.php");
    }
    else{
        include("header.php");
    }?>
    <table id='locations-table'>
        <!-- <tr><td><p>Okay oO</p>Wow</td></tr>
        <tr><td>Gang!</td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr> -->
    </table>


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
        let url = "./locationsdata.php?locations=true";

        xmlhttp.open("GET", url, true);
        xmlhttp.send();
        });
    }

    function requestEmployees(lid) {
        var xmlhttp = new XMLHttpRequest();
        return new Promise ((resolve, reject) => {
    
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                let data = JSON.parse(xmlhttp.responseText);
                return resolve(data);
            }
        }
        let url = "./locationsdata.php?employees=true&lid=" + lid;

        xmlhttp.open("GET", url, true);
        xmlhttp.send();
        });
    }

    function requestCashier(eid) {
        var xmlhttp = new XMLHttpRequest();
        return new Promise ((resolve, reject) => {
    
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                let data = JSON.parse(xmlhttp.responseText);
                resolve(data);
            }
        }
        let url = "./locationsdata.php?cashier=true&eid=" + eid;

        xmlhttp.open("GET", url, true);
        xmlhttp.send();
        });
    }

    function requestDriver(eid) {
        var xmlhttp = new XMLHttpRequest();
        return new Promise ((resolve, reject) => {
    
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                let data = JSON.parse(xmlhttp.responseText);
                resolve(data);
            }
        }
        let url = "./locationsdata.php?driver=true&eid=" + eid;

        xmlhttp.open("GET", url, true);
        xmlhttp.send();
        });
    }

    const writeTable = (locations) => {
        let table = document.getElementById('locations-table');
        for(let location of locations) {
            let lid = location.lid;
            let finalLocation = location.laddrstr + ", " + location.laddrcity + ", " + location.laddrstate + ", " + location.laddrzip;
            let newTr = document.createElement('tr');
            let newTd = document.createElement('td');
            
            let address = "Address: " + finalLocation;
            let addressElem = document.createElement('p');
            addressElem.innerHTML = address;
            
            let cashierElem = document.createElement('p');
            cashierElem.setAttribute("id", "cashier-" + lid);
            
            let driversElem = document.createElement('p');
            driversElem.setAttribute("id", "drivers-" + lid);

            
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

    const updateTable = (lid, data) => {
        let cashierElem = document.getElementById('cashier-' + lid);
        let driversElem = document.getElementById('drivers-' + lid);
        let drivers = []
        for(let entry of data) {
            if(entry.job == 'cashier') {
                requestCashier(entry.eid).then((cashier) => {
                    let exp = cashier[0].exp;
                    cashierElem.innerHTML = "Cashier: " + entry.ename + ", experience: " + exp;
                });
            } else {
                drivers.push(entry);
            }
        }

        driversElem.innerHTML = "Drivers: ";
        for(let i = 0; i < drivers.length; i++) {
            requestDriver(drivers[i].eid).then((driver) => {
                if (i != 0) {
                    driversElem.innerHTML += " ";
                }                    
                let ephone = driver[0].ephone;
                driversElem.innerHTML += drivers[i].ename + ", phone-number: " + ephone;
                if (i != drivers.length - 1) {
                    driversElem.innerHTML += ",";
                }
            });
        }
    }

    requestLocations().then((locations) => {
        writeTable(locations);
        for(let location of locations) {
            requestEmployees(location.lid).then((employees) => {
                updateTable(location.lid, employees);
            })
        }
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
