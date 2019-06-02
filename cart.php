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
                }
            
                echo getPageHeader("CART");
            ?>
            <div id="content">
                <?php
                    echo getTopBanner();
                ?>
                
                <br><br>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        <center><br><br><a href="store.php" class="bigButton">&lt; BACK</a>
                        <?php
                            if (isMobile()) {
                                echo '<br><br>';
                            } else {
                                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                            }
                        ?>
                        <a href="donate.php" class="bigButton">DONATION &gt;</a></center><br><br>
                        <center><h1>SHOPPING CART</h1></center>
                        <?php
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    echo displayItemOnCartPresentation(parseId($key), $value);
                                }
                                if (count($_SESSION['cart']) == 0) {
                                    echo '<center>Cart is empty!<br><br></center><script>hideDiv(document.getElementById("sendOrder"))</script>';
                                }
                            } else {
                                    echo '<center>Cart is empty!<br><br></center><script>hideDiv(document.getElementById("sendOrder"))</script>';
                            }
                            if (isset($_SESSION['cart'])) {
                                if (count($_SESSION['cart']) != 0) {
                                    echo '<br><center><h2>TOTAL: ' . getInCurrentCurrency(getCurrentPriceOfCart()) . '</h2></center><br><br>';
                                    $insert = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                    if (isMobile()) {
                                        $insert = '<br><br>';
                                    }
                                    echo '<center><a href="store.php" class="bigButton">&lt; BACK</a>' . $insert . '<a href="donate.php" class="bigButton">DONATION &gt;</a></center><br><br>';
                                }
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