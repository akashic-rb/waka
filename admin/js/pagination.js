$('#pagination *').click(function(e) {
    e.preventDefault();
    let curPage;
    $(this).siblings().removeClass('active');
    if(Number.isInteger(parseInt($(this).text()))) {
        $(this).addClass('active');
        curPage = $(this);
    }
    else if($(this).text() == "«") {
        curPage = $(this).next()
        curPage.addClass('active');
    }
    else {
        curPage = $(this).prev();
        curPage.addClass('active');
    }
    $.ajax(function() {
        
    });
});