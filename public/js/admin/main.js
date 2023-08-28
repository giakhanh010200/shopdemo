$(document).ready(function() {
    // active sidebar
    $("#btnSidebar").click(function() {
        $("#menuSidebar").toggleClass("active");
    });
    // active searching
    $(".auth-btn-search").click(function() {
        $(".box-auth-search").addClass("active");
    })
    $(".btn-cancel-search").click(function() {
        $(".box-auth-search").removeClass("active");
    });
});
var local = window.location.origin;
console.log(local);