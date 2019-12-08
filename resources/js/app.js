var $ = require("jquery");
require('bootstrap');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".app-btn").click(function () {
    var id_apps = $(this).attr('data-href');
    $.ajax({
        method: 'GET',
        url: '/appsdata',
        data: {
            "id_apps": id_apps,
        },
        success: function (response) {
            if (response.status == "Success") {
                $("#detail-app-id").html(response.appsdetail.id_app);
                $("#detail-app-name").html(response.appsdetail.app_name);
                $("#detail-app-developer").html(response.appsdetail.developer);
                $("#detail-app-price").html(response.appsdetail.price);
            } else {
                console.log("sistem terkendala");
            }
        }
    });
});

// App list Delete
$(".app-delete-btn").click(function () {
    var id_apps = $(this).attr('data-href');
    $.ajax({
        method: 'post',
        url: '/deleteapp',
        data: {
            "id_apps": id_apps,
        },
        success: function (response) {
            if (response.status == "Success") {
                location.reload();
            } else {
                console.log("sistem terkendala");
            }
        }
    });
})

// App list update view
$(".app-update-btn").click(function () {
    var id_apps = $(this).attr('data-href');
    $.ajax({
        method: 'get',
        url: '/appsdata',
        data: {
            "id_apps": id_apps,
        },
        success: function (response) {
            if (response.status == "Success") {
                $(".update-app-id").val(response.appsdetail.id_app);
                $(".update-app-name").val(response.appsdetail.app_name);
                $(".update-developer-name").val(response.appsdetail.dev_name);
                $(".update-app-price").val(response.appsdetail.price);
            } else {
                console.log("sistem terkendala");
            }
        }
    });
})

// App list add
$(".publishapp-btn").click(function () {
    var app_name = $(".app-name").val(),
        developer_name = $(".developer-name").val(),
        app_price = '0';
        if ($("#freecheck").prop('checked') == false) {
            app_price = $(".app-price").val();
        }

        $.ajax({
        method: 'post',
        url: '/publishapp',
        data: {
            "app_name": app_name,
            "developer_name": developer_name,
            "app_price": app_price
        },
        success: function (response) {
            if (response.status == "Success") {
                location.reload();
            } else {
                console.log("sistem terkendala");
            }
        }
    });
})

// App List update
$(".app-republish-btn").click(function () {
    var app_id = $(".update-app-id").val(), 
        app_name = $(".update-app-name").val(),
        developer_name = $(".update-developer-name").val(),
        app_price = $(".update-app-price").val();

        $.ajax({
        method: 'post',
        url: '/updateapp',
        data: {
            "app_id" : app_id,
            "app_name": app_name,
            "developer_name": developer_name,
            "app_price": app_price
        },
        success: function (response) {
            if (response.status == "Success") {
                location.reload();
            } else {
                console.log("sistem terkendala");
            }
        }
    });
});

// Free Check if application become free
$('#freecheck').click(function () {
   if ($(this).prop('checked') == true ) {
       $('.app-price').attr('disabled', true).val('Free');
   }else{
        $('.app-price').attr('disabled', false).val('');
   }
});

// Cart
$('.btn-cart').click(function () { 
    app_id = $('#detail-app-id').html();
    
    $.ajax({
        method: 'post',
        url: '/cart',
        data: {
            "app_id" : app_id,
        },
        success: function (response) {
            if (response.status == "loginfirst") {
                window.location = "/login";
            } else {
                console.log("sistem terkendala");
            }
        }
    });
});
