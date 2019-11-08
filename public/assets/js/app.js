/* === jQuery === */
$(document).ready(function () {
    // Scripts for hamburger icon 
    $('.nav__hamburger').click(function () {
        $('.nav__hamburger').toggleClass('change');
    });

    let currentCompany = $('#companyType option:selected').text();
    $("#companyType").change(function () {
        currentCompany = $('#companyType option:selected').text();
        $('.test123').load("test.php", {
            NewCompany: currentCompany
        });
        // if (x != "Select your company")
    });






});

function test123() {
    let x = $('#companyType option:selected').text();

    console.log(x);
}