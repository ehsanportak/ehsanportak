jQuery(document).ready(function($){
    window.send_to_editor=function(html){
        var url= $(html).attr('src');
        console.log(html);
        tb_remove();
        $("#ep_file").val(url);
        }
        $("#ep_select_file").click(function(){
        tb_show('','media-upload.php?type=image&TB_iframe=true');
        return false;
    });
});
