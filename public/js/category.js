function confirmDelete(that) {
    var r = confirm('Do you want to Delete ?');
    if (r == true) {
        let CATEGORY_URL = $(that).closest('form').attr('action');
        let data = $(that).closest('form').serialize();
        $.ajax({
            url: CATEGORY_URL,
            type: 'post',
            data: data,
            success: function (dataResponse) {
                console.log(dataResponse)
                alert(dataResponse.success);
                $(that).closest('tr').remove();
            },
            error: function (err) {
                console.log(err)
                alert(dataResponse.error);
            },
            dataType: 'json'
        });
    }
}
