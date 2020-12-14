<?php
	include "lib/lib.php";
?>

<!DOCTYPE html>
<html>
    <?php
        echo getHtmlHead("THANK YOU | Khora Kitchen");
    ?>

	<body>
		<div id="wrapper">
            <?php
                $giftCard = '';
                $zeroValues = array();
                if (isset($_SESSION['cart'])) {
                    $giftCard = createButtonForGiftCard($_SESSION['cart']);
                    foreach ($_SESSION['cart'] as $key => $value) {
                        unset($_SESSION['cart'][$key]);
                    }
                }
                echo getPageHeader("THANK YOU");
                
                if (isset($_GET['message'])) {
                    $sender = getEmailForMessagesSender();
					$tos = getEmailForMessagesTo();
                    $subject = "A message by a donor via the Khora Kitchen system";
					$message = "Dear Khora Kitchen Krew,\r\n\r\na donor has sent a message after donating to us via the Khora Kitchen system.\r\nPlease put this message up in the kitchen for everyone to read:\r\n\r\n-----------------------------------------------------------------\r\n\r\n" . htmlspecialchars($_GET['message']);

					$header = join("\r\n", array(
					   'From: '.$sender,
					   'Reply-To: '.$sender,
					   'Return-Path: '.$sender, 
					   'X-Mailer: PHP',
					   'Content-type: text/plain; charset=utf-8'
					));

					$messageToSend = html_entity_decode(utf8_decode($message));
					
					$retval = true;
					for ($i = 0; $i < count($tos); $i++) {
						$retval &= mail($tos[$i], $subject, $messageToSend, $header, '-f '.$sender);
					}
                    $info = '<p style="background-color: red;">Error: Message could not be send, PHP mail() did not return true!</p>';
                    if ($retval == true) {
                        $info = '';
                    }
                }
            ?>
            <div id="content">
                <?php
                    echo getTopBanner();
                    $text = '<h3>Thank you!</h3>
                            
                            From the entire Khora community, we thank you from the bottom of our hearts.  Without you and your support, we couldn\'t continue doing what we do, especially in these challenging times.
                            <br><br>
                            We would be hugely grateful if you could share the campaign with all your friends and family. Feel free to copy and paste the information below to share via email or on your social media.
                            <br><br>
                            And if you would like to send a message to all our guests at the kitchen, please write it below in the comments box.';
                    $image = 'img/thankYou.jpg';
                    echo getFullWidthTextAndImageBanner($text, $image);
                ?>
                
                <br><br><br><br>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        
                        <h2>Sharing the campaign</h2>
                        I've just donated to this campaign and I wanted to share it with you.  
                        <br><br>
                        The Khora social kitchen is a not for profit organisation based in Athens, Greece and is trying to raise €10,000 this November. They've got the chefs, the kitchen and the energy - they just need your help to buy the ingredients. Making a purchase on their online store funds Khora's Community Kitchen, where they serve 1000 meals a day to refugees, migrants and people in need living in Athens.  Every little bit helps: https://khorakitchen.org 
                        <br><br><br>

                        <?php echo $giftCard; ?>
                        
                        <?php
                            if (isset($_GET['message']) == false) {
                                echo 'Comments:<br><br>
                                        <table width="100%">
                                            <tr width="100%">
                                                <td>
                                                    <textarea id="message" class="addToCartTextInput" name="message" rows="10" style="width: 100%; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;"></textarea><br><br>
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                        <center>
                                            <a class="bigButton" onclick="sendMessage();">SEND</a>
                                        </center>';
                            } else {
                                if ($info == '') {
                                    echo '<h3>Thank you for your message!<br><br>We will stick this up in the kitchen for guests to read while they eat!<h3><br><br><br><br>';
                                } else {
                                    echo $info;
                                }
                            }
                        ?>
                        
                        <script>
                            function sendMessage() {
                                message = document.getElementById('message').value;
                                window.location.href = getCurrentServerAndPath() + 'thanks.php?message=' + message;
                            }
                        </script>
                        <br><br>
                    </div>
                </div>
            </div>
            <?php
                echo getPageFooter();
            ?>
		</div>
	</body>
</html>
