    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer__copy py-2">
            &copy; 2018-<?=date('Y') . ' ' . getenv('APP_NAME')?> &ndash; All rights reserved
        </div>
    </footer>
    <!-- END OF FOOTER -->

    <!-- JAVASCRIPT -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="<?=getenv('APP_URL')?>/public/assets/js/app.js" async></script>
</body>