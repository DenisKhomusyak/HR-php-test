$('.savePriceBtn').click(function (event) {
    var parentTr = $(this).parents('tr');
    var productId = parentTr.data('product-id');
    var price = parentTr.find('input[name=price]').val();

    // todo(denisk) get route by name /routes.json
    $.post('/product/update-price', {product_id: productId, price: price})
        .done(function (response) {
            alert(response['message']);
        })
        .fail(function (xmlHttpRequest, textStatus){
            alert(textStatus + ': ' + xmlHttpRequest.responseText);
            console.log(xmlHttpRequest);
        });
});