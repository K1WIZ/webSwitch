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
                display: block;
                width: 100%;
                border: none;
                background-color: #008CBA;
                padding: 14px 28px;
                font-weight: bold;
                color: white;
                font-size: 16px;
                cursor: pointer;
                text-align: center;
                }
                .off {
                display: block;
                width: 100%;
                border: none;
                background-color: #f44336;
                padding: 14px 28px;
                font-weight: bold;
                color: white;
                font-size: 16px;
                cursor: pointer;
                text-align: center;
                }
        </style>
</head>
<body>
<!-- Print the buttons -->
<center>
        <table width='300' border='0' cellpadding='20'>
        <tr>
                <td><button type="button" class="on" onclick="window.location.href='?tvon=true'">TV ON</button></td>
                <td><button type="button" class="off" onclick="window.location.href='?tvoff=true'">TV OFF</button></td>
        </tr>
        <tr>
                <td><button type="button" class="on" onclick="window.location.href='?kidson=true'">KIDS ON</button></td>
                <td><button type="button" class="off" onclick="window.location.href='?kidsoff=true'">KIDS OFF</button></td>
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

if ($_GET['tvon']) {
tvon();
} elseif ($_GET['tvoff']) {
tvoff();
} elseif ($_GET['kidsoff']) {
kidsoff();
} elseif ($_GET['kidson']) {
kidson();
}

?>

</center>
</body>
</html>
