$(document).ready(function () {
    var groupColumn = 0;
    var filter_by = 'upcomming';

    var events_list_table = $('#events_list').DataTable({
        "columnDefs" : [
            { "visible": false, "targets": groupColumn }
        ],
        "order" : [[ groupColumn, 'asc' ]],
        "displayLength" : 5,
        "ordering" : false,
        "searching" : false,
        "lengthChange": false,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url" : "/events/fetch",
            "type" : "GET",
            "data": function(data) {
                data.show_type = filter_by;
            },
        },
        "drawCallback" : function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;

            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );

                    last = group;
                }
            } );
        }
    } );

    $('.event_filter_by').click(function() {
        $('.event_filter_by').removeClass('active');
        $(this).addClass('active');
        filter_by = $(this).data('filterby');
        events_list_table.draw();
    } );

    $('.duration-box .duration-btn').click(function() {
        $('.custom_duration_input').val('');
    } );

    $('.custom_duration_input').keyup(function() {
        $('.duration-box .duration-btn').val('');
        $(".duration-box .duration-btn").removeClass('active');
        $(".duration-box .duration-btn .duration_radio").prop("checked", false);
    } );
});
