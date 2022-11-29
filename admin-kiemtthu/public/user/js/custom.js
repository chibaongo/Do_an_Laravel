$(document).ready(function() {
    $("#search").click(function(e) {
        var nameSearch = $('#nameSearch').val();
        var descriptionSearch = $('#descriptionSearch').val();
        var typeSearch = $('#typeSearch').val();
        var priceSearch = $('#priceSearch').val();
        if(nameSearch == '' && descriptionSearch == ''  && typeSearch =='' && priceSearch == 0){
            alert("Vui lòng nhập nội dung tìm kiếm !!");
            e.preventDefault();
        }
    });
    $("#priceSearch").change(function(){
        var val = $("#valRangeShow").val();
        $("#valRangeShow").val(String(val).replace(/(.)(?=(\d{3})+$)/g,'$1,'));
    });
});
