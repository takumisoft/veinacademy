$(document).ready(function(){

    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    };

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

    $('.form-search img').on('click', function(){
        $('.form-search').submit();
    });

    if($('.zy-postcard-wrapper').length){
        $('.zy-postcard-wrapper').each(function(e){
            var height = $(this).height();
            $('.col-sm-2', this).height(height);
        });
    }

    var type = 0;
    $('.zy-postcard-post-type').each(function(){
        if($(this).height() > type){
            type = $(this).height();
        }
    });
    $('.zy-postcard-post-type').height(type);

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

    console.log('aas');

    $('#search-sort').on('change', function(){

        let val = $(this).val();
        
        if ( true ) {
            console.log('val: ' + val);
            var data = $('#form-post-types').serializeArray();
            var url = window.location.href.split('?')[0];
            var params = getSearchParameters();
            for(var i = 0; i < data.length; i++){
                params[data[i].value] = 1;
            }
            var newlink = [];
            var hasOrder = false;

            for(param in params){

                if (param == 'order') {
                    hasOrder = true;
                    newlink.push(param+'='+val);
                } else {
                    newlink.push(param+'='+params[param]);
                }

            }
            console.log('val: ' + val);
            if (!hasOrder){
                newlink.push('order'+'='+val);
            }
            console.log('val: ' + val);
            newlink = newlink.join('&');
            // get base URL
            var getUrl = window.location;
            if ( $('.results-query').text() != '' ) {
                var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];
            } else {
                var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
            }
            
            //
            console.log(baseUrl + '?' + newlink);
            window.location.href = baseUrl + '?' + newlink;
        }



        /*
        let search_parameter = getUrlParameter('s');
        if($(this).val() == 'VIEWS'){
            var ext = '?orderby=popular&order=DESC&s=' + search_parameter;
        }else{
            var ext = '?orderby=date&order=' + $(this).val() + '&s=' + search_parameter;
        }
        var link = window.location.href.split('?')[0];
        var linkfull = link + ext;

        console.log( 'views: ' + $(this).val() );
        console.log( 'linkfull: ' + linkfull );

        window.location.href = linkfull;
        */
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
    $(window).on('resize', function(){
        if ($(window).width() > 992){
            $('.menu-hamburger').removeClass('active');
            $('.menu-mobile').hide();
        }
    });

    function getSearchParameters() {
        var prmstr = window.location.search.substr(1);
        return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
    }
    
    function transformToAssocArray( prmstr ) {
        var params = {};
        var prmarr = prmstr.split("&");
        for ( var i = 0; i < prmarr.length; i++) {
            var tmparr = prmarr[i].split("=");
            params[tmparr[0]] = tmparr[1];
        }
        return params;
    }

    $('#form-post-types input').on('change', function(){
        var data = $('#form-post-types').serializeArray();
        var url = window.location.href.split('?')[0];
        var params = getSearchParameters();
        for(var i = 0; i < data.length; i++){
            params[data[i].value] = 1;
        }
        var newlink = [];
        for(param in params){

            newlink.push(param+'='+params[param]);

        }
        newlink = newlink.join('&');

        window.location.href = url + '?' + newlink;
    });

    $('.sort_item.clearall').click(function(){
        var data = $('#form-post-types').serializeArray();
        var params = getSearchParameters();
        for(var i = 0; i < data.length; i++){
            params[data[i].value] = 1;
        }
        var newlink = [];
        for(param in params){

            var result = param.split('[');

            if (result[0] != 'type') {
                newlink.push(param+'='+params[param]);
            }

        }
        
        newlink = newlink.join('&');

        // get base URL
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];
        //
        console.log(newlink);
        window.location.href = baseUrl + '?' + newlink;
    })

    $('.sort_item.noclear').click(function(){
        let tax_id = $(this).attr('data-id');
        //$('div[data-id="' + tax_id + '"]').remove();

        console.log('clicked on ID : ' + tax_id);
        var data = $('#form-post-types').serializeArray();
        var params = getSearchParameters();
        for(var i = 0; i < data.length; i++){
            params[data[i].value] = 1;
        }
        var newlink = [];
        for(param in params){

            var result = param.split('[');

            if (result[0] == 'type') {
                let this_id = result[2].replace("]", "");
                if (this_id != tax_id){
                    newlink.push(param+'='+params[param]);
                }
                console.log("TAX RESULT : " + this_id);
            } else {
                newlink.push(param+'='+params[param]);
            }

        }
        
        newlink = newlink.join('&');

        // get base URL
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0];
        //
        window.location.href = baseUrl + '?' + newlink;
    });

});