$('.show-alert-delete-box').click(function(event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: "Are you sure you want to delete this record?",
        text: "If you delete this, it will be gone forever.",
        // icon: "warning",
        type: "warning",
        buttons: ["Cancel", "Yes!"],
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((willDelete) => {
        if (willDelete) {
            form.submit();
        }
    });
});