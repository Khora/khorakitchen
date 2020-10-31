<?php
	include "lib/lib.php";
?>

<!DOCTYPE html>
<html>
    <?php
        echo getHtmlHead("CAMPAIGN | Khora Kitchen");
    ?>

	<body>
		<div id="wrapper">
            <?php
                echo getPageHeader("CAMPAIGN");
            ?>
            <div id="content">
                <?php
                    echo getTopBanner();
                ?>
                
                <br><br><br><br>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        <center><h1>CAMPAIGN</h1></center>
                    </div>
                </div>
                
                <br><br>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        <h2>Help Khora Social Kitchen into 2021!</h2>
                        <br>
                        <h3>Hungry in Athens</h3>
                        2020 has been tough. In Athens we have been facing evictions from supported housing for refugees, closures of essential services and escalating police violence. Coronavirus has compounded these problems: community centers and social kitchens all over the city have shut their doors, leaving many of us without access to food or safe spaces. Khora kitchen has stayed open because we know what it means to be hungry - but we need your help to keep going.
                        <br><br>
                        <h3>Who we are</h3>
                        Khora started in 2016 as a diverse group of people who had found themselves in Athens facing racism, exclusion, isolation and hunger. We are housed and unhoused, documented and undocumented, local and international - working together to feed the people of our city.
                        The Khora kitchen is many things: a cafe, a support group, a protest group, the home of the best dhal in Athens; a community. We work, laugh, and cry each day at this space, helping and motivating each other, sharing dishes and learning childhood recipes from around the world. 
                        <br><br>
                        <h3>A cafe for everyone</h3>
                        As the only remaining social kitchen in Athens that is still open, we've had to double our output in the past months to nearly 1,000 people a day. We do this without id checks or long queues. For many of us, especially those of us who live in camps, life is full of hours-long queues, document checks and rejections to use services on the basis of paperwork, age, or gender. Our cafe is a place where everyone is welcome - no justification necessary. 
                        <br><br>
                        <h3>Join us!</h3>
                        We need your help buying basic ingredients - like oil, vegetables, beans, rice - so that we can keep on sharing these delicious meals with our community. Please head over to our kitchen store page and help us buy what we need!
                        <br><br><br>
                        
                        <center><a href="<?php echo getFullDomainName(); ?>store.php" class="bigButton">GO TO STORE</a></center><br><br>
                    </div>
                </div>
            </div>
            <?php
                echo getPageFooter();
            ?>
		</div>
	</body>
</html>
