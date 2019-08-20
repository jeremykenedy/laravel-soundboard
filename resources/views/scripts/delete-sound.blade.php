<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    function myConfirm(el) {
        Swal.fire({
            title: 'Are you sure you want to delete this sound?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#FF0000',
            cancelButtonColor: '#808080',
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.value) {
                console.log(el);
                el.submit();
            }
        })
    }
</script>