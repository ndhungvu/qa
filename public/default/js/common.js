/*Delete object*/
$(".jsDelete").confirm({
    title:"Comfirm",
    text: "Do you sure want to delete?",
    confirm: function(button) {
        var _this = button;
        var _id = _this.attr('attr-id');
        var _url = _this.attr('attr-href');
        var _CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: _url,
            type: "POST",
            data: {_token: _CSRF_TOKEN},
            dataType: 'JSON',
            success: function(res){
                if(res.status) {
                    _this.closest('tr').remove();
                    $('.jsMessage .alert').addClass('alert-success').html(res.message).show();
                }else {
                    $('.jsMessage .alert').addClass('alert-danger').html(res.message).show();
                }
                show_flash();
            },
            error:function(){
            }
        });
        button.fadeOut(2000).fadeIn(2000);
    },
    cancel: function(button) {
        button.fadeOut(2000).fadeIn(2000);
    },
    confirmButton: "Yes",
    cancelButton: "No"
});

/*Change status of object*/
$(".jsChangeStatus").on('click',function(){
    var _this = $(this);
    var _id = _this.attr('attr-id');
    var _status = _this.attr('attr-status');
    var _url = _this.attr('attr-href');
    var _CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: _url,
        type: "POST",
        data: {_token: _CSRF_TOKEN},
        dataType: 'JSON',
        success: function(res){
            if(res.status) {
                if(_status == 1) {
                    _this.attr('attr-status', 0);
                    _this.find('i').removeClass('fa-toggle-on').addClass('fa-toggle-off');
                }else {
                    _this.attr('attr-status', 1);
                    _this.find('i').removeClass('fa-toggle-off').addClass('fa-toggle-on');
                }
                
                $('.jsMessage .alert').addClass('alert-success').html(res.message).show();
            }else {
                $('.jsMessage .alert').addClass('alert-danger').html(res.message).show();
            }
            show_flash()
        },
        error:function(){
        }
    });
});

/*Change highlight of object*/
$(".jsChangeHighlight").on('click',function(){
    var _this = $(this);
    var _id = _this.attr('attr-id');
    var _status = _this.attr('attr-highlight');
    var _url = _this.attr('attr-href');
    var _CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: _url,
        type: "POST",
        data: {_token: _CSRF_TOKEN},
        dataType: 'JSON',
        success: function(res){
            if(res.status) {
                if(_status == 1) {
                    _this.attr('attr-highlight', 0);
                    _this.find('i').removeClass('fa-toggle-on').addClass('fa-toggle-off');
                }else {
                    _this.attr('attr-highlight', 1);
                    _this.find('i').removeClass('fa-toggle-off').addClass('fa-toggle-on');
                }
                
                $('.jsMessage .alert').addClass('alert-success').html(res.message).show();
            }else {
                $('.jsMessage .alert').addClass('alert-danger').html(res.message).show();
            }
            show_flash()
        },
        error:function(){
        }
    });
});

/*---Select checkbox---*/
$(".jsCheckboxAll").on('click',function(){
    if($(this).is(':checked')) {
        $('.jsCheckbox').each(function(){
            $(this).attr('checked','checked');
            $(this).prop('checked', true);
        });
    } else {
        $('.jsCheckbox').each(function(){
            $(this).removeAttr('checked');
            $(this).prop('checked', false);
        });
    }
});

$(".jsCheckbox").on('click',function(){
    if($(".jsCheckbox").length == $(".jsCheckbox:checked").length){
        $(".jsCheckboxAll").attr("checked","checked");
        $('.jsCheckboxAll').prop('checked', true);
    }else{
        $(".jsCheckboxAll").removeAttr("checked");
        $('.jsCheckboxAll').prop('checked', false);
    }
});

/*---Delete all item---*/
$('.jsDeleteAll').on('click',function(e){
    e.preventDefault();
    var _this = $(this);
    var checboxes = new Array();
    $(".jsCheckbox:checked").each(function() {
       checboxes.push($(this).val());
    });

    if(checboxes.length === 0) {
        alert('Please select item to delete.');
    }else {            
        $( ".jsDeleteAllComfirm" ).trigger( "click" );
    }
});

$(".jsDeleteAllComfirm").confirm({
    title:"Comfirm",
    text: "Do you sure want to delete?",
    confirm: function(button) {
        var checboxes = new Array();
        $(".jsCheckbox:checked").each(function() {
           checboxes.push($(this).val());
        });
        var _form = $("#frm");
        $.ajax({
            url: _form.attr('action'),
            type: _form.attr('method'),
            dataType: "JSON",
            data: _form.serialize(),
            success: function(res){
                if(res.status) {
                    checboxes.forEach(function(val) {
                        $('.jsCheckbox[value="'+val+'"]').closest('tr').remove();
                    });
                    $('.jsMessage .alert').addClass('alert-success').html(res.message).show();
                }else {
                    $('.jsMessage .alert').addClass('alert-danger').html(res.message).show();
                }
                show_flash();
            }
        });
        button.fadeOut(2000).fadeIn(2000);
    },
    cancel: function(button) {
        button.fadeOut(2000).fadeIn(2000);
    },
    confirmButton: "Yes",
    cancelButton: "No"
});

function show_flash() {
    setTimeout(function(){ $('.jsMessage p').hide(); }, 10000);
}

/*Upload image*/
$('.jsUploadImage').on('click',function(e){
    $('.jsImage').trigger('click');
    e.preventDefault();
    return false;
});

/*Change image*/
$('.jsImage').on('change', function(e){
    e.preventDefault();
    $('.jsLoading').show();
    var _frm = $(".frmUpload");
    var formData = new FormData();
    formData.append('image', $('#image')[0].files[0]);
    var _CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    formData.append('_token', _CSRF_TOKEN);
    $.ajax({
        url: '/photos/upload',
        data: formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,
        type: 'POST',
        success: function (res) {
            $('.jsLoading').hide();
            if(res.status) { 
                $('.img-active').attr('src',res.data);
                $('input[name ="image_tmp"]').val(res.data);

                $('.flash').html('').append('<div class="alert alert-success fade in flash_message">'+
                                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                                 '<strong></strong>'+
                             '</div>');
            }else {
                $('.flash').html('').append('<div class="alert alert-danger fade in flash_message">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                                '<strong></strong>'+
                            '</div>');
            }
            $(".flash .alert strong").html(res.message);
            show_flash();
        }
    });
    return false;    
});

/*Delete image*/
$('.jsDeleteImage').on('click',function(e){
    var image_old = $('input[name ="image_old"]').val();
    $('.img-active').attr('src',image_old);
    $('input[name ="image_tmp"]').val('');
    e.preventDefault();
    return false;
});

/*Upload Logo 1*/
$('.jsUploadLogo_1').on('click',function(e){
    $('.jsLogo_1').trigger('click');
    e.preventDefault();
    return false;
});
/*Change Logo 1*/
$('.jsLogo_1').on('change', function(e){
    e.preventDefault();
    $('.logo_1 .jsLoading').show();
    var _frm = $(".frmUpload");
    var formData = new FormData();
    formData.append('image', $('#logo_1')[0].files[0]);
    var _CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    formData.append('_token', _CSRF_TOKEN);
    $.ajax({
        url: '/photos/upload',
        data: formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,
        type: 'POST',
        success: function (res) {
            $('.jsLoading').hide();
            if(res.status) { 
                $('.logo_1 .logo-active').attr('src',res.data);
                $('.logo_1 input[name ="logo_1_tmp"]').val(res.data);

                $('.flash').html('').append('<div class="alert alert-success fade in flash_message">'+
                                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                                 '<strong></strong>'+
                             '</div>');
            }else {
                $('.flash').html('').append('<div class="alert alert-danger fade in flash_message">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                                '<strong></strong>'+
                            '</div>');
            }
            $(".flash .alert strong").html(res.message);
            show_flash();
        }
    });
    return false;    
});

/*Delete Logo 1*/
$('.jsDeleteLogo_1').on('click',function(e){
    var image_old = $('.logo_1 input[name ="logo_1_old"]').val();
    $('.logo_1 .logo-active').attr('src',image_old);
    $('.logo_1 input[name ="logo_1_tmp"]').val('');
    e.preventDefault();
    return false;
});

/*Upload Logo 2*/
$('.jsUploadLogo_2').on('click',function(e){
    $('.jsLogo_2').trigger('click');
    e.preventDefault();
    return false;
});
/*Change Logo 2*/
$('.jsLogo_2').on('change', function(e){
    e.preventDefault();
    $('.logo_2 .jsLoading').show();
    var _frm = $(".frmUpload");
    var formData = new FormData();
    formData.append('image', $('#logo_2')[0].files[0]);
    var _CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    formData.append('_token', _CSRF_TOKEN);
    $.ajax({
        url: '/photos/upload',
        data: formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,
        type: 'POST',
        success: function (res) {
            $('.jsLoading').hide();
            if(res.status) { 
                $('.logo_2 .logo-active').attr('src',res.data);
                $('.logo_2 input[name ="logo_2_tmp"]').val(res.data);

                $('.flash').html('').append('<div class="alert alert-success fade in flash_message">'+
                                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                                 '<strong></strong>'+
                             '</div>');
            }else {
                $('.flash').html('').append('<div class="alert alert-danger fade in flash_message">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                                '<strong></strong>'+
                            '</div>');
            }
            $(".flash .alert strong").html(res.message);
            show_flash();
        }
    });
    return false;    
});

/*Delete Logo 2*/
$('.jsDeleteLogo_2').on('click',function(e){
    var image_old = $('.logo_2 input[name ="logo_2_old"]').val();
    $('.logo_2 .logo-active').attr('src',image_old);
    $('.logo_2 input[name ="logo_2_tmp"]').val('');
    e.preventDefault();
    return false;
});

$("input.jsYoutubeLink").change( function() {
    var link = $(this).val();
    var _CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
            url: '/photos/youtube_photo',
            type: "POST",
            data: {_token: _CSRF_TOKEN,_link : link},
            dataType: 'JSON',
            success: function(res){
                if(res.status) {
                     $('.img-active').attr('src',res.data);
                    $('input[name ="image_tmp"]').val(res.data);
                }else {
                    $('.jsMessage .alert').addClass('alert-danger').html(res.message).show();
                }
                show_flash();
            },
            error:function(){
            }
        });
});