$(document).ready(function() {
    $('#data-table').DataTable({
        "paging": true,
        "pageLength": 5,
        "responsive": true,
        "lengthMenu": [[5, 10, 15, 20, 25, -1], [5,10, 15, 20, 25, "All"]]
    });
});