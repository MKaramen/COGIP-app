<?php
require_once './app/config/.env.php';
require_once './vendor/autoload.php';
//header
require getenv('APP_ROOT') . '/app/views/inc/header.php';

$fullName = $name = $firstName = $email = $phone = $companyType= $acces ="";
$errName= $errFirstname = $errEmail = $errPhone = $errFirstname = $errcompany = $erracces = "";

$name = $_POST['people_name'];
$firstName = $_POST['people_firstName'];
$email = $_POST['people_email'];
$phone = $_POST['people_phone'];
$company = $_POST['people_company'];
$fullName= $firstName . " " . $name;
$_POST["people_password"] = $name;
$_POST["people_fullName"] = $fullName;
$acces = $_POST['people_acces'];

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
function sanitizePhone($field){
    $field= filter_var(trim($field), FILTER_SANITIZE_NUMBER_INT);

    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'#^[0-9]{10}$#')))){
        return $field;
    } else{
        return FALSE;
    }
}

if (isset($_POST["submit"])){

    if(empty(trim($_POST['people_name']))){
     $errName = "- name is empty -";
    } else {
		    $name = sanitizeNames($_POST['people_name']);
		    if ($name == FALSE){
		    	$errName = " Name is not valid";
		    }
	}
    if(empty(trim($_POST['people_firstName']))){
        $errFirstname = "- Firstname is empty -";
       } else {
		    $firstName = sanitizeNames($_POST['people_firstName']);
		    if ($firstName == FALSE){
		    	$errFirstname = " Firstname is not valid";
		    }
	}
    if(empty(trim($_POST['people_email']))){
        $errEmail = "- Email is empty -";
    } else {
		$email = sanitizeEmail($_POST['people_email']);
		if ($email == FALSE){
			$errEmail = " Email adress is not valid";
		}
	}
    if(empty(trim($_POST['people_phone']))){
        $errPhone = "- phone number is empty -";
    } else {
        $phone = sanitizePhone($_POST['people_phone']);
        if ($phone == FALSE){
            $errPhone = "- phone number is not valid -";
        }
    }

    if(empty(trim($_POST['people_company']))){
        $errcompany = "- Company is not choose -";
    }
}


// $sql ="INSERT INTO people (people_fullName,people_email,people_phone,
// people_company)
// VALUES ('$name','$email','$phone')";
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
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="people_name" aria-describedby="NameHelp" placeholder="Enter your Name">
                        <span class='text-danger'><?php echo $errName?></span>
                    </div>
                    <div class="form-group">
                        <label for="firstname">FirstName</label>
                        <input type="text" class="form-control" id="firstName" name="people_firstName" aria-describedby="NameHelp" placeholder="Enter your Firstname">
                        <span class='text-danger'><?php echo $errFirstname?></span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="people_phone" minlength="10" maxlength="10" class="form-control" id="phone" aria-describedby="phone" placeholder="Enter your phone number">
                        <span class='text-danger'><?php echo $errPhone?></span>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <input type="email"  class="form-control" name="people_email" id="email" aria-describedby="EmailHelp" placeholder="Enter your Email">
                        <span class='text-danger'><?php echo $errEmail?></span>
                    </div>
                    <div class="form-group">
                        <label for="people_company">Company</label>
                        <select class="form-control" id="people_company" name="people_company">
                            <option disabled selected>Select your company</option>
                            <option value="Telenet">Telenet</option>
                            <option value="Proximus">Proximus</option>
                        </select>
                        <span class='text-danger'><?php echo $errcompany?></span>
                    </div>
                    <div class="form-group">
                        <label for="people_acces">Acces</label>
                        <select class="form-control" id="acces" name="people_acces">
                            <option value="user">User</option>
                            <option value="modo">Modo</option>
                            <option value="god">God Mode</option>
                        </select>
                        <span class='text-danger'><?php echo $erracces?></span>
                    </div>
                    <button type="submit" id="submit" name="submit" class="btn btn-primary mt-3">Add new contact</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<!-- footer content -->
<?php require getenv('APP_ROOT') . '/app/views/inc/footer.php' ;?>
</html> 