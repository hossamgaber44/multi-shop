(function ($) {
    "use strict";

    // Product Quantity
    $(document).ready(function () {
        var price = ['all'];
        var color = ['all'];
        var size = ['all'];
        var csrf = $('#csrf').val();
        var data={price,color,size};
        // get price
        $('#filterForm #priceForm input').on('click', function () {
            $('#old_product').hide();
            $('#product_Search').show();
            if (price.includes($(this).val())) {
                price = price.filter((i) => {
                    return i !== $(this).val();
                });
            } else {
                price = [...price, $(this).val()]
            };
            data={price,color,size};
            getdata(data);
        });

        // get color
        $('#filterForm #colorForm input').on('click', function (e) {
            $('#old_product').hide();
            $('#product_Search').show();
            if (color.includes($(this).val())) {
                color = color.filter((i) => {
                    return i !== $(this).val();
                });
            } else {
                color = [...color, $(this).val()]
            }
            data={price,color,size};
            getdata(data);
        });

        $('#filterForm #sizeForm input').on('click', function (e) {
            $('#old_product').hide();
            $('#product_Search').show();
            if (size.includes($(this).val())) {
                size = size.filter((i) => {
                    return i !== $(this).val();
                });
            } else {
                size = [...size, $(this).val()]
            }
            data={price,color,size};
            getdata(data);
        });

        const getdata =(value)=>{
            console.log(value);
            jQuery.ajax({
                url: "/shop/filter",
                type: 'post',
                datatype: 'html',
                // cache: false,
                data: {
                    value: value,
                    __token: csrf,
                },
                success: function(data) {
                    console.log(data);
                    $('#product_Search').html(data);
                },
                error: function(error) {
                    console.log(error);
                },
            });
        };

    });

})(jQuery);
