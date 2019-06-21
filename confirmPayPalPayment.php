<?php
	include "lib/lib.php";
?>

<!DOCTYPE html>
<html>
    <?php
        echo getHtmlHead("CONFIRM PAYMENT | madebykhora");
    ?>

	<body>
		<div id="wrapper">
            <?php
                echo getPageHeader("CONFIRM PAYMENT");
            ?>
            <div id="content">
                <br><br><br><br>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        <center><h1>CONFIRM PAYMENT</h1></center>
                    </div>
                </div>
                
                <br><br>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        <?php
                            if (isset($_GET['paymentId']) && isset($_GET['PayerID'])) {
                                echo 'Thank you for authorizing the payment.<br>On clicking on the button below, you confirm and execute the payment with the amount of <b><u>' . getInCurrentCurrency(getCurrentPriceOfCart()) . '</b></u> and it will be booked on your PayPal account.<br><br><br>';
                                $paymentId = htmlspecialchars($_GET['paymentId']);
                                $PayerID = htmlspecialchars($_GET['PayerID']);
                                if (isset($_GET['execute'])) {
                                    $success = executePayPalPayment($paymentId, $PayerID);
                                    if ($success == true) {
                                        $thanksPage = 'thanks.php';
                                        echo 'The payment has been executed successfully. You will be redirected, if this does not work, click <a href="' . $thanksPage . '">here</a>.';
                                        echo '<script>
                                                window.location.href = "' . $thanksPage . '";
                                            </script>';
                                    } else {
                                        echo 'Oops, the payment has NOT been executed successfully. Please return to the <a href="store.php">store</a> and try again.';
                                    }
                                } else {
                                    echo '<center><a href="confirmPayPalPayment.php?execute=true&paymentId=' . $paymentId . '&PayerID=' . $PayerID . '" class="bigButton">PAY NOW</a></center>';
                                }
                            } else if (isset($_GET['token'])) {
                                $success = activateRecurringPayPalPayment(htmlspecialchars($_GET['token']));
                                if ($success == true) {
                                    $thanksPage = 'thanks.php';
                                    echo 'The recurring payment has been activated successfully. You will be redirected, if this does not work, click <a href="' . $thanksPage . '">here</a>.';
                                    echo '<script>
                                            window.location.href = "' . $thanksPage . '";
                                        </script>';
                                } else {
                                    echo 'Oops, the recurring payment has NOT been activated successfully. Please return to the <a href="store.php">store</a> and try again.';
                                }
                            } else {
                                echo 'Oops, something went wrong. Please return to the <a href="store.php">store</a> and try again.';
                            }
                            echo '<br><br><br><br><br><br><br>';
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