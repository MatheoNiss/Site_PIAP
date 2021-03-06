CKEDITOR.dialog.add('NonverBlaster', function (editor) {
    var NonverBlasterPlayer = CKEDITOR.nonverblasterPath+'NonverBlaster.swf';
    function UpdatePreview() {
        document.getElementById("_video_preview").innerHTML = GetFlashObjectDiv();
    }
    function GetFlashObjectDiv() {
        // Load requiered js files if not already done
        var flashObjectDiv = '' ;
        var fileUrl = CKEDITOR.dialog.getCurrent().getContentElement('info', 'video_url').getValue();
        var previewUrl = CKEDITOR.dialog.getCurrent().getContentElement('info', 'preview_url').getValue() ;
        var hdVideoUrl = CKEDITOR.dialog.getCurrent().getContentElement('info', 'hd_url').getValue() ;
        var startButtonUrl = CKEDITOR.dialog.getCurrent().getContentElement('info', 'startbutton_url').getValue() ;
        var width = CKEDITOR.dialog.getCurrent().getContentElement('info', 'width').getValue() ;
        var height = CKEDITOR.dialog.getCurrent().getContentElement('info', 'height').getValue() ;
        var buffer = CKEDITOR.dialog.getCurrent().getContentElement('info', 'buffer').getValue() ;
        var auto = CKEDITOR.dialog.getCurrent().getContentElement('info', 'auto').getValue();
        var uiColor = CKEDITOR.dialog.getCurrent().getContentElement('info', 'uiColor').getValue() ;
        var uiBgColor = CKEDITOR.dialog.getCurrent().getContentElement('info', 'uiBgColor').getValue() ;
        var bgColor = CKEDITOR.dialog.getCurrent().getContentElement('info', 'bgColor').getValue() ;
        var loop = CKEDITOR.dialog.getCurrent().getContentElement('info', 'loop').getValue() ;
        var crop = CKEDITOR.dialog.getCurrent().getContentElement('info', 'crop').getValue() ;
        var showDuration = CKEDITOR.dialog.getCurrent().getContentElement('info', 'showDuration').getValue() ;
        var defaultHD = CKEDITOR.dialog.getCurrent().getContentElement('info', 'defaultHD').getValue() ;
        //var smoothing = CKEDITOR.dialog.getCurrent().getContentElement('info', 'smoothing').getValue() ;
        var smoothing = "";
        if(previewUrl == ''){
            previewUrl = 'undefined' // fix a bug in firefox where the play button not showing without teaser image
        }

        if(width == ''){
            width = '480' ;
        }
        if(height == ''){
            height  = '320' ;
        }
        if(uiColor == ''){
            uiColor = 'FFFFFF' ;
        }
        if(bgColor == ''){
            bgColor = 'F2E28F' ;
        }
        
        var uniqueNumber = new Date().getTime() ;
        flashObjectDiv += '<script language="javascript" type="text/javascript">';
        flashObjectDiv += 'var targetDiv = "targetVideo' + uniqueNumber + '";';
        flashObjectDiv += "var params = {allowfullscreen:'true', allowscriptaccess:'always', wmode:'opaque'};";
        flashObjectDiv += 'var attributes = {id:"targetDiv' + uniqueNumber + '"};';
        flashObjectDiv += 'var playerPath = "'+NonverBlasterPlayer+'?t=' + uniqueNumber + '" ;';
        flashObjectDiv += "var playerHeight = " + height + ";";
        flashObjectDiv += "var playerWidth = " + width + ";";
        flashObjectDiv += 'flashvars = {' ;
        flashObjectDiv += 'mediaURL:"' + fileUrl + '",' ;
        flashObjectDiv += 'autoPlay:' + auto + ',' ;
        flashObjectDiv += 'teaserURL:' + previewUrl + ',' ;
        if(startButtonUrl != ''){
          flashObjectDiv += "playbuttonurl:" + startButtonUrl + "," ;
        }
        flashObjectDiv += 'defaultVolume:100,',
        flashObjectDiv += 'showduration:' + showDuration + ',';
        flashObjectDiv += 'loop:' + loop + ',' ;
        flashObjectDiv += 'buffer:' + buffer + ',' ;
        flashObjectDiv += 'controlColor:' + '0x' + uiColor + ',' ;
        flashObjectDiv += 'controlBackColor:' + uiBgColor + ',' ;
        flashObjectDiv += 'playerbackcolor' + bgColor + ',' ;
        flashObjectDiv += 'allowSmoothing:' + smoothing + ',' ;
        flashObjectDiv += "crop:" + crop + "" ;
        if(hdVideoUrl != ''){
          flashObjectDiv += 'hdURL:' + hdVideoUrl + ',' ;
        }
        flashObjectDiv += '};' ;
        flashObjectDiv += 'swfobject.embedSWF(playerPath,targetDiv,playerWidth,playerHeight,"9.0.115","false", flashvars, params, attributes);';
        flashObjectDiv +=
        flashObjectDiv += '</script>';
        
        return flashObjectDiv ;
    }
    return {
        title: 'Plugin NonverBlaster',
        minWidth: 200,
        minHeight: 240,
        contents: [{
            id: 'info',
            elements: [{
                type: 'vbox',
                children: [{
                  type: 'hbox',
                  align: 'left',
                  children: [{
                      type: 'text',
                      id: 'video_url',
                      style: 'width:380px',
                      label: 'Media (mp3, mp4, mov, flv) URL or local path',
                      onChange: UpdatePreview
                  }, {
                      type: 'button',
                      id: 'browse',                
                      filebrowser: 'info:video_url',
                      label: editor.lang.common.browseServer,
                      style: 'display:inline-block;margin-top:8px;'
                  }]
              },{
                  type: 'hbox',
                  align: 'left',
                  children: [{
                      type: 'text',
                      id: 'hd_url',
                      style: 'width:380px',
                      label: 'HD video switch (optionnal)',
                      onChange: UpdatePreview
                  }, {
                      type: 'button',
                      id: 'browse',                
                      filebrowser :
                      {
                          action : 'Browse',
                          target: 'info:hd_url',
                          url: editor.config.filebrowserImageBrowseUrl || editor.config.filebrowserBrowseUrl
                      },
                      label: editor.lang.common.browseServer,
                      style: 'display:inline-block;margin-top:8px;'
                  }]
              },{
                  type: 'hbox',
                  align: 'left',
                  children:[{
                      type: 'text',
                      id: 'preview_url',
                      style: 'width:380px',    
                      label: 'Teaser Image (optionnal)',
                      onChange: UpdatePreview
                  }, {
                      type : 'button',
                      id : 'browse',
                      style : 'display:inline-block;margin-top:8px;',
                      filebrowser :
                      {
                          action : 'Browse',
                          target: 'info:preview_url',
                          url: editor.config.filebrowserImageBrowseUrl || editor.config.filebrowserBrowseUrl
                      },
                      label : editor.lang.common.browseServer
                  }]
              },{
                  type: 'hbox',
                  align: 'left',
                  children:[{
                      type: 'text',
                      id: 'startbutton_url',
                      style: 'width:380px',    
                      label: 'Start button Image (optionnal)',
                      onChange: UpdatePreview
                  }, {
                      type : 'button',
                      id : 'browse',
                      style : 'display:inline-block;margin-top:8px;',
                      filebrowser :
                      {
                          action : 'Browse',
                          target: 'info:startbutton_url',
                          url: editor.config.filebrowserImageBrowseUrl || editor.config.filebrowserBrowseUrl
                      },
                      label : editor.lang.common.browseServer
                  }]            
                },{
                    // preview div
                    type: 'html',
                    id: 'preview',
                    html: '<div id="_video_preview" ><object type="application/x-shockwave-flash" id="nonverblaster" name="nonverblaster" bgcolor="#000000" data="'+NonverBlasterPlayer+'" width="320" height="480"><param name="wmode" value="opaque"></div>'
              }]
            },{
                type: 'hbox',
                align: 'left',
                children: [{
                    type: 'text',
                    id: 'width',
                    'maxLength': 4,                    
                    'default': '480',                    
                    label: 'Width:',
                    onChange: UpdatePreview
                }, {
                    type: 'text',
                    id: 'height',
                    'maxLength': 4,
                    'default': '320',
                    label: 'Height:',
                    onChange: UpdatePreview
                }, {                    
                    type: 'text',
                    id: 'buffer',
                    'maxLength': 1,                    
                    'default': "0",                
                    label: 'Buffer length:',
                    onChange: UpdatePreview
                }]
            },{
                type: 'hbox',
                align: 'left',
                children: [{
                    type: 'text',
                    id: 'uiColor',
                    'maxLength': 6,
                    'default': 'FFFFFF',
                    label: 'UI color:',
                    onChange: UpdatePreview       
                }, {
                    type: 'text',
                    id: 'uiBgColor',
                    'maxLength': 6,
                    'default': '000000',
                    label: 'UI background color:',
                    onChange: UpdatePreview       
                }, {
                    type: 'text',
                    id: 'bgColor',
                    'maxLength': 6,
                    'default': 'F2E28F',
                    label: 'Background color:',
                    onChange: UpdatePreview  
                }]
            },{
                type: 'hbox',
                align: 'left',
                style: 'width:100px',
                children: [{
                    type: 'checkbox',
                    id: 'loop',
                    'default': false,
                    label: 'loop',
                    onChange: UpdatePreview
                },{
                    type: 'checkbox',
                    id: 'crop',
                    'default': false,
                    label: 'scale',
                    onChange: UpdatePreview
                },{
                    type: 'checkbox',
                    id: 'auto',
                    'default': false,
                    label: editor.lang.flash.chkPlay,
                    onChange: UpdatePreview
                },{
                    type: 'checkbox',
                    id: 'showDuration',
                    'default': true,
                    label: 'show duration',
                    onChange: UpdatePreview
                },{
                    type: 'checkbox',
                    id: 'defaultHD',
                    'default': true,
                    label: 'default HD',
                    onChange: UpdatePreview
                },{
                  type: 'checkbox',
                  id: 'smoothing',
                  'default': true,
                  label: 'enable smoothing',
                  onChange: UpdatePreview
                }]
            }]
        }],
        buttons: [CKEDITOR.dialog.okButton, CKEDITOR.dialog.cancelButton],
        onOk: function () {
            editor.insertHtml(GetFlashObjectDiv());        
        }
    }
});
