<!DOCTYPE html>
<html>
<head>
        <title>Web Switch</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
                body {
                color: white;
                font-weight: bold;
                font-size: 40px;
                background-color: black;
                }
                .on {
                margin-right: 10px;
                width: 100px;
                background: #008CBA;
                border-bottom: #4863A0 3px solid;
                border-left: #4863A0 1px solid;
                border-right: #4863A0 1px solid;
                border-radius: 6px;
                text-align: center;
                color: white;
                padding: 10px;
                float: left;
                font-size: 16px;
                font-weight: bold;
                }
                .off {
                margin-right: 10px;
                width: 100px;
                background: #f44336;
                border-bottom: #990012 3px solid;
                border-left: #990012 1px solid;
                border-right: #990012 1px solid;
                border-radius: 6px;
                text-align: center;
                color: white;
                padding: 10px;
                float: left;
                font-size: 16px;
                font-weight: bold;
                }
                .on:hover {
                opacity: 0.8;
                }
                .off:hover {
                opacity: 0.8;
                }
                .on:active {
                width: 100px;
                background: #18B495;
                border-bottom: #16a085 1px solid;
                border-left: #16a085 1px solid;
                border-right: #16a085 1px solid;
                border-radius: 6px;
                text-align: center;
                color: white;
                padding: 10px;
                margin-top: 3px;
                float: left;
                }
                .off:active {
                width: 100px;
                background: #18B495;
                border-bottom: #16a085 1px solid;
                border-left: #16a085 1px solid;
                border-right: #16a085 1px solid;
                border-radius: 6px;
                text-align: center;
                color: white;
                padding: 10px;
                margin-top: 3px;
                float: left;              
        </style>
</head>
<body>
<!-- Print the buttons -->
<center>
        <table width='300' border='0' cellpadding='20'>
        <tr>
                <td><button type="button" class="on" onclick="window.location.href='?tvon=true'">TV ON</button></td>
                <td><button type="button" class="off" onclick="window.location.href='?tvon=false'">TV OFF</button></td>
        </tr>
        <tr>
                <td><button type="button" class="on" onclick="window.location.href='?kidson=true'">KIDS ON</button></td>
                <td><button type="button" class="off" onclick="window.location.href='?kidson=false'">KIDS OFF</button></td>
        </tr>
        </table>

<?php
// Toggle TV vlan on/off
function tvon() {
  system('/scripts/starttv.sh > /dev/null 2>&1');
  echo "<center>" . "TVs ENABLED" . "</center>";
}
function tvoff() {
  system('/scripts/killtv.sh > /dev/null 2>&1');
  echo "<center>" . "TVs DISABLED" . "</center>";
}
// Toggle Kid's vlan on/off
function kidsoff() {
  system('/scripts/stopkids.sh > /dev/null 2>&1');
  echo "<center>" . "Kids inet is off" . "</center>";
} 
function kidson() {
  system('/scripts/startkids.sh > /dev/null 2>&1');
  echo "<center>" . "Kids inet is on" . "</center>";
}

// decision structure for simple API based on GET 
foreach ($_GET as $key => $value) {

        switch ($key) {
        case 'tvon' :
                switch ($value) {
                case 'true' :
                        tvon();
                        break;
                case 'false' :
                        tvoff();
                        break;
                }
                break;
        case 'kidson' :
                switch ($value) {
                case 'true' :
                        kidson();
                        break;
                case 'false' :
                        kidsoff();
                        break;
                }
                break;
        default :
                break;
        }
}


?>

</center>
</body>
</html>
