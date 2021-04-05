
$(function() {

    function calculate_seats() {
        var no_of_seats = $("#no_of_seats").val();
        $.ajax({
            type:'GET',
            url: "/admin/seatsArrange/" + no_of_seats,
            success: function(data){
                $.each( data, function( i, val ) {
                    $( "#seat_no_" + i ).html(val.seats_range);
                    $( "#seatno_" + i ).val(val.seats_range);
                    $( "#total_seats_" + i ).val(val.total_seats);
                });
            }
        });
    }
    $("body").on('blur', '#no_of_seats', function(){
        calculate_seats();
    });

    $('*[name=event_date]').appendDtpicker();

    function calculateTotalPrice() {
        let total_price = 0;
        $('.single_price').each(function () {
            let category_id = $(this).data('catid');
            let category_price = $(this).val();
            let category_total_seats = $('#total_seats_' + category_id).val();

            if(category_total_seats != '') {
                let total_cat_price = category_total_seats * category_price;
                total_price += total_cat_price;
                $('#category_price_' + category_id).val(total_cat_price);
                $('#price_' + category_id).text('₹' + total_cat_price);
            }
        });
        $('#total_price').text('₹' + total_price);
    }

    $(".master_category").blur(function () {
        let master_category = $('.master_category').val();
        let last_category_price = master_category;

        calculate_seats();

        setTimeout(function () {
            $(".calculate_price").each(function (index) {
                let pricepercentage = $(this).attr("data-pricepercentage");
                let category_id = $(this).data('catid');
                let current_category_price = ((last_category_price / 100) * pricepercentage).toFixed(0);
                
                $(this).val(current_category_price);
    
                last_category_price = current_category_price;                
            });

            calculateTotalPrice();
        }, 500);

    });
});