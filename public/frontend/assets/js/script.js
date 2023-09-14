const site_url = "http://localhost:8000/";
$("body").on("keyup", "#search", function(){
    let text = $("#search").val();
    //console.log(text);
    if (text.length > 0) {
        $.ajax({
            data: {
                search:text,
                // _token: $('meta[name="csrf-token"]').attr('content')
            },
            url: site_url + "search-product",
            method: 'post',
            beforeSend: function(request) {
                return request.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
            },
            success: function(result) {
                $("#searchProducts").html(result);
            }
        })
    }

    if (text.length < 1) {
        $("#searchProducts").html("");
    }
})