<?php
	include "lib/lib.php";
?>

<!DOCTYPE html>
<html>
    <?php
        echo getHtmlHeadImpl("CHECKOUT | Khora Kitchen", '<script src="https://js.stripe.com/v3/"></script>');
    ?>

	<body>
		<div id="wrapper">
            <?php
                echo getPageHeader("CHECKOUT");
            ?>
            <div id="content">
                <?php
                    echo getTopBanner();
                ?>
                
                <br><br><br><br>
                
                <?php
                    if (floatval(getCurrentPriceOfCart()) == 0) {
                        echo '<div class="horizontalCenteredBase">
                                <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                                    <center><h1>CHECKOUT</h1></center><br><br>
                                    
                                    Your cart is empty! Please return to the store and try again!<br><br><br><br><br><br><br><br><br><br><br><br>
                                </div>
                            </div>';
                        echo getPageFooter();
                        return;
                    }
                ?>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        <center><h1>CHECKOUT</h1></center></br>
                        <p id="boxes"></p>
                        Just one more step: please choose your donation method below and continue through to Stripe, PayPal or an alternative payment method.
                        <br><br>
                        Your donation will come directly to the Khora Community and will help serving food for people in need.
                        </br></br>
                        <?php
                            $width = 50;
                            if (isMobile()) {
                                $width = 100;
                            }
                        ?>
                        
                         <form>
                            <table width="100%">
                                <tr>
                                    <td valign="top" width="<?php echo $width; ?>%">
                                        <div id="radioDiv1" onmouseover="mouseOverRadioBox('radioDiv1')" onmouseout="mouseOutRadioBox('radioDiv1')" onclick="updateRadioBoxesDonation('radio1', true);" class="clickableDiv">
                                            <h4><input id="radio1" type="radio" name="countrySelection" checked onclick="updateRadioBoxesDonation('radio1', true);">&nbsp;&nbsp;Donate via Stripe</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" width="<?php echo $width; ?>%">
                                        <div id="radioDiv2" onmouseover="mouseOverRadioBox('radioDiv2')" onmouseout="mouseOutRadioBox('radioDiv2')" onclick="updateRadioBoxesDonation('radio2', true);" class="clickableDiv">
                                            <h4><input id="radio2" type="radio" name="countrySelection" onclick="updateRadioBoxesDonation('radio2', true);">&nbsp;&nbsp;Donate via PayPal</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" width="<?php echo $width; ?>%">
                                        <div id="radioDiv3" onmouseover="mouseOverRadioBox('radioDiv3')" onmouseout="mouseOutRadioBox('radioDiv3')" onclick="updateRadioBoxesDonation('radio3', true);" class="clickableDiv">
                                            <h4><input id="radio3" type="radio" name="countrySelection" onclick="updateRadioBoxesDonation('radio3', true);">&nbsp;&nbsp;Donate via IBAN bank transaction</h4>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <script>
                            <?php
                                $radioId = 1;
                                if (isset($_GET["method"])) {
                                    $c = strtolower(htmlspecialchars($_GET["method"]));
                                    if (is_numeric($c)) {
                                        $radioId = $c;
                                    }
                                }
                                echo 'updateRadioBoxesDonation("radio' . $radioId . '", false);';
                            ?>
                            
                            function updateRadioBoxesDonation(boxId, redirect) {
                                var id = boxId.replace('radio', '');
                                document.getElementById(boxId).checked = true;
                                document.getElementById('radioDiv1').style.opacity = 0.6;
                                document.getElementById('radioDiv2').style.opacity = 0.6;
                                document.getElementById('radioDiv3').style.opacity = 0.6;
                                document.getElementById('radioDiv' + id).style.opacity = 1;
                                if (redirect) {
                                    window.location.href = getCurrentServerAndPath() + 'checkout.php?method=' + id + '#boxes';
                                }
                            }
                            
                            function mouseOverRadioBox(boxId) {
                                document.getElementById(boxId).style['-webkit-box-shadow'] = '0px 0px 20px rgba(0, 0, 0, 0.5)';
                                document.getElementById(boxId).style['-moz-box-shadow'] = '0px 0px 20px rgba(0, 0, 0, 0.5)';
                            }
                            
                            function mouseOutRadioBox(boxId) {
                                document.getElementById(boxId).style['-webkit-box-shadow'] = '0px 0px 10px rgba(0, 0, 0, 0.5)';
                                document.getElementById(boxId).style['-moz-box-shadow'] = '0px 0px 10px rgba(0, 0, 0, 0.5)';
                            }
                            
                            function goToThankYouPage() {
                                window.location.href = getCurrentServerAndPath() + 'thanks.php';
                            }
                            
                            function goToStripePayment(m, i, d, k, not, monthly, yearly) {
                                var mode = m;
                                var items = null;
                                if (not) {
                                    items = i['not'];
                                } else if (monthly) {
                                    mode = 'subscription';
                                    items = i['monthly'];
                                } else if (yearly) {
                                    mode = 'subscription';
                                    items = i['yearly'];
                                }
                                var domain = d;
                                var PUBLISHABLE_KEY = k;
                                
                                var stripe = Stripe(PUBLISHABLE_KEY);

                                var handleResult = function (result) {
                                    if (result.error) {
                                        var displayError = document.getElementById('stripe-error-message');
                                        displayError.textContent = result.error.message;
                                    }
                                };
                                
                                stripe.redirectToCheckout({
                                    mode: mode,
                                    lineItems: items,
                                    successUrl: domain + 'thanks.php?session_id={CHECKOUT_SESSION_ID}',
                                    cancelUrl: domain + 'checkout.php?cancelled=true&session_id={CHECKOUT_SESSION_ID}'}).then(handleResult);
                            }
                        </script>
                        
                        </br>
                        
                        <?php
                            $mobileBr = '';
                            if (isMobile()) {
                                $mobileBr = '<br><br>';
                            }
                            $khoraBusinessAddress = getEmailForPayPal();
                            $message = 'Thank you for your kindness and generosity. Without people like you we would not be able to run the kitchen.';
                            $currency = getCurrentCurrencySymbol();
                            $currencyString = getCurrency();
                            $eurPrice = '';
                            $eurNote = '';
                            if ($currencyString == 'GBP') {
                                $eurPrice = ' = ' . formatCurrencyValue(getCurrentPriceOfCartEur(), true, false) . '&euro;';
                                $eurNote = '<b>Note:</b> the currency of all items in our Stripe account is EUR. All prices will be translated to EUR before proceeding to Stripe.<br>';
                            }
                            $amount = formatCurrencyValue(getCurrentPriceOfCart(), true, true);
                            $amountFloat = getCurrentPriceOfCart();
                            $stripeMode = 'payment';
                            $stripeItemsNotRecurring = getStripeItemsString('onceStripeID');
                            $stripeItemsMonthly = getStripeItemsString('monthlyStripeID');
                            $stripeItemsYearly = getStripeItemsString('yearlyStripeID');
                            $stripeItems = '{not: ' . $stripeItemsNotRecurring . ', monthly: ' . $stripeItemsMonthly . ', yearly: ' . $stripeItemsYearly . '}';
                            $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
                            $host = $_SERVER['HTTP_HOST'];
                            $pathOnHost = substr($_SERVER['REQUEST_URI'], 0, strripos($_SERVER['REQUEST_URI'], '/') + 1);
                            $currentDomain = $protocol . $host . $pathOnHost;
                            $stripeKey = getStripePublishableKey();
                            if ($radioId == 1) {
                                echo '<div class="horizontalCenteredBase">
                                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px; text-align: center;">
                                        <div id="stripe-error-message"></div>
                                        To donate the amount of <b><u>' . $amount . " " . $currency . $eurPrice . '</u></b> to the Khora Community Kitchen, please click the button below to proceed to Stripe.<br><br>
                                        ' . $eurNote . '
                                        <div class="infoDiv">
                                            <nobr>
                                                <input id="notRecurring" type="radio" name="recurringSelection" checked>&nbsp;&nbsp;not recurring&nbsp;&nbsp;' . $mobileBr . '
                                                <input id="monthlyRecurring" type="radio" name="recurringSelection">&nbsp;&nbsp;donate monthly&nbsp;&nbsp;' . $mobileBr . '
                                                <input id="yearlyRecurring" type="radio" name="recurringSelection">&nbsp;&nbsp;yearly
                                            </nobr>
                                        </div>
                                        <br>
                                        <input type="image" src="img/stripeLogoBig.png" style="width: 200px; padding: 15px 40px 15px 40px;" class="bigButton" name="submit" alt="Stripe" onclick="goToStripePayment(\'' . $stripeMode . '\', ' . $stripeItems . ', \'' . $currentDomain . '\', \'' . $stripeKey . '\', document.getElementById(\'notRecurring\').checked, document.getElementById(\'monthlyRecurring\').checked, document.getElementById(\'yearlyRecurring\').checked);"><br>
                                        <img src="img/creditCardsLogos.png" style="width: 200px;">
                                    </div>
                                </div>';
                            } else if ($radioId == 2) {
                                echo '<div class="horizontalCenteredBase">
                                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px; text-align: center;">
                                        To donate the amount of <b><u>' . $amount . " " . $currency .'</u></b> to the Khora Community Kitchen, please click the button below to proceed to PayPal.
                                        </br></br>
                                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                                            <input type="hidden" name="cmd" value="_donations">
                                            <input type="hidden" name="business" value="' . $khoraBusinessAddress . '">
                                            <input type="hidden" name="amount" id="amount" value="' . $amountFloat . '">
                                            <input type="hidden" name="lc" value="IE">
                                            <input type="hidden" name="item_name" value="' . $message . '">
                                            <input type="hidden" name="currency_code" value="' . $currencyString . '">
                                            <input type="hidden" name="no_note" value="0">
                                            <input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_SM.gif:NonHostedGuest">
                                            <input type="image" src="img/payPalLogoBig.png" style="width: 200px; padding: 15px 40px 15px 40px;" class="bigButton" name="submit" alt="PayPal" onclick="callDelayed(goToThankYouPage, 3000);"><br>
                                            <img src="img/creditCardsLogos.png" style="width: 200px;">
                                        </form>
                                    </div>
                                </div>';
                            } else {
                                echo '<div class="horizontalCenteredBase">
                                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px; text-align: center;">
                                        Please consider donating to the Khora Community Centre. To let us know that your donation shall be used for the Khora Community Kitchen, please write a note into the reference field of the transaction.
                                        </br></br>
                                        The amount in your basket is <b><u>' . $amount . " " . $currency .'</u></b>.
                                        </br></br>
                                        <b>Account name:</b> Khora Community Centre<br>
                                        <b>IBAN:</b> GR32 0172 0790 0050 7909 1525 571<br>
                                        <b>SWIFT/BIC:</b> PIRBGRAA</br>
                                        <u><a href="https://www.khora-athens.org/donate">https://www.khora-athens.org/donate</a></u>
                                    </div>
                                </div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            </br></br>
            <?php
                echo getPageFooter();
            ?>
		</div>
	</body>
</html>
