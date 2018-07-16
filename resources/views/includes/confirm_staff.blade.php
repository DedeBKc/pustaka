<script type="text/javascript">
$('.delete-btn').on('click', function(e){
    e.preventDefault();
    var self = $(this);
    var staff = $(this).attr("data-staff");
    var formid = $(this).attr("data-formid");
    swal({
        title: "DELETE",
        text: "Hapus Data Staff : "+staff+" ? ",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#D9534f",
        confirmButtonText: "Yes, delete!",
        closeOnConfirm: true
    },
    function(){
        $("#"+formid).submit();
    });
});
</script>
