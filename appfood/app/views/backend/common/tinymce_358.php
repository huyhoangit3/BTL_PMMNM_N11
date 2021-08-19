<script type="text/javascript" src="template/plugins/tinymce/tinymce.min.js"></script>
<script src="template/plugins/fancybox/js/jquery.fancybox.js"></script>
<script src="template/plugins/switchery/switchery.min.js"></script>
    <script type="text/javascript">
        Switchery.init($(".js-switch"), {
          color:"#64bd63",
          secondaryColor:"#dfdfdf",
          jackColor:"#fff",
          size:"small"
        });
        
    </script>

<script type="text/javascript">
function ChangeToSlug()
        {
            var title, slug;
         
            //Lấy text từ thẻ input title 
            title = document.getElementById("txtTitle").value;
         
            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();
         
            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            slug = slug.replace(/  /gi, "-");
            slug = slug.replace(/   /gi, "-");
            slug = slug.replace(/    /gi, "-");
            slug = slug.replace(/     /gi, "-");
            slug = slug.replace(/      /gi, "-");
            slug = slug.replace(/       /gi, "-");
            slug = slug.replace(/        /gi, "-");
            slug = slug.replace(/         /gi, "-");
            slug = slug.replace(/          /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('txtSlug').value = slug;
        }
tinymce.init({
    mode : "textareas",
    editor_selector : "wysiwygEditor", // Sử dụng với class
    entity_encoding : "raw", // Thay Ch&agrave;o c&aacute;c bạn = Chào các bạn
    verify_html: false,
    editor_deselector: "simple",
    forced_root_block : "", 
    force_br_newlines : false,
    force_p_newlines : true,
    theme: "modern",
    skin: "bootmce",
    elementpath: false,
    height: 300,
    width:800,
    relative_urls : false,
    remove_script_host: false,
    language : 'vi_VN',
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager mfnsc",
   ],
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | responsivefilemanager | print preview media fullpage | forecolor backcolor emoticons | fullscreen code",
    external_plugins: { "filemanager" : "<?=CMS_URL?>template/plugins/filemanager/plugin.min.js"},

   style_formats: [
      {title: "Headers", items: [
          {title: "Header 1", format: "h1"},
          {title: "Header 2", format: "h2"},
          {title: "Header 3", format: "h3"},
          {title: "Header 4", format: "h4"},
          {title: "Header 5", format: "h5"},
          {title: "Header 6", format: "h6"}
      ]},
      {title: "Inline", items: [
          {title: "Bold", icon: "bold", format: "bold"},
          {title: "Italic", icon: "italic", format: "italic"},
          {title: "Underline", icon: "underline", format: "underline"},
          {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
          {title: "Superscript", icon: "superscript", format: "superscript"},
          {title: "Subscript", icon: "subscript", format: "subscript"},
          {title: "Code", icon: "code", format: "code"}
      ]},
      {title: "Blocks", items: [
          {title: "Paragraph", format: "p"},
          {title: "Blockquote", format: "blockquote"},
          {title: "Div", format: "div"},
          {title: "Pre", format: "pre"}
      ]},
      {title: "Alignment", items: [
          {title: "Left", icon: "alignleft", format: "alignleft"},
          {title: "Center", icon: "aligncenter", format: "aligncenter"},
          {title: "Right", icon: "alignright", format: "alignright"},
          {title: "Justify", icon: "alignjustify", format: "alignjustify"}
      ]}
    ],
    external_filemanager_path:"<?=CMS_URL?>template/plugins/filemanager/",
    filemanager_title:"Quản lý tài nguyên - Hãy sắp xếp hình ảnh và tập tin một cách khoa học"
 });
tinymce.init({
    mode : "textareas",
    editor_selector : "description", // Sử dụng với class
    entity_encoding : "raw", // Thay Ch&agrave;o c&aacute;c bạn = Chào các bạn
    verify_html: false,
    editor_deselector: "simple",
    forced_root_block : "", 
    force_br_newlines : true,
    force_p_newlines : false,
    theme: "modern",
    skin: "bootmce",
    menubar: false,
    elementpath: false,
    height: 150,
    width:800,
    relative_urls : false,
    remove_script_host: false,
    language : 'vi_VN',
    plugins: [
         "wordcount,charactercount",
         
   ],
   toolbar: "",
    

   style_formats: [
      {title: "Headers", items: [
          {title: "Header 1", format: "h1"},
          {title: "Header 2", format: "h2"},
          {title: "Header 3", format: "h3"},
          {title: "Header 4", format: "h4"},
          {title: "Header 5", format: "h5"},
          {title: "Header 6", format: "h6"}
      ]},
      {title: "Inline", items: [
          {title: "Bold", icon: "bold", format: "bold"},
          {title: "Italic", icon: "italic", format: "italic"},
          {title: "Underline", icon: "underline", format: "underline"},
          {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
          {title: "Superscript", icon: "superscript", format: "superscript"},
          {title: "Subscript", icon: "subscript", format: "subscript"},
          {title: "Code", icon: "code", format: "code"}
      ]},
      {title: "Blocks", items: [
          {title: "Paragraph", format: "p"},
          {title: "Blockquote", format: "blockquote"},
          {title: "Div", format: "div"},
          {title: "Pre", format: "pre"}
      ]},
      {title: "Alignment", items: [
          {title: "Left", icon: "alignleft", format: "alignleft"},
          {title: "Center", icon: "aligncenter", format: "aligncenter"},
          {title: "Right", icon: "alignright", format: "alignright"},
          {title: "Justify", icon: "alignjustify", format: "alignjustify"}
      ]}
    ],
    external_filemanager_path:"<?=CMS_URL?>template/plugins/filemanager/",
    filemanager_title:"Quản lý tài nguyên - Hãy sắp xếp hình ảnh và tập tin một cách khoa học"
 });
tinymce.PluginManager.add('charactercount', function (editor) {
  var self = this;

  function update() {
    editor.theme.panel.find('#charactercount').text(['SỐ KÝ TỰ: {0} ', self.getCount()]);
  }

  editor.on('init', function () {
    var statusbar = editor.theme.panel && editor.theme.panel.find('#statusbar')[0];

    if (statusbar) {
      window.setTimeout(function () {
        statusbar.insert({
          type: 'label',
          name: 'charactercount',
          text: ['SỐ KÝ TỰ: {0}', self.getCount()],
          classes: 'charactercount',
          disabled: editor.settings.readonly
        }, 0);

        editor.on('setcontent beforeaddundo', update);

        editor.on('keyup', function (e) {
            update();
        });
      }, 0);
    }
  });

  self.getCount = function () {
    var tx = editor.getContent({ format: 'raw' });
    var decoded = decodeHtml(tx);
    var decodedStripped = decoded.replace(/(<([^>]+)>)/ig, "").trim();
    var tc = decodedStripped.length;
    return tc;
  };

  function decodeHtml(html) {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
  }
});
function openKCFinder(field_name, url, type, win) {
    tinyMCE.activeEditor.windowManager.open({
        file: 'template/plugins/kcfinder_2.51/browse.php?opener=tinymce&lang=vi&type=' + type,
        title: 'KCFinder',
        width: 700,
        height: 500,
        resizable: "yes",
        inline: true,
        close_previous: "no",
        popup_css: false
    }, {
        window: win,
        input: field_name
    });
    return false;
}
function browseKCFinder(field, type) {
  $('#'+field).next('input').css('display','none');
  $('#'+field).after('<a style="margin-left:10px;" href="template/plugins/filemanager/dialog.php?type=1&field_id='+field+'" class="button btn btn-success iframe-btn" data-toggle="tooltip" data-title="select_image" type="button"><i class="fa fa-folder-open"></i></a>');

   

    // window.open('template/plugins/filemanager/dialog.php?type=1&field_id='+field);
    // window.KCFinder = {
    //     callBack: function(url) {
    //         document.getElementById(field).value = url;
    //         window.KCFinder = null;
    //     }
    // };
    // window.open('template/plugins/kcfinder_2.51/browse.php?type='+type+'&lang=vi', 'kcfinder_textbox',
    //     'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
    //     'resizable=1, scrollbars=0, width=800, height=600'
    // );
}
</script>

<script>
var text_max = 0;
//$('#count_message3').html(text_max + ' ký tự - [TIP] Description nên để <180 ký tự ');

$('#txtMetaDescription').keyup(function() {
var text_length = $('#txtMetaDescription').val().length;
var text_remaining = text_length;

$('#count_message3').html(text_remaining + ' ký tự - [TIP] Description nên để <180 ký tự ');
});
</script>
<script>
var text_max = 0;
//$('#count_message2').html(text_max + ' ký tự - [TIP] Title nên để  <70 ký tự ');

$('#txtMetaTitle').keyup(function() {
var text_length = $('#txtMetaTitle').val().length;
var text_remaining = text_length;

$('#count_message2').html(text_remaining + ' ký tự - [TIP] Title nên để  <70 ký tự ');
});
</script>
<script>
var text_max = 0;
//$('#count_message').html('[TIP] Bạn đã viết ' +text_max + ' ký tự - Tiêu đề nên để <70 ký tự sẽ SEO tốt hơn');

$('#txtTitle').keyup(function() {
  var text_length = $('#txtTitle').val().length;
  var text_remaining = text_length;
  
  $('#count_message').html('[TIP] Bạn đã viết ' +text_remaining + ' ký tự - Tiêu đề nên để <70 ký tự sẽ SEO tốt hơn');
});
</script>
<script type="text/javascript">
  $('.iframe-btn').fancybox({
    'width'     : 900,
    'height'    : 900,
    'type'      : 'iframe',
    'autoScale' : true 
  });

    $('input.iframe-btn').each(function() {
      if($(this).val()) {
        var id = $(this).attr('id');
        $('#' + id + '_preview').css('display', 'block');
        $('#' + id + '_preview img').attr('src', $(this).val());
      }
    });        

    $('.delete_media').click(function(e) {
      e.preventDefault();
      var id = $(this).attr('id');
      if($('input#' + id).val()) {  
        var result = confirm("Bạn muốn gỡ bỏ ảnh đại diện này?");
        if (result) {
          $('input#' + id).val('');
          $('#' + id + '_preview img').attr('src', '');
          $('#' + id + '_preview').css('display', 'none');
        }
      }
    });


  function close_window() {
    parent.$.fancybox.close();
  };

  function responsive_filemanager_callback(field_id) {
    var url = $('#' + field_id).val();
    $('#' + field_id + '_preview').css('display', 'block');
    $('#' + field_id + '_preview img').attr('src', url);
  };
  var markup = document.getElementById('cms-form').innerHTML;
  var n = markup.indexOf("Chọn ảnh");
  if(n>0){
    $('#txtImage').next('input').css('display','none');
    $('#txtImage').after('<a style="margin-left:10px;" href="template/plugins/filemanager/dialog.php?type=1&field_id=txtImage" class="button btn btn-success iframe-btn" data-toggle="tooltip" data-title="select_image" type="button"><i class="fa fa-folder-open"></i></a>');
  }
</script>