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
</script>