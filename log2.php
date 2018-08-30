<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>For KKT - Search</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="calendar.js"></script>
<script>
window.onload=function() {
    document.getElementById("hidden_elements1").style.display="none";
    document.getElementById("hidden_elements2").style.display="none";
    document.getElementById("hidden_elements3").style.display="none";
    document.getElementById("hidden_elements4").style.display="none";
    //  attach the click event handler to the radio buttons
    var radios = document.forms[0].elements["element_3_search"];
    for (var i = [0]; i < radios.length; i++)
        radios[i].onclick=radioClicked;
}
</script>

<script>
function radioClicked() {
   if (this.value == "1") {
       document.getElementById("hidden_elements1").style.display="block";
       document.getElementById("hidden_elements2").style.display="none";
       document.getElementById("hidden_elements3").style.display="none";
       document.getElementById("hidden_elements4").style.display="none";
       }
   if (this.value == "2") {
       document.getElementById("hidden_elements1").style.display="none";
       document.getElementById("hidden_elements2").style.display="block";
       document.getElementById("hidden_elements3").style.display="none";
       document.getElementById("hidden_elements4").style.display="none";
       }
   if (this.value == "3") {
       document.getElementById("hidden_elements1").style.display="none";
       document.getElementById("hidden_elements2").style.display="none";
       document.getElementById("hidden_elements3").style.display="block";
       document.getElementById("hidden_elements4").style.display="none";
       }
if (this.value == "4") {
       document.getElementById("hidden_elements1").style.display="none";
       document.getElementById("hidden_elements2").style.display="none";
       document.getElementById("hidden_elements3").style.display="none";
       document.getElementById("hidden_elements4").style.display="block";

       }
}
    </script>
</head>
<body id="main_body" >

	<div id="form_container">

		<h1><a>For KKT - Search</a></h1>
		<form id="form_21818" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>For KKT - Search</h2>
		</div>
 <BR />
 <table>
  <tr>
	<td><input id="element_3_search1" name="element_3_search" class="element radio" type="radio" value="1" /><label class="choice" >Date   ?</label></td>
	<td><input id="element_3_search2" name="element_3_search" class="element radio" type="radio" value="2" /><label class="choice" >KKT ID ?</label></td>
	<td><input id="element_3_search3" name="element_3_search" class="element radio" type="radio" value="3" /><label class="choice" >Mobile ?</label></td>
   	<td><input id="element_3_search3" name="element_3_search" class="element radio" type="radio" value="4" /><label class="choice" >Job    ?</label></td>
  </tr>
 </table>
 	<ul >
<div id="hidden_elements1">
					<li id="li_1">
		<label class="description" for="element_1">From Date </label>
		<span>
			<input id="element_1_1" name="element_1_1" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_1_1">DD</label>
		</span>
		<span>
			<input id="element_1_2" name="element_1_2" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_1_2">MM</label>
		</span>
		<span>
	 		<input id="element_1_3" name="element_1_3" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="element_1_3">YYYY</label>
		</span>

		<span id="calendar_1">
			<img id="cal_img_1" class="datepicker" src="calendar.gif" alt="Pick a date.">
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_1_3",
			baseField    : "element_1",
			displayArea  : "calendar_1",
			button		 : "cal_img_1",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectEuropeDate
			});
		</script>

		</li>		<li id="li_2" >
		<label class="description" for="element_2">To Date </label>
		<span>
			<input id="element_2_1" name="element_2_1" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_2_1">DD</label>
		</span>
		<span>
			<input id="element_2_2" name="element_2_2" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_2_2">MM</label>
		</span>
		<span>
	 		<input id="element_2_3" name="element_2_3" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="element_2_3">YYYY</label>
		</span>
	
		<span id="calendar_2">
			<img id="cal_img_2" class="datepicker" src="calendar.gif" alt="Pick a date.">
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_2_3",
			baseField    : "element_2",
			displayArea  : "calendar_2",
			button		 : "cal_img_2",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectEuropeDate
			});
		</script>

		</li>
</div>
<div id="hidden_elements2">
        	<li id="li_4" >
		<label class="description" for="element_4">Search by KKT ID : </label>
		<div>
			<input id="element_4" name="element_4" class="element text medium" type="text" maxlength="20" value="KKT-"  style="text-transform:uppercase"/>
		</div>
		</li>

</div>
<div id="hidden_elements3">
       		<li id="li_5" >
		<label class="description" for="element_5">Search by Mobile Number : </label>
		<div>
			<input id="element_5" name="element_5" class="element number medium" type="number" maxlength="10" value=""/>
		</div>
		</li>

</div>
<div id="hidden_elements4">
        		<li id="li_3" >
		<label class="description" for="element_3">Search For : </label>
		<span>
			<input id="element_3_1" name="element_3" class="element radio" type="radio" value="1" />
<label class="choice" for="element_3_1">A. सिलाई</label>
<input id="element_3_2" name="element_3" class="element radio" type="radio" value="2" />
<label class="choice" for="element_3_2">B. कड़ाई</label>
<input id="element_3_3" name="element_3" class="element radio" type="radio" value="3" />
<label class="choice" for="element_3_3">C. बुनाई</label>
<input id="element_3_4" name="element_3" class="element radio" type="radio" value="4" />
<label class="choice" for="element_3_4">D. सिलाई मास्टर</label>
<input id="element_3_5" name="element_3" class="element radio" type="radio" value="5" />
<label class="choice" for="element_3_5">E. मशीन मास्टर</label>
<input id="element_3_6" name="element_3" class="element radio" type="radio" value="6" />
<label class="choice" for="element_3_6">F. कटिंग मास्टर</label>
<input id="element_3_7" name="element_3" class="element radio" type="radio" value="7" />
<label class="choice" for="element_3_7">G. पेट्रनमास्टर</label>
<input id="element_3_8" name="element_3" class="element radio" type="radio" value="8" />
<label class="choice" for="element_3_8">H. लाइन मास्टर</label>
<input id="element_3_9" name="element_3" class="element radio" type="radio" value="9" />
<label class="choice" for="element_3_9">I. सिंगर मास्टर</label>
<input id="element_3_10" name="element_3" class="element radio" type="radio" value="10" />
<label class="choice" for="element_3_10">J. ओवर लॉक मास्टर</label>
<input id="element_3_11" name="element_3" class="element radio" type="radio" value="11" />
<label class="choice" for="element_3_11">K. डेनिम वाशिंग मास्टर</label>
<input id="element_3_12" name="element_3" class="element radio" type="radio" value="12" />
<label class="choice" for="element_3_12">L. लेयरमैन</label>
<input id="element_3_13" name="element_3" class="element radio" type="radio" value="13" />
<label class="choice" for="element_3_13">M. ट्रेड कट्टर</label>
<input id="element_3_14" name="element_3" class="element radio" type="radio" value="14" />
<label class="choice" for="element_3_14">N. चेकर</label>
<input id="element_3_15" name="element_3" class="element radio" type="radio" value="15" />
<label class="choice" for="element_3_15">O. पैकिंग मैन</label>
<input id="element_3_16" name="element_3" class="element radio" type="radio" value="16" />
<label class="choice" for="element_3_16">P. गारमेंट हेल्पर</label>
<input id="element_3_17" name="element_3" class="element radio" type="radio" value="17" />
<label class="choice" for="element_3_17">Q. फ्लैट मैन</label>
		</span>
		</li>
</div>
					<li class="buttons">
			    <input type="hidden" name="form_id" value="21818" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Search" />
		</li>
			</ul>
		</form>	

	</div>
	</body>
</html>