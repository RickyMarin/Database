<?php
    
    session_start();
    if(!isset($_SESSION['logged_in'])){
       header("Location:SignUp.php");
    }
?>

<html>
    <head>
        <title>Order Status</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="assets/css/main.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    
    <body class="is-preload">

    <?php include("LoggedInHeader.php"); ?>
    

    <h3>Delivery Orders</h3>
    <table id='delivery-orders-table'>
        
    </table>



    <h3>Pickup Orders</h3>
    <table id='pickup-orders-table'>
        
    </table>


    <script>

        function requestDeliveryOrders() {
            var xmlhttp = new XMLHttpRequest();
            return new Promise ((resolve, reject) => {
        
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    let data = JSON.parse(xmlhttp.responseText);
                    return resolve(data);
                }
            }
            let url = "./DeliverOrderData.php?data=true";


            xmlhttp.open("GET", url, true);
            xmlhttp.send();
            });
        }

        function requestPickupOrders() {
            var xmlhttp = new XMLHttpRequest();
            return new Promise ((resolve, reject) => {
        
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    let data = JSON.parse(xmlhttp.responseText);
                    return resolve(data);
                }
            }
            let url = "./PickupOrderData.php?data=true";
            

            xmlhttp.open("GET", url, true);
            xmlhttp.send();
            });
        }
    
    const writeTableDeliver = (orders) => {
        let table = document.getElementById('delivery-orders-table');
        for(let order of orders) {
            console.log(order);
            //let finalLocation = order.laddrstr + ", " + order.laddrcity + ", " + order.laddrstate + ", " + order.laddrzip;
            let newTr = document.createElement('tr');
            let newTd = document.createElement('td');

            let orderNum = "Order Number: " + order.orderNum;
            let orderNumElem = document.createElement('p');
            orderNumElem.innerHTML = orderNum;
            
            let driverName = "Driver: " + order.ename;
            let driverNameElem = document.createElement('p');
            driverNameElem.innerHTML = driverName;

            let driverPhone = "Driver Phone Number: " + order.ephone;
            let driverPhoneElem = document.createElement('p');
            driverPhoneElem.innerHTML = driverPhone;
            
            let toppings = "Order: " + order.sname + " pizza, " + order.quantity + " " + order.tname + ", " + order.cheese + " cheese";
            let toppingsElem = document.createElement('p');
            toppingsElem.innerHTML = toppings;
            
            newTd.appendChild(orderNumElem);
            newTd.appendChild(driverNameElem);
            newTd.appendChild(driverPhoneElem);
            newTd.appendChild(toppingsElem);
            
            newTr.appendChild(newTd);
            table.appendChild(newTr);
        }
        if (orders.length == 0) {
            let newTr = document.createElement('tr');
            let newTd = document.createElement('td');
            newTd.innerHTML = "There are no delivery orders in progress.";
            newTr.appendChild(newTd);
            table.appendChild(newTr);
        }
        };


        const writeTablePickup = (orders) => {
        let table = document.getElementById('pickup-orders-table');
        for(let order of orders) {
            console.log(order);
            let finalLocation = order.laddrstr + ", " + order.laddrcity + ", " + order.laddrstate + ", " + order.laddrzip;
            let newTr = document.createElement('tr');
            let newTd = document.createElement('td');

            let orderNum = "Order Number: " + order.orderNum;
            let orderNumElem = document.createElement('p');
            orderNumElem.innerHTML = orderNum;

            
            let address = "Address: " + finalLocation;
            let addressElem = document.createElement('p');
            addressElem.innerHTML = address;
            
            
            let cashierName = "Cashier: " + order.ename;
            let cashierNameElem = document.createElement('p');
            cashierNameElem.innerHTML = cashierName;

            let cashierExp = "Cashier Experience: " + order.exp;
            let cashierExpElem = document.createElement('p');
            cashierExpElem.innerHTML = cashierExp;

            
            let toppings = "Order: " + order.sname + " pizza, " + order.quantity + " " + order.tname + ", " + order.cheese + " cheese";
            let toppingsElem = document.createElement('p');
            toppingsElem.innerHTML = toppings;
            
            newTd.appendChild(orderNumElem);
            
            newTd.appendChild(addressElem);
            
            newTd.appendChild(cashierNameElem);
            newTd.appendChild(cashierExpElem);
            newTd.appendChild(toppingsElem);
            
            newTr.appendChild(newTd);
            table.appendChild(newTr);
        }
        if (orders.length == 0) {
            let newTr = document.createElement('tr');
            let newTd = document.createElement('td');
            newTd.innerHTML = "There are no pickup orders in progress.";
            newTr.appendChild(newTd);
            table.appendChild(newTr);
        }
        };


        requestDeliveryOrders().then((data) => {
            writeTableDeliver(data);
        });

        requestPickupOrders().then((data) => {
            writeTablePickup(data);
        });


    </script>




        <?php include("footer.php"); ?>
    </body>
</html>