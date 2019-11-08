<?php
require_once './app/config/.env.php';
require_once './vendor/autoload.php';
//header

$NewCompany = $_POST['new_company'];
$selectedCompany;
$result;
$b = new AdminModel();

// Get the compay name as a string
foreach ($_POST as $value) {
    $selectedCompany = $value;
}

// Get the id of the company 
$request_selectedCompany = 'SELECT company.id FROM company WHERE company_name="' . strtolower($selectedCompany) . '"';


$getId_company = $b->getData($request_selectedCompany);


foreach ($getId_company[0] as $id_comp => $id_number) {
    if ($id_comp == "id") {
        $request = "SELECT people.people_fullName FROM company INNER JOIN people_has_company ON company.id = people_has_company.fk_company INNER JOIN people ON people.id = people_has_company.fk_people WHERE company.id = \"$id_number\"";
        $result = $b->getData($request);
    }
}

?>

<div class="form-group test123">
    <label for="contactName">Contact name</label>
    <select class="form-control" id="invoiceContact" name="invoice_fk_people">
        <option disabled selected>Select your contact person</option>

        <?php foreach ($result as $doubleArray) {
            foreach ($doubleArray as $key => $value) {
                if ($key == "people_fullName") {
                    echo " <option>" . ucfirst($value) . "</option>";
                }
            }
        }
        ?>
    </select>

    <p id="target"></p>

    <span class='text-danger'><?php echo $errPeople ?></span>
</div>