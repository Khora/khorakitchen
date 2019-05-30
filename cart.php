<?php
	include "lib/lib.php";
?>

<!DOCTYPE html>
<html>
    <?php
        echo getHtmlHead("CART | madebykhora");
    ?>

	<body>
		<div id="wrapper">
            <?php
                echo getPageHeader();
            ?>
            <?php
                echo getShadow();
            ?>
            <div id="content">
                <?php
                    echo getDonationProgress(150, 500, "calc(50% + 160px)", "-62px");
                ?>
            
                <div style="position: absolute; width: 100%; height: 35px; top: 0px; padding-top: 18px; background: #ffffbf; text-align: center;">
                    1,000 meals per day for refugees and people in need
                </div>
                
                <br><br><br><br><br><br>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        <center><a href="store.php" class="bigButton">&lt; BACK</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="donate.php" class="bigButton">PAYMENT &gt;</a></center><br><br><br><br>
                        <center><h1>SHOPPING CART</h1></center><br><br><br><br>
                        <?php
						if (isset($_GET["item"])) {
							$item = explode("-", htmlspecialchars($_GET["item"]));
							$id = $item[0];
							$amount = 1;
							
							if (is_numeric($item[1])) {
								$amount = $item[1];
							}

							if (isset($_SESSION['cart'])) {
								$cartContent = $_SESSION['cart'];
								$newCartContent = array("id" . $id => "" . $amount);
								$_SESSION['cart'] = array_merge($cartContent, $newCartContent);
							} else {
								$_SESSION['cart'] = array("id" . $id => "" . $amount);
							}
						}
						
						$zeroValues = array();
						if (isset($_SESSION['cart'])) {
							foreach ($_SESSION['cart'] as $key => $value) {
								if (strcmp($value, "0") == 0) {
									array_push($zeroValues, $key);
								}
							}
							foreach ($zeroValues as $key) {
								unset($_SESSION['cart'][$key]);
							}
							foreach ($_SESSION['cart'] as $key => $value) {
								echo displayItemOnCartPresentation(parseId($key), $value);
							}
							if (count($_SESSION['cart']) == 0) {
								echo '<center>Cart is empty!<br><br><br><br><br><br><br><br></center><script>hideDiv(document.getElementById("sendOrder"))</script>';
							}
						} else {
								echo '<center>Cart is empty!<br><br><br><br><br><br><br><br></center><script>hideDiv(document.getElementById("sendOrder"))</script>';
						}
						if (count($_SESSION['cart']) != 0) {
							echo '<br><br><center><h2>TOTAL: ' . getCurrentPriceOfCart() . '&#8364;</h2></center><br><br><br><br>';
                            echo '<center><a href="store.php" class="bigButton">&lt; BACK</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="donate.php" class="bigButton">PAYMENT &gt;</a></center><br><br><br><br>';
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