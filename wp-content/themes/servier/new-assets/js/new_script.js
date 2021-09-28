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

    $('#form-search img').on('click', function(){
        $('#form-search').submit();
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

    $('#search-sort').on('change', function(){
        if($(this).val() == 'VIEWS'){
            var ext = '?orderby=popular&order=DESC';
        }else{
            var ext = '?orderby=date&order=' + $(this).val();
        }
        var link = window.location.href.split('?')[0];
        var linkfull = link + ext;
        window.location.href = linkfull;
    });

    $('.menu-hamburger').on('click', function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $('.menu-mobile').hide(200);
        }else{
            $(this).addClass('active');
            $('.menu-mobile').show(200);
        }
    });

    $('#form-post-types input').on('change', function(){
        var data = $('#form-post-types').serializeArray();
        console.log(data);
    });
});