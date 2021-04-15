<!DOCTYPE html>
<html>
<head>
        <title>ClickTool</title>
</head>
<body>

<?php
// Toggle TV vlan on/off
function tvon() {
  system('/scripts/starttv.sh > /dev/null 2>&1');
  echo 'TVs ENABLED';
}
function tvoff() {
  system('/scripts/killtv.sh > /dev/null 2>&1');
  echo 'TVs DISABLED';
}
// Toggle Kid's vlan on/off
function kidsoff() {
  system('/scripts/stopkids.sh > /dev/null 2>&1');
  echo 'Kids inet is off';
} 
function kidson() {
  system('/scripts/startkids.sh > /dev/null 2>&1');
  echo 'Kids inet is on';
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

<!-- buttons to invoke actions via simple GET API -->

<button type="button" onclick="window.location.href='?tvon=true'">TV ON</button>
<button type="button" onclick="window.location.href='?tvoff=true'">TV OFF</button>
<br>
<button type="button" onclick="window.location.href='?kidson=true'">KIDS ON</button>
<button type="button" onclick="window.location.href='?kidsoff=true'">KIDS OFF</button>
<br>

</body>
</html>
