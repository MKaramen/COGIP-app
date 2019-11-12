/* === FUNCTIONS === */

const setupTable = ($node) => {
    $node.DataTable({
        'pageLength': 3,
        'lengthMenu': [
            [3, 5, 10, -1],
            [3, 5, 10, 'All']
        ],
        'ordering': true,
        'searching': true,
        'paging': true,
        'responsive': true,
        'dom': 'Blfrtip',
        buttons: [{
            text: 'Add',
            action: function (e, dt, node, config) {
                alert('Button activated');
            }
        }]
    });
}

/* === jQuery === */
$(document).ready(function () {
    // Scripts for hamburger icon 
    $('.nav__hamburger').click(function () {
        $('.nav__hamburger').toggleClass('change');
    });

    // Change people when change company inside invoice form 
    let currentCompany = $('#companyType option:selected').text();
    $("#companyType").change(function () {
        currentCompany = $('#companyType option:selected').text();
        $('.test123').load("test.php", {
            NewCompany: currentCompany
        });
        // if (x != "Select your company")
    });

    /* PASSWORD-LOGIN (show or hide) */
    $('.password').click(() => {
        const $password = $('[id="password"]');
        const $icon = $('.password__toggle');

        if ($password.attr('type') === 'password') {
            $icon.removeClass('fa-eye-slash');
            $icon.addClass('fa-eye');
            $password.attr('type', 'text');
        } else {
            $icon.removeClass('fa-eye');
            $icon.addClass('fa-eye-slash');
            $password.attr('type', 'password');
        }
    });

    /* SIDEBAR (show or hide on mouse over/out) */
    $('#nav-sidebar .nav-link').hover(
        () => $('#nav-sidebar .nav-link span').removeClass('d-none'),
        () => $(window).width() < 1140 ? $('#nav-sidebar .nav-link span').addClass('d-none') : false
    );

    /* ADMIN TABLES */
    setupTable($('#admin__users'));
    setupTable($('#admin__companies'));
    setupTable($('#admin__invoices'));
    $('.dt-button').addClass('btn');







});

function test123() {
    let x = $('#companyType option:selected').text();

    console.log(x);
}