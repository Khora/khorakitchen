<?php
	include "lib/lib.php";
?>

<!DOCTYPE html>
<html>
    <?php
        echo getHtmlHead("STORE | Khora Kitchen");
    ?>

	<body>
		<div id="wrapper">
            <?php
                echo getPageHeader("STORE");
            ?>
            <div id="content">
                <?php
                    echo getTopBanner();
                    $text = '<h3>You buy the food, we serve the meals.</h3>
                            <h3>-</h3>
                            There are very hungry people in our city. Cuts, exclusionary policies and racism in Greece leave many of us without a stable income or way to get food. We’ve come together as a group to cook hot, healthy and delicious food for everyone. We’ve got the chefs, the kitchen and the energy - we need your help to buy the tomatoes. Together, we the people can feed the people! Scroll down on this page to buy the ingredients we need.';
                    $image = 'img/storeTop.jpg';
                    echo getFullWidthTextAndImageBanner($text, $image);
                ?>
                
                <br><br><br><br>
                
                
                <p id="search"></p>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        <center><h1>STORE</h1></center>
                    </div>
                </div>
                
                <br>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        <br><br>
                        
                        <?php
                            $searchPrefilled = '';
                            if (isset($_GET["search"])) {
                                $searchPrefilled = simplifyString($_GET["search"]);
                            }
                            
                            echo '<img src="img/search_large.png">&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" id="searchField" name="searchField" value="' . $searchPrefilled . '" placeholder="SEARCH" onkeydown="if (event.keyCode == 13) {startSearch(document.getElementById(\'searchField\').value);}">&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="right"><img src="img/startSearch.png" onclick="startSearch(document.getElementById(\'searchField\').value);"></span>
                            </br></br></br></br>';
                            
                            $spacing = 10;
                            if (isMobile()) {
                                $spacing = 0;
                            }
                            
                            $table = '<table style="width: 100%; padding: ' . $spacing . 'px; margin: ' . $spacing . 'px;">';
                            if (isset($_GET["search"])) {
                                $dir = listFileNamesInDirectorySorted("./store/items/");
                                $i = 0;
                                foreach ($dir as $filename) {
                                    $json = htmlentities(mb_convert_encoding(file_get_contents("./store/items/" . $filename), 'UTF-8', 'ASCII'), ENT_SUBSTITUTE, "UTF-8");
                                    $id = str_replace(".json", "", $filename);
                                    $jsonStringSimplified = simplifyString($json);
                                    $getParamStringSimplified = simplifyString($_GET["search"]);
                                    if (strpos($jsonStringSimplified, $getParamStringSimplified) !== false || strpos($id, $getParamStringSimplified) !== false) {
                                        if (!isMobile()) {
                                            if ($i % 2 == 0) {
                                                $table = $table . '<tr>';
                                            }
                                            $table = $table . '<td>' . displayItemOnSearch($id) . '</br></br></br></br></td>';
                                            if ($i % 2 != 0) {
                                                $table = $table . '</tr>';
                                            }
                                            $i = $i + 1;
                                        } else {
                                            $table = $table . '<tr>';
                                            $table = $table . '<td>' . displayItemOnSearch($id) . '</br></br></br></br></td>';
                                            $table = $table . '</tr>';
                                            $i = $i + 1;
                                        }
                                    }
                                }
                            } else {
                                $dir = listFileNamesInDirectorySorted("./store/items/");
                                $i = 0;
                                foreach ($dir as $filename) {
                                    $id = str_replace(".json", "", $filename);
                                    if (!isMobile()) {
                                        if ($i % 2 == 0) {
                                            $table = $table . '<tr>';
                                        }
                                        $table = $table . '<td>' . displayItemOnSearch($id) . '</br></br></br></td>';
                                        if ($i % 2 != 0) {
                                            $table = $table . '</tr>';
                                        }
                                        $i = $i + 1;
                                    } else {
                                        $table = $table . '<tr>';
                                        $table = $table . '<td>' . displayItemOnSearch($id) . '</br></br></br></td>';
                                        $table = $table . '</tr>';
                                        $i = $i + 1;
                                    }
                                }
                            }
                            echo $table . '</table>';
                        ?>
                    </div>
                </div>
                <center><a href="https://www.khora-athens.org/donate" class="bigButton" style="background-color: white; border: 10px solid #ffc65b;"><img src="img/logo_small.png" style="vertical-align: middle;">&nbsp;&nbsp;GENERAL DONATION</a></center><br><br>
            </div>
            <?php
                echo getPageFooter();
            ?>
		</div>
	</body>
</html>
