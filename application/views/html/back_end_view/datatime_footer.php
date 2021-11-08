<script type="text/javascript" src="<?= public_back_end_path('js/plugins/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript" src="<?= public_back_end_path('js/plugins/select2.min.js'); ?>"></script>
<script type="text/javascript" src="<?= public_back_end_path('js/plugins/bootstrap-datepicker.min.js'); ?>"></script>
<script type="text/javascript">
    $('#demoDate').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });

    $('#demoSelect').select2();
</script>