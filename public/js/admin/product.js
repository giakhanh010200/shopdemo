var loadFile = function(event) {
    var image = document.getElementById("showUploadImage");
    image.src = URL.createObjectURL(event.target.files[0]);
};
// show error in 3s
function showError(event) {
    $(event).show();
    setTimeout(function() {
        $(event).hide();
    }, 3000);
}
// ck editor
$("#btnAddNew").click(function() {
    var error = false;
    var sku = $("#addSKU").val();
    var name = $("#addName").val();
    var rom = [];
    var data = document.querySelectorAll(".addRom");
    for (var i = 0; i < data.length; i++) {
        if (data[i].checked) {
            rom.push(data[i].value);
        }
    }
    var importPrice = $("#addImportP").val();
    var salePrice = $("#addSaleP").val();
    var quality = $("#addQuality").val();
    var array = [sku, name, rom, salePrice, importPrice, quality];
    for (var i = 0; i < array.length; i++) {
        if (array[i] == "") {
            showError("#alertAddModal");
            error = true;
            break;
        }
    }
    console.log(error);
    if (error == false) {
        $("form#formModalAdd").submit();
    }

});

function deleteFile() {
    $("#formModalAdd")[0].reset();
    $(".ck-editor__editable_inline").html("");
    var url = local + "/admin/delete_folder";
    $.ajax({
        type: "get",
        url: url,
        success: function(data) {},
    });
}
let data = window.performance.getEntriesByType("navigation")[0].type;
if (data == "reload") {
    deleteFile();
}
$(".btn-close-new").click(function() {
    deleteFile();
});
//show detail product
$(".btn-show-detail").click(function() {
        var id = $(this).val();
        $(this).toggleClass("activated");
        $("#blockDetailProduct" + id).toggle();

        var x = document.querySelectorAll(".set-def-value-" + id);
        for (var i = 0; i < x.length; i++) {
            x[i].value = x[i].defaultValue;
        }
        var y = document.querySelectorAll(".set-selected-value-" + id);
        for (var i = 0; i < y.length; i++) {
            y[i].selected = true;
            y[i].checked = true;
        }
        var z = document.querySelectorAll(".set-checked-value-" + id);
        for (var i = 0; i < z.length; i++) {
            z[i].checked = true;
        }
        var z1 = document.querySelectorAll(".unchecked");
        for (var i = 0; i < z1.length; i++) {
            z1[i].checked = false;
        }
    })
    // delete action
$(".btn-delete-product").click(function() {
    let id = $(this).val();
    console.log(id);
    let url = $(this).attr("data-url")
    let name = $("#actionName" + id).val();
    let sku = $("#actionSKU" + id).val();
    document.getElementById("skuDel").innerHTML = sku;
    document.getElementById("nameDel").innerHTML = name;
    document.getElementById("formModalDel").setAttribute("action", url);
})
$(".btn-close-modal-del").click(function() {
    document.getElementById("skuDel").innerHTML = "";
    document.getElementById("nameDel").innerHTML = "";
    $("#formModalDel").removeAttr("action");

})

$(".btn-save-del").click(function() {
        console.log("delete");
        $("#formModalDel").submit();
    })
    // update action
$(".btn-update-product").click(function() {
    var error = false;
    var id = $(this).val();
    var sku = $("#addSKU" + id).val();
    var name = $("#addName" + id).val();
    var rom = [];
    var data = document.querySelectorAll(".actionRom" + id);
    for (var i = 0; i < data.length; i++) {
        if (data[i].checked) {
            rom.push(data[i].value);
        }
    }
    var importPrice = $("#actionImportP" + id).val();
    var salePrice = $("#actionSaleP" + id).val();
    var quality = $("#actionQuantity" + id).val();
    var array = [sku, name, rom, salePrice, importPrice, quality];
    for (var i = 0; i < array.length; i++) {
        if (array[i] == "") {
            showError("#alertUpdateModal" + id);
            error = true;
            break;
        }
    }
    console.log(error);
    if (error == false) {
        $("form#formDetailProduct" + id).submit();
    }

});
