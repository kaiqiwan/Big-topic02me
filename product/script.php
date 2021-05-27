<!-- <script src="../js/jquery-3.5.1.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
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
    $('.shop_phone_btn').toggleClass(function() {
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


    // ----------收藏愛心--------------
    const addToCartBtn = $('.shop_icon'); //換成愛心

    addToCartBtn.click(function() {
        const card = $(this).closest('.shop_card_body'); //產品卡片父層
        const shopId = card.attr('data-sid'); //pid改成shop_id


        // console.log({pid, qty}, card.find('.card-title').text());

        $.get('like_shop_api.php', { //改成判斷式php
            shop_id: shopId, //$shop_id

        }, function(data) { //data代表json的$output
            console.log(data);
            // showCartCount(data); // 更新選單上數量的提示 //計算購物車的商品數量
        }, 'json');

    })

    // ---------------分頁---------------------
    let cate = 0;
    let page = 1;
    let pData = {}; // 商品資料
    let categories = $('.categories button');
    const p_list = $('.p-list');
    const pagination = $('.pagination');

    const productTpl = o => {
        return `<div class="col-md-3">
            <div class="card" >
                <img src="/proj60/proj/imgs/small/${o.book_id}.jpg" class="card-img-top" alt="">
                <div class="card-body">
                    <h6 class="card-title">${o.bookname}</h6>
                    <p><i class="fas fa-user-friends"></i> ${o.author}</p>
                    <p><i class="fas fa-dollar-sign"></i> ${o.price}</p>
                </div>
            </div>
        </div>
        `;
    }
    const pageBtnTpl = n => {
        return `<li class="page-item ${ n===page ? 'active' : '' }">
                <a class="page-link" href="javascript: changePage(${n})">${n}</a>
            </li>
        `;
    }

    categories.click(function() {
        categories.removeClass('active');
        $(this).addClass('active');
        // console.log(this);


    });

    // 取得商品資料
    function getProducts() {
        $.get('product-list-api.php', {
            cate,
            page
        }, function(data) {
            pData = data;
            renderProducts();
            renderPagination();

        }, 'json');

    }
    //ajax
    categories.eq(0).click();

    function changeCate(c) {
        cate = c;
        page = 1;
        getProducts();
    }

    function changePage(p) {
        page = p;
        getProducts();
    }

    // 產生商品畫面的區塊
    function renderProducts() {
        p_list.html('');
        if (pData.rows && pData.rows.forEach) {
            pData.rows.forEach(el => {
                p_list.append(productTpl(el));
            });
        }
    }

    function renderPagination() {
        pagination.html('');
        for (let i = 1; i <= pData.totalPages; i++) {
            pagination.append(pageBtnTpl(i));
        }
    }
</script>