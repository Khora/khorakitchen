<?php
    // set max execution time to infinity
    set_time_limit(0);
    
    // init session
    session_start();
    initSessionVariables();

    /*
     * Initialisation method, to be called first.
     */
    function initSessionVariables() {
        // get if the client is a mobile device
        $mobile = "false";
        if (isset($_SESSION["mobile"])) {
            $mobile = $_SESSION["mobile"];
        }
        if (isset($_GET["mobile"])) {
            $mobile = strtolower(htmlspecialchars($_GET["mobile"]));
        }
        $_SESSION["mobile"] = $mobile;
        
        // the chosen language of the client
        $language = "English";
        if (isset($_SESSION["language"])) {
            $language = $_SESSION["language"];
        }
        if (isset($_GET["language"])) {
            $language = htmlspecialchars($_GET["language"]);
        }
        $_SESSION["language"] = $language;
    }
    
    /*
     * Getter for if the client wants to be served the mobile version.
     */
    function isMobile() {
        if (strcmp($_SESSION["mobile"], "true") == 0) {
            return true;
        }
        return false;
    }
    
    /*
     * Getter for the language of the client.
     */
    function getLanguage() {
        $currentLanguage = "English";
        if (isset($_SESSION["language"]) && strcmp($_SESSION["language"], "") != 0) {
            $currentLanguage = $_SESSION["language"];
        }
        return $currentLanguage;
    }
    
    /*
     * Getter for client ip address.
     */
    function getClientIp() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP')) {
            $ipaddress = getenv('HTTP_CLIENT_IP');
        } else if (getenv('HTTP_X_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        } else if (getenv('HTTP_X_FORWARDED')) {
            $ipaddress = getenv('HTTP_X_FORWARDED');
        } else if (getenv('HTTP_FORWARDED_FOR')) {
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        } else if (getenv('HTTP_FORWARDED')) {
           $ipaddress = getenv('HTTP_FORWARDED');
        } else if (getenv('REMOTE_ADDR')) {
            $ipaddress = getenv('REMOTE_ADDR');
        } else {
            $ipaddress = 'UNKNOWN';
        }
        return $ipaddress;
    }
    
    /*
     * Gets the HTML head tag.
     */
    function getHtmlHead($title) {
        if (!isMobile()) {
            return '<head>
                        <meta charset="utf-8"/>
                    <title>' . $title . '</title>
                    <link rel="stylesheet" type="text/css" href="css/style.css">
                    <link rel="stylesheet" type="text/css" href="css/loading.css">
                    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fjalla+One|Karla:400,700">
                    <script language="javascript" type="text/javascript" src="lib/lib.js"></script>
                    <link rel="icon" type="image/x-icon" href="img/icon.png">
                    
                    <script>
                        if (isMobileOrTablet()) {
                            document.location = "' . basename($_SERVER['PHP_SELF']) . '?mobile=true";
                        }
                    </script>
                </head>';
        } else {
            return '';
        }
    }
    
    /*
     * Gets the top area containing the common menu.
     */
    function getPageHeader() {
        if (!isMobile()) {
            return '<div id="header">
                        <a id="headerLink" href="index.php">
                            <div id="logo"></div>
                        </a>
                        <div id="headerText">
                            <a id="headerLink" href="index.php">ABOUT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a id="headerLink" href="store.php">STORE</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a id="headerLink" href="campaign.php">CAMPAIGN</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a class="imageLink" href="cart.php"><img src="img/cart.png">&nbsp;&nbsp;CART</a>
                        </div>
                    </div>';
        } else {
            return '';
        }
    }
    
    /*
     * Gets the shadow to put below the top area.
     */
    function getShadow() {
        if (!isMobile()) {
            return '<div id="shadow"></div>';
        } else {
            return '';
        }
    }
    
    /*
     * Gets the bottom area containing the bottom options.
     */
    function getPageFooter() {
        if (!isMobile()) {
            return '<div id="footerPartnersBackground">
                        <div id="footer" style="color: #222222;">
                                Partners:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum
                        </div>
                    </div>
                    <div id="footerBackground">
                        <div id="footer">
                                <a id="headerLink" href="privacy.php">PRIVACY and COOKIES</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a id="headerLink" href="terms.php">TERMS and CONDITIONS</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a id="headerLink" href="contact.php">CONTACT and FAQ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &copy; Khora, ' . date("Y") . '. All rights reserved.
                                <a href="http://www.khora-athens.org/"><div id="webpage"></div></a>
                                <a href="https://www.facebook.com/KhoraAthens/"><div id="facebook"></div></a>
                                <a href="https://www.instagram.com/khoraathens/"><div id="instagram"></div></a>
                        </div>
                    </div>
                    <div id="footerAssociationBackground">
                        <div id="footer" style="color: #222222;">
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<br><br>
                        </div>
                    </div>';
        } else {
            return '';
        }
    }
    
    /*
     * Gets a formatted button containing the given text and image.
     * The Javascript given to this function will be executed on click.
     */
    function getDonationProgress($alreadyCollectedDonationAmount, $targetDonationAmount, $xPos, $yPos) {
        $targetDonationAmount = max($targetDonationAmount, 0);
        $percentage = 100 * $alreadyCollectedDonationAmount / $targetDonationAmount;
        $percentage = min(max($percentage, 0), 100);
        return'<style type="text/css" media="screen">
            .progressBarContainer {
                font-size: 14px;
                color: black;
                text-decoration: none;
                -o-transition: 0.2s;
                -ms-transition: 0.2s;
                -moz-transition: 0.2s;
                -webkit-transition: 0.2s;
                transition: 0.2s;
                opacity: 1;
                margin: 100px auto;
                width: 200px;
                height: 10px;
                position: fixed;
                top: ' . $yPos . ';
                left: ' . $xPos . ';
                z-index: 1002;
            }
            
            .progressBarContainer:hover {
                opacity: 0.4;
            }

            .progressBar {
                padding: 1px;
                background: rgba(200, 200, 200, 0.1);
                border-radius: 6px;
                box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25), 0 1px rgba(255, 255, 255, 0.08);
            }

            .progressBarOrange {	
                height: 10px;
                border-radius: 4px; 
                transition: 0.2s linear;  
                transition-property: width, background-color;
                width: ' . $percentage . '%; 
                background-image: linear-gradient(135deg, #ffc65b 20%, #ff9900 20%, #ff9900 40%, #ffc65b 40%, #ffc65b 60%, #ff9900 60%, #ff9900 80%, #ffc65b 80%);
                animation: progressAnimationStrike 2s;
            }

            @keyframes progressAnimationStrike {
                from { width: 0% }
                to   { width: ' . $percentage . '% }
            }
        </style>
        
            <div class="progressBarContainer">
                <a href="campaign.php" style="cursor: pointer;">
                    &nbsp;already collected ' . $alreadyCollectedDonationAmount . ' &euro; of ' . $targetDonationAmount . '&euro;
                    <div class="progressBar">
                        <div class="progressBarOrange"></div>
                    </div>
                </a>
            </div>
        ';
    }

	function displayItemOnSearch($id) {
		$item = json_decode(htmlentities(mb_convert_encoding(file_get_contents("./store/items/" . $id . ".json"), 'UTF-8', 'ASCII'), ENT_SUBSTITUTE, "UTF-8"), TRUE);
		return '<table style="width: calc(100% - 100px);">
                    <tr>
                        <td valign="center" style="width: calc(100% - 100px);">
                            <a href="item.php?id=' . $id . '">
                                <img src="store/img/' . $item['image'] . '" width="100%" style="display: inline-block;">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            <a href="item.php?id=' . $id . '">
                                <p class="large">' . $item['name'] . '</p>
                                <small>' . $item['title'] . '</small></br></br>
                                Price: ' . $item['price'] . ' &#8364;<span class="right"><small>ID: ' . $id . '</small></span>
                            </a>
                        </td>
                    </tr>
                </table>';
	}
	
	function displayItemOnSinglePresentation($id, $amount) {
		$item = json_decode(htmlentities(mb_convert_encoding(file_get_contents("./store/items/" . $id . ".json"), 'UTF-8', 'ASCII'), ENT_SUBSTITUTE, "UTF-8"), TRUE);
		return '
                <table>
                    <tr>
                        <td style="width: 50%; padding: 0px;">
                            <img style="float: right; padding-right: 50px; position: relative; height: 80%; width: 80%;" src="store/img/' . $item['image'] . '"></div>
                        </td>
                        <td style="width: 50%; padding-left: 20px;">
                            <h2>' . $item['name'] . '</h2><br>
                            <p class="large">' . $item['title'] . '</p>
                            <small>' . $item['description'] . '</small><br><br>
                            Type: ' . $item['type'] . '<br><br>
                            Category: ' . $item['category'] . '<br><br>
                            Price: ' . $item['price'] . '&euro;<br><br>
                            <input type="submit" id="addToCartUp' . $id . '" class="addToCartTextInput" name="quantity" value="&#8593;" size="2"/>&nbsp;
                            <input type="text" id="addToCartTextInput' . $id . '" class="addToCartTextInput" name="quantity" value="' . $amount . '" size="2"/>&nbsp;
                            <input type="submit" id="addToCartDown' . $id . '" class="addToCartTextInput" name="quantity" value="&#8595;" size="2"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a id="addToCartBtn' . $id . '" href="cart.php?item=' . $id . '-' . $amount . '" class="addToCart">ADD TO CART</a>
                            <script>
                                document.getElementById("addToCartUp' . $id . '").onclick = function() {
                                    document.getElementById("addToCartTextInput' . $id . '").value = parseInt(document.getElementById("addToCartTextInput' . $id . '").value) + 1;
                                    document.getElementById("addToCartBtn' . $id . '").href = "cart.php?item=' . $id . '-" + document.getElementById("addToCartTextInput' . $id . '").value;
                                };
                                document.getElementById("addToCartDown' . $id . '").onclick = function() {
                                    if (document.getElementById("addToCartTextInput' . $id . '").value > 0) {
                                        document.getElementById("addToCartTextInput' . $id . '").value = document.getElementById("addToCartTextInput' . $id . '").value - 1;
                                        document.getElementById("addToCartBtn' . $id . '").href = "cart.php?item=' . $id . '-" + document.getElementById("addToCartTextInput' . $id . '").value;
                                    }
                                };
                            </script>
                        </td>
                    </tr>
                </table>';
	}
	
	function displayItemOnCartPresentation($id, $amount) {
        $retStr = '';
		$item = json_decode(htmlentities(mb_convert_encoding(file_get_contents("./store/items/" . $id . ".json"), 'UTF-8', 'ASCII'), ENT_SUBSTITUTE, "UTF-8"), TRUE);
		$retStr = $retStr . '<h2>' . $item['name'] . '</h2>
				<table width="100%">
					<tr>
						<td valign="center" width="350px">
                            <img style="display: inline-block; padding-right: 50px; height: 80%; width: 80%;" src="store/img/' . $item['image'] . '"></div>
                        </td>
						<td valign="top">
							<a class="large">' . $item['title'] . '</a><br><br>
                            ' . $item['description'] . '</br></br>
                            Category: ' . $item['category'] . '</br></br><br>
                            <input type="submit" id="addToCartUp' . $id . '" class="addToCartTextInput" name="quantity" value="&#8593;" size="2"/>&nbsp;
                            <input type="text" id="addToCartTextInput' . $id . '" class="addToCartTextInput" name="quantity" value="' . $amount . '" size="2"/>&nbsp;
                            <input type="submit" id="addToCartDown' . $id . '" class="addToCartTextInput" name="quantity" value="&#8595;" size="2"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a id="addToCartBtn' . $id . '" href="cart.php?item=' . $id . '-' . $amount . '" class="addToCart">UPDATE</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a id="deleteFromCart' . $id . '" href="cart.php?item=' . $id . '-0" class="addToCart">X</a>
                            <script>
                                document.getElementById("addToCartUp' . $id . '").onclick = function() {
                                    document.getElementById("addToCartTextInput' . $id . '").value = parseInt(document.getElementById("addToCartTextInput' . $id . '").value) + 1;
                                    document.getElementById("addToCartBtn' . $id . '").href = "cart.php?item=' . $id . '-" + document.getElementById("addToCartTextInput' . $id . '").value;
                                };
                                document.getElementById("addToCartDown' . $id . '").onclick = function() {
                                    if (document.getElementById("addToCartTextInput' . $id . '").value > 0) {
                                        document.getElementById("addToCartTextInput' . $id . '").value = document.getElementById("addToCartTextInput' . $id . '").value - 1;
                                        document.getElementById("addToCartBtn' . $id . '").href = "cart.php?item=' . $id . '-" + document.getElementById("addToCartTextInput' . $id . '").value;
                                    }
                                };
                            </script>
							</br></br>
                            
							Price: ' . $item['price'] . ' &#8364; * ' . $amount . ' = ' . floatval($item['price']) * floatval($amount) . '&#8364;<span class="right"><small>ID: ' . $id . '</small></span>
						</td>
					</tr>
				</table>
				</br></br></br></br>';
        return $retStr;
	}
	
	function parseId($input) {
		$toParse = explode("-", htmlspecialchars($input));
		$idParsed = str_replace("id" , "", $toParse[0]);
		return $idParsed;
	}

	function getCurrentPriceOfCart() {
		$priceTotal = 0;
		foreach ($_SESSION['cart'] as $key => $value) {
			$idParsed = parseId($key);
			$item = json_decode(htmlentities(mb_convert_encoding(file_get_contents("./store/items/" . $idParsed . ".json"), 'UTF-8', 'ASCII'), ENT_SUBSTITUTE, "UTF-8"), TRUE);
			$priceTotal = $priceTotal + floatval($item['price']) * $value;
		}
		return $priceTotal;
	}
	
	function simplifyString($input) {
		$chars = array("-", ".", "=", "_", "/", ":", "{", "}", "\"", "'");
		foreach ($chars as $char) {
			$input = str_replace($char, "", $input);
		}
		$input = strtolower($input);
		return htmlspecialchars($input);
	}
    
    /*
     * Gets a formatted button containing the given text and image.
     * The Javascript given to this function will be executed on click.
     */
    function getButton($textToDisplay, $imagePath, $javascriptToCallOnClick) {
        $textToDisplay = strtoupper($textToDisplay);
        $textToDisplay = str_replace("&NBSP;", "&nbsp;", $textToDisplay);
        return '<div id="buttonRoundedEdges" onclick="' . $javascriptToCallOnClick . '" style="cursor: pointer; text-align: left;">
                <img src="' . $imagePath . '">
                <div id="buttonRoundedEdgesText" style="cursor: pointer;">' . $textToDisplay . '&nbsp;&nbsp;</div>
            </div>';
    }
    
    function error($message) {
        echo "<p style='z-index: 50005;font-size: 60px; background-color: red;'>ERROR: " . $message . "</p>";
    }
    
    function debug($message) {
        echo "<p style='z-index: 50000; font-size: 8px'>Debug: " . $message . "</p>";
    }
    
    function i18n($key) {
        // find corresponding value to key
        $value = json_decode(getFileContent("i18n/i18n.json"), true)[getLanguage()][$key];
        // in the end make spaces to hard spaces
        return str_replace(" ", "&nbsp;", htmlentities($value));
    }
    
    function getProtocolName() {
        $isSecure = false;
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $isSecure = true;
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
            $isSecure = true;
        }
        $protocol = $isSecure ? 'https' : 'http';
        
        return $protocol;
    }
?>