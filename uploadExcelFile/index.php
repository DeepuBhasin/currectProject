<!DOCTYPE html>
<html>
<head>
	<title>WaveLinx Upload File</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#0083C4;">

<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="#">WaveLinx Upload File</a>
		</div>
	</div>
</nav>

<div class="container">

<?php
	if(isset($_POST['send']))
	{

	if($_FILES["csv_file"]["size"]<=0)
		{?>
			<div class="col-md-8 col-lg-offset-2">
				<div class="alert alert-danger msg">
					Please Fill Out All Mandontary Fields. 
					<script type="text/javascript">
						setTimeout(function(){$('.msg').hide();},3000);
					</script>
				</div>
			</div>
		<?php
		}
		else
		{

			if(isset($_POST['send']))
			{
				$dir = "textfile/";
				$b = scandir($dir,1);
				
				$count=count($b)-2;

				for($x=0;$x<$count;$x++)
				{

					if(!empty($b[$x]))
					{
						unlink('textfile/'.$b[$x]);
					}	
				}

				$RandomAccountNumber = uniqid();
				$upload=$RandomAccountNumber.($_FILES['csv_file']['name']);
				$source=$_FILES['csv_file']['tmp_name'];
				$target='textfile/'.$upload;
				move_uploaded_file($source,$target);

				$dir = "textfile/";
				$b = scandir($dir,1);

				$count=count($b)-2;

				for($x=0;$x<$count;$x++)
				{

					$file_name=$b[$x];	
				}
				ini_set('max_execution_time', '0'); // for infinite time of execution 

				require('__db.php');
				$starting = microtime(true);

				$query = "TRUNCATE api_table;";
				mysqli_query($con, $query);

				include 'excel_reader.php';     // include the class

				$excel = new PhpExcelReader;
				$excel->read("textfile/$file_name");

				function sheetData($sheet) {
				  $x = 1;
				  while($x <= $sheet['numRows']) {
				    $y = 1;
				    while($y <= $sheet['numCols']) {
				      $cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
				      $y++;
				    }  
				    $x++;
				  }

				  return $re;   // ends and returns the html table
				}

				
				$c=0;
				// print_r($excel->sheets[0]['cells']);
				for($i=1;$i<=count($excel->sheets[0]['cells']);$i++)
				{
					$data=[
						isset($excel->sheets[0]['cells'][$i][1]) ? addslashes($excel->sheets[0]['cells'][$i][1]) : '-',
						isset($excel->sheets[0]['cells'][$i][2]) ? addslashes($excel->sheets[0]['cells'][$i][2]) : '-',
						isset($excel->sheets[0]['cells'][$i][3]) ? addslashes($excel->sheets[0]['cells'][$i][3]) : '-',
						isset($excel->sheets[0]['cells'][$i][4]) ? addslashes($excel->sheets[0]['cells'][$i][4]) : '-',
						isset($excel->sheets[0]['cells'][$i][5]) ? addslashes($excel->sheets[0]['cells'][$i][5]) : '-',
						isset($excel->sheets[0]['cells'][$i][6]) ? addslashes($excel->sheets[0]['cells'][$i][6]) : '-',
						isset($excel->sheets[0]['cells'][$i][7]) ? addslashes($excel->sheets[0]['cells'][$i][7]) : '-',
						isset($excel->sheets[0]['cells'][$i][8]) ? addslashes($excel->sheets[0]['cells'][$i][8]) : '-',
						isset($excel->sheets[0]['cells'][$i][9]) ? addslashes($excel->sheets[0]['cells'][$i][9]) : '-',
						isset($excel->sheets[0]['cells'][$i][10]) ? addslashes($excel->sheets[0]['cells'][$i][10]) : '-',
						isset($excel->sheets[0]['cells'][$i][11]) ? addslashes($excel->sheets[0]['cells'][$i][11]) : '-',
						isset($excel->sheets[0]['cells'][$i][12]) ? addslashes($excel->sheets[0]['cells'][$i][12]) : '-',
						isset($excel->sheets[0]['cells'][$i][13]) ? addslashes($excel->sheets[0]['cells'][$i][13]) : '-',
						isset($excel->sheets[0]['cells'][$i][14]) ? addslashes($excel->sheets[0]['cells'][$i][14]) : '-',
						isset($excel->sheets[0]['cells'][$i][15]) ? addslashes($excel->sheets[0]['cells'][$i][15]) : '-',
						isset($excel->sheets[0]['cells'][$i][16]) ? addslashes($excel->sheets[0]['cells'][$i][16]) : '-',
						isset($excel->sheets[0]['cells'][$i][17]) ? addslashes($excel->sheets[0]['cells'][$i][17]) : '-',
						isset($excel->sheets[0]['cells'][$i][18]) ? addslashes($excel->sheets[0]['cells'][$i][18]) : '-',
						isset($excel->sheets[0]['cells'][$i][19]) ? addslashes($excel->sheets[0]['cells'][$i][19]) : '-',
						isset($excel->sheets[0]['cells'][$i][20]) ? addslashes($excel->sheets[0]['cells'][$i][20]) : '-',
						isset($excel->sheets[0]['cells'][$i][21]) ? addslashes($excel->sheets[0]['cells'][$i][21]) : '-',
						isset($excel->sheets[0]['cells'][$i][22]) ? addslashes($excel->sheets[0]['cells'][$i][22]) : '-',
						isset($excel->sheets[0]['cells'][$i][23]) ? addslashes($excel->sheets[0]['cells'][$i][23]) : '-',
						isset($excel->sheets[0]['cells'][$i][24]) ? addslashes($excel->sheets[0]['cells'][$i][24]) : '-',
						isset($excel->sheets[0]['cells'][$i][25]) ? addslashes($excel->sheets[0]['cells'][$i][25]) : '-',
						isset($excel->sheets[0]['cells'][$i][26]) ? addslashes($excel->sheets[0]['cells'][$i][26]) : '-',
						isset($excel->sheets[0]['cells'][$i][27]) ? addslashes($excel->sheets[0]['cells'][$i][27]) : '-',
						isset($excel->sheets[0]['cells'][$i][28]) ? addslashes($excel->sheets[0]['cells'][$i][28]) : '-',
						isset($excel->sheets[0]['cells'][$i][29]) ? addslashes($excel->sheets[0]['cells'][$i][29]) : '-',
						isset($excel->sheets[0]['cells'][$i][30]) ? addslashes($excel->sheets[0]['cells'][$i][30]) : '-',
						isset($excel->sheets[0]['cells'][$i][31]) ? addslashes($excel->sheets[0]['cells'][$i][31]) : '-',
						isset($excel->sheets[0]['cells'][$i][32]) ? addslashes($excel->sheets[0]['cells'][$i][32]) : '-',
						isset($excel->sheets[0]['cells'][$i][33]) ? addslashes($excel->sheets[0]['cells'][$i][33]) : '-',
						isset($excel->sheets[0]['cells'][$i][34]) ? addslashes($excel->sheets[0]['cells'][$i][34]) : '-',
						isset($excel->sheets[0]['cells'][$i][35]) ? addslashes($excel->sheets[0]['cells'][$i][35]) : '-',
						isset($excel->sheets[0]['cells'][$i][36]) ? addslashes($excel->sheets[0]['cells'][$i][36]) : '-',
						isset($excel->sheets[0]['cells'][$i][37]) ? addslashes($excel->sheets[0]['cells'][$i][37]) : '-',
						isset($excel->sheets[0]['cells'][$i][38]) ? addslashes($excel->sheets[0]['cells'][$i][38]) : '-',
						isset($excel->sheets[0]['cells'][$i][39]) ? addslashes($excel->sheets[0]['cells'][$i][39]) : '-',
						isset($excel->sheets[0]['cells'][$i][40]) ? addslashes($excel->sheets[0]['cells'][$i][40]) : '-',
						isset($excel->sheets[0]['cells'][$i][41]) ? addslashes($excel->sheets[0]['cells'][$i][41]) : '-',
						isset($excel->sheets[0]['cells'][$i][42]) ? addslashes($excel->sheets[0]['cells'][$i][42]) : '-'
					];
					
					
					$sql = "INSERT into  api_table values(null,null,'{$data[0]}','{$data[1]}','{$data[2]}','{$data[3]}','{$data[4]}','{$data[5]}','{$data[6]}','{$data[7]}','{$data[8]}','{$data[9]}','{$data[10]}','{$data[11]}','{$data[12]}','{$data[13]}','{$data[14]}','{$data[15]}','{$data[16]}','{$data[17]}','{$data[18]}','{$data[19]}','{$data[20]}','{$data[21]}','{$data[22]}','{$data[23]}','{$data[24]}','{$data[25]}','{$data[26]}','{$data[27]}','{$data[28]}','{$data[29]}','{$data[30]}','{$data[31]}','{$data[32]}','{$data[33]}','{$data[34]}','{$data[35]}','{$data[36]}','{$data[37]}','{$data[38]}','{$data[39]}','{$data[40]}','{$data[41]}');";
					$check = mysqli_query($con, $sql);
					if ($check) {
						$success = true;
						$c++;
					}
					if (!$check) {
						$success = false;
					}
					if($c==3000){
						break;
					}
				}
			}
			
		}
		
		if ($success) {
			?>
			<div class="alert alert-success text-center">
			<?php echo "SUCCESS: $c Record Added Successfully <br/> Program Take Time for Completion : " . ((microtime(true) - $starting) / 60) . ' minutes';?>	
			</div>	

			
		<?php
		} else {
			echo mysqli_error($con);
		}


	}


	

?>

	<div class="col-md-8 col-md-offset-2">
		<form action="<?= $_SERVER['PHP_SELF'];?>" method="post" autocomplete="off" enctype="multipart/form-data" id="testing">
		    <div class="form-group">
		   		 <label for="csv_file" class="control-label" style="color: #fff;">EXCEL File*</label>
				 <input type="file" name="csv_file" required="required" accept=".xls">
		    </div>
			<div class="form-group">
		   		<button type="submit" name="send" class="btn btn-success" name="submit">SEND</button>
		   		<button type="reset" class="btn btn-primary">CLEAR</button>
		    </div>
		</form>
	</div>
</div>	
</body>
</html>