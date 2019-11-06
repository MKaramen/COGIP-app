/* === Vanilla JS === */

/* Hamburger icon */ 
document.querySelector('.nav__hamburger').addEventListener('click', event => {
    event.target.classList.toggle('change');
});

/* Show or hide password */
document.querySelector('.login .toggle-password').addEventListener('click', event => {
    const $password = document.querySelector('.login [id="password"]');
    if ($password.getAttribute('type') === 'password') {
        event.target.classList.remove('fa-eye-slash');
        event.target.classList.add('fa-eye');
        $password.setAttribute('type', 'text');
    }
    else {
        event.target.classList.remove('fa-eye');
        event.target.classList.add('fa-eye-slash');
        $password.setAttribute('type', 'password');
    }
});


/* === jQuery === */
// $(document).ready(function() {
//     // Scripts for hamburger icon 
//     $('.nav__hamburger').click(function() {
//         $('.nav__hamburger').toggleClass('change');
//     });
// }); 