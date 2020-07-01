<?php
require_once("core.php");
loadPlugins("Addresses");

$Addresses->loadTemplate("header");
$Addresses->getHelp();
?>
<br>
<?php
$Addresses->listAdresses();
$Addresses->loadTemplate("footer");