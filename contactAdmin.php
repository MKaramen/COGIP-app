<?php
require_once './app/config/.env.php';
require_once './vendor/autoload.php';
//header
require getenv('APP_ROOT') . '/app/views/inc/header.php';

$Name = $Firstname = $Email = $Phone = $companyType="";
$errName= $errFirstname = $errEmail = $errPhone = $errFirstname = "";

$Name = $_POST['Name'];
$Firstname = $_POST['Firstname'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$companyType = $_POST['companyType'];

if ($_SERVER['REQUEST_METHOD']=="POST"){

    if(empty(trim($_POST['Name']))){
     $errName = "- name is empty -";
    } else {
		    $Name = sanitizeNames($_POST['Name']);
		    if ($Name == FALSE){
		    	$errName = " Name is not valid";
		    }
	}
    if(empty(trim($_POST['Firstame']))){
        $errFirstname = "- Firstname is empty -";
       } else {
		    $Firstname = sanitizeNames($_POST['Firstname']);
		    if ($Firstname == FALSE){
		    	$errFirstname = " Firstname is not valid";
		    }
	}
    if(empty(trim($_POST['Email']))){
        $errEmail = "- Email is empty -";
    } else {
		$Email = sanitizeEmail($_POST['Email']);
		if ($Email == FALSE){
			$errEmail = " Email adress is not valid";
		}
	}
    if(empty(trim($_POST['Phone']))){
        $errPhone = "- phone is empty -";
    }

    if(empty(trim($_POST['companyType']))){
        $errcompanyType = "- Company is empty -";
    }
}
//FUNCTION
function sanitizeNames($field){
	$field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    
    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        return $field;
    } else{
        return FALSE;
    }
}
function sanitizeEmail($field){
    $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
    if(filter_var($field, FILTER_VALIDATE_EMAIL)){
        return $field;
    } else{
        return FALSE;
    }
}

$sql ="INSERT INTO people (poeple_fullName,people_email,people_phone,
people_company)
VALUES ('$Name','$Email','$Phone')";


?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COGIP | New Contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h1 class="text-center">Create New Contact</h1>
                <form class="mt-5 text-center" method="post" action="">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" class="form-control" id="Name" aria-describedby="NameHelp" placeholder="Enter your Name">
                        <span class='text-danger'><?php echo $errName?></span>
                    </div>
                    <div class="form-group">
                        <label for="Firstname">FirstName</label>
                        <input type="text" class="form-control" id="Firstname" aria-describedby="NameHelp" placeholder="Enter your Firstname">
                        <span class='text-danger'><?php echo $errFirstname?></span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="Phone" maxlenght="10" class="form-control" id="Phone" aria-describedby="phone" placeholder="Enter your phone number">
                        <span class='text-danger'><?php echo $errPhone?></span>
                    </div>
                    <div class="form-group">
                        <label for="Email" class="col-sm-2 col-form-label">Email</label>
                        <input type="email"  class="form-control" id="Email" aria-describedby="EmailHelp" placeholder="Enter your Email">
                        <span class='text-danger'><?php echo $errEmail?></span>
                    </div>
                    <div class="form-group">
                        <label for="companyType">Company type</label>
                        <select class="form-control" id="companyType">
                            <option disabled selected>Select your company</option>
                            <option value="supplier">Telenet</option>
                            <option value="client">Proximus</option>
                        </select>
                        <span class='text-danger'><?php echo $errcompanyType?></span>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Add new contact</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<!-- footer content -->
<?php require getenv('APP_ROOT') . '/app/views/inc/footer.php' ?>
</html> 