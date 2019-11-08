<?php
require_once './app/config/.env.php';
require_once './vendor/autoload.php';
//header
require getenv('APP_ROOT') . '/app/views/inc/header.php';

/* Create instance of model which allow us to use preloadInvoice (load the data from company people and the link between the two) 
*/
$b = new AdminModel;
$array_Alldata = $b->preloadInvoice();



$number = $date = $company = $people = "";
$errNumber = $errDate = $errCompany = $errPeople = "";
//VAR
$number = $_POST["invoice_number"];
$date = $_POST["invoice_date"];
$company = $_POST["invoice_fk_company"];
$people = $_POST["invoice_fk_people"];
//FUNCTION
function sanitizeInvoiceNumber($field)
{
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if (filter_var($field, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "#^F{1}[0-9]{8}-{1}[0-9]{3}$#")))) {
        return $field;
    } else {
        return FALSE;
    }
}
function sanitizeInvoiceDate($field)
{
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if (filter_var($field, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "#^[0-9]{4}[-./]{1}[0-9]{2}[-./]{1}[0-9]{2}$#")))) {
        return $field;
    } else {
        return FALSE;
    }
}
function feedback($arg, $type = "danger")
{
    echo '<div class="alert alert-' . $type . ' text-center notification">' . $arg . '</div>';
}
//SANITIZE
if (isset($_POST["submit"])) {
    if (empty($_POST['invoice_number'])) {
        $errNumber = "- Number is empty -";
    } else {
        $number = (preg_match("#^F{1}[0-9]{8}-{1}[0-9]{3}$#", $_POST['invoice_number']));
        if ($number == FALSE) {
            $errNumber = " - number is not valid - ex: F12345678-000) ";
        }
    }
    if (empty(trim($_POST['invoice_date']))) {
        $errDate = "- Date is empty -";
    } else {
        $date = sanitizeInvoiceDate($_POST['invoice_date']);
        if ($date == FALSE) {
            $errDate = "- Date is not valid - ex: yyyy-mm-dd";
        }
    }
    if (empty(trim($_POST['invoice_fk_company']))) {
        $errCompany = "- Company is not selected -";
    }
    if (empty(trim($_POST['invoice_fk_people']))) {
        $errPeople = "- Contact is not selected -";
    }
    if (!$errNumber && !$errDate && !$errcompany && !$errPeople) {
        feedback("All your informations has been validated and sent", "success");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COGIP | New Invoice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h1 class="text-center">Create New Invoice</h1>
                <form class="mt-5 text-center" method="post" action="">
                    <div class="form-group">
                        <label for="invoiceNumber">Invoice Number</label>
                        <input type="text" name="invoice_number" maxlenght="13" class="form-control" id="invoice_number" aria-describedby="invoiceNumberHelp" placeholder="Enter your invoice number">
                        <span class='text-danger'><?php echo $errNumber ?></span>
                    </div>
                    <div class="form-group">
                        <label for="invoiceDate">Invoice Date</label>
                        <input type="text" name="invoice_date" class="form-control" id="invoice_date" aria-describedby="invoiceDateHelp" placeholder="Enter date">
                        <span class='text-danger'><?php echo $errDate ?></span>
                    </div>



                    <div class="form-group">
                        <label for="companyName">Company name</label>
                        <select class="form-control" id="companyType" name="invoice_fk_company">
                            <option disabled selected>Select your company</option>


                            <?php
                            foreach ($array_Alldata['company'] as $subCategory) {

                                foreach ($subCategory as $key => $value) {
                                    if ($key == "company_name") {
                                        echo '<option>' . ucfirst($value) . '</option>';
                                    }
                                }
                            } ?>
                        </select>
                        <span class='text-danger'><?php echo $errCompany ?></span>
                    </div>

                    <div class="form-group test123">
                        <label for="contactName">Contact name</label>
                        <select class="form-control" id="invoiceContact" name="invoice_fk_people">
                            <option disabled selected>Select your contact person</option>
                            <?php foreach ($array_Alldata['people'] as $subCategory) {
                                foreach ($subCategory as $key => $value) {
                                    if ($key == "people_fullName") {
                                        echo '<option>' . ucfirst($value) . '</option>';
                                    }
                                }
                            }
                            ?>
                        </select>

                        <p id="target"></p>

                        <span class='text-danger'><?php echo $errPeople ?></span>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mt-3">Add new invoice</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<!-- footer content -->
<?php require getenv('APP_ROOT') . '/app/views/inc/footer.php';
?>

</html>