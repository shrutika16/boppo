$(function () {
        function calculateTotalPrice() {
            let totalPrice = 0;
            $('.selected').each(function() {
                totalPrice += Number($(this).attr('data-price'));
            });
            $('#showTotalPrice').text(totalPrice);
            $('#total_price').val(totalPrice);
        }

        $('.select_seat').click(function() {
            let checkbox_element = $(this).attr('data-seat');
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
                $('#' + checkbox_element).prop('checked', false);
            }
            else {
                $(this).addClass('selected');
                $('#' + checkbox_element).prop('checked', true);
            }

            calculateTotalPrice();
        });
    });

    $(document).ready(function() {
        $("#book_event").click(function () {
            var selectedseat = $("input:checkbox:checked").map(function(){
                return $(this).val();
            }).get();
            if (selectedseat.length != 0) {
                var form = $('#event_book_form').serialize();

                $.ajax({
                    type:'POST',
                    url: "/event/book",
                    data: form,
                    dataType: 'json',
                    success: function(data){
                        if(data.success){
                            window.location = '/thank-you';
                        }
                        // location.reload();
                    }
            });
            } else {
                alert("Please Select Seat");
            }


        })
    });
