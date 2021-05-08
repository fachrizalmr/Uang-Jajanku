<?php
 require_once("auth.php");
 require_once("config.php");
 error_reporting(0);
 $sql_select ="SELECT * FROM users WHERE id= ?";
 $stmt =$db->prepare($sql_select);
 $stmt->bindParam(1, $_REQUEST['id']);
 $stmt->execute();
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
 $id=$row['id'];

$name=$_FILES["simpan"]["name"];
$tmp=$_FILES["simpan"]["tmp_name"];
$folder= "img/upload/". $name;
move_uploaded_file($tmp,$folder);

 if(isset($_POST["simpan"]) && !empty($_FILES["simpan"]["name"])){
            $insert = $db->query("UPDATE upload SET  name='$name', tmp=NOW() WHERE id=$id");
            if($insert){
                $statusMsg = "The file ".$name. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            }
        }

// Display status message
$sql_select ="SELECT * FROM upload WHERE id= ?";
					 $stmt =$db->prepare($sql_select);
					 $stmt->bindParam(1, $_REQUEST['id']);
					 $stmt->execute();
					 $row = $stmt->fetch(PDO::FETCH_ASSOC);
					 $id=$row['id'];
					$tmp=$row['tmp'];
					$name=$row['name'];

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Foto</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="tabel/css/main.css">
    <style>
    .wrapper{
      display: flex;
      flex-flow: row wrap;
      justify-content: space-around;
    }

    /* gives btn width and height */


    /**  colors and transitions back to normal
      *  hex colors from flatuicolors.com
      **/


      .btn-4 {
          background: #4f476c; /* BELIZE HOLE */
          -webkit-transition: background 225ms ease!important;
          -moz-transition: background 225ms ease!important;
          transition: background 225ms ease!important;
      }

      .btn-4:before, .btn-4:focus, .btn-4:hover {
          background: #36304a ; /* peter river */
          color: white;
      }

    /* base btn styling */
    .btn-base {
        font-family: Montserrat-Regular, sans-serif;
        font-size: 17px;

        position: relative;
        transition: all 225ms ease;
        border: none;
        border-radius: 5px;
        overflow: hidden;
        color: #fff;
        text-align: center;
        line-height: 45px;
    }

    /* places copy on top */
    .btn-cta span {
        z-index: 8;
        position: relative;
    }

    /** definition and placement of
      * starting size before element */

    .btn-cta:before {
        content: "";
        display: block;
        width: 96%;
        height: 75%;
        border-radius: 4px;
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transition: all 400ms cubic-bezier(.32,1.25,.1,1.47);
        -moz-transition: all 400ms cubic-bezier(.32,1.25,.1,1.47);
        transition: all 400ms cubic-bezier(.32,1.25,.1,1.47);
        -webkit-transform: translate(-50%,-50%);
        -moz-transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
        transform: translate(-50%,-50%);
    }

    /* grow to sizing for before element */
    .btn-cta:focus:before, .btn-cta:hover:before {
        height: 105%;
        width: 105%;
    }
  </style>
  <link rel="icon" href="index/img/sad.png" type="image/png">
</head>
	<body class="container-table100">

		<div class="container mt-5">
			<div class="row">
				<div class="col-md-6">
					<p>&larr; <a href="timeline.php" style="color:white;">Back</a>
					<h4>Upload Foto Anda</h4>
          <?php echo $statusMsg; ?>
					<img class="img img-responsive img-fluid img-thumbnail mb-3" width="450" src="img/upload/<?php echo $name?>"/>
						<form action="" method="POST" enctype="multipart/form-data">
							<div class="input-group mb-3">
								  <div class="custom-file">
									<input type="file" id="simpan" name="simpan" class="custom-file-input"/>
									<label class="custom-file-label" for="simpan">Choose file</label>
								  </div>
							<div class="input-group-append">
							<button type="submit" id="submit" name="simpan" class="btn btn-4 btn-block" style="color:white;">Upload</button>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
</body>
</html>
