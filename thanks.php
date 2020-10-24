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
                $zeroValues = array();
                if (isset($_SESSION['cart'])) {
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
                            <h3>-</h3>
                            Making a purchase on our online store funds Khora Community Kitchen, where we serve 500 meals a day to refugees, migrants and people in need living in Athens. Let’s radically rethink food and put compassion and solidarity at its core.';
                    $image = 'img/thankYou.jpg';
                    echo getFullWidthTextAndImageBanner($text, $image);
                ?>
                
                <br><br><br><br>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        <center><h1>THANK YOU!</h1></center><br>
                        <h2>Thank you for the donation</h2>
                        Thank you for your kindness and generosity. Without people like you we wouldn’t be able to run the kitchen.<br><br>
                        Your donation will help to feed 500 people a day, giving people the reliability of regular meals and the joy of eating nutritious and tasty food in a welcoming atmosphere.<br><br>
                        <?php
                            if (isset($_GET['message']) == false) {
                                echo 'If you would like to send a message with your meal, please write it below.<br>We will stick this up in the kitchen for guests to read while they eat!<br><br><br><br>';
                            }
                        ?>
                        
                        <?php
                            if (isset($_GET['message']) == false) {
                                echo '<table width="100%">
                                            <tr width="100%">
                                                <td valign="center" width="10%">
                                                    Message:<br><br>
                                                </td>
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
