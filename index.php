<?php
	include "lib/lib.php";
?>

<!DOCTYPE html>
<html>
    <?php
        echo getHtmlHead("ABOUT | Khora Kitchen");
    ?>

	<body>
		<div id="wrapper">
            <?php
                echo getPageHeader("ABOUT");
            ?>
            <div id="content">
                <?php
                    echo getTopBanner();
                    $text = '<h3>A restaurant with a difference.</h3>
                            <h3>-</h3>
                            Making a purchase on our online store funds Khora Community Kitchen, where we serve 500 meals a day to refugees, migrants and people in need living in Athens. Let\'s radically rethink food and put compassion and solidarity at its core.';
                    $image = 'img/overview.jpg';
                    echo getFullWidthTextAndImageBanner($text, $image);
                ?>
                
                <br><br><br><br>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        <center><h1>ABOUT</h1></center><br><br>
                        Everybody needs to eat, but for thousands of people living in Athens regular meals are impossible to come by. Amid challenges such as navigating the asylum claim system and trying to find housing and childcare, scarcity of food can make life here feel like fighting to survive. This is why we have set up Khora Community Kitchen. We are a social kitchen in Athens which serves 500 free meals a day to refugees, migrants and others in need. Every item you buy in our store will allow us to continue providing hot and nutritious meals in a welcoming restaurant for those who most need it.
                    </div>
                </div>
                
                <br><br><br><br>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px; text-align: center;">
                        <a href="<?php echo getFullDomainName(); ?>store.php" class="bigButton">GO TO STORE</a>
                    </div>
                </div>
                
                <br><br><br><br><br>
                
                <?php
                    $text = '"For me, I love Khora for that I\'ve been valued here - and not only me, anyone who comes; refugee or not, volunteer or not, wherever you come from, it doesn\'t matter here. There\'s no hierarchy, even the structure we have only helps us because it doesn\'t affect our morale and it doesn\'t affect how we treat each other."<br><br>
                    <i>— Kitchen co-ordinator from the community</i>';
                    $image = 'img/person1.jpg';
                    echo getQuote($text, $image, false);
                ?>
                
                <br><br><br><br>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        Being displaced from your home means more than losing a roof over your head: it can also mean losing your profession and independence. Cooking in the community kitchen is a vocational way for refugees in Athens to regain agency over their lives and stand in solidarity with others.
                    </div>
                </div>
                
                <br><br><br><br>
                
                <?php
                    $text = '"From the perspective of being an asylum seeker myself, I can\'t really think of anything that Khora could do but can - they\'re already doing everything that they can."<br><br>
                    <i>— Refugee using the services</i>';
                    $image = 'img/person2.jpg';
                    echo getQuote($text, $image, true);
                ?>
                
                <br><br><br><br>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        Khora Community Kitchen is radically rethinking the approach to food for displaced people, seeing a meal as more than just fuel for survival. We have planted a garden in the courtyard and have a chill out area upstairs with tea to make people feel at home. Our menu changes every day and we serve food for many different cultures, giving people a taste of home as well as something new or unusual. Sales from the online shop will go directly to buying ingredients for these meals!
                    </div>
                </div>
                
                <br><br><br><br>
                
                <?php
                    $text = '"I would describe Khora as a community, but even more I would describe it as a family where we\'re all siblings with equal status and respect. It\'s a really warm family where everybody supports everybody else as much as they can."<br><br>
                    <i>— Person volunteering or who has seen it and likes us</i>';
                    $image = 'img/person3.jpg';
                    echo getQuote($text, $image, false);
                ?>
                
                <br><br><br><br>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        We believe that all our funding should go straight to the table. Therefore, all our chefs, co-ordinators and front of house staff are volunteers. We organise using non-hierarchichal consensus based decision making and strive towards equality within our spaces. If you would like to volunteer, find out more <a href="http://www.khora-athens.org/" style="text-decoration: underline;">here</a>.
                    </div>
                </div>
                
                <br><br><br><br>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px; text-align: center;">
                        <a href="<?php echo getFullDomainName(); ?>store.php" class="bigButton">GO TO STORE</a>
                    </div>
                </div>
                
                <br><br>
            </div>
            <?php
                echo getPageFooter();
            ?>
		</div>
	</body>
</html>
