<?php
	include "lib/lib.php";
    
    if (isset($_GET["current"])) {
        setCurrentDonationProgress(strtolower(htmlspecialchars($_GET["current"])));
    }
    if (isset($_GET["target"])) {
        setTargetDonationProgress(strtolower(htmlspecialchars($_GET["target"])));
    }
?>