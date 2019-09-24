// // 鏂囦欢涓婁紶
// jQuery(function() {
//     var $ = jQuery,
//         $list = $('#thelist'),
//         $btn = $('#ctlBtn'),
//         state = 'pending',
//         uploader;

//     uploader = WebUploader.create({

//         // 涓嶅帇缂﹊mage
//         resize: false,

//         // swf鏂囦欢璺緞
//         swf: BASE_URL + '/js/Uploader.swf',

//         // 鏂囦欢鎺ユ敹鏈嶅姟绔€�
//         server: 'http://webuploader.duapp.com/server/fileupload.php',

//         // 閫夋嫨鏂囦欢鐨勬寜閽€傚彲閫夈€�
//         // 鍐呴儴鏍规嵁褰撳墠杩愯鏄垱寤猴紝鍙兘鏄痠nput鍏冪礌锛屼篃鍙兘鏄痜lash.
//         pick: '#picker'
//     });

//     // 褰撴湁鏂囦欢娣诲姞杩涙潵鐨勬椂鍊�
//     uploader.on( 'fileQueued', function( file ) {
//         $list.append( '<div id="' + file.id + '" class="item">' +
//             '<h4 class="info">' + file.name + '</h4>' +
//             '<p class="state">绛夊緟涓婁紶...</p>' +
//         '</div>' );
//     });

//     // 鏂囦欢涓婁紶杩囩▼涓垱寤鸿繘搴︽潯瀹炴椂鏄剧ず銆�
//     uploader.on( 'uploadProgress', function( file, percentage ) {
//         var $li = $( '#'+file.id ),
//             $percent = $li.find('.progress .progress-bar');

//         // 閬垮厤閲嶅鍒涘缓
//         if ( !$percent.length ) {
//             $percent = $('<div class="progress progress-striped active">' +
//               '<div class="progress-bar" role="progressbar" style="width: 0%">' +
//               '</div>' +
//             '</div>').appendTo( $li ).find('.progress-bar');
//         }

//         $li.find('p.state').text('涓婁紶涓�');

//         $percent.css( 'width', percentage * 100 + '%' );
//     });

//     uploader.on( 'uploadSuccess', function( file ) {
//         $( '#'+file.id ).find('p.state').text('宸蹭笂浼�');
//     });

//     uploader.on( 'uploadError', function( file ) {
//         $( '#'+file.id ).find('p.state').text('涓婁紶鍑洪敊');
//     });

//     uploader.on( 'uploadComplete', function( file ) {
//         $( '#'+file.id ).find('.progress').fadeOut();
//     });

//     uploader.on( 'all', function( type ) {
//         if ( type === 'startUpload' ) {
//             state = 'uploading';
//         } else if ( type === 'stopUpload' ) {
//             state = 'paused';
//         } else if ( type === 'uploadFinished' ) {
//             state = 'done';
//         }

//         if ( state === 'uploading' ) {
//             $btn.text('鏆傚仠涓婁紶');
//         } else {
//             $btn.text('寮€濮嬩笂浼�');
//         }
//     });

//     $btn.on( 'click', function() {
//         if ( state === 'uploading' ) {
//             uploader.stop();
//         } else {
//             uploader.upload();
//         }
//     });
// });


// 鍥剧墖涓婁紶demo
jQuery(function() {
    var $ = jQuery,
        $list = $('#fileList'),
        // 浼樺寲retina, 鍦╮etina涓嬭繖涓€兼槸2
        ratio = window.devicePixelRatio || 1,

        // 缂╃暐鍥惧ぇ灏�
        thumbnailWidth = 100 * ratio,
        thumbnailHeight = 100 * ratio,

        // Web Uploader瀹炰緥
        uploader;

    // 鍒濆鍖朩eb Uploader
    uploader = WebUploader.create({
        //添加一些自己需要的属性,用于异步请求post提交验证
        formData: {
            _token: $('input[name=_token]').val(),
        },

         // 选完文件后，是否自动上传
        auto: true,

        // swf文件路径
        swf: '/admin/webuploader/Uploader.swf',

         // 文件接收服务端。
        server: '/admin/uploader/webuploader',
 // 选择文件的按钮。可选。
    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#filePicker',

        // 只允许选择图片文件。
        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/*'
        }
    });

    // 当有文件添加进来的时候
    uploader.on( 'fileQueued', function( file ) {
        var $li = $(
                '<div id="' + file.id + '" class="file-item thumbnail">' +
                    '<img>' +
                    '<div class="info">' + file.name + '</div>' +
                '</div>'
                ),
            $img = $li.find('img');
    // $list为容器jQuery实例
    //选择新图之前清除旧图
        $('.thumbnail').remove();
        $list.append( $li );

    // 创建缩略图
    // 如果为非图片文件，可以不用调用此方法。
    // thumbnailWidth x thumbnailHeight 为 100 x 100
        uploader.makeThumb( file, function( error, src ) {
            if ( error ) {
                $img.replaceWith('<span>不能预览</span>');
                return;
            }

            $img.attr( 'src', src );
        }, thumbnailWidth, thumbnailHeight );
    });

// 文件上传过程中创建进度条实时显示。
    uploader.on( 'uploadProgress', function( file, percentage ) {
        var $li = $( '#'+file.id ),
            $percent = $li.find('.progress span');

    // 避免重复创建
        if ( !$percent.length ) {
            $percent = $('<p class="progress"><span></span></p>')
                    .appendTo( $li )
                    .find('span');
        }

        $percent.css( 'width', percentage * 100 + '%' );
    });

// 文件上传成功，给item添加成功class, 用样式标记上传成功。
    uploader.on( 'uploadSuccess', function( file , response ) {
        $( '#'+file.id ).addClass('upload-state-done');
        //需要将返回值中的pth写到隐藏域中
        $('input[name=avatar]').val(response.path);
    });

// 文件上传失败，显示上传出错。
    uploader.on( 'uploadError', function( file ) {
        var $li = $( '#'+file.id ),
            $error = $li.find('div.error');

// 完成上传完了，成功或者失败，先删除进度条。
        if ( !$error.length ) {
            $error = $('<div class="error"></div>').appendTo( $li );
        }

        $error.text('涓婁紶澶辫触');
    });

    // 瀹屾垚涓婁紶瀹屼簡锛屾垚鍔熸垨鑰呭け璐ワ紝鍏堝垹闄よ繘搴︽潯銆�
    uploader.on( 'uploadComplete', function( file ) {
        $( '#'+file.id ).find('.progress').remove();
    });
});
