<?php
require_once './app/config/.env.php';
require_once './vendor/autoload.php';
//header
require getenv('APP_ROOT') . '/app/views/inc/header.php';
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
                        <input type="text" name="number" maxlenght="13" class="form-control" id="invoiceNumber" aria-describedby="invoiceNumberHelp" placeholder="Enter your invoice number">
                        <span class='text-danger'></span>
                    </div>
                    <div class="form-group">
                        <label for="invoiceDate">Invoice Date</label>
                        <input type="text" name="number" maxlenght="13" class="form-control" id="invoiceNumber" aria-describedby="invoiceNumberHelp" placeholder="Enter your invoice number">
                        <span class='text-danger'></span>
                    </div>

                    <div class="form-group">
                        <label for="companyName">Company name</label>
                        <select class="form-control" id="companyType">
                            <option disabled selected>Select your company</option>
                            <option value="companyName">Telenet</option>
                            <option value="companyName">Proximus</option>
                        </select>
                        <span class='text-danger'></span>
                    </div>
                    <div class="form-group">
                        <label for="invoiceContact">Invoice Contact</label>
                        <select class="form-control" id="invoiceContact">
                            <option disabled selected>Select your contact</option>
                            <option value="contactName">Matis bg</option>
                            <option value="contactName">Julio El Professor</option>
                        </select>
                        <span class='text-danger'></span>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Add new invoice</button>
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
$b = new AdminModel;
$b->new_invoice(); ?>

</html>