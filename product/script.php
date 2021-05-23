<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js" integrity="sha512-f0VlzJbcEB6KiW8ZVtL+5HWPDyW1+nJEjguZ5IVnSQkvZbwBt2RfCBY0CBO1PsMAqxxrG4Di6TfsCPP3ZRwKpA==" crossorigin="anonymous"></script>

<script>
    // With JQuery
    $("#ex8").slider({
        tooltip: 'always',
        tooltip_position: 'bottom'
    });
    $("#ex9").slider({
        tooltip: 'always',
        tooltip_position: 'bottom'
    });
    // 火箭推
    // function top0() {
    //     window.scrollTo({
    //         top: 0,
    //         behavior: "smooth"
    //     })
    // }
    //導覽列特效
    $(document).ready(function() {
        $('.shop_nav_li').hover(function() {
            $(this).css('transform', 'scale(1.1)')
        });
        $('.shop_nav_li').click(function() {
            $(this).css('color', '#cc543a')
        });
    });
    $('.shop_nav_li').mouseleave(function() {
        $('.shop_effect').css('transform', 'scale(1)');
        $('.shop_effect').css('color', '#000');
    });
    //商品分類欄位特效
    $(document).ready(function() {
        $('.shop_effect').hover(function() {
            // $(this).css('transform', 'scale(1.1)');

        });
        $('.shop_effect').click(function() {
            $(this).css('color', '#cc543a');

        });
    });
    $('.shop_effect').mouseleave(function() {
        $('.shop_effect').css('transform', 'scale(1)');
        $('.shop_effect').css('color', '#000');
    });
    //換頁按鈕特效
    // $('.page-item').hover(function () {
    //     $(this).css('color', '#fff');
    //     $(this).css('background-color', '#cc543a');
    // })
    //手機按鈕
    $('.shop_phone_btn').hover(function() {
        $(this).css('color', '#fff');
        $(this).css('background-color', '#cc543a');
        $(this).css('border', 'transparent');
    })
    $('.shop_phone_btn').mouseleave(function() {
        $(this).css('color', '#a2a2a2');
        $(this).css('background-color', '#fff');
    })
    //加入我的最愛按鈕
    $(".shop_icon").click(function() {
        // console.log('hi');
        $(this).toggleClass('active');
    });
    // -----------------
    $(".py-1.shop_effect").click(function() {
        //location.href = "?Categories=" + $(this).html();
        location.href = "?" + $(this).attr('data-p');

    });
    // $(".py-1.shop_effect").click(function() {
    //     location.href = "?Joint AND_Popular=" + $(this).html();
    // });
    $(".page-link.shop_page-item").click(function() {
        searchkey = location.search.split('&');
        searchkey.forEach(function(item) {
            if (item.includes("page="))
                searchkey.splice(searchkey.indexOf(item), 1)
        });

        if (location.search == "") {
            location.href = "?page=" + $(this).attr('value');
        } else
        if (searchkey.length == 0) {
            location.href = "?page=" + $(this).attr('value');
        } else {
            location.href = location.pathname + searchkey.join('&') + "&page=" + $(this).attr('value');
        }
    });
    // $("#exampleFormControlSelect1").change(function() {
    //    location.href = "?Sort_by=" + $(this).find("option:selected").html();
    // });
    function onSelect(selectObject) {
        console.log(selectObject.value);
        location.href = selectObject.value;
    }
    // ------------------------------
    $(document).ready(function() {
        $(".shop_card_body .shop_icon").click(function() {
            const card_id = $(this).closest('.shop_card_body').attr('data-sid');

            console.log({
                card_id
            });


            /*
            $.ajax({
                type: "POST", //傳送方式
                url: "product_api.php", //傳送目的地
                dataType: "json", //資料格式
                data: { //傳送資料
                    CardContent: $("#shop_card_text_body").val(), //表單欄位 ID nickname
                    CadTitle: $("#shop_cad_title").val() //表單欄位 ID gender
                },
                success: function(data) {
                    if (data.shop_card - text_body) { //如果後端回傳 json 資料有 nickname
                        $("#card_body")[0].reset(); //重設 ID 為 demo 的 form (表單)
                        $("#result").html('<font color="#007500">您的暱稱為「<font color="#0000ff">' + data.nickname + '</font>」，性別為「<font color="#0000ff">' + data.gender + '</font>」！</font>');
                    } else { //否則讀取後端回傳 json 資料 errorMsg 顯示錯誤訊息
                        $("#card_body")[0].reset(); //重設 ID 為 demo 的 form (表單)
                        $("#result").html('<font color="#ff0000">' + data.errorMsg + '</font>');
                    }
                },
                error: function(jqXHR) {
                    $("#card_body")[0].reset(); //重設 ID 為 demo 的 form (表單)
                    $("#result").html('<font color="#ff0000">發生錯誤：' + jqXHR.status + '</font>');
                }
            })
            */
        })
    });
    // --------------------------
    // const addToCartBtn = $('#card_body');
    // addToCartBtn.click(function() {
    //     const card = $(this).closest('#shop_icon_Love');
    //     const pid = card.attr('#card_body');
    //     const qty = card.find('#shop_cad_title').val;

    //     $.get {
    //         ('product_api.php', {
    //             action: 'add',
    //             pid,
    //             qty
    //         }, function(date) {
    //             console.log(date);
    //             showCartCount(date);
    //         }, 'json');
    //     }

    // })
</script>