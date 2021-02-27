let filterObj = {
    author: [],
    publisher: [],
    price: [],
    status: [],
    rating: []
};
// kiếm tra lọc tác giả
$('#author input[type="checkbox"]').click(function() {
    let checked = [];
    $(this).parents('#author').find('input[type="checkbox"]:checked').map(function() {
        checked.push(this.value);
    });
    filterObj.author = checked;
    ajaxRequest(filterObj)
});
// kiếm tra lọc NXB
$('#publisher input[type="checkbox"]').click(function() {
    let checked = [];
    $(this).parent('#publisher').find('input[type="checkbox"]:checked').map(function() {
        checked.push(this.value);
    });
    filterObj.publisher = checked;
    ajaxRequest(filterObj)
});
// kiểm tra lọc giá tiền
$('#price').click(function() {
    let price = [0];
    let min = $('#min-price').val()
    let max = $('#max-price').val()
    if(min !== '') {
        price[0] = min;
    }
    if(max !== '') {
        price.push(max)
    }
    filterObj.price = price;
    ajaxRequest(filterObj)
});
// kiếm tra lọc trạng thái
$('#status input[type="checkbox"]').click(function() {
    let checked = [];
    $(this).parents('#status').find('input[type="checkbox"]:checked').map(function() {
        checked.push(this.value);
    });
    filterObj.status = checked;
    ajaxRequest(filterObj)
});
// kiếm tra lọc đánh giá
$('#rating input[type="checkbox"]').click(function() {
    let checked = [];
    $(this).parent('#rating').find('input[type="checkbox"]:checked').map(function() {
        checked.push(this.value);
    });
    filterObj.rating = checked;
    ajaxRequest(filterObj)
});

function ajaxRequest(filterObj) {
    let filterJSON = JSON.stringify(filterObj);
    $.ajax({
        method: "POST",
        dataType: "json",
        url: "ajax/filter.php",
        data: {filter : filterJSON},
        success: function(data) {
            $("#books").empty();
            if(data.length >= 1) {
                data.forEach(book => {
                    $("#books").html(`<div class="book">
                    <a href="index.php?act=detailProduct&id=${book.id}"><img src="../upload/${book.image}" alt=""></a>
                    <a href="index.php?act=detailProduct&id=${book.id}"><p class="name">${book.name}</p></a>
                    <span class="view">${book.view > 0 ? book.view + ' lượt xem' : 'mới cập nhật'}</span>
                    <span class="price">${Math.floor(book.price)} vnđ</span>
                    <form action="index.php?act=viewcart" method="post">
                        <input type="hidden" name="idpro" value="${book.id}">
                        <input type="hidden" name="name" value="${book.name}">
                        <input type="hidden" name="price" id="pri" value="${book.price}">
                        <input type="hidden" name="img" value="../upload/${book.image}">
                        <input type="button" name="submit" value="Thêm" class="addcart" onclick="addtocart(this)">
                    </form>   
                </div>`);
                });
            }
            else {
                $("#books").html('<h3 style="display: block; text-align: center">Không tìm thấy sách</h3>');
            }
        },
        error: function(e) {
            console.log(e.message);
        }
    })
}