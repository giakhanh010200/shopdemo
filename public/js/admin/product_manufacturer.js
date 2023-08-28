var loadFile = function(event) {
    var image = document.getElementById('showUploadImage');
    image.src = URL.createObjectURL(event.target.files[0]);
};

$("#btnSave").click(function() {
    $("form#formModal").submit();
})
$(".btn-save-del").click(function() {
    $("form#formModalDel").submit();
})
$(".btn-edit-data").click(function(e) {
    e.preventDefault();
    var id = $(this).attr("data-value");

    var url = $(this).attr("data-url");
    $.ajax({
        type: "GET",
        url: url,
        data: id,
        success: function(response) {
            document.getElementById("formModal").setAttribute('action', local + '/admin/process_edit_manu/' + id)
            document.getElementById("methodChange").setAttribute('value', 'PUT');
            document.getElementById("modalTitle").innerHTML = "Sửa dữ liệu"
            $("#nameForm").val(response.name);
            document.getElementById("showUploadImage").setAttribute('src', local + '/image/admin/product_properties/' + response.logo);

        }
    });
})
$(".btn-close-modal").click(function() {
    console.log("close")
    document.getElementById("formModal").reset();
    document.getElementById("methodChange").setAttribute('value', 'POST');
    document.getElementById("formModal").setAttribute('action', local + '/admin/process_add_manu');
    document.getElementById("modalTitle").innerHTML = "Thêm dữ liệu mới"
    $("#showUploadImage").removeAttr('src')

})
$(".btn-del-data").click(function(e) {
    e.preventDefault();
    var id = $(this).attr("data-value");
    var url = $(this).attr("data-url");
    $.ajax({
        type: "GET",
        url: url,
        data: id,
        success: function(response) {
            $("#nameDel").text(response.name);
            document.getElementById("imageDel").setAttribute('src', local + '/image/admin/product_properties/' + response.logo + '');
            document.getElementById("formModalDel").setAttribute('action', local + '/admin/process_del_manu/' + id + '')


        }
    });
});