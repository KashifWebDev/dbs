<?php
require 'app/main.php';
session_start();
check_session();

$uid = $_GET["id"];

$_SESSION['currentPath'] = "./";
?>
<!DOCTYPE html>
<html lang="en">

<?php require 'app/head.include.php'; ?>

<body>
<!-- Navigation -->
<?php require 'app/nav.include.php'; ?>

<!-- Page Content -->
<div class="container">
    <form action="" method="post">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email" style="color: black;">Full Name:</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter Username" id="email">
                </div>
                <div class="form-group">
                    <label for="email" style="color: black;">Company Name:</label>
                    <input type="text" class="form-control" name="company_name" placeholder="Company Name" id="email" >
                </div>
                <div class="form-group">
                    <label for="email" style="color: black;">Job Position:</label>
                    <input type="text" class="form-control" name="job_position" placeholder="Job Position" id="email">
                </div>
                <div class="form-group">
                    <label for="email" style="color: black;">Email address:</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email" id="email">
                </div>
                <script src="assets/custom_js/show_pass.js"></script>
                <div class="input-group mb-3 d-flex flex-column" id="show_hide_password">
                    <label for="email" class="mb-0" style="color: black;">Password:</label>
                    <div class="d-flex">
                                <span class="input-group-text text-secondary input-group-addon">
                                <a id="show_pass_a"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </span>
                        <input type="password" name="pass" class="form-control " placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
                    <label for="exampleFormControlSelect1">Example select</label>
                    <select class="form-control selectpicker select2"
                            data-live-search="true" data-flag="false" name="step1[country]" id="country1">
                        <option value="">Country</option><option value="AF"  data-phone-prefix="+93">
                            Afghanistan
                        </option><option value="AX"  data-phone-prefix="+358">
                            Aland Islands
                        </option><option value="AL"  data-phone-prefix="+355">
                            Albania
                        </option><option value="DZ"  data-phone-prefix="+213">
                            Algeria
                        </option><option value="AS"  data-phone-prefix="+1">
                            American Samoa
                        </option><option value="AD"  data-phone-prefix="+376">
                            Andorra
                        </option><option value="AO"  data-phone-prefix="+244">
                            Angola
                        </option><option value="AI"  data-phone-prefix="+1">
                            Anguilla
                        </option><option value="AQ"  data-phone-prefix="">
                            Antarctica
                        </option><option value="AG"  data-phone-prefix="+1">
                            Antigua Barbuda
                        </option><option value="AR"  data-phone-prefix="+54">
                            Argentina
                        </option><option value="AM"  data-phone-prefix="+374">
                            Armenia
                        </option><option value="AW"  data-phone-prefix="+297">
                            Aruba
                        </option><option value="AU"  data-phone-prefix="+61">
                            Australia
                        </option><option value="AT"  data-phone-prefix="+43">
                            Austria
                        </option><option value="AZ"  data-phone-prefix="+994">
                            Azerbaijan
                        </option><option value="BS"  data-phone-prefix="+1">
                            Bahamas
                        </option><option value="BH"  data-phone-prefix="+973">
                            Bahrain
                        </option><option value="BD"  data-phone-prefix="+880">
                            Bangladesh
                        </option><option value="BB"  data-phone-prefix="+1">
                            Barbados
                        </option><option value="BY"  data-phone-prefix="+375">
                            Belarus
                        </option><option value="BE"  data-phone-prefix="+32">
                            Belgium
                        </option><option value="BZ"  data-phone-prefix="+501">
                            Belize
                        </option><option value="BJ"  data-phone-prefix="+229">
                            Benin
                        </option><option value="BM"  data-phone-prefix="+1">
                            Bermuda
                        </option><option value="BT"  data-phone-prefix="+975">
                            Bhutan
                        </option><option value="BO"  data-phone-prefix="+591">
                            Bolivia
                        </option><option value="BA"  data-phone-prefix="+387">
                            Bosnia Herzegovina
                        </option><option value="BW"  data-phone-prefix="+267">
                            Botswana
                        </option><option value="BV"  data-phone-prefix="">
                            Bouvet Island
                        </option><option value="BR"  data-phone-prefix="+55">
                            Brazil
                        </option><option value="IO"  data-phone-prefix="+246">
                            British Indian Ocean Territory
                        </option><option value="VG"  data-phone-prefix="+1">
                            British Virgin Islands
                        </option><option value="BN"  data-phone-prefix="+673">
                            Brunei
                        </option><option value="BG"  data-phone-prefix="+359">
                            Bulgaria
                        </option><option value="BF"  data-phone-prefix="+226">
                            Burkina Faso
                        </option><option value="BI"  data-phone-prefix="+257">
                            Burundi
                        </option><option value="KH"  data-phone-prefix="+855">
                            Cambodia
                        </option><option value="CM"  data-phone-prefix="+237">
                            Cameroon
                        </option><option value="CA"  data-phone-prefix="+1">
                            Canada
                        </option><option value="CV"  data-phone-prefix="+238">
                            Cape Verde
                        </option><option value="BQ"  data-phone-prefix="+599">
                            Caribbean Netherlands
                        </option><option value="KY"  data-phone-prefix="+1">
                            Cayman Islands
                        </option><option value="CF"  data-phone-prefix="+236">
                            Central African Republic
                        </option><option value="TD"  data-phone-prefix="+235">
                            Chad
                        </option><option value="CL"  data-phone-prefix="+56">
                            Chile
                        </option><option value="CN"  data-phone-prefix="+86">
                            China
                        </option><option value="CX"  data-phone-prefix="+61">
                            Christmas Island
                        </option><option value="CC"  data-phone-prefix="+61">
                            Cocos Keeling Islands
                        </option><option value="CO"  data-phone-prefix="+57">
                            Colombia
                        </option><option value="KM"  data-phone-prefix="+269">
                            Comoros
                        </option><option value="CG"  data-phone-prefix="+242">
                            Congo Brazzaville
                        </option><option value="CD"  data-phone-prefix="+243">
                            Congo Kinshasa
                        </option><option value="CK"  data-phone-prefix="+682">
                            Cook Islands
                        </option><option value="CR"  data-phone-prefix="+506">
                            Costa Rica
                        </option><option value="CI"  data-phone-prefix="+225">
                            Cote d Ivoire
                        </option><option value="HR"  data-phone-prefix="+385">
                            Croatia
                        </option><option value="CU"  data-phone-prefix="+53">
                            Cuba
                        </option><option value="CW"  data-phone-prefix="+599">
                            Curacao
                        </option><option value="CY"  data-phone-prefix="+357">
                            Cyprus
                        </option><option value="CZ"  data-phone-prefix="+420">
                            Czech Republic
                        </option><option value="DK"  data-phone-prefix="+45">
                            Denmark
                        </option><option value="DJ"  data-phone-prefix="+253">
                            Djibouti
                        </option><option value="DM"  data-phone-prefix="+1">
                            Dominica
                        </option><option value="DO"  data-phone-prefix="+1">
                            Dominican Republic
                        </option><option value="EC"  data-phone-prefix="+593">
                            Ecuador
                        </option><option value="EG"  data-phone-prefix="+20">
                            Egypt
                        </option><option value="SV"  data-phone-prefix="+503">
                            El Salvador
                        </option><option value="GQ"  data-phone-prefix="+240">
                            Equatorial Guinea
                        </option><option value="ER"  data-phone-prefix="+291">
                            Eritrea
                        </option><option value="EE"  data-phone-prefix="+372">
                            Estonia
                        </option><option value="SZ"  data-phone-prefix="+268">
                            Eswatini
                        </option><option value="ET"  data-phone-prefix="+251">
                            Ethiopia
                        </option><option value="FK"  data-phone-prefix="+500">
                            Falkland Islands
                        </option><option value="FO"  data-phone-prefix="+298">
                            Faroe Islands
                        </option><option value="FJ"  data-phone-prefix="+679">
                            Fiji
                        </option><option value="FI"  data-phone-prefix="+358">
                            Finland
                        </option><option value="FR"  data-phone-prefix="+33">
                            France
                        </option><option value="GF"  data-phone-prefix="+594">
                            French Guiana
                        </option><option value="PF"  data-phone-prefix="+689">
                            French Polynesia
                        </option><option value="TF"  data-phone-prefix="">
                            French Southern Territories
                        </option><option value="GA"  data-phone-prefix="+241">
                            Gabon
                        </option><option value="GM"  data-phone-prefix="+220">
                            Gambia
                        </option><option value="GE"  data-phone-prefix="+995">
                            Georgia
                        </option><option value="DE"  data-phone-prefix="+49">
                            Germany
                        </option><option value="GH"  data-phone-prefix="+233">
                            Ghana
                        </option><option value="GI"  data-phone-prefix="+350">
                            Gibraltar
                        </option><option value="GR"  data-phone-prefix="+30">
                            Greece
                        </option><option value="GL"  data-phone-prefix="+299">
                            Greenland
                        </option><option value="GD"  data-phone-prefix="+1">
                            Grenada
                        </option><option value="GP"  data-phone-prefix="+590">
                            Guadeloupe
                        </option><option value="GU"  data-phone-prefix="+1">
                            Guam
                        </option><option value="GT"  data-phone-prefix="+502">
                            Guatemala
                        </option><option value="GG"  data-phone-prefix="+44">
                            Guernsey
                        </option><option value="GN"  data-phone-prefix="+224">
                            Guinea
                        </option><option value="GW"  data-phone-prefix="+245">
                            Guinea Bissau
                        </option><option value="GY"  data-phone-prefix="+592">
                            Guyana
                        </option><option value="HT"  data-phone-prefix="+509">
                            Haiti
                        </option><option value="HM"  data-phone-prefix="">
                            Heard McDonald Islands
                        </option><option value="HN"  data-phone-prefix="+504">
                            Honduras
                        </option><option value="HK"  data-phone-prefix="+852">
                            Hong Kong SAR China
                        </option><option value="HU"  data-phone-prefix="+36">
                            Hungary
                        </option><option value="IS"  data-phone-prefix="+354">
                            Iceland
                        </option><option value="IN"  data-phone-prefix="+91">
                            India
                        </option><option value="ID"  data-phone-prefix="+62">
                            Indonesia
                        </option><option value="IR"  data-phone-prefix="+98">
                            Iran
                        </option><option value="IQ"  data-phone-prefix="+964">
                            Iraq
                        </option><option value="IE"  data-phone-prefix="+353">
                            Ireland
                        </option><option value="IM"  data-phone-prefix="+44">
                            Isle of Man
                        </option><option value="IL"  data-phone-prefix="+972">
                            Israel
                        </option><option value="IT"  data-phone-prefix="+39">
                            Italy
                        </option><option value="JM"  data-phone-prefix="+1">
                            Jamaica
                        </option><option value="JP"  data-phone-prefix="+81">
                            Japan
                        </option><option value="JE"  data-phone-prefix="+44">
                            Jersey
                        </option><option value="JO"  data-phone-prefix="+962">
                            Jordan
                        </option><option value="KZ"  data-phone-prefix="+7">
                            Kazakhstan
                        </option><option value="KE"  data-phone-prefix="+254">
                            Kenya
                        </option><option value="KI"  data-phone-prefix="+686">
                            Kiribati
                        </option><option value="KW"  data-phone-prefix="+965">
                            Kuwait
                        </option><option value="KG"  data-phone-prefix="+996">
                            Kyrgyzstan
                        </option><option value="LA"  data-phone-prefix="+856">
                            Laos
                        </option><option value="LV"  data-phone-prefix="+371">
                            Latvia
                        </option><option value="LB"  data-phone-prefix="+961">
                            Lebanon
                        </option><option value="LS"  data-phone-prefix="+266">
                            Lesotho
                        </option><option value="LR"  data-phone-prefix="+231">
                            Liberia
                        </option><option value="LY"  data-phone-prefix="+218">
                            Libya
                        </option><option value="LI"  data-phone-prefix="+423">
                            Liechtenstein
                        </option><option value="LT"  data-phone-prefix="+370">
                            Lithuania
                        </option><option value="LU"  data-phone-prefix="+352">
                            Luxembourg
                        </option><option value="MO"  data-phone-prefix="+853">
                            Macao SAR China
                        </option><option value="MG"  data-phone-prefix="+261">
                            Madagascar
                        </option><option value="MW"  data-phone-prefix="+265">
                            Malawi
                        </option><option value="MY"  data-phone-prefix="+60">
                            Malaysia
                        </option><option value="MV"  data-phone-prefix="+960">
                            Maldives
                        </option><option value="ML"  data-phone-prefix="+223">
                            Mali
                        </option><option value="MT"  data-phone-prefix="+356">
                            Malta
                        </option><option value="MH"  data-phone-prefix="+692">
                            Marshall Islands
                        </option><option value="MQ"  data-phone-prefix="+596">
                            Martinique
                        </option><option value="MR"  data-phone-prefix="+222">
                            Mauritania
                        </option><option value="MU"  data-phone-prefix="+230">
                            Mauritius
                        </option><option value="YT"  data-phone-prefix="+262">
                            Mayotte
                        </option><option value="MX"  data-phone-prefix="+52">
                            Mexico
                        </option><option value="FM"  data-phone-prefix="+691">
                            Micronesia
                        </option><option value="MD"  data-phone-prefix="+373">
                            Moldova
                        </option><option value="MC"  data-phone-prefix="+377">
                            Monaco
                        </option><option value="MN"  data-phone-prefix="+976">
                            Mongolia
                        </option><option value="ME"  data-phone-prefix="+382">
                            Montenegro
                        </option><option value="MS"  data-phone-prefix="+1">
                            Montserrat
                        </option><option value="MA"  data-phone-prefix="+212">
                            Morocco
                        </option><option value="MZ"  data-phone-prefix="+258">
                            Mozambique
                        </option><option value="MM"  data-phone-prefix="+95">
                            Myanmar Burma
                        </option><option value="NA"  data-phone-prefix="+264">
                            Namibia
                        </option><option value="NR"  data-phone-prefix="+674">
                            Nauru
                        </option><option value="NP"  data-phone-prefix="+977">
                            Nepal
                        </option><option value="NL"  data-phone-prefix="+31">
                            Netherlands
                        </option><option value="NC"  data-phone-prefix="+687">
                            New Caledonia
                        </option><option value="NZ"  data-phone-prefix="+64">
                            New Zealand
                        </option><option value="NI"  data-phone-prefix="+505">
                            Nicaragua
                        </option><option value="NE"  data-phone-prefix="+227">
                            Niger
                        </option><option value="NG"  data-phone-prefix="+234">
                            Nigeria
                        </option><option value="NU"  data-phone-prefix="+683">
                            Niue
                        </option><option value="NF"  data-phone-prefix="+672">
                            Norfolk Island
                        </option><option value="KP"  data-phone-prefix="+850">
                            North Korea
                        </option><option value="MK"  data-phone-prefix="+389">
                            North Macedonia
                        </option><option value="MP"  data-phone-prefix="+1">
                            Northern Mariana Islands
                        </option><option value="NO"  data-phone-prefix="+47">
                            Norway
                        </option><option value="OM"  data-phone-prefix="+968">
                            Oman
                        </option><option value="PK"  data-phone-prefix="+92">
                            Pakistan
                        </option><option value="PW"  data-phone-prefix="+680">
                            Palau
                        </option><option value="PS"  data-phone-prefix="+970">
                            Palestinian Territories
                        </option><option value="PA"  data-phone-prefix="+507">
                            Panama
                        </option><option value="PG"  data-phone-prefix="+675">
                            Papua New Guinea
                        </option><option value="PY"  data-phone-prefix="+595">
                            Paraguay
                        </option><option value="PE"  data-phone-prefix="+51">
                            Peru
                        </option><option value="PH"  data-phone-prefix="+63">
                            Philippines
                        </option><option value="PN"  data-phone-prefix="">
                            Pitcairn Islands
                        </option><option value="PL"  data-phone-prefix="+48">
                            Poland
                        </option><option value="PT"  data-phone-prefix="+351">
                            Portugal
                        </option><option value="PR"  data-phone-prefix="+1">
                            Puerto Rico
                        </option><option value="QA"  data-phone-prefix="+974">
                            Qatar
                        </option><option value="RE"  data-phone-prefix="+262">
                            Reunion
                        </option><option value="RO"  data-phone-prefix="+40">
                            Romania
                        </option><option value="RU"  data-phone-prefix="+7">
                            Russia
                        </option><option value="RW"  data-phone-prefix="+250">
                            Rwanda
                        </option><option value="WS"  data-phone-prefix="+685">
                            Samoa
                        </option><option value="SM"  data-phone-prefix="+378">
                            San Marino
                        </option><option value="ST"  data-phone-prefix="+239">
                            Sao Tome Principe
                        </option><option value="SA"  data-phone-prefix="+966">
                            Saudi Arabia
                        </option><option value="SN"  data-phone-prefix="+221">
                            Senegal
                        </option><option value="RS"  data-phone-prefix="+381">
                            Serbia
                        </option><option value="SC"  data-phone-prefix="+248">
                            Seychelles
                        </option><option value="SL"  data-phone-prefix="+232">
                            Sierra Leone
                        </option><option value="SG"  data-phone-prefix="+65">
                            Singapore
                        </option><option value="SX"  data-phone-prefix="+1">
                            Sint Maarten
                        </option><option value="SK"  data-phone-prefix="+421">
                            Slovakia
                        </option><option value="SI"  data-phone-prefix="+386">
                            Slovenia
                        </option><option value="SB"  data-phone-prefix="+677">
                            Solomon Islands
                        </option><option value="SO"  data-phone-prefix="+252">
                            Somalia
                        </option><option value="ZA"  data-phone-prefix="+27">
                            South Africa
                        </option><option value="GS"  data-phone-prefix="">
                            South Georgia South Sandwich Islands
                        </option><option value="KR"  data-phone-prefix="+82">
                            South Korea
                        </option><option value="SS"  data-phone-prefix="+211">
                            South Sudan
                        </option><option value="ES"  data-phone-prefix="+34">
                            Spain
                        </option><option value="LK"  data-phone-prefix="+94">
                            Sri Lanka
                        </option><option value="BL"  data-phone-prefix="+590">
                            St Barthelemy
                        </option><option value="SH"  data-phone-prefix="+290">
                            St Helena
                        </option><option value="KN"  data-phone-prefix="+1">
                            St Kitts Nevis
                        </option><option value="LC"  data-phone-prefix="+1">
                            St Lucia
                        </option><option value="MF"  data-phone-prefix="+590">
                            St Martin
                        </option><option value="PM"  data-phone-prefix="+508">
                            St Pierre Miquelon
                        </option><option value="VC"  data-phone-prefix="+1">
                            St Vincent Grenadines
                        </option><option value="SD"  data-phone-prefix="+249">
                            Sudan
                        </option><option value="SR"  data-phone-prefix="+597">
                            Suriname
                        </option><option value="SJ"  data-phone-prefix="+47">
                            Svalbard Jan Mayen
                        </option><option value="SE"  data-phone-prefix="+46">
                            Sweden
                        </option><option value="CH"  data-phone-prefix="+41">
                            Switzerland
                        </option><option value="SY"  data-phone-prefix="+963">
                            Syria
                        </option><option value="TW"  data-phone-prefix="+886">
                            Taiwan
                        </option><option value="TJ"  data-phone-prefix="+992">
                            Tajikistan
                        </option><option value="TZ"  data-phone-prefix="+255">
                            Tanzania
                        </option><option value="TH"  data-phone-prefix="+66">
                            Thailand
                        </option><option value="TL"  data-phone-prefix="+670">
                            Timor Leste
                        </option><option value="TG"  data-phone-prefix="+228">
                            Togo
                        </option><option value="TK"  data-phone-prefix="+690">
                            Tokelau
                        </option><option value="TO"  data-phone-prefix="+676">
                            Tonga
                        </option><option value="TT"  data-phone-prefix="+1">
                            Trinidad Tobago
                        </option><option value="TN"  data-phone-prefix="+216">
                            Tunisia
                        </option><option value="TR"  data-phone-prefix="+90">
                            Turkey
                        </option><option value="TM"  data-phone-prefix="+993">
                            Turkmenistan
                        </option><option value="TC"  data-phone-prefix="+1">
                            Turks Caicos Islands
                        </option><option value="TV"  data-phone-prefix="+688">
                            Tuvalu
                        </option><option value="UM"  data-phone-prefix="">
                            U S Outlying Islands
                        </option><option value="VI"  data-phone-prefix="+1">
                            U S Virgin Islands
                        </option><option value="UG"  data-phone-prefix="+256">
                            Uganda
                        </option><option value="UA"  data-phone-prefix="+380">
                            Ukraine
                        </option><option value="AE"  data-phone-prefix="+971">
                            United Arab Emirates
                        </option><option value="GB"  data-phone-prefix="+44">
                            United Kingdom
                        </option><option value="US"  data-phone-prefix="+1">
                            United States
                        </option><option value="UY"  data-phone-prefix="+598">
                            Uruguay
                        </option><option value="UZ"  data-phone-prefix="+998">
                            Uzbekistan
                        </option><option value="VU"  data-phone-prefix="+678">
                            Vanuatu
                        </option><option value="VA"  data-phone-prefix="+39">
                            Vatican City
                        </option><option value="VE"  data-phone-prefix="+58">
                            Venezuela
                        </option><option value="VN"  data-phone-prefix="+84">
                            Vietnam
                        </option><option value="WF"  data-phone-prefix="+681">
                            Wallis Futuna
                        </option><option value="EH"  data-phone-prefix="+212">
                            Western Sahara
                        </option><option value="YE"  data-phone-prefix="+967">
                            Yemen
                        </option><option value="ZM"  data-phone-prefix="+260">
                            Zambia
                        </option><option value="ZW"  data-phone-prefix="+263">
                            Zimbabwe
                        </option>
                    </select>
                    <script>
                        $('select#country1').change(function(){
                            var phone = $(this).find(':selected').attr('data-phone-prefix');
                            $("#phone1").val(phone);
                            $("#phone2").val(phone);
                        });
                        $('.select2').select2();
                    </script>
                </div>
                <div class="form-group">
                    <label for="email" style="color: black;">Primary contact number:</label>
                    <input type="text" class="form-control" name="contact" placeholder="+1 584 458 485" id="phone1">
                </div>
                <div class="form-group">
                    <label for="email" style="color: black;">Secondary contact number:</label>
                    <input type="text" class="form-control" name="phone_2" placeholder="+1 584 458 485" id="phone2">
                </div>
                <div class="form-group">
                    <label for="email" style="color: black;">Secrete Question:</label>
                    <input type="text" class="form-control" name="secrete" placeholder="Secrete question" id="email">
                </div>
                <div class="form-group">
                    <label for="email" style="color: black;">Answer:</label>
                    <input type="text" class="form-control" name="answer" placeholder="Answer to secrete question" id="email">
                </div>
            </div>
            <hr>
            <div class="w-75 mx-auto">
                <button type="submit" class="btn appBtnColor w-100" name="update_userr">Add User</button>
            </div>
        </div>
    </form>
    <?php
    if(isset($_POST["update_userr"])){
        $name = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["pass"];
        $contact = $_POST["contact"];
        $contact_2 = $_POST["phone_2"];
        $company_name = $_POST["company_name"];
        $job_position = $_POST["job_position"];
        $secrete = $_POST["secrete"];
        $answer = $_POST["answer"];
        $sql = "INSERT INTO users (username, email, password, contact, phone_2, company_name, job_position, secrete, answer) VALUES 
                ('$name', '$email', '$password', '$contact', '$contact_2', '$company_name', '$job_position', '$secrete', '$answer')";
        if(mysqli_query($con, $sql)){
            js_redirect("users.php");
        }else{
            echo '
                        <script>alert("'.mysqli_error($con).'")</script>
                    ';
        }
    }
    ?>
</div>

<script>
    function del_device_function(id){
        console.log(id);
        document.getElementById("del_device_btn").href="user_dashboard.php?del_device_id="+id;
    }
</script>
<?php
if(isset($_GET['del_device_id'])){
    $id = (int) $_GET['del_device_id'];
    $row = "DELETE FROM user_and_devices WHERE id=$id";
//        echo '<script>alert('.$id.');</script>';
    if(mysqli_query($con, $row)){
        js_redirect('user_dashboard.php');
    }else{
        echo '<script>alert('.mysqli_error($con).');</script>';
    }
}

?>

<!-- Bootstrap core JavaScript -->
<?php require 'app/footer.include.php'; ?>


<!-- Delete device modal -->
<div class="modal fade" id="deleteDevice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Remove Device</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-dark">Please confirm if you want to delete this device?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a id="del_device_btn" href="here">
                    <button type="button" class="btn btn-primary">Delete</button>
                </a>
            </div>
        </div>
    </div>
</div>



</body>

</html>
