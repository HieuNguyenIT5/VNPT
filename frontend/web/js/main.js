$(document).ready(function () {
//  SLIDER
    // var slider = $('#slider-wp .section-detail');
    // slider.owlCarousel({
    //     autoPlay: 4500,
    //     navigation: false,
    //     navigationText: false,
    //     paginationNumbers: false,
    //     pagination: true,
    //     items: 1, //10 items above 1000px browser width
    //     itemsDesktop: [1000, 1], //5 items between 1000px and 901px
    //     itemsDesktopSmall: [900, 1], // betweem 900px and 601px
    //     itemsTablet: [600, 1], //2 i    tems between 600 and 0
    //     itemsMobile: true // itemsMobile disabled - inherit from itemsTablet option
    // });

//  ZOOM PRODUCT DETAIL
    $("#zoom").elevateZoom({gallery: 'list-thumb', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true, loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'});

//  LIST THUMB
    var list_thumb = $('#list-thumb');
    list_thumb.owlCarousel({
        navigation: true,
        navigationText: false,
        paginationNumbers: false,
        pagination: false,
        stopOnHover: true,
        items: 5, //10 items above 1000px browser width
        itemsDesktop: [1000, 5], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 5], // betweem 900px and 601px
        itemsTablet: [768, 5], //2 items between 600 and 0
        itemsMobile: true // itemsMobile disabled - inherit from itemsTablet option
    });

//  FEATURE PRODUCT
    var feature_product = $('#feature-product-wp .list-item');
    feature_product.owlCarousel({
        autoPlay: true,
        navigation: true,
        navigationText: false,
        paginationNumbers: false,
        pagination: false,
        stopOnHover: true,
        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1000, 4], //5 items between 1000px and 901px
        itemsDesktopSmall: [800, 3], // betweem 900px and 601px
        itemsTablet: [600, 2], //2 items between 600 and 0
        itemsMobile: [375, 1] // itemsMobile disabled - inherit from itemsTablet option
    });

//  SAME CATEGORY
    var same_category = $('#same-category-wp .list-item');
    same_category.owlCarousel({
        autoPlay: true,
        navigation: true,
        navigationText: false,
        paginationNumbers: false,
        pagination: false,
        stopOnHover: true,
        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1000, 4], //5 items between 1000px and 901px
        itemsDesktopSmall: [800, 3], // betweem 900px and 601px
        itemsTablet: [600, 2], //2 items between 600 and 0
        itemsMobile: [375, 1] // itemsMobile disabled - inherit from itemsTablet option
    });

//  SCROLL TOP
    $(window).scroll(function () {
        if ($(this).scrollTop() != 0) {
            $('#btn-top').stop().fadeIn(150);
        } else {
            $('#btn-top').stop().fadeOut(150);
        }
    });
    $('#btn-top').click(function () {
        $('body,html').stop().animate({scrollTop: 0}, 800);
    });

// CHOOSE NUMBER ORDER
    var value = parseInt($('#num-order').attr('value'));
    $('#plus').click(function () {
        value++;
        $('#num-order').attr('value', value);
        update_href(value);
    });
    $('#minus').click(function () {
        if (value > 1) {
            value--;
            $('#num-order').attr('value', value);
        }
        update_href(value);
    });

//  MAIN MENU
    $('#category-product-wp .list-item > li').find('.sub-menu').after('<i class="fa fa-angle-right arrow" aria-hidden="true"></i>');

//  TAB
    tab();

    //  EVEN MENU RESPON
    $('html').on('click', function (event) {
        var target = $(event.target);
        var site = $('#site');

        if (target.is('#btn-respon i')) {
            if (!site.hasClass('show-respon-menu')) {
                site.addClass('show-respon-menu');
            } else {
                site.removeClass('show-respon-menu');
            }
        } else {
            $('#container').click(function () {
                if (site.hasClass('show-respon-menu')) {
                    site.removeClass('show-respon-menu');
                    return false;
                }
            });
        }
    });

//  MENU RESPON
    $('#main-menu-respon li .sub-menu').after('<span class="fa fa-angle-right arrow"></span>');
    $('#main-menu-respon li .arrow').click(function () {
        if ($(this).parent('li').hasClass('open')) {
            $(this).parent('li').removeClass('open');
        } else {

//            $('.sub-menu').slideUp();
//            $('#main-menu-respon li').removeClass('open');
            $(this).parent('li').addClass('open');
//            $(this).parent('li').find('.sub-menu').slideDown();
        }
    });

    //compare
    $(".select-product.left i").click(function() {

        $.ajax({
            url: "?mod=compare&act=result",
            method: 'POST',
            data: {},
            dataType: "text",
            success: function(result) {
                $(".select.select1 .content").html(result);
            }
        });
    });
    var input = "";
    $('.select.select1 #search').on('input', function() {
        input = $(this).val();
        $.ajax({
            url: "?mod=compare&act=result",
            method: 'POST',
            data: {
                search: input
            },
            dataType: "text",
            success: function(result) {
                $(".select.select1 .content").html(result);
            }
        });
    });
    $(".select-product.right i").click(function() {

        $.ajax({
            url: "?mod=compare&act=result1",
            method: 'POST',
            data: {},
            dataType: "text",
            success: function(result) {
                $(".select.select2 .content").html(result);
            }
        });
    });
    var input = "";
    $('.select.select2 #search').on('input', function() {
        input = $(this).val();
        $.ajax({
            url: "?mod=compare&act=result",
            method: 'POST',
            data: {
                search: input
            },
            dataType: "text",
            success: function(result) {
                $(".select.select2 .content").html(result);
            }
        });
    });
    //show product compare
    $('.select1 .content').on('click', '.product-title', function() {
        $(".select.select1").slideToggle(200);
        var chose = "";
        $.each($(this).find("span"), function () {
           chose =  Number($(this).text());
        });
        $(".select-product.left .lable").html($(this).html());
        $.ajax({
            url: "?mod=compare&act=show_por_comp",
            method: 'POST',
            data: {
                id_pro: chose
            },
            dataType: "text",
            success: function(result) {
                $(".compare .product-left").html(result);
            }
        });
    });
    $('.select2 .content').on('click', '.product-title', function() {
        $(".select.select2").slideToggle(200);
        var chose = "";
        $.each($(this).find("span"), function () {
           chose =  Number($(this).text());
        });
        $(".select-product.right .lable").html($(this).html());
        $.ajax({
            url: "?mod=compare&act=show_por_comp",
            method: 'POST',
            data: {
                id_pro: chose
            },
            dataType: "text",
            success: function(result) {
                $(".compare .product-right").html(result);
            }
        });
    });
    //CART
    $("#info-cart-wp").on('change','.num-order',function(){
        var num_order = Number($(this).val());
        var total = Number($(".table #total-price").attr('data-total'));
        var id = $(this).attr('data-id');
        var num = Number($(".table .num-order"+id).attr('data_max_num'));
        $(this).attr('value',num_order);
        if(num_order > num){
            alert("Số lượng trong kho không đủ!");
            $(this).val(num);
            $(this).attr('value',num);
        }
        console.log(id);
        $.ajax({
            url: "?mod=cart&act=num_change",
            method: 'POST',
            data: {
                num_order: num_order,
                id: id,
                total: total
            },
            dataType: "json",
            success: function(result) {
                $("#info-cart-wp .subtotal"+id).text(result.subtotal);
                $("#info-cart-wp #total-price span").text(result.total_format);
                $(".table #total-price").attr('data-total',result.total);
            },
            error:function(xhr, ajaxOptions, throwError){
                //alert(xhr.status);
                alert(throwError);
            }
        });
    });

    $("#detail-product-wp #num-order-wp").on("click", ".change-num", function(){
        var num_order = $("#detail-product-wp #num-order-wp #num-order").val();
        var id = $("#detail-product-wp #num-order-wp #num-order").attr("data-id");
        $.ajax({
            url: "?mod=products&act=num_change",
            method: 'POST',
            data: {
                num_order: num_order,
                id: id,
            },
            dataType: "Text",
            success: function(result) {
                $(".btn-change").html(result);
            },
            error:function(xhr, ajaxOptions, throwError){
                //alert(xhr.status);
                alert(throwError);
            }
        });
    });

    //Trạng thái sản phẩm
    if($(".num-product .status").text() == "Còn hàng"){
        $(".num-product .status").css({'background':'#0d4'});
    }else{
        $(".num-product .status").css({'background':'#f22'});
    }

    //bình luận
    $("#comment .submit").click(function(){
        var cmt = $("#comment .comment_text").val();
        var id = $("#detail-product-wp #num-order-wp #num-order").attr("data-id");

        $.ajax({
            url : "?mod=products&act=add_comment",
            method: 'POST',
            data : {
                cm : cmt,
                id : id
            },
            dataType : "Text",
            success: function(result) {
                $(".list_comment").prepend(result);
            },
            error:function(xhr, ajaxOptions, throwError){
                //alert(xhr.status);
                alert(throwError);
            }
        });
    });
});

function tab() {
    var tab_menu = $('#tab-menu li');
    tab_menu.stop().click(function () {
        $('#tab-menu li').removeClass('show');
        $(this).addClass('show');
        var id = $(this).find('a').attr('href');
        $('.tabItem').hide();
        $(id).show();
        return false;
    });
    $('#tab-menu li:first-child').addClass('show');
    $('.tabItem:first-child').show();
}

//ajax
//Xóa sản phẩm
