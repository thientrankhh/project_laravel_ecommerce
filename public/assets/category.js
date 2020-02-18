function confirmDelete(that) {
    var r = confirm("Do you want to Delete ?");
    if (r == true){
        // $(that).closest('form').submit();
        let CATEGORY_URL = $(that).closest('form').attr('action');
        let data = $(that).closest('form').serialize();
        $.ajax({
           url: CATEGORY_URL ,
           type: 'POST',
            data: data,
            success: function (dataResponse) {
                console.log(dataResponse)
                // window.location.reload();
                alert(dataResponse.success);
                $(that).closest('tr').remove();
            },
            error: function (err) {
                console.log(err)
                // window.location.reload();
                alert(dataResponse.error);
            },
            dataType: 'json'
        });
    }
}
