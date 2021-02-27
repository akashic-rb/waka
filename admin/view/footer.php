<div class="footer">
    <div class="row">
        <div class="col-lg-12">
            &copy; 2020 Waka
        </div>
    </div>
</div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/jquery-ui-git.js"></script>
    <script src="https://code.jquery.com/ui/jquery-ui-git.css"></script>
    <script src="../js/datatable.js"></script>
    <script src="../js/pagination.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../js/custom.js"></script>
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $('#add-btn').click(function (e) {
            e.preventDefault();
            $('#dialog-form').dialog({
                modal: true,
                width: 1000,
                height: 500
            });
        })

        $('tr img').hover(function() {
            $('#zoom').show();
            $(this).clone(true).appendTo('#zoom').animate({
                width: "100%",
                height: "100%"
            }, "fast")
        }, function() {
            $('#zoom').html('');
            $('#zoom').hide()
        })
    </script>
</body>
</html>