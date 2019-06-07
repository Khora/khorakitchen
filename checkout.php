<?php
	include "lib/lib.php";
?>

<!DOCTYPE html>
<html>
    <?php
        echo getHtmlHead("CHECKOUT | madebykhora");
    ?>

	<body>
		<div id="wrapper">
            <?php
                echo getPageHeader("CHECKOUT");
            ?>
            <div id="content">
                <?php
                    echo getTopBanner();
                    
                    $text = '<h3>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.
                            <h3>-</h3>
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.';
                    $image = 'img/donation.jpg';
                    echo getFullWidthTextAndImageBanner($text, $image);
                ?>
                
                <br><br><br><br>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        <center><h1>CHECKOUT</h1></center><br><br>
                        
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                        
                        <?php
                            $width = 50;
                            if (isMobile()) {
                                $width = 100;
                            }
                        ?>
                        
                         <form>
                            <p id="boxes"></p><br><br><br>
                            <table width="100%">
                                <tr>
                                    <td valign="top" width="<?php echo $width; ?>%">
                                        <div id="radioDiv2" onmouseover="mouseOverRadioBox('radioDiv2')" onmouseout="mouseOutRadioBox('radioDiv2')" onclick="updateRadioBoxesDonation('radio2', false);" class="clickableDiv">
                                            <h3><input id="radio2" type="radio" name="countrySelection" checked>&nbsp;&nbsp;I am living outside of the UK, my currency is &euro;</h3>
                                            <small>Your donation will come directly to the Khora Community and wil help serving food for people in need.<br><br>
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</small>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" width="<?php echo $width; ?>%">
                                        <div id="radioDiv1" onmouseover="mouseOverRadioBox('radioDiv1')" onmouseout="mouseOutRadioBox('radioDiv1')" onclick="updateRadioBoxesDonation('radio1', false);" class="clickableDiv">
                                            <h3><input id="radio1" type="radio" name="countrySelection">&nbsp;&nbsp;I am living in the UK, my currency is &pound;</h3>
                                            <small>If you're a UK taxpayer you can boost your donation by 25p for every &pound;1 you donate.<br><br>
                                            Gift Aid is reclaimed by the charity from the tax you pay for the current tax year. Your address is needed to identify you as a current UK taxpayer.<br><br>
                                            Note: The amount of Income Tax and/or Capital Gains Tax payed in the current tax year must be greater than the amount of Gift Aid claimed on all your donations.</small><br><br>
                                            <table style="padding: 20px;">
                                                <tr>
                                                    <td style="float: right;">
                                                        <input type="checkbox" id="firstName" class="addToCartTextInput" name="firstName" style="-ms-transform: scale(1.5); -moz-transform: scale(1.5);  -webkit-transform: scale(1.5); -o-transform: scale(1.5); transform: scale(1.5); padding: 10px;" size="50" value=""/>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </td>
                                                    <td valign="center" style="width: auto">
                                                        Gift aid my donation<br><br>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table style="padding: 20px;">
                                                <tr>
                                                    <td valign="center" style="white-space: nowrap;">
                                                        E-Mail:  <a style="color:red;">*</a>
                                                    </td>
                                                    <td valign="center">
                                                        <input type="text" id="firstName" class="addToCartTextInput" name="firstName" size="50" value=""/>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table style="padding: 20px;">
                                                <tr>
                                                    <td style="float: right;">
                                                        <input type="checkbox" id="firstName" class="addToCartTextInput" name="firstName" style="-ms-transform: scale(1.5); -moz-transform: scale(1.5);  -webkit-transform: scale(1.5); -o-transform: scale(1.5); transform: scale(1.5); padding: 10px;" size="50" value=""/>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </td>
                                                    <td valign="center" style="width: auto">
                                                        Keep me up to date on news<br><br>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table style="padding: 20px;">
                                                <tr>
                                                    <td valign="center" style="white-space: nowrap;">
                                                        First Name:  <a style="color:red;">*</a><br><br>
                                                    </td>
                                                    <td valign="center">
                                                        <input type="text" id="firstName" class="addToCartTextInput" name="firstName" size="50" value=""/><br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center" style="white-space: nowrap;">
                                                        Last Name:  <a style="color:red;">*</a><br><br>
                                                    </td>
                                                    <td valign="center">
                                                        <input type="text" id="lastName" class="addToCartTextInput" name="lastName" size="50" value=""/><br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center" style="white-space: nowrap;">
                                                        Street:  <a style="color:red;">*</a><br><br>
                                                    </td>
                                                    <td valign="center">
                                                        <input type="text" id="lastName" class="addToCartTextInput" name="lastName" size="50" value=""/><br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center" style="white-space: nowrap;">
                                                        House Number:  <a style="color:red;">*</a><br><br>
                                                    </td>
                                                    <td valign="center">
                                                        <input type="text" id="lastName" class="addToCartTextInput" name="lastName" size="50" value=""/><br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center" style="white-space: nowrap;">
                                                        Apartment, Suite, etc. (optional):&nbsp;&nbsp;&nbsp;<br><br>
                                                    </td>
                                                    <td valign="center">
                                                        <input type="text" id="lastName" class="addToCartTextInput" name="lastName" size="50" value=""/><br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center" style="white-space: nowrap;">
                                                        Postal Code:  <a style="color:red;">*</a><br><br>
                                                    </td>
                                                    <td valign="center">
                                                        <input type="text" id="lastName" class="addToCartTextInput" name="lastName" size="50" value=""/><br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center" style="white-space: nowrap;">
                                                        City:  <a style="color:red;">*</a><br><br>
                                                    </td>
                                                    <td valign="center">
                                                        <input type="text" id="lastName" class="addToCartTextInput" name="lastName" size="50" value=""/><br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center" style="white-space: nowrap;">
                                                        Country:  <a style="color:red;">*</a><br><br>
                                                    </td>
                                                    <td valign="center">
                                                        <input type="text" id="lastName" class="addToCartTextInput" name="lastName" size="50" value=""/><br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center" style="white-space: nowrap;">
                                                        Make my donation recurring (optional):&nbsp;&nbsp;&nbsp;
                                                    </td>
                                                    <td valign="center">
                                                        <input id="weeklyRecurring" type="radio" name="recurringSelection" style="-ms-transform: scale(1.5); -moz-transform: scale(1.5);  -webkit-transform: scale(1.5); -o-transform: scale(1.5); transform: scale(1.5); padding: 10px;">&nbsp;&nbsp;weekly&nbsp;&nbsp;
                                                        <input id="monthlyRecurring" type="radio" name="recurringSelection" style="-ms-transform: scale(1.5); -moz-transform: scale(1.5);  -webkit-transform: scale(1.5); -o-transform: scale(1.5); transform: scale(1.5); padding: 10px;">&nbsp;&nbsp;monthly&nbsp;&nbsp;
                                                        <input id="yearlyRecurring" type="radio" name="recurringSelection" style="-ms-transform: scale(1.5); -moz-transform: scale(1.5);  -webkit-transform: scale(1.5); -o-transform: scale(1.5); transform: scale(1.5); padding: 10px;">&nbsp;&nbsp;yearly
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <script>
                            function updateRadioBoxesDonation(boxId, firstStart) {
                                if (!firstStart && !document.getElementById(boxId).checked) {
                                    callDelayed(executeCurrencySwitch, 1000);
                                }
                                document.getElementById(boxId).checked = true;
                                if (document.getElementById('radio1').checked) {
                                    document.getElementById('radioDiv1').style.opacity = 1;
                                    document.getElementById('radioDiv2').style.opacity = 0.6;
                                } else {
                                    document.getElementById('radioDiv2').style.opacity = 1;
                                    document.getElementById('radioDiv1').style.opacity = 0.6;
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
                            
                            function executeCurrencySwitch() {
                                currency = "<?php
                                                if (strcmp(getCurrency(), "GBP") == 0) {
                                                    echo "EUR";
                                                } else {
                                                    echo "GBP";
                                                }
                                            ?>";
                                window.location.href = getCurrentServerAndPath() + getCurrentFileName() + "?currency=" + currency + "#boxes";
                            }
                            
                            <?php
                                if (strcmp(getCurrency(), "GBP") == 0) {
                                    echo "updateRadioBoxesDonation('radio1', true);";
                                } else {
                                    echo "updateRadioBoxesDonation('radio2', true);";
                                }
                            ?>
                        </script>
                        
                        </br></br></br></br>
                        
                        <?php
                            $khoraBusinessAddress = 'khoracommunitycenter@gmail.com';
                            $message = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.';
                            $currency = getCurrency();
                            $amount = getInCurrentCurrencyValueOnly(getCurrentPriceOfCart());
                        ?>
                        
                        <div class="horizontalCenteredBase">
                            <div class="horizontalCentered" style="font-size: 20px; line-height: 30px; text-align: center;">
                                To donate the amount of <b><u><?php echo $amount; echo " " . $currency; ?></b></u> to the Khora Community kitchen, please click the button below to proceed to PayPal.
                                </br></br>
                                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                                    <input type="hidden" name="cmd" value="_donations">
                                    <input type="hidden" name="business" value="<?php echo $khoraBusinessAddress; ?>">
                                    <input type="hidden" name="amount" id="amount" value="<?php echo $amount; ?>">
                                    <input type="hidden" name="lc" value="IE">
                                    <input type="hidden" name="item_name" value="<?php echo $message; ?>">
                                    <input type="hidden" name="currency_code" value="<?php echo $currency; ?>">
                                    <input type="hidden" name="no_note" value="0">
                                    <input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_SM.gif:NonHostedGuest">
                                    <input type="image" src="img/payPalLogoBig.png" class="bigButton" name="submit" alt="PayPal" onclick="callDelayed(goToThankYouPage, 3000);">
                                </form>
                            </div>
                        </div>
                        <script>
                            function goToThankYouPage(boxId) {
                                window.location.href = getCurrentServerAndPath() + 'thanks.php';
                            }
                        </script>
                            
                        </br></br></br><br>
                        
                        <h2>Alternative Donation Methods:</h2>
                        <h3>Direct Bank Transaction?</h3>
                        IBAN and BIC<br><br>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                        
                        <br><br><br><br>
                        
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                        
                        <br><br><br><br>
                        
                        
                    </div>
                </div>
            </div>
            <?php
                echo getPageFooter();
            ?>
		</div>
	</body>
</html>