<?php
	include "lib/lib.php";
    
    if (isset($_GET["current"])) {
        $c = strtolower(htmlspecialchars($_GET["current"]));
        if (is_numeric($c)) {
            setCurrentDonationProgress($c);
        }
    }
    if (isset($_GET["target"])) {
        $t = strtolower(htmlspecialchars($_GET["target"]));
        if (is_numeric($t)) {
            setTargetDonationProgress($t);
        }
    }
?>
