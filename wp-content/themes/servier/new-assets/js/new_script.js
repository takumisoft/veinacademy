$(document).ready(function(){
    if (($(window).scrollTop()) > 100) {
        $('#zy-sidebar').addClass('active');
        $('#zy-sidebar img').addClass('active');
    }else{
        $('#zy-sidebar').removeClass('active');
        $('#zy-sidebar img').removeClass('active');
    }
    $(window).scroll(function () {
        if (($(window).scrollTop()) > 100) {
            $('#zy-sidebar').addClass('active');
            $('#zy-sidebar img').addClass('active');
        }else{
            $('#zy-sidebar').removeClass('active');
            $('#zy-sidebar img').removeClass('active');
        }
    });

    if($('.zy-postcard-wrapper').length){
        $('.zy-postcard-wrapper').each(function(e){
            var height = $(this).height();
            $('.col-sm-2', this).height(height);
        });
    }

    $(document).on('click', function(e){
        var $target = $(e.target);
        if(!$target.parents('#search-post-types').length){
            $('.search-post-types-options').css('display', 'none');
        }else{
            $('.search-post-types-options').css('display', 'flex');
        }
        
    });
    $('#search-sort').select2({
        placeholder: "Sorted by"
    });

    $('.filter-item').on('click', function(){
        var toggle = $(this).attr('data-toggle');
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $('.zy-postcard').css('display', 'block');
        }else{
            $('.filter-item').removeClass('active');
            $(this).addClass('active');
            $('.zy-postcard').css('display', 'none');
            $('.zy-postcard.' + toggle).css('display', 'block');
        }
    });

    $('#form-post-types input').on('change', function(){
        var data = $('#form-post-types').serializeArray();
        console.log(data);
    });
});