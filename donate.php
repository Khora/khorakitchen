<?php
	include "lib/lib.php";
?>

<!DOCTYPE html>
<html>
    <?php
        echo getHtmlHead("DONATE | madebykhora");
    ?>

	<body>
		<div id="wrapper">
            <?php
                echo getPageHeader("DONATE");
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
                        <center><h1>DONATE</h1></center><br><br>
                        
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                        
                        <br><br><br><br>
                        
                        <?php
                            $insertNewRow = '';
                            $width = 50;
                            if (isMobile()) {
                                $insertNewRow = '</tr><tr>';
                                $width = 100;
                            }
                        ?>
                        
                         <form>
                            <table width="100%">
                                <tr>
                                    <td valign="top" width="<?php echo $width; ?>%">
                                        <div id="radioDiv1" onmouseover="mouseOverRadioBox('radioDiv1')" onmouseout="mouseOutRadioBox('radioDiv1')" onclick="updateRadioBoxesDonation('radio1');" class="clickableDiv">
                                            <h3><input id="radio1" type="radio" name="gender" value="male" checked>&nbsp;&nbsp;---No Gift Aid, Euros as Currency----.</h3>
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                        </div>
                                    </td>
                                    <?php echo $insertNewRow; ?>
                                    <td valign="top" width="<?php echo $width; ?>%">
                                        <div id="radioDiv2" onmouseover="mouseOverRadioBox('radioDiv2')" onmouseout="mouseOutRadioBox('radioDiv2')" onclick="updateRadioBoxesDonation('radio2');" class="clickableDiv">
                                            <h3><input id="radio2" type="radio" name="gender" value="female">&nbsp;&nbsp;---Gift Aid, Pounds as Currency, person lives in UK----.</h3>
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <script>
                            function updateRadioBoxesDonation(boxId) {
                                document.getElementById(boxId).checked = true;
                                if (document.getElementById('radio1').checked) {
                                    console.log(boxId);
                                    console.log(document.getElementById(boxId).checked);
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
                            updateRadioBoxesDonation('radio1');
                        </script>
                        
                        </br></br></br></br>
                        
                        <?php
                            $khoraBusinessAddress = 'khoracommunitycenter@gmail.com';
                            $message = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.';
                            $currency = getCurrency();
                            $amount = getCurrentPriceOfCart();
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
                                    <input type="image" src="img/payPalLogoBig.png" class="bigButton" name="submit" alt="PayPal">
                                </form>
                            </div>
                        </div>
                            
                        </br></br></br><br>
                        
                        <h2>Alternative Donation Methods:</h2>
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