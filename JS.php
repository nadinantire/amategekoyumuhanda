<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<input type="hidden" id="SITEURL" value="<?php echo URLROOT;?>">
<script src="<?php echo URLROOT;?>assets/js/jquery.min.js"></script>
<script src="<?php echo URLROOT;?>assets/js/popper.min.js"></script>
<script src="<?php echo URLROOT;?>assets/js/bootstrap.min.js"></script>
<!--plugins-->
<script src="<?php echo URLROOT;?>assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="<?php echo URLROOT;?>assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="<?php echo URLROOT;?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!-- Vector map JavaScript -->

<script src="<?php echo URLROOT;?>assets/js/index2.js"></script>
<!--Data Tables js-->
<script src="<?php echo URLROOT;?>assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<!-- App JS -->
<script src="<?php echo URLROOT;?>assets/js/app.js"></script>
<script>
    $(document).ready(function () {
        //Default data table
        if($('#example').length){
            var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['excel', 'pdf', 'print']
        });
        table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
        }
    });
    var SITEURL = $('#SITEURL').val();
</script>

