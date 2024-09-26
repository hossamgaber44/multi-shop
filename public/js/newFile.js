(function ($) {
    "use strict";

    // Product Quantity
    $(document).ready(function () {
        var price = ['all'];
        var maxPrice = 0;
        var minPrice = 0;
        var color = ['all'];
        var size = ['all'];
        var data = {};
        // get price
        $('#filterForm #priceForm input').on('click', function () {
            if (price.includes($(this).val())) {
                price = price.filter((i) => {
                    return i !== $(this).val();
                });
            } else {
                price = [...price, $(this).val()];
            };
            // start check
            // if(!price.includes('all')){
            //     data={...data,price};
            // } else{
            //     data={color ,size , price};
            // };
            // end check
            data = { price, color, size };
            console.log(data);
        });

        // get color
        $('#filterForm #colorForm input').on('click', function (e) {
            if (color.includes($(this).val())) {
                color = color.filter((i) => {
                    return i !== $(this).val();
                });
            } else {
                color = [...color, $(this).val()];
            }
            data = { price, color, size };
            console.log(data);
        });

        $('#filterForm #sizeForm input').on('click', function (e) {
            if (size.includes($(this).val())) {
                size = size.filter((i) => {
                    return i !== $(this).val();
                });
            } else {
                size = [...size, $(this).val()];
            }
            data = { price, color, size };
            console.log(data);
        });
    });

})(jQuery);
