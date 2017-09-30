<!doctype html>
<head>



<meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>


<style type="text/css">
    html, body {
    margin: 0;
    padding: 0;
}

img {
    border: 0;
    vertical-align: middle;
}

body {
    font-family: "Helvetica Neue";
    background-color: #202227;
    background-image: url('body.png');
}
    .body__top {
        top: 0;
        left: 0;
        width: 100%;
        height: 321px;
        z-index: -1;
        position: absolute;
        background-image: url('body__top.png');
    }



h2 {
    margin: 0 0 10px;
    font-size: 40px;
    font-family: 'Roboto', sans-serif;
    font-weight: 300;
    text-shadow: 0 1px 1px #fff;
}


.view-on-github {
    top: 160px;
    right: 5%;
    width: 114px;
    height: 80px;
    display: block;
    position: absolute;
    background: url('view-on-github.png') no-repeat;
}


.logo {
    display: inline-block;
    background-position: no-repeat;
}
    .logo_small {
        width: 43px;
        height: 15px;
        background-image: url('logo_small.png');
    }


.splash {
    width: 650px;
    height: 370px;
    margin: 30px auto 0;
    box-shadow: 0 1px 1px rgba(255,255,255,.2);
    border-radius: 4px;
    background-color: #000;
    position: relative;
}
    .splash__inner {
        top: 3px;
        left: 3px;
        right: 3px;
        bottom: 3px;
        overflow: hidden;
        position: absolute;
    }

    .splash__blind {
        width: 100%;
        height: 100%;
        cursor: pointer;
        position: absolute;
        border-radius: 4px;
        background-image: url('splash__blind.png');
    }

    .splash__logo {
        top: 50%;
        left: 50%;
        width: 284px;
        height: 201px;
        margin: -120px 0 0 -142px;
        position: absolute;
        background: url('splash__logo.png') no-repeat;
    }

    .splash__click-here {
        right: 60px;
        bottom: 40px;
        width: 66px;
        height: 25px;
        position: absolute;
        background: url('click-here.png') no-repeat;
        cursor: pointer;
    }


.content {
    width: 80%;
    max-width: 1200px;
    margin: 60px auto;
    border: 1px solid #fff;
    position: relative;
    min-height: 400px;
    background-color: #F4F7F1;
    background-image: url('content.png');
}
    .content__head {
        top: -21px;
        left: 36px;
        right: 36px;
        height: 20px;
        position: absolute;
        text-align: center;
        background-image: url('content__head.png');
    }

    .content__head:before, .content__head:after {
        top: 0;
        left: 0;
        width: 100%;
        bottom: 0;
        z-index: -1;
        content: '';
        position: absolute;
        background-image: url('content__head.png');
    }
    .content__head:before {
        left: 20px;
        -webkit-transform: skew(60deg);
        -moz-transform: skew(60deg);
        transform: skew(60deg);
    }
    .content__head:after {
        left: auto;
        right: 20px;
        -webkit-transform: skew(-60deg);
        -moz-transform: skew(-60deg);
        transform: skew(-60deg);
    }





.example {
    margin: 25px;
}
    .example__left {
        float: left;
        width: 290px;
        text-align: center;
    }

    .example__right {
        margin-left: 320px;
    }

    .example__code {
        padding: 1px 20px 0 20px;
        overflow: auto;
        max-height: 400px;
        border-right: 4px solid #DDE0DA;
        border-bottom: 4px solid #DDE0DA;
        background-color: #fff;
    }

    .example h2 {
        overflow: hidden;
    }
        .example h2 span {
            float: left;
            display: block;
        }

    .example__tabs {
        display: block;
        font-size: 14px;
        vertical-align: top;
    }
        .example__tabs a {
            color: #36c;
            cursor: pointer;
            margin: 0 5px 2px;
            border-bottom: 1px dotted #36c;
        }
            .example__tabs a.active {
                color: #333;
                cursor: default;
                margin: 0;
                padding: 0 5px 2px;
                border-bottom: 0;
                background-color: rgba(0,0,0,.1);
                *background-color: #eee;
            }



.btn {
    cursor: pointer;
    display: inline-block;
    *zoom: 1;
    *display: inline;
    position: relative;
    overflow: hidden;
    font-size: 20px;
    font-family: Arial, Helvetica, sans-serif;
    border-radius: 4px;
    vertical-align: middle;
}
    .btn-success {
        border: 1px solid rgba(0,0,0,.2);
        padding: 8px 20px;
        background-color: #FFDC73;
        background: -moz-linear-gradient(top,#FFE599 0%,#FFDC73);
        background: -webkit-gradient(linear, left top, left bottom,from(#FFE599),to(#FFDC73));
        box-shadow: 0 1px 1px rgba(255,255,255,.5);
    }

        .btn-success.btn-small[aria-disabled],
        .btn-primary[disabled],
        .btn-warning[disabled] {
            opacity: .7;
        }


    .btn-primary {
        color: #333;
        border: 1px solid rgba(0,0,0,.2);
        padding: 8px 20px;
        background-color: #62c462;
        background: -moz-linear-gradient(top,#62c462 0%,#51a351);
        background: -webkit-gradient(linear, left top, left bottom,from(#62c462),to(#51a351));
        box-shadow: 0 1px 1px rgba(255,255,255,.5);
    }

    .btn-warning {
        color: #333;
        border: 1px solid rgba(0,0,0,.2);
        padding: 8px 20px;
        background-color: #bd362f;
        background: -moz-linear-gradient(top,#ee5f5b 0%,#bd362f);
        background: -webkit-gradient(linear, left top, left bottom,from(#ee5f5b),to(#bd362f));
        box-shadow: 0 1px 1px rgba(255,255,255,.5);
    }

    .btn-small {
        padding: 5px 10px;
        font-size: 16px;
    }

    .btn input {
        top: -10px;
        right: -40px;
        z-index: 2;
        position: absolute;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
        font-size: 50px;
        cursor: pointer;
    }

    .btn-txt {
        position: relative;
    }

    .btn .progress {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: .5;
        position: absolute;
    }
        .progress .bar {
            width: 0;
            top: 0;
            left: 0;
            bottom: 0;
            position: absolute;
            background-color: #f60;
        }


.progress-small {
    height: 5px;
    padding: 1px;
    box-shadow: 0 0 1px 1px rgba(255, 255, 255, 0.3);
    border-radius: 10px;
    background-color: rgba(0,0,0,.5);
}
    .progress-small .bar {
        width: 0;
        height: 100%;
        position: static;
        border-radius: 10px;
        background-color: orange;
    }




.webcam,
.userpic {
    width: 200px;
    height: 200px;
    border: 2px solid #aaa;
    display: inline-block;
    position: relative;
    background: url('uploader/userpic.gif') no-repeat;
    background-size: cover;
}
    .webcam .btn,
    .userpic .btn {
        margin-top: 150px;
    }

    .webcam__preview,
    .userpic__preview {
        position: absolute;
    }

.webcam {
    background-size: auto;
    background-image: url('uploader/webcam.png');
    background-position: center 10px;
}


.b-upload {
    white-space: nowrap;
}
    .b-upload__name,
    .b-upload__size {
        display: inline-block;
        position: relative;
        overflow: hidden;
        max-width: 150px;
        vertical-align: middle;
    }
        .b-upload__size {
            color: #666;
            font-size: 12px;
        }

    .b-upload .js-files:after {
        clear: both;
        content: '';
        display: block;
    }

    .b-upload__dnd {
        padding: 30px;
        border-radius: 5px;
        margin-bottom: 10px;
        background-color: rgba(0,0,0,.1);
    }
        .b-upload__dnd_hover {
            color: #fff;
            background-color: orange;
        }

    .b-upload__hint {
        padding: 5px 8px;
        font-size: 12px;
        white-space: normal;
        border-radius: 3px;
        background-color: rgba(0,0,0,.08);
    }





.b-thumb {
    float: left;
    margin: 3px;
    padding: 5px;
    overflow: hidden;
    position: relative;
    box-shadow: 0 0 2px rgba(0,0,0,.4);
    background-color: #fff;
}
    .b-thumb__del {
        top: -6px;
        right: -1px;
        color: #FF0000;
        cursor: pointer;
        opacity: 0;
        z-index: 999;
        position: absolute;
        font-size: 20px;
        -webkit-transition: opacity .1s ease-in;
        -moz-transition: opacity .1s ease-in;
        transition: opacity .1s ease-in;
    }
        .b-thumb:hover .b-thumb__del {
            opacity: 1;
        }

    .b-thumb__rotate {
        top: 40%;
        left: 50%;
        width: 32px;
        height: 32px;
        cursor: pointer;
        margin: -16px 0 0 -16px;
        position: absolute;
        background: url('uploader/rotate.png');
    }

    .b-thumb__preview {
        width: 80px;
        height: 80px;
        -webkit-transition: -webkit-transform .2s ease-in;
        -moz-transition: -moz-transform .2s ease-in;
        transition: transform .2s ease-in;
    }
        .b-thumb__preview__pic {
            width: 100%;
            height: 100%;
            background: url('uploader/file-icon.png') 50% 50% no-repeat;
        }

    .b-thumb__name {
        width: 80px;
        overflow: hidden;
        font-size: 12px;
    }

    .b-thumb__progress {
        top: 75px;
        left: 10px;
        right: 10px;
        position: absolute;
    }



.btn {
    cursor: pointer;
    *zoom: 1;
    *display: inline;
    display: inline-block;
    position: relative;
    overflow: hidden;
    font-size: 20px;
    font-family: Arial;
    border-radius: 4px;
    vertical-align: middle;
}
    .btn_browse {
        border: 1px solid rgba(0,0,0,.2);
        padding: 8px 20px;
        background-color: #FFDC73;
        background: -moz-linear-gradient(top,#FFE599 0%,#FFDC73);
        background: -webkit-gradient(linear, left top, left bottom,from(#FFE599),to(#FFDC73));
        box-shadow: 0 1px 1px rgba(255,255,255,.5);
    }
        .btn_browse_small {
            padding: 5px 10px;
            font-size: 16px;
        }

        .btn_browse_small[aria-disabled] {
            opacity: .5;
        }

    .btn_choose {
        color: #fff;
        border: 2px solid rgba(255,255,255,.4);
        padding: 5px 10px;
        text-shadow: 0 1px 1px rgba(0,0,0,.3);
        background-color: rgba(0,0,0,.4);
        *background-color: #aaa;
    }

    .btn__inp {
        top: -10px;
        right: -10px;
        cursor: pointer;
        filter: alpha(opacity=0);
        opacity: 0;
        font-size: 50px;
        position: absolute;
    }

    .btn__progress {
        top: 0;
        left: 0;
        height: 100%;
        opacity: .5;
        position: absolute;
        background-color: #f60;
    }


.fileprogress {
    padding: 1px;
    height: 5px;
    box-shadow: 0 0 1px 1px rgba(255, 255, 255, 0.3);
    border-radius: 10px;
    background-color: rgba(0,0,0,.5);
}
    .fileprogress__bar {
        width: 0;
        height: 100%;
        border-radius: 10px;
        background-color: orange;
    }




.userpic {
    width: 200px;
    height: 200px;
    border: 2px solid rgba(0,0,0,.3);
    display: inline-block;
    position: relative;
}
    .userpic .btn {
        margin-top: 150px;
    }

    .userpic__preview {
        position: absolute;
    }


.b-upload {
    white-space: nowrap;
}
    .b-upload__name,
    .b-upload__size {
        display: inline-block;
        position: relative;
        overflow: hidden;
        max-width: 150px;
        vertical-align: middle;
    }
        .b-upload__size {
            color: #666;
            font-size: 12px;
        }

    .b-upload .js-files:after {
        clear: both;
        content: '';
        display: block;
    }

    .b-upload__dnd {
        padding: 30px;
        border-radius: 5px;
        margin-bottom: 10px;
        background-color: rgba(0,0,0,.1);
    }
        .b-upload__dnd_hover {
            color: #fff;
            background-color: orange;
        }



.themodal-overlay {
    position: fixed;
    bottom: 0;
    left: 0;
    top: 0;
    right: 0;
    z-index: 100000;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

.lock {
    overflow: hidden;
}

.popup {
    margin: 25px;
    float: left;
    display: inline-block;
    box-shadow: 0 0 5px #000;
    background-color: #fff;
}
    .popup__body {
        margin: 10px 10px 5px;
    }




/**
 * XCode style (c) Angel Garcia <angelgarcia.mail@gmail.com>
 */

pre code {
  display: block; padding: 0.5em;
  color: black;
}

pre .comment,
pre .template_comment,
pre .javadoc,
pre .comment * {
  color: rgb(0,106,0);
}

pre .keyword,
pre .literal,
pre .nginx .title {
  color: rgb(170,13,145);
}
pre .method,
pre .list .title,
pre .tag .title,
pre .setting .value,
pre .winutils,
pre .tex .command,
pre .http .title,
pre .request,
pre .status {
  color: #008;
}

pre .envvar,
pre .tex .special {
  color: #660;
}

pre .string {
  color: rgb(196,26,22);
}
pre .tag .value,
pre .cdata,
pre .filter .argument,
pre .attr_selector,
pre .apache .cbracket,
pre .date,
pre .regexp {
  color: #080;
}

pre .sub .identifier,
pre .pi,
pre .tag,
pre .tag .keyword,
pre .decorator,
pre .ini .title,
pre .shebang,
pre .prompt,
pre .hexcolor,
pre .rules .value,
pre .css .value .number,
pre .symbol,
pre .symbol .string,
pre .number,
pre .css .function,
pre .clojure .title,
pre .clojure .built_in {
  color: rgb(28,0,207);
}

pre .class .title,
pre .haskell .type,
pre .smalltalk .class,
pre .javadoctag,
pre .yardoctag,
pre .phpdoc,
pre .typename,
pre .tag .attribute,
pre .doctype,
pre .class .id,
pre .built_in,
pre .setting,
pre .params,
pre .clojure .attribute {
  color: rgb(92,38,153);
}

pre .variable {
 color: rgb(63,110,116);
}
pre .css .tag,
pre .rules .property,
pre .pseudo,
pre .subst {
  color: #000;
}

pre .css .class, pre .css .id {
  color: #9B703F;
}

pre .value .important {
  color: #ff7700;
  font-weight: bold;
}

pre .rules .keyword {
  color: #C5AF75;
}

pre .annotation,
pre .apache .sqbracket,
pre .nginx .built_in {
  color: #9B859D;
}

pre .preprocessor,
pre .preprocessor * {
  color: rgb(100,56,32);
}

pre .tex .formula {
  background-color: #EEE;
  font-style: italic;
}

pre .diff .header,
pre .chunk {
  color: #808080;
  font-weight: bold;
}

pre .diff .change {
  background-color: #BCCFF9;
}

pre .addition {
  background-color: #BAEEBA;
}

pre .deletion {
  background-color: #FFC8BD;
}

pre .comment .yardoctag {
  font-weight: bold;
}

pre .method .id {
  color: #000;
}

</style>

<html>
<body>

<script>
        var examples = [];
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>!window.jQuery && document.write('<script src="/js/jquery.dev.js"><'+'/script>');</script>  

            <div class="example">
                <div class="example__left" style="padding-top:120px">
                    <div id="userpic" class="userpic">
                        <div class="js-preview userpic__preview"></div>
                        <div class="btn btn-success js-fileapi-wrapper">
                            <div class="js-browse">
                                <span class="btn-txt">Choose</span>
                                <input type="file" name="filedata"/>
                            </div>
                            <div class="js-upload" style="display: none;">
                                <div class="progress progress-success"><div class="js-progress bar"></div></div>
                                <span class="btn-txt">Uploading</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="example__right">
                    <h2><span>Userpic + crop</span></h2>
                </div>
                 <script>
        var FileAPI = {
              debug: true
            , media: true
            , staticPath: './js/jquery.fileapi/FileAPI/'
        };
    </script>


                <script>
                    examples.push(function (){
                        $('#userpic').fileapi({
                            type:'POST',
                            url: 'fileapi/cont.php',
                            accept: 'image/*',
                            imageSize: { minWidth: 200, minHeight: 200 },
                            elements: {
                                active: { show: '.js-upload', hide: '.js-browse' },
                                preview: {
                                    el: '.js-preview',
                                    width: 200,
                                    height: 200
                                },
                                progress: '.js-progress'
                            },
                            onSelect: function (evt, ui){
                                var file = ui.files[0];

                                if( !FileAPI.support.transform ) {
                                    alert('Your browser does not support Flash :(');
                                }
                                else if( file ){
                                    $('#popup').modal({
                                        closeOnEsc: true,
                                        closeOnOverlayClick: false,
                                        onOpen: function (overlay){
                                            $(overlay).on('click', '.js-upload', function (){
                                                $.modal().close();
                                                $('#userpic').fileapi('upload');
                                            });

                                            $('.js-img', overlay).cropper({
                                                file: file,
                                                bgColor: '#fff',
                                                maxSize: [$(window).width()-100, $(window).height()-100],
                                                minSize: [200, 200],
                                                selection: '90%',
                                                onSelect: function (coords){
                                                    $('#userpic').fileapi('crop', file, coords);
                                                }
                                            });
                                        }
                                    }).open();
                                }
                            }
                        });
                    });
                </script>
            </div>

<div class="example">
                <div class="example__left" style="text-align: left; padding-top: 100px;">
                    <div id="multiupload">
                        <form class="b-upload b-upload_multi" action="http://rubaxa.org/FileAPI/server/ctrl.php" method="POST" enctype="multipart/form-data">
                            <div class="b-upload__hint">Добавить файлы в очередь загрузки, например изображения ;]</div>

                            <div class="js-files b-upload__files">
                                <div class="js-file-tpl b-thumb" data-id="<%=uid%>" title="<%-name%>, <%-sizeText%>">
                                    <div data-fileapi="file.remove" class="b-thumb__del">✖</div>
                                    <div class="b-thumb__preview">
                                        <div class="b-thumb__preview__pic"></div>
                                    </div>
                                    <% if( /^image/.test(type) ){ %>
                                        <div data-fileapi="file.rotate.cw" class="b-thumb__rotate"></div>
                                    <% } %>
                                    <div class="b-thumb__progress progress progress-small"><div class="bar"></div></div>
                                    <div class="b-thumb__name"><%-name%></div>
                                </div>
                            </div>

                            <hr/>
                            <div class="btn btn-success btn-small js-fileapi-wrapper">
                                <span>Add</span>
                                <input type="file" name="filedata" />
                            </div>
                            <div class="js-upload btn btn-success btn-small">
                                <span>Upload</span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="example__right">
                    <h2><span>Multiupload</span></h2>
                </div>
                <script>
                    examples.push(function (){
                        $('#multiupload').fileapi({
                            multiple: true,
                            elements: {
                                ctrl: { upload: '.js-upload' },
                                empty: { show: '.b-upload__hint' },
                                emptyQueue: { hide: '.js-upload' },
                                list: '.js-files',
                                file: {
                                    tpl: '.js-file-tpl',
                                    preview: {
                                        el: '.b-thumb__preview',
                                        width: 80,
                                        height: 80
                                    },
                                    upload: { show: '.progress', hide: '.b-thumb__rotate' },
                                    complete: { hide: '.progress' },
                                    progress: '.progress .bar'
                                }
                            }
                        });
                    });
                </script>
            </div>




    <div id="popup" class="popup" style="display: none;">
        <div class="popup__body"><div class="js-img"></div></div>
        <div style="margin: 0 0 5px; text-align: center;">
            <div class="js-upload btn btn_browse btn_browse_small">Upload</div>
        </div>
    </div>



 <link href="js/jquery.fileapi/jcrop/jquery.Jcrop.min.css" rel="stylesheet" type="text/css"/>




    
        

    <script>
        var FileAPI = {
              debug: true
            , media: true
            , staticPath: './FileAPI/'
        };
    </script>
<script src="js/jquery.fileapi/FileAPI/FileAPI.min.js"></script>
<script src="js/jquery.fileapi/FileAPI/FileAPI.exif.js"></script>
<script src="js/jquery.fileapi/jquery.fileapi.js"></script>
<script src="js/jquery.fileapi/jcrop/jquery.Jcrop.min.js"></script>


<script src="js/jquery.fileapi/statics/jquery.modal.js"></script>


    <script>
        jQuery(function ($){
            

            // Init examples
            FileAPI.each(examples, function (fn){
                fn();
            });
        });
    </script>


</body>
</html>


