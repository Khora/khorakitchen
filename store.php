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
                echo getPageHeader("STORE");
            ?>
            <div id="content">
                <?php
                    echo getTopBanner();
                    $text = '<h3>You buy the food, we serve the meals.</h3>
                            <h3>-</h3>
                            Through buying meals and ingredients in our online store you are directly funding the provision of free meals to refugees and others in need living in Athens. No staff costs, no obstacles to access the food. It’s that simple.';
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
                            
                            $paddingLeft = 80;
                            if (isMobile()) {
                                $paddingLeft = 0;
                            }
                            
                            $table = '<table style="width: 100%; padding-left: ' . $paddingLeft . 'px;">';
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