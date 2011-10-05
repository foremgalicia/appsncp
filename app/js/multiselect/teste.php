<?php
if(isset($_POST['countries']))
{
	$countries = $_POST['countries'];
	print_r($countries);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
	<title>TESTE jQuery UI Multiselect</title> 

	<!--	
	<link rel="stylesheet" href="css/common.css" type="text/css" />
	-->

	<link type="text/css" rel="stylesheet" href="../jquery-ui-1.8.16.custom/css/redmond/jquery-ui-1.8.16.custom.css" />
	<link type="text/css" href="css/ui.multiselect.css" rel="stylesheet" />

	<script type="text/javascript" src="../jquery-ui-1.8.16.custom/js/jquery-1.6.2.min.js"></script>
	<script type="text/javascript" src="../jquery-ui-1.8.16.custom/js/jquery-ui-1.8.16.custom.min.js"></script>

	<script type="text/javascript" src="js/plugins/localisation/jquery.localisation-min.js"></script>
	<script type="text/javascript" src="js/plugins/scrollTo/jquery.scrollTo-min.js"></script>
	<script type="text/javascript" src="js/ui.multiselect.js"></script>
	<script type="text/javascript">
		$(function(){
			$.localise('ui-multiselect', {language: 'es', path: 'js/locale/'});
			$(".multiselect").multiselect();
		});
	</script>
</head>
<body>
    <form action="teste.php" method="post">
      <select id="countries" class="multiselect" multiple="multiple" name="countries[]" style="width: 600px;">
        <option value="AFG">Afghanistan Afghanistan Afghanistan Afghanistan Afghanistan Afghanistan</option>
        <option value="ALB">Albania</option>
        <option value="DZA">Algeria</option>
        <option value="AND">Andorra</option>
        <option value="ARG">Argentina</option>
        <option value="ARM">Armenia</option>
        <option value="ABW">Aruba</option>
        <option value="AUS">Australia</option>
        <option value="AUT" selected="selected">Austria</option>

        <option value="AZE">Azerbaijan</option>
        <option value="BGD">Bangladesh</option>
        <option value="BLR">Belarus</option>
        <option value="BEL">Belgium</option>
        <option value="BIH">Bosnia and Herzegovina</option>
        <option value="BRA">Brazil</option>
        <option value="BRN">Brunei</option>
        <option value="BGR">Bulgaria</option>
        <option value="CAN">Canada</option>

        <option value="CHN">China</option>
        <option value="COL">Colombia</option>
        <option value="HRV">Croatia</option>
        <option value="CYP">Cyprus</option>
        <option value="CZE">Czech Republic</option>
        <option value="DNK">Denmark</option>
        <option value="EGY">Egypt</option>
        <option value="EST">Estonia</option>
        <option value="FIN">Finland</option>

        <option value="FRA">France</option>
        <option value="GEO">Georgia</option>
        <option value="DEU" selected="selected">Germany</option>
        <option value="GRC">Greece</option>
        <option value="HKG">Hong Kong</option>
        <option value="HUN">Hungary</option>
        <option value="ISL">Iceland</option>
        <option value="IND">India</option>
        <option value="IDN">Indonesia</option>

        <option value="IRN">Iran</option>
        <option value="IRL">Ireland</option>
        <option value="ISR">Israel</option>
        <option value="ITA">Italy</option>
        <option value="JPN">Japan</option>
        <option value="JOR">Jordan</option>
        <option value="KAZ">Kazakhstan</option>
        <option value="KWT">Kuwait</option>
        <option value="KGZ">Kyrgyzstan</option>

        <option value="LVA">Latvia</option>
        <option value="LBN">Lebanon</option>
        <option value="LIE">Liechtenstein</option>
        <option value="LTU">Lithuania</option>
        <option value="LUX">Luxembourg</option>
        <option value="MAC">Macau</option>
        <option value="MKD">Macedonia</option>
        <option value="MYS">Malaysia</option>
        <option value="MLT">Malta</option>

        <option value="MEX">Mexico</option>
        <option value="MDA">Moldova</option>
        <option value="MNG">Mongolia</option>
        <option value="NLD" selected="selected">Netherlands</option>
        <option value="NZL">New Zealand</option>
        <option value="NGA">Nigeria</option>
        <option value="NOR">Norway</option>
        <option value="PER">Peru</option>
        <option value="PHL">Philippines</option>

        <option value="POL">Poland</option>
        <option value="PRT">Portugal</option>
        <option value="QAT">Qatar</option>
        <option value="ROU">Romania</option>
        <option value="RUS">Russia</option>
        <option value="SMR">San Marino</option>
        <option value="SAU">Saudi Arabia</option>
        <option value="CSG">Serbia and Montenegro</option>
        <option value="SGP">Singapore</option>

        <option value="SVK">Slovakia</option>
        <option value="SVN">Slovenia</option>
        <option value="ZAF">South Africa</option>
        <option value="KOR">South Korea</option>
        <option value="ESP">Spain</option>
        <option value="LKA">Sri Lanka</option>
        <option value="SWE">Sweden</option>
        <option value="CHE">Switzerland</option>
        <option value="SYR">Syria</option>

        <option value="TWN">Taiwan</option>
        <option value="TJK">Tajikistan</option>
        <option value="THA">Thailand</option>
        <option value="TUR">Turkey</option>
        <option value="TKM">Turkmenistan</option>
        <option value="UKR">Ukraine</option>
        <option value="ARE">United Arab Emirates</option>
        <option value="GBR">United Kingdom</option>
        <option value="USA" selected="selected">United States</option>

        <option value="UZB">Uzbekistan</option>
        <option value="VAT">Vatican City</option>
        <option value="VNM">Vietnam</option>
      </select>
      <br/>
      <input type="submit" value="Submit Form"/>
    </form>
</body> 
</html>
