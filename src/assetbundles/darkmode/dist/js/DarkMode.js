/**
 * Dark Mode plugin for Craft CMS
 *
 * Dark Mode JS
 *
 * @author    Matt Gray
 * @copyright Copyright (c) 2018 Matt Gray
 * @link      https://mattgrayisok.com
 * @package   DarkMode
 * @since     1.0.0
 */

$(document).ready(function(){
    var enabled = localStorage.getItem('darkmode-enabled') === 'true';
    var darkSwitch = $('<div class="dark-mode-switch"><input type="checkbox" name="dark-toggle" id="dark-toggle" '+ (enabled ? 'checked' : '') +'><label for="dark-toggle" class="dark-toggle-label"></label></div>');
    var appInfo = $('#app-info');
    appInfo.before(darkSwitch);

    $('#dark-toggle').change(function(e){
        if(this.checked) {
            $('body').addClass('darkmode');
            localStorage.setItem('darkmode-enabled', 'true');
        }else{
            $('body').removeClass('darkmode');
            localStorage.setItem('darkmode-enabled', 'false');
        }
    })
});
