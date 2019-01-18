/**
 * @file Plugin for nonverblaster:hover media player
 */
(function () {
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
