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
                        <h2>DONATION</h2>
                        not done yet...under construction
                    </div>
                </div>
            </div>
            <?php
                echo getPageFooter();
            ?>
		</div>
	</body>
</html>