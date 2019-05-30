<?php
	include "lib/lib.php";
?>

<!DOCTYPE html>
<html>
    <?php
        echo getHtmlHead("STORE | madebykhora");
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
                <div style="position: absolute; width: 50%; height: 500px; top: 53px; padding-top: 15px; background: #ffc65b;">
                    <div style="padding-top: 55px; padding-bottom: 100px; padding-right: 100px; font-size: 15px; line-height: 20px;">
                        <div style="width: 300px; float: right;">
                            <h3>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.
                            <h3>-</h3>
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                        </div>
                    </div>
                </div>
                <div class="centerCroppedImage" style="position: absolute; left: 50%; height: 500px; top: 53px; padding-top: 15px; background-image: url('img/storeTop.jpg');"></div>
                
                <br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br>
                <p id="search"></p>
                <br><br><br><br><br><br><br></br>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        <br><br>
                        
                        <?php
                            $searchPrefilled = '';
                            if (isset($_GET["search"])) {
                                $searchPrefilled = simplifyString($_GET["search"]);
                            }
                            
                            echo '<img src="img/search_large.png">&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" id="searchField" name="searchField" value="' . $searchPrefilled . '" placeholder="SEARCH" autofocus="autofocus" onkeydown="if (event.keyCode == 13) {startSearch(document.getElementById(\'searchField\').value);}">&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="right"><img src="img/startSearch.png" onclick="startSearch(document.getElementById(\'searchField\').value);"></span>
                            </br></br></br></br>';
                            
                            $table = '<table style="width: 100%; padding-left: 80px;">';
                            if (isset($_GET["search"])) {
                                $dir = new DirectoryIterator("./store/items/");
                                $i = 0;
                                foreach ($dir as $fileinfo) {
                                    if (!$fileinfo->isDot()) {
                                        $json = htmlentities(mb_convert_encoding(file_get_contents("./store/items/" . $fileinfo->getFilename()), 'UTF-8', 'ASCII'), ENT_SUBSTITUTE, "UTF-8");
                                        $id = str_replace(".json", "", $fileinfo->getFilename());
                                        $jsonStringSimplified = simplifyString($json);
                                        $getParamStringSimplified = simplifyString($_GET["search"]);
                                        if (strpos($jsonStringSimplified, $getParamStringSimplified) !== false || strpos($id, $getParamStringSimplified) !== false) {
                                            if ($i % 2 == 0) {
                                                $table = $table . '<tr>';
                                            }
                                            $table = $table . '<td>' . displayItemOnSearch($id) . '</br></br></br></br></br></br></td>';
                                            if ($i % 2 != 0) {
                                                $table = $table . '</tr>';
                                            }
                                            $i = $i + 1;
                                        }
                                    }
                                }
                            } else {
                                $dir = new DirectoryIterator("./store/items/");
                                $i = 0;
                                foreach ($dir as $fileinfo) {
                                    if (!$fileinfo->isDot()) {
                                        $id = str_replace(".json", "", $fileinfo->getFilename());
                                        if ($i % 2 == 0) {
                                            $table = $table . '<tr>';
                                        }
                                        $table = $table . '<td>' . displayItemOnSearch($id) . '</br></br></br></br></br></br></td>';
                                        if ($i % 2 != 0) {
                                            $table = $table . '</tr>';
                                        }
                                        $i = $i + 1;
                                    }
                                }
                            }
                            echo $table . '</table>';
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