<?php
session_set_cookie_params(2592000);
session_start();

$Diseases = array ('Malaria','Arthritis','Asthma','Diabetes', 'Hearing Loss');

?>
<!-- html code for UI -->
<html>
		<head>
			<title>E-Doctor</title>
		</head>
	<body>
		<h1>E-Doctor</h1>
			<p> Welcome to E-doctor! </p>
			<p>Click the button below to run diagnostics </p>

	<form method="post" action="system.php">
		<input type='submit' name='start' value='Begin Diagnostics' />
		<input type='submit' name='refresh' value='Clear' />
	</form>

<?php
	//If form is not submitted, display form.
	if (!isset($_POST['start'])){
			
		} //If form is submitted, process input
	else{ //Question 1
			echo "<p>Do you feel weak and/or have high body temperature?</p>"; //qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq
			echo "<form method='post' action='system.php'>
						<input type='submit' name='yes1' value='Yes' />
						<input type='submit' name='no1' value='No' />
						</form>";


//------------------------------------------------------- Q1 -------------------------------------------------------------------

	}			
	if (isset($_POST['yes1'])){ //I am feeling weak 
		$malaria = 3;
		$Asthma = 1;
		$Diabetes = 2;
		echo "<p>Are you feeling any chest pains?</p>"; //qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq
					echo "<form method='post' action='system.php'>
							<input type='submit' name='yes2' value='Yes' />
							<input type='submit' name='no2' value='No' />
							</form>";
	}elseif (isset($_POST['no1'])) { // i am not feeling weak
		$malaria = 0;
		$Asthma = 0;
		$Diabetes = 0;
		echo "<p>Are you feeling any chest pains?</p>"; //qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq
					echo "<form method='post' action='system.php'>
							<input type='submit' name='yes3' value='Yes' />
							<input type='submit' name='no3' value='No' />
							</form>";
	}
	

	//----------------------------------------------------- L1 ---------------------------------------------------------



	if (isset($_POST['yes2'])){ // I am feeling weak && i have chest pain 
		$malaria = 3+2;
		$Asthma = 1+3;
		$Diabetes = 2+1;
		echo "<p>Do you feel shortness of breath?</p>"; //qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq
					echo "<form method='post' action='system.php'>
							<input type='submit' name='yes4' value='Yes' />
							<input type='submit' name='no4' value='No' />
							</form>";
	}elseif (isset($_POST['no2'])) { // i am feeling weak !! i dont have chest pain
		$malaria = 3;
		$Asthma = 1;
		$Diabetes = 2;
		echo "<p>Do you feel shortness of breath?</p>"; //qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq
					echo "<form method='post' action='system.php'>
							<input type='submit' name='yes5' value='Yes' />
							<input type='submit' name='no5' value='No' />
							</form>";
	}
	if (isset($_POST['yes3'])){ // i am not feeling weak but i have chest pain
		$malaria = 2;
		$Asthma = 3;
		$Diabetes = 1;
		echo "<p>Do you feel shortness of breath?</p>"; //qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq
					echo "<form method='post' action='system.php'>
							<input type='submit' name='yes6' value='Yes' />
							<input type='submit' name='no6' value='No' />
							</form>";
	}elseif (isset($_POST['no3'])) { // i am not feeling weak !! i dont have chest pain
		$malaria = 0;
		$Asthma = 0;
		$Diabetes = 0;
		echo "<p>Do you feel shortness of breath?</p>"; //qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq
					echo "<form method='post' action='system.php'>
							<input type='submit' name='yes7' value='Yes' />
							<input type='submit' name='no7' value='No' />
							</form>";
	}


//------------------------------------------------------- L2 -------------------------------------------------------------------


	if (isset($_POST['yes4'])){ // I am feeling weak && i have chest pain && i cant breathe well
		$malaria = 3+3;
		$Asthma = 1+7;
		$Diabetes = 2+2;
		$y4 = max($malaria, $Asthma, $Diabetes);
			
			if ($y4 == $malaria || $y4 == $Asthma) {
				echo "You seem to be showing symptoms of Asthma, You should also get tested for malaria"; 
				}elseif ($y4 == $Diabetes) {
				echo "You should get tested for Diabetes";
				}else{
				echo "no entry";
				}
			
	}elseif (isset($_POST['no4'])) { // I am feeling weak && i have chest pain !! i can breathe well
		$malaria = 3+2;
		$Asthma = 1+3;
		$Diabetes = 2+1;
		$n4 = max($malaria, $Asthma, $Diabetes);
			
			if ($n4 == $malaria || $n4 == $Asthma) {
				echo "You should get tested for Asthma. Since your'e feeling weak, test for malaria as a precaution"; 
			}elseif ($n4 == $Diabetes) {
				echo "You should get tested for Diabetes";
			}else{
				echo "no entry";
			}
	}
	if (isset($_POST['yes5'])){ // I am feeling weak !! i dont have chest pain && i cant breathe well tho
		$malaria = 3+1;
		$Asthma = 1+4;
		$Diabetes = 2+1;
		$y5 = max($malaria, $Asthma, $Diabetes);
			
			if ($y5 == $malaria) {
				echo "You should get tested for malaria"; 
			}elseif ($y5 == $Asthma) {
				echo "You should get tested for Asthma";
			}elseif ($y5 == $Diabetes) {
				echo "You should get tested for Diabetes";
			}else{
				echo "no entry";
			}
		
	}elseif (isset($_POST['no5'])) { // I am feeling weak !! i dont have chest pain !! i can breathe well
		$malaria = 3;
		$Asthma = 1;
		$Diabetes = 2;
		$n5 = max($malaria, $Asthma, $Diabetes);
			
			if ($n5 == $malaria) {
				echo "You should get tested for malaria as a precaution"; 
			}elseif ($n5 == $Asthma) {
				echo "You should get tested for Asthma as a precaution";
			}elseif ($n5 == $Diabetes) {
				echo "You should get tested for Diabetes as a precaution";
			}else{
				echo "no entry";
			}
	}
	if (isset($_POST['yes6'])){ // I am not feeling weak && i have chest pain && i cant breathe well tho
		$malaria = 1+1;
		$Asthma = 3+4;
		$Diabetes = 1+1;
		$y6 = max($malaria, $Asthma, $Diabetes);
			
			if ($y6 == $malaria) {
				echo "You should get tested for malaria"; 
			}elseif ($y6 == $Asthma) {
				echo "Your chest pain and inability to breathe are signs that You should get tested for Asthma";
			}elseif ($y6 == $Diabetes) {
				echo "You should get tested for Diabetes";
			}else{
				echo "no entry";
			}
		
	}elseif (isset($_POST['no6'])) { // I am not feeling weak && i have chest pain !! i can breathe well
		$malaria = 1;
		$Asthma = 3;
		$Diabetes = 1;
		$n6 = max($malaria, $Asthma, $Diabetes);
			
			if ($n6 == $malaria) {
				echo "You should get tested for malaria"; 
			}elseif ($n6 == $Asthma) {
				echo "It could very likely be an early symptom of Asthma. You should get tested";
			}elseif ($n6 == $Diabetes) {
				echo "You should get tested for Diabetes";
			}else{
				echo "no entry";
			}
	}
	if (isset($_POST['yes7'])){ // I am not feeling weak !! i dont have chest pain && i cant breathe well tho
		$malaria = 1;
		$Asthma = 4;
		$Diabetes = 1;
		$y7 = max($malaria, $Asthma, $Diabetes);
			
			if ($y7 == $malaria) {
				echo "You should get tested for malaria"; 
			}elseif ($y7 == $Asthma) {
				echo "It could very likely be an early symptom of Asthma. You should get tested";
			}elseif ($y7 == $Diabetes) {
				echo "You should get tested for Diabetes";
			}else{
				echo "no entry";
			}
		
	}elseif (isset($_POST['no7'])) { // I am not feeling weak !! i dont have chest pain !! i can breathe well
		$malaria = 0;
		$Asthma = 0;
		$Diabetes = 0;
		$n7 = max($malaria, $Asthma, $Diabetes);
			
				echo "Youre Healthy Then";
		
	}

//------------------------------------------------------------- L3 -------------------------------------------------------------
if(isset($_POST['refresh'])){

	echo "<meta http-equiv='refresh' content='0'>";
}

?>