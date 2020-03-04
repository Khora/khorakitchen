<?php
	include "lib/lib.php";
?>

<!DOCTYPE html>
<html>
    <?php
        echo getHtmlHead("CHECKOUT | madebykhora");
    ?>

	<body>
		<div id="wrapper">
            <?php
                echo getPageHeader("CHECKOUT");
            ?>
            <div id="content">
                <?php
                    echo getTopBanner();
                ?>
                
                <br><br><br><br>
                
                <?php
                    if (floatval(getCurrentPriceOfCart()) == 0) {
                        echo '<div class="horizontalCenteredBase">
                                <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                                    <center><h1>CHECKOUT</h1></center><br><br>
                                    
                                    Your cart is empty! Please return to the store and try again!<br><br><br><br><br><br><br><br><br><br><br><br>
                                </div>
                            </div>';
                        echo getPageFooter();
                        return;
                    }
                ?>
                
                <div class="horizontalCenteredBase">
                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px;">
                        <center><h1>CHECKOUT</h1></center><br><br>
                        
                        Thank you for your purchases! Just one more step: please fill in your payment information below and continue through to PayPal or an alternative payment method.
                        
                        <?php
                            $width = 50;
                            if (isMobile()) {
                                $width = 100;
                            }
                        ?>
                        
                         <form>
                            <p id="boxes"></p><br><br><br>
                            <table width="100%">
                                <tr>
                                    <td valign="top" width="<?php echo $width; ?>%">
                                        <div id="radioDiv2" onmouseover="mouseOverRadioBox('radioDiv2')" onmouseout="mouseOutRadioBox('radioDiv2')" onclick="updateRadioBoxesDonation('radio2', false);" class="clickableDiv">
                                            <h3><input id="radio2" type="radio" name="countrySelection" checked onclick="updateRadioBoxesDonationImpl('radio2', false, true);">&nbsp;&nbsp;I am living outside of the UK, my currency is &euro;</h3>
                                            <small>Your donation will come directly to the Khora Community and wil help serving food for people in need.<br><br></small>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" width="<?php echo $width; ?>%">
                                        <div id="radioDiv1" onmouseover="mouseOverRadioBox('radioDiv1')" onmouseout="mouseOutRadioBox('radioDiv1')" onclick="updateRadioBoxesDonation('radio1', false);" class="clickableDiv">
                                            <h3><input id="radio1" type="radio" name="countrySelection" onclick="updateRadioBoxesDonationImpl('radio1', false, true);">&nbsp;&nbsp;I am living in the UK, my currency is &pound;</h3>
                                            <small>If you're a UK taxpayer you can boost your donation by 25p for every &pound;1 you donate.<br>
                                            <table style="padding: 20px;">
                                                <tr>
                                                    <td style="float: right;">
                                                        <input type="checkbox" id="claimGiftAid" class="addToCartTextInput" name="claimGiftAid" style="-ms-transform: scale(1.5); -moz-transform: scale(1.5);  -webkit-transform: scale(1.5); -o-transform: scale(1.5); transform: scale(1.5); padding: 10px;" size="50" value=""/>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </td>
                                                    <td valign="center" style="width: auto">
                                                        Gift aid my donation<br>
                                                    </td>
                                                </tr>
                                            </table>
                                            Gift Aid is reclaimed by the charity from the tax you pay for the current tax year. Your address is needed to identify you as a current UK taxpayer.<br><br>
                                            Note: The amount of Income Tax and/or Capital Gains Tax payed in the current tax year must be greater than the amount of Gift Aid claimed on all your donations. As our main PayPal account is linked to Khora Greece, all donations in &pound; shall go through the PayPal account of our partners MASS action to make claiming gift aid possible. Lorem Ipsum - how is our relation to MASS action etc!!!!<br><br>The text fields marked with <a style="color:red;">*</a> are mandatory.</small><br><br>
                                            <table style="padding: 20px;">
                                                <tr>
                                                    <td valign="center">
                                                        E-Mail:  <a style="color:red;">*</a>
                                                    </td>
                                                    <td valign="center">
                                                        <input type="text" id="email" class="addToCartTextInput" name="email" size="50" value=""/>
                                                    </td>
                                                </tr>
                                            </table>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="checkbox" id="getNewsLetters" class="addToCartTextInput" name="getNewsLetters" style="-ms-transform: scale(1.5); -moz-transform: scale(1.5);  -webkit-transform: scale(1.5); -o-transform: scale(1.5); transform: scale(1.5); padding: 10px;" size="50" value=""/>&nbsp;&nbsp;&nbsp;&nbsp;Keep me up to date on news (optional)</label>
                                            <br><br>
                                            <table style="padding: 20px;">
                                                <tr>
                                                    <td valign="center">
                                                        First Name:  <a style="color:red;">*</a><br><br>
                                                    </td>
                                                    <td valign="center">
                                                        <input type="text" id="firstName" class="addToCartTextInput" name="firstName" size="50" value=""/><br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center">
                                                        Last Name:  <a style="color:red;">*</a><br><br>
                                                    </td>
                                                    <td valign="center">
                                                        <input type="text" id="lastName" class="addToCartTextInput" name="lastName" size="50" value=""/><br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center">
                                                        Street:  <a style="color:red;">*</a><br><br>
                                                    </td>
                                                    <td valign="center">
                                                        <input type="text" id="street" class="addToCartTextInput" name="street" size="50" value=""/><br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center">
                                                        House Number:  <a style="color:red;">*</a><br><br>
                                                    </td>
                                                    <td valign="center">
                                                        <input type="text" id="houseNumber" class="addToCartTextInput" name="houseNumber" size="50" value=""/><br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center">
                                                        Apartment, Suite, etc. (optional):&nbsp;&nbsp;&nbsp;<br><br>
                                                    </td>
                                                    <td valign="center">
                                                        <input type="text" id="apartment" class="addToCartTextInput" name="apartment" size="50" value=""/><br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center">
                                                        Postal Code:  <a style="color:red;">*</a><br><br>
                                                    </td>
                                                    <td valign="center">
                                                        <input type="text" id="postalCode" class="addToCartTextInput" name="postalCode" size="50" value=""/><br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center">
                                                        City:  <a style="color:red;">*</a><br><br>
                                                    </td>
                                                    <td valign="center">
                                                        <input type="text" id="city" class="addToCartTextInput" name="city" size="50" value=""/><br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center">
                                                        Country:  <a style="color:red;">*</a><br><br>
                                                    </td>
                                                    <td valign="center">
                                                        <select id="country" name="country">
                                                            <option value="AF">Afghanistan</option>
                                                            <option value="AX">Åland Islands</option>
                                                            <option value="AL">Albania</option>
                                                            <option value="DZ">Algeria</option>
                                                            <option value="AS">American Samoa</option>
                                                            <option value="AD">Andorra</option>
                                                            <option value="AO">Angola</option>
                                                            <option value="AI">Anguilla</option>
                                                            <option value="AQ">Antarctica</option>
                                                            <option value="AG">Antigua and Barbuda</option>
                                                            <option value="AR">Argentina</option>
                                                            <option value="AM">Armenia</option>
                                                            <option value="AW">Aruba</option>
                                                            <option value="AU">Australia</option>
                                                            <option value="AT">Austria</option>
                                                            <option value="AZ">Azerbaijan</option>
                                                            <option value="BS">Bahamas</option>
                                                            <option value="BH">Bahrain</option>
                                                            <option value="BD">Bangladesh</option>
                                                            <option value="BB">Barbados</option>
                                                            <option value="BY">Belarus</option>
                                                            <option value="BE">Belgium</option>
                                                            <option value="BZ">Belize</option>
                                                            <option value="BJ">Benin</option>
                                                            <option value="BM">Bermuda</option>
                                                            <option value="BT">Bhutan</option>
                                                            <option value="BO">Bolivia</option>
                                                            <option value="BA">Bosnia and Herzegovina</option>
                                                            <option value="BW">Botswana</option>
                                                            <option value="BV">Bouvet Island</option>
                                                            <option value="BR">Brazil</option>
                                                            <option value="IO">British Indian Ocean Territory</option>
                                                            <option value="BN">Brunei Darussalam</option>
                                                            <option value="BG">Bulgaria</option>
                                                            <option value="BF">Burkina Faso</option>
                                                            <option value="BI">Burundi</option>
                                                            <option value="KH">Cambodia</option>
                                                            <option value="CM">Cameroon</option>
                                                            <option value="CA">Canada</option>
                                                            <option value="CV">Cape Verde</option>
                                                            <option value="KY">Cayman Islands</option>
                                                            <option value="CF">Central African Republic</option>
                                                            <option value="TD">Chad</option>
                                                            <option value="CL">Chile</option>
                                                            <option value="CN">China</option>
                                                            <option value="CX">Christmas Island</option>
                                                            <option value="CC">Cocos (Keeling) Islands</option>
                                                            <option value="CO">Colombia</option>
                                                            <option value="KM">Comoros</option>
                                                            <option value="CG">Congo</option>
                                                            <option value="CD">Congo, The Democratic Republic of The</option>
                                                            <option value="CK">Cook Islands</option>
                                                            <option value="CR">Costa Rica</option>
                                                            <option value="CI">Cote D'ivoire</option>
                                                            <option value="HR">Croatia</option>
                                                            <option value="CU">Cuba</option>
                                                            <option value="CY">Cyprus</option>
                                                            <option value="CZ">Czechia</option>
                                                            <option value="DK">Denmark</option>
                                                            <option value="DJ">Djibouti</option>
                                                            <option value="DM">Dominica</option>
                                                            <option value="DO">Dominican Republic</option>
                                                            <option value="EC">Ecuador</option>
                                                            <option value="EG">Egypt</option>
                                                            <option value="SV">El Salvador</option>
                                                            <option value="GQ">Equatorial Guinea</option>
                                                            <option value="ER">Eritrea</option>
                                                            <option value="EE">Estonia</option>
                                                            <option value="ET">Ethiopia</option>
                                                            <option value="FK">Falkland Islands (Malvinas)</option>
                                                            <option value="FO">Faroe Islands</option>
                                                            <option value="FJ">Fiji</option>
                                                            <option value="FI">Finland</option>
                                                            <option value="FR">France</option>
                                                            <option value="GF">French Guiana</option>
                                                            <option value="PF">French Polynesia</option>
                                                            <option value="TF">French Southern Territories</option>
                                                            <option value="GA">Gabon</option>
                                                            <option value="GM">Gambia</option>
                                                            <option value="GE">Georgia</option>
                                                            <option value="DE">Germany</option>
                                                            <option value="GH">Ghana</option>
                                                            <option value="GI">Gibraltar</option>
                                                            <option value="GR">Greece</option>
                                                            <option value="GL">Greenland</option>
                                                            <option value="GD">Grenada</option>
                                                            <option value="GP">Guadeloupe</option>
                                                            <option value="GU">Guam</option>
                                                            <option value="GT">Guatemala</option>
                                                            <option value="GG">Guernsey</option>
                                                            <option value="GN">Guinea</option>
                                                            <option value="GW">Guinea-bissau</option>
                                                            <option value="GY">Guyana</option>
                                                            <option value="HT">Haiti</option>
                                                            <option value="HM">Heard Island and Mcdonald Islands</option>
                                                            <option value="VA">Holy See (Vatican City State)</option>
                                                            <option value="HN">Honduras</option>
                                                            <option value="HK">Hong Kong</option>
                                                            <option value="HU">Hungary</option>
                                                            <option value="IS">Iceland</option>
                                                            <option value="IN">India</option>
                                                            <option value="ID">Indonesia</option>
                                                            <option value="IR">Iran, Islamic Republic of</option>
                                                            <option value="IQ">Iraq</option>
                                                            <option value="IE">Ireland</option>
                                                            <option value="IM">Isle of Man</option>
                                                            <option value="IL">Israel</option>
                                                            <option value="IT">Italy</option>
                                                            <option value="JM">Jamaica</option>
                                                            <option value="JP">Japan</option>
                                                            <option value="JE">Jersey</option>
                                                            <option value="JO">Jordan</option>
                                                            <option value="KZ">Kazakhstan</option>
                                                            <option value="KE">Kenya</option>
                                                            <option value="KI">Kiribati</option>
                                                            <option value="KP">Korea, Democratic People's Republic of</option>
                                                            <option value="KR">Korea, Republic of</option>
                                                            <option value="KW">Kuwait</option>
                                                            <option value="KG">Kyrgyzstan</option>
                                                            <option value="LA">Lao People's Democratic Republic</option>
                                                            <option value="LV">Latvia</option>
                                                            <option value="LB">Lebanon</option>
                                                            <option value="LS">Lesotho</option>
                                                            <option value="LR">Liberia</option>
                                                            <option value="LY">Libyan Arab Jamahiriya</option>
                                                            <option value="LI">Liechtenstein</option>
                                                            <option value="LT">Lithuania</option>
                                                            <option value="LU">Luxembourg</option>
                                                            <option value="MO">Macao</option>
                                                            <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                                                            <option value="MG">Madagascar</option>
                                                            <option value="MW">Malawi</option>
                                                            <option value="MY">Malaysia</option>
                                                            <option value="MV">Maldives</option>
                                                            <option value="ML">Mali</option>
                                                            <option value="MT">Malta</option>
                                                            <option value="MH">Marshall Islands</option>
                                                            <option value="MQ">Martinique</option>
                                                            <option value="MR">Mauritania</option>
                                                            <option value="MU">Mauritius</option>
                                                            <option value="YT">Mayotte</option>
                                                            <option value="MX">Mexico</option>
                                                            <option value="FM">Micronesia, Federated States of</option>
                                                            <option value="MD">Moldova, Republic of</option>
                                                            <option value="MC">Monaco</option>
                                                            <option value="MN">Mongolia</option>
                                                            <option value="ME">Montenegro</option>
                                                            <option value="MS">Montserrat</option>
                                                            <option value="MA">Morocco</option>
                                                            <option value="MZ">Mozambique</option>
                                                            <option value="MM">Myanmar</option>
                                                            <option value="NA">Namibia</option>
                                                            <option value="NR">Nauru</option>
                                                            <option value="NP">Nepal</option>
                                                            <option value="NL">Netherlands</option>
                                                            <option value="AN">Netherlands Antilles</option>
                                                            <option value="NC">New Caledonia</option>
                                                            <option value="NZ">New Zealand</option>
                                                            <option value="NI">Nicaragua</option>
                                                            <option value="NE">Niger</option>
                                                            <option value="NG">Nigeria</option>
                                                            <option value="NU">Niue</option>
                                                            <option value="NF">Norfolk Island</option>
                                                            <option value="MP">Northern Mariana Islands</option>
                                                            <option value="NO">Norway</option>
                                                            <option value="OM">Oman</option>
                                                            <option value="PK">Pakistan</option>
                                                            <option value="PW">Palau</option>
                                                            <option value="PS">Palestinian Territory, Occupied</option>
                                                            <option value="PA">Panama</option>
                                                            <option value="PG">Papua New Guinea</option>
                                                            <option value="PY">Paraguay</option>
                                                            <option value="PE">Peru</option>
                                                            <option value="PH">Philippines</option>
                                                            <option value="PN">Pitcairn</option>
                                                            <option value="PL">Poland</option>
                                                            <option value="PT">Portugal</option>
                                                            <option value="PR">Puerto Rico</option>
                                                            <option value="QA">Qatar</option>
                                                            <option value="RE">Reunion</option>
                                                            <option value="RO">Romania</option>
                                                            <option value="RU">Russian Federation</option>
                                                            <option value="RW">Rwanda</option>
                                                            <option value="SH">Saint Helena</option>
                                                            <option value="KN">Saint Kitts and Nevis</option>
                                                            <option value="LC">Saint Lucia</option>
                                                            <option value="PM">Saint Pierre and Miquelon</option>
                                                            <option value="VC">Saint Vincent and The Grenadines</option>
                                                            <option value="WS">Samoa</option>
                                                            <option value="SM">San Marino</option>
                                                            <option value="ST">Sao Tome and Principe</option>
                                                            <option value="SA">Saudi Arabia</option>
                                                            <option value="SN">Senegal</option>
                                                            <option value="RS">Serbia</option>
                                                            <option value="SC">Seychelles</option>
                                                            <option value="SL">Sierra Leone</option>
                                                            <option value="SG">Singapore</option>
                                                            <option value="SK">Slovakia</option>
                                                            <option value="SI">Slovenia</option>
                                                            <option value="SB">Solomon Islands</option>
                                                            <option value="SO">Somalia</option>
                                                            <option value="ZA">South Africa</option>
                                                            <option value="GS">South Georgia and The South Sandwich Islands</option>
                                                            <option value="ES">Spain</option>
                                                            <option value="LK">Sri Lanka</option>
                                                            <option value="SD">Sudan</option>
                                                            <option value="SR">Suriname</option>
                                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                                            <option value="SZ">Swaziland</option>
                                                            <option value="SE">Sweden</option>
                                                            <option value="CH">Switzerland</option>
                                                            <option value="SY">Syrian Arab Republic</option>
                                                            <option value="TW">Taiwan, Province of China</option>
                                                            <option value="TJ">Tajikistan</option>
                                                            <option value="TZ">Tanzania, United Republic of</option>
                                                            <option value="TH">Thailand</option>
                                                            <option value="TL">Timor-leste</option>
                                                            <option value="TG">Togo</option>
                                                            <option value="TK">Tokelau</option>
                                                            <option value="TO">Tonga</option>
                                                            <option value="TT">Trinidad and Tobago</option>
                                                            <option value="TN">Tunisia</option>
                                                            <option value="TR">Turkey</option>
                                                            <option value="TM">Turkmenistan</option>
                                                            <option value="TC">Turks and Caicos Islands</option>
                                                            <option value="TV">Tuvalu</option>
                                                            <option value="UG">Uganda</option>
                                                            <option value="UA">Ukraine</option>
                                                            <option value="AE">United Arab Emirates</option>
                                                            <option value="GB" selected="selected">United Kingdom</option>
                                                            <option value="US">United States</option>
                                                            <option value="UM">United States Minor Outlying Islands</option>
                                                            <option value="UY">Uruguay</option>
                                                            <option value="UZ">Uzbekistan</option>
                                                            <option value="VU">Vanuatu</option>
                                                            <option value="VE">Venezuela</option>
                                                            <option value="VN">Viet Nam</option>
                                                            <option value="VG">Virgin Islands, British</option>
                                                            <option value="VI">Virgin Islands, U.S.</option>
                                                            <option value="WF">Wallis and Futuna</option>
                                                            <option value="EH">Western Sahara</option>
                                                            <option value="YE">Yemen</option>
                                                            <option value="ZM">Zambia</option>
                                                            <option value="ZW">Zimbabwe</option>
                                                        </select><br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center">
                                                        State (optional):<br><br>
                                                    </td>
                                                    <td valign="center">
                                                        <input type="text" id="state" class="addToCartTextInput" name="state" size="50" value=""/><br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center">
                                                        Phone (optional):<br><br>
                                                    </td>
                                                    <td valign="center">
                                                        <input type="text" id="phone" class="addToCartTextInput" name="phone" size="50" value=""/><br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="center">
                                                        Make my donation recurring (optional):&nbsp;&nbsp;&nbsp;
                                                    </td>
                                                    <td valign="center">
                                                        <input id="notRecurring" type="radio" name="recurringSelection" style="-ms-transform: scale(1.5); -moz-transform: scale(1.5);  -webkit-transform: scale(1.5); -o-transform: scale(1.5); transform: scale(1.5); padding: 10px;" checked>&nbsp;&nbsp;not recurring&nbsp;&nbsp;
                                                        <input id="weeklyRecurring" type="radio" name="recurringSelection" style="-ms-transform: scale(1.5); -moz-transform: scale(1.5);  -webkit-transform: scale(1.5); -o-transform: scale(1.5); transform: scale(1.5); padding: 10px;">&nbsp;&nbsp;weekly&nbsp;&nbsp;
                                                        <input id="monthlyRecurring" type="radio" name="recurringSelection" style="-ms-transform: scale(1.5); -moz-transform: scale(1.5);  -webkit-transform: scale(1.5); -o-transform: scale(1.5); transform: scale(1.5); padding: 10px;">&nbsp;&nbsp;monthly&nbsp;&nbsp;
                                                        <input id="yearlyRecurring" type="radio" name="recurringSelection" style="-ms-transform: scale(1.5); -moz-transform: scale(1.5);  -webkit-transform: scale(1.5); -o-transform: scale(1.5); transform: scale(1.5); padding: 10px;">&nbsp;&nbsp;yearly
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <script>
                            function updateRadioBoxesDonation(boxId, firstStart) {
								updateRadioBoxesDonationImpl(boxId, firstStart, false);
							}
							
                            function updateRadioBoxesDonationImpl(boxId, firstStart, forceReload) {
                                if (forceReload || (!firstStart && !document.getElementById(boxId).checked)) {
                                    callDelayed(executeCurrencySwitch, 300);
                                }
                                document.getElementById(boxId).checked = true;
                                if (document.getElementById('radio1').checked) {
                                    document.getElementById('radioDiv1').style.opacity = 1;
                                    document.getElementById('radioDiv2').style.opacity = 0.6;
                                } else {
                                    document.getElementById('radioDiv2').style.opacity = 1;
                                    document.getElementById('radioDiv1').style.opacity = 0.6;
                                }
                            }
                            function mouseOverRadioBox(boxId) {
                                document.getElementById(boxId).style['-webkit-box-shadow'] = '0px 0px 20px rgba(0, 0, 0, 0.5)';
                                document.getElementById(boxId).style['-moz-box-shadow'] = '0px 0px 20px rgba(0, 0, 0, 0.5)';
                            }
                            function mouseOutRadioBox(boxId) {
                                document.getElementById(boxId).style['-webkit-box-shadow'] = '0px 0px 10px rgba(0, 0, 0, 0.5)';
                                document.getElementById(boxId).style['-moz-box-shadow'] = '0px 0px 10px rgba(0, 0, 0, 0.5)';
                            }
                            
                            function executeCurrencySwitch() {
                                currency = "<?php
                                                if (strcmp(getCurrency(), "GBP") == 0) {
                                                    echo "EUR";
                                                } else {
                                                    echo "GBP";
                                                }
                                            ?>";
                                window.location.href = getCurrentServerAndPath() + getCurrentFileName() + "?currency=" + currency + "#boxes";
                            }
                            
                            <?php
                                if (strcmp(getCurrency(), "GBP") == 0) {
                                    echo "updateRadioBoxesDonation('radio1', true);";
                                } else {
                                    echo "updateRadioBoxesDonation('radio2', true);";
                                }
                            ?>
                            
                            function goToThankYouPage() {
                                window.location.href = getCurrentServerAndPath() + 'thanks.php';
                            }
                            
                            function goToPayPalPayment() {
                                enteredDataIsComplete = true;
                                if (document.getElementById("email").value == "") {
                                    enteredDataIsComplete = false;
                                }
                                if (document.getElementById("firstName").value == "") {
                                    enteredDataIsComplete = false;
                                }
                                if (document.getElementById("lastName").value == "") {
                                    enteredDataIsComplete = false;
                                }
                                if (document.getElementById("street").value == "") {
                                    enteredDataIsComplete = false;
                                }
                                if (document.getElementById("houseNumber").value == "") {
                                    enteredDataIsComplete = false;
                                }
                                if (document.getElementById("city").value == "") {
                                    enteredDataIsComplete = false;
                                }
                                if (document.getElementById("country").value == "") {
                                    enteredDataIsComplete = false;
                                }
                                if (document.getElementById("postalCode").value == "") {
                                    enteredDataIsComplete = false;
                                }
                                
                                
                                if (!enteredDataIsComplete) {
                                    alert("Please fill in all mandatory data!");
                                    return;
                                }
                                
                                amount = "<?php
                                                echo getCurrentPriceOfCart();
                                            ?>";
                                currency = "<?php
                                                echo getCurrency();
                                            ?>";
                                description = "Claim gift aid: ";
                                if (document.getElementById("claimGiftAid").checked) {
                                    description = description + "yes, ";
                                } else {
                                    description = description + "no, ";
                                }
                                
                                description = description + "E-Mail: " + document.getElementById("email").value + ", ";
                                
                                description = description + "Register for newsletter: ";
                                if (document.getElementById("getNewsLetters").checked) {
                                    description = description + "yes";
                                } else {
                                    description = description + "no";
                                }
                                
                                name = document.getElementById("firstName").value + " " + document.getElementById("lastName").value;
                                line1 = document.getElementById("street").value + " " + document.getElementById("houseNumber").value;
                                line2 = "not_given";
                                if (document.getElementById("apartment").value !== "") {
                                    line2 = document.getElementById("apartment").value;
                                }
                                city = document.getElementById("city").value;
                                countryCode = document.getElementById("country").value;
                                postalCode = document.getElementById("postalCode").value;
                                state = "CA";
                                if (document.getElementById("state").value !== "") {
                                    state = document.getElementById("state").value;
                                }
                                phone = "+44 7700 123456";
                                if (document.getElementById("phone").value !== "") {
                                    phone = document.getElementById("phone").value;
                                }
                                recurring = "no";
                                if (document.getElementById("weeklyRecurring").checked) {
                                    recurring = "WEEK";
                                }
                                if (document.getElementById("monthlyRecurring").checked) {
                                    recurring = "MONTH";
                                }
                                if (document.getElementById("yearlyRecurring").checked) {
                                    recurring = "YEAR";
                                }
                                
                                amount = encodeURIComponent(amount);
                                currency = encodeURIComponent(currency);
                                description = encodeURIComponent(description);
                                name = encodeURIComponent(name);
                                line1 = encodeURIComponent(line1);
                                line2 = encodeURIComponent(line2);
                                city = encodeURIComponent(city);
                                countryCode = encodeURIComponent(countryCode);
                                postalCode = encodeURIComponent(postalCode);
                                state = encodeURIComponent(state);
                                phone = encodeURIComponent(phone);
                                recurring = encodeURIComponent(recurring);
                                
                                url = getCurrentServerAndPath() + 'payPalPayment.php?amount=' + amount + '&currency=' + currency + '&description=' + description + '&name=' + name
                                                                        + '&line1=' + line1 + '&line2=' + line2 + '&city=' + city + '&countryCode=' + countryCode + '&postalCode=' + postalCode
                                                                        + '&phone=' + phone + '&state=' + state + '&recurring=' + recurring;
                                
                                window.open(url, '_blank');
                            }
                        </script>
                        
                        </br></br></br></br>
                        
                        <?php
                            $khoraBusinessAddress = getEmailForPayPal();
                            $message = 'Thank you for your kindness and generosity. Without people like you we would not be able to run the kitchen.';
                            $currency = getCurrency();
                            $amount = getCurrentPriceOfCart();
                            if (strcmp(getCurrency(), "GBP") == 0) {
                                echo '<div class="horizontalCenteredBase">
                                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px; text-align: center;">
                                        To donate the amount of <b><u>' . $amount . " " . $currency .'</u></b> to the Khora Community kitchen via the MASS action PayPal account, please click the button below to proceed to PayPal.<br><br><br>
                                        <input type="image" src="img/payPalLogoBig.png" class="bigButton" name="submit" alt="PayPal" onclick="goToPayPalPayment();"><br>
                                        <img src="img/creditCardsLogos.png">
                                    </div>
                                </div>';
                            } else {
                                echo '<div class="horizontalCenteredBase">
                                    <div class="horizontalCentered" style="font-size: 20px; line-height: 30px; text-align: center;">
                                        To donate the amount of <b><u>' . $amount . " " . $currency .'</u></b> to the Khora Community kitchen, please click the button below to proceed to PayPal.
                                        </br></br>
                                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                                            <input type="hidden" name="cmd" value="_donations">
                                            <input type="hidden" name="business" value="' . $khoraBusinessAddress . '">
                                            <input type="hidden" name="amount" id="amount" value="' . $amount . '">
                                            <input type="hidden" name="lc" value="IE">
                                            <input type="hidden" name="item_name" value="' . $message . '">
                                            <input type="hidden" name="currency_code" value="' . $currency . '">
                                            <input type="hidden" name="no_note" value="0">
                                            <input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_SM.gif:NonHostedGuest">
                                            <input type="image" src="img/payPalLogoBig.png" class="bigButton" name="submit" alt="PayPal" onclick="callDelayed(goToThankYouPage, 3000);"><br>
                                            <img src="img/creditCardsLogos.png">
                                        </form>
                                    </div>
                                </div>';
                            }
                        ?>
                            
                        <br><br><br><br>
                        
                        <h2>Alternative Donation Methods:</h2>
                        <h3>Direct Bank Transaction?</h3>
                        IBAN and BIC<br><br>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                        
                        <br><br><br><br>
                        
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                        
                        <br><br><br><br>
                    </div>
                </div>
            </div>
            <?php
                echo getPageFooter();
            ?>
		</div>
	</body>
</html>