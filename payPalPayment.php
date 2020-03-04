<?php
	include "lib/lib.php";
?>

<!DOCTYPE html>
<html>
    <?php
        echo getHtmlHead("PROCESSING PAYMENT | madebykhora");
    ?>

	<body>
		<div id="wrapper">
            <?php
                echo getPageHeader("PROCESSING PAYMENT");
            ?>
            <div id="content">
                <br><br><br><br>
                
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        <center><h1>PROCESSING PAYMENT</h1></center>
                    </div>
                </div>
                
                <br><br>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        
                        <?php
                            if (isset($_GET["amount"]) && isset($_GET["currency"]) && isset($_GET["description"]) && isset($_GET["name"]) && isset($_GET["line1"]) && isset($_GET["line2"]) && isset($_GET["city"]) && isset($_GET["countryCode"]) && isset($_GET["postalCode"]) && isset($_GET["phone"]) && isset($_GET["state"]) && isset($_GET["recurring"])) {
                                echo "<h2>We are currently registering your payment at PayPal</h2>This should be ready soon. You will be redirected to PayPal to authorize this once it is finished.<br><br><br>";
                                
                                $amount = htmlspecialchars($_GET["amount"]);
                                $currency = htmlspecialchars($_GET["currency"]);
                                $description = htmlspecialchars($_GET["description"]);
                                $name = htmlspecialchars($_GET["name"]);
                                $line1 = htmlspecialchars($_GET["line1"]);
                                $line2 = htmlspecialchars($_GET["line2"]);
                                $city = htmlspecialchars($_GET["city"]);
                                $countryCode = htmlspecialchars($_GET["countryCode"]);
                                $postalCode = htmlspecialchars($_GET["postalCode"]);
                                $phone = htmlspecialchars($_GET["phone"]);
                                $state = htmlspecialchars($_GET["state"]);
                                $recurring = htmlspecialchars($_GET["recurring"]);
                                
                                $url = "";
                                if (strcmp($recurring, "no") == 0) {
                                    $url = makePayPalPaymentAndReturnUrlToAuthorize($amount, $currency, $description, $name, $line1, $line2, $city, $countryCode, $postalCode, $phone, $state);
                                    
                                } else {
                                    $url = makePayPalRecurringPaymentAndReturnUrlToAuthorize($amount, $currency, $description, $name, $line1, $line2, $city, $countryCode, $postalCode, $phone, $state, $recurring);
                                }
								if ($url !== '') {
									echo 'If this does not work, click <a style="text-decoration: underline;" href="' . $url . '">here</a>.';
									echo '<script>
											window.location.href = "' . $url . '";
										</script><br><br><br>';
								} else {
									echo "<h2>Something went wrong</h2>Please try later again.<br><br><br><br><br><br><br><br><br><br>";
								}
                            } else {
                                echo "<h2>Not all mandatory information was given</h2>Please try the checkout again.<br><br><br><br><br><br><br><br><br><br>";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php
                echo getPageFooter();
            ?>
		</div>
	</body>
</html>