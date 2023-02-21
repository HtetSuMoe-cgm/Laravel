$(document).ready(function() {
    $('#data-table').DataTable({
        "paging": true,
        "pageLength": 5,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "dom": 'rtp',
        "scrollX": false,
        "responsive": true
    });
});