/**
 * @file Plugin for nonverblaster:hover media player
 */
(function () {
    CKEDITOR.nonverblaster = {};
    CKEDITOR.nonverblaster.playbutton = '';
    CKEDITOR.nonverblaster.width = 480;
    CKEDITOR.nonverblaster.height = 320;
    CKEDITOR.nonverblaster.uiColor = '#FFFFFF';
    CKEDITOR.nonverblaster.uiBgColor = '#FFFFFF';
    CKEDITOR.nonverblaster.bgColor = '#000000';
    CKEDITOR.plugins.add( 'NonverBlaster', {

        init: function( editor ) {
            CKEDITOR.tools.extend(CKEDITOR, {
                nonverblasterPath: this.path
            })
            var pluginName='NonverBlaster';
            CKEDITOR.dialog.add('swfobject',this.path+'dialogs/swfobject.js');
            CKEDITOR.dialog.add(pluginName,this.path+'dialogs/nonverblaster.js');
            editor.addCommand(pluginName,new CKEDITOR.dialogCommand(pluginName));
            editor.ui.addButton( 'NonverBlaster', {
                label: 'Nonverblaster media player',
                command: 'NonverBlaster',
                icon: this.path+'player.png'
            });
        }
        
    });
})();
