$(document).ready(function () {
    var events_list_table = $('#tests_list').DataTable({
        // "columnDefs": [{
        //     "visible": false,
        //     "targets": groupColumn
        // }],
        // "order": [
        //     [groupColumn, 'asc']
        // ],
        "displayLength": 20,
        "ordering": true,
        "searching": true,
        "lengthChange": false,
        "processing": true,
        "serverSide": false,
        // "ajax": {
        //     "url": "/events/fetch",
        //     "type": "GET",
        //     "data": function (data) {
        //         data.show_type = filter_by;
        //     },
        // },
        // "drawCallback": function (settings) {
        //     var api = this.api();
        //     var rows = api.rows({
        //         page: 'current'
        //     }).nodes();
        //     var last = null;

        //     api.column(groupColumn, {
        //         page: 'current'
        //     }).data().each(function (group, i) {
        //         if (last !== group) {
        //             $(rows).eq(i).before(
        //                 '<tr class="group"><td colspan="5">' + group + '</td></tr>'
        //             );

        //             last = group;
        //         }
        //     });
        // }
    });
   $('#tests').multipleSelect({
     filter: true
   });
   $('#packages').multipleSelect({
     filter: true
   });

   function getpackage(product_type) {
        if(product_type === 'package'){
            $('.package-show').show();
            $('.profile-show').hide();
        }else if(product_type === 'profile'){
            $('.profile-show').show();
            $('.package-show').hide();
        }else{
        $('.profile-show').hide();
        $('.package-show').hide();
        }
    }
    product_type = $('#product_type').val();
   getpackage(product_type);


   $('#product_type').change(function ()
   {
       var type =$(this).val();
       if(type === 'package'){
           $('.package-show').show();
           $('.profile-show').hide();
       }else if(type === 'profile'){
            $('.profile-show').show();
            $('.package-show').hide();
       }else{
        $('.profile-show').hide();
        $('.package-show').hide();
       }
   })
});
