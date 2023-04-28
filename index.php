<?php
/*
Using the basic concept of blockchain
Create a chains of tokens (block) as signature to carry forward in the network.
*/

/* Generic Token the first token to start the chain */
$initialBlock = "";
/* Here I use MD5 as the main HASH method. You can use your own here. */
$initBlock = md5($initialBlock);

/* Run this script to start the chain. */
require("modules/start.php");
?>
