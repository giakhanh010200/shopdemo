$(".btn-save-add").click(function() {
    $("form#formAdd").submit();
})

$(".btn-save-edit").click(function() {
    $("form#formEdit").submit();
})

$(".btn-delete").click(function() {
    $("form#formDel").submit();
})

$(".btn-edit-data").click(function() {
    url = $(this).attr("data-url");
    id = $(this).attr("data-value");
    $.ajax({
        type: "GET",
        url: url,
        success: function(data) {
            console.log(data)
            $("#nameEdit").val(data.name);
            document.getElementById("formEdit").setAttribute('action', local + '/admin/process_edit_cate/' + id)
        }
    })
})
$(".btn-del-data").click(function() {
    url = $(this).attr("data-url");
    id = $(this).attr("data-value");
    $.ajax({
        type: "GET",
        url: url,
        success: function(data) {
            console.log(data)
            $("#nameDel").text(data.name);
            document.getElementById("formDel").setAttribute('action', local + '/admin/process_del_cate/' + id + '')
        }
    })
})