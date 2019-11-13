/* === FUNCTIONS === */

const setupTable = ($node) => {
    $node.DataTable({
        'pageLength': 3,
        'lengthMenu': [[3,5,10,-1], [3,5,10,'All']],
        'ordering': true,
        'searching': true,
        'paging': true,
        'responsive': true,
        'dom': 'Blfrtip',
        'buttons': [
            {
                text: 'Add',
                action: (e, dt, node, config ) => 'ok'
            }
        ]
    });
}

/* === jQUERY === */

$(document).ready(function() {

    /* HAMBURGR ICON  */
    $('.nav__hamburger').click(() => $('.nav__hamburger').toggleClass('change'));
    
    /* PASSWORD-LOGIN (show or hide) */
    $('.password').click(() => {
        const $password = $('[id="password"]');
        const $icon = $('.password__toggle');

        if ($password.attr('type') === 'password') 
        {
            $icon.removeClass('fa-eye-slash');
            $icon.addClass('fa-eye');
            $password.attr('type', 'text');
        }
        else 
        {
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
