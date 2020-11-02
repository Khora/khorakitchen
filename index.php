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
                    $text = '<br><h3>Help Khora Kitchen into 2021.</h3>
                            <h3>-</h3>
                            Making a purchase on our online store funds Khora Community Kitchen, where we serve 1000 meals a day to refugees, migrants and people in need living in Athens. Let\'s radically rethink food and put compassion and solidarity at its core.';
                    $images = ['img/overview.jpg', 'img/thankYou.jpg', 'img/imgKitchen1.jpg', 'img/imgKitchen5.jpg', 'img/imgKitchen4.jpg', 'img/imgKitchen3.jpg'];
                    echo getFullWidthTextAndImageBannerSlideshow($text, $images);
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
                        <h3>Hungry in Athens</h3>
                        2020 has been tough. In Athens we have been facing evictions from supported housing for refugees, closures of essential services and escalating police violence. Coronavirus has compounded these problems: community centers and social kitchens all over the city have shut their doors, leaving many of us without access to food or safe spaces. Khora kitchen has stayed open because we know what it means to be hungry - but we need your help to keep going.
                        <br><br><br>
                        <center><a href="<?php echo getFullDomainName(); ?>store.php" class="bigButton">GO TO STORE</a></center><br><br>
                        <h3>Who we are</h3>
                        Khora started in 2016 as a diverse group of people who had found themselves in Athens facing racism, exclusion, isolation and hunger. We are housed and unhoused, documented and undocumented, local and international - working together to feed the people of our city.
                        The Khora kitchen is many things: a cafe, a support group, a protest group, the home of the best dhal in Athens; a community. We work, laugh, and cry each day at this space, helping and motivating each other, sharing dishes and learning childhood recipes from around the world.
                        <br><br>
                        <div style="font-style: italic; font-size: 20px; color: #c4830b; padding: 0px 0px 0px 60px; margin: 0px;">
                            "I would describe Khora as a community, but even more I would describe it as a family where we're all siblings with equal status and respect. It's a really warm family where everybody supports everybody else as much as they can."  - Hossein, Iran (Khora Volunteer)
                        </div>
                        <br>
                        <h3>A cafe for everyone</h3>
                        As the only remaining social kitchen in Athens that is still open, we've had to double our output in the past months to 1,000 people a day. We do this without id checks or long queues. For many of us, especially those of us who live in camps, life is full of hours-long queues, document checks and rejections to use services on the basis of paperwork, age, or gender. Our cafe is a place where everyone is welcome - no justification necessary. 
                        <br><br>
                         <div style="font-style: italic; font-size: 20px; color: #c4830b; padding: 0px 0px 0px 60px; margin: 0px;">
                            "For me, I love Khora for that. I've been valued here - and not only me, anyone who comes; refugee or not, volunteer or not, wherever you come from, it doesn't matter here. There's no hierarchy, even the structure we have only helps us because it doesn't affect our morale and it doesn't affect how we treat each other" - Brice, Cameroon (Khora Volunteer)
                        </div>
                        <br>
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
