<?php
	include "lib/lib.php";
?>

<!DOCTYPE html>
<html>
    <?php
        echo getHtmlHead("ITEM | Khora Kitchen");
    ?>

	<body>
		<div id="wrapper">
            <?php
                echo getPageHeader("ITEM");
            ?>
            <div id="content">
                <?php
                    echo getTopBanner();
                ?>
                
                <br><br><br><br>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        <center><a href="store.php" class="bigButton">&lt; BACK</a></center><br><br>
                        <?php
                            $amount = 1;
                            if (isset($_GET['id'])) {
                                if (isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $key => $value) {
                                        if (parseId($key) == simplifyString($_GET['id'])) {
                                            $amount = $amount + intval($value);
                                        }
                                    }
                                }
                                if (file_exists("store/items/" . simplifyString($_GET["id"]) . ".json")) {
                                    echo displayItemOnSinglePresentation(simplifyString($_GET["id"]), $amount);
                                } else {
                                    echo "Item not available.";
                                }
                            } else {
                                echo "No item selected. Please select an item.";
                            }
                        ?>
                    </div>
                </div>
                
                <br><br><br><br>
                
            </div>
            <?php
                echo getPageFooter();
            ?>
		</div>
	</body>
</html>
