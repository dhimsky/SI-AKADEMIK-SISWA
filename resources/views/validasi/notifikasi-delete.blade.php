<script>
    $(document).ready(function(){
        $('#deleteForm{{ $item->id }}').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus saja!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form manually
                    this.submit();
                }
            });
        });
    });
</script>