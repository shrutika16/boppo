
    $(document).ready(function() {
        $("#no_of_seats").keyup(function(){
           var no_of_seats = $("#no_of_seats").val();
           $.ajax({
                type:'GET',
                url: "/admin/seatsArrange/" + no_of_seats,
                success: function(data){

                    $.each( data, function( i, val ) {

                        $( "#seat_no_" + i ).html(val);
                        $( "#seatno_" + i ).val(val);
                    });
                }
           });
        });
        var i = 0;
        var no_of_seats= 0;
        var total_price = 0;
        $( "#category_price" ).each(function( index ) {

            $(".single_price").on('blur', function(){
                var category_id = $(this).data("catid");
                var single_price = $('#single_price_' + category_id).val();

                var seat_range = $( "#seatno_" + category_id ).val().trim();

                var result = seat_range.split('-');

                var no_of_seats = result[1] - i;
                var price = single_price * no_of_seats;
                total_price += parseInt(price);

                $( "#price_" + category_id ).html(price);
                $( "#category_price_" + category_id ).val(price);
                $( "#total_price").html(total_price);
                $( "#total_amount").val(total_price);

                i = result[1];
            });


        });

    });

    $(document).ready(function() {
        $(function(){
			$('*[name=event_date]').appendDtpicker();
		});
    });
