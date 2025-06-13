$(document).on('click', '.remove-item', function() {
    var productCode = $(this).data('code');
    $.ajax({
        url: removeCartRoute, // biến này sẽ được truyền từ blade
        method: 'POST',
        data: {
            _token: csrfToken, // biến này sẽ được truyền từ blade
            productCode: productCode
        },
        success: function(response) {
            location.reload();
        }
    });
});

// const notiCheckout = document.querySelector('.submit_products');
// if (notiCheckout) {
//     notiCheckout.addEventListener('click', function(event) {
//         event.preventDefault(); // Ngăn chặn hành động mặc định của nút
//         $.ajax({
//             url: checkoutRoute, // biến này sẽ được truyền từ blade
//             method: 'POST',
//             data: {
//                 _token: csrfToken // biến này sẽ được truyền từ blade
//             },
//             success: function(response) {
//                 alert("Đặt hàng thành công");
//             },
//             error: function() {
//                 alert("Có lỗi xảy ra, vui lòng thử lại.");
//             }
//         });
//     });
// }
