<?php
    require 'header.php';
    require 'headerUI.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php echo "Edit Schedule | ".$_SESSION['userRealName'] ?> </title>
	<link href="css/editSchedule-style.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	<link rel="stylesheet" href="css/datepickk.min.css">
	<script src="js/datepickk.min.js"></script>
</head>
<body onload="zoom()">
	<h1>Edit Schedule</h1>
	<script> 
		var datepicker = new Datepickk();
		datepicker.range = false;
		datepicker.maxSelections = 1;

		function markDate() {
			var getdate = datepicker.selectedDates;
			if(getdate == "") {
				alert("Please select date")
			}else{
				var selDate = new Date(getdate);
				var today = new Date();
				if(selDate <= today) {
					alert("You can't select past date!");
				}else{
					var dateStr = selDate.getFullYear() + "-" + (selDate.getMonth()+1) + "-" + selDate.getDate();
					window.location.href = "editSchedule-process.php?date=" + dateStr +"&state=0";
				}
			}
		}

		function unmarkDate() {
			var getdate = datepicker.selectedDates;
			if(getdate == "") {
				alert("Please select date")
			}else{
				var selDate = new Date(getdate);
				var today = new Date();
				if(selDate <= today) {
					alert("You can't select past date!");
				}else{
					var dateStr = selDate.getFullYear() + "-" + (selDate.getMonth()+1) + "-" + selDate.getDate();
					window.location.href = "editSchedule-process.php?date=" + dateStr +"&state=1";
				}
			}
		}
	</script>
	<?php
		$table = $_SESSION['userName'];
		$query = "SELECT * FROM $table";
		$result = mysqli_query($con, $query);
		while($row = mysqli_fetch_array($result)) {
			$var_date = $row['unwork_date'];
			echo "	<script>
						var highlight = {
							start: new Date('$var_date'),
							backgroundColor: '#ff0000',
							color: '#ffffff',
						};
						datepicker.highlight = [highlight];
					</script> ";
		}
	?>
	<script> datepicker.show() </script>
	<div class="control">
		<h2>Edit Your Unwork Date</h2>
        <h3>Select the date from calendar and mark the date that you busy or dont't want to work</h3>
        <ul>
            <li><button class="b1" onclick="markDate()">MARK</button></li>
            <br>
            <li><button class="b2" onclick="unmarkDate()">UNMARK</button></li>
		</ul>
		<h3>The Date which is booked by customer will be marked automatically</h3>
	</div>
</body>
</html>



		