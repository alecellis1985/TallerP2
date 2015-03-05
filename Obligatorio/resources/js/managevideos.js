$(document).ready(startVideos);

function startVideos()
{
    $('.deleteVid').click(deleteVid);
    $('.editVid').click(editVid);
    $('#addVid').click(addVid);
    $('#videofrm').submit(saveVid);
}

function addVid()
{
    $('#videofrm').attr('action','addVideo.php');
    $('#videoTitle').html('Add new video');
    $.each($('#videofrm input'),function(key,elem){
        elem.value = '';
    });
    $.each($('#videofrm textarea'),function(key,elem){
        elem.value = '';
    });
}

function saveVid(e)
{
    e.preventDefault();
    var modifiedData = {
	idVideo:$('#idVideo').val(),
	client:$('input[name="client"]').val(),
	url:$('input[name="url"]').val(),
	releaseDate:$('input[name="releaseDate"]').val(),
	description:$('textarea[name="description"]').val()
    };
    var id = $('#idVideo').val();
    var action =$(this).attr('action');
    var url = '../privateFunctions/'+action;
    $.ajax({
        type:"POST",
        dataType:"json",
        url:url,
        data:modifiedData,
        timeout: 4000,
        success:function(datos)
        {
            if(action==="editVideo.php")
            {
                completeEditVideo(datos,modifiedData);
            }
            else if (action=="addVideo.php")
            {
                completeaddVideo(datos);
            }
            //appendVideo
        },
        error: function(datos)
        {
            var pd = datos;
            //"show error"
        }        
    });
}

function completeEditVideo(datos,modifiedData)
{
    var arrElement = Helper.getItemFromArray(videos, modifiedData.idVideo, 'idVideo');
    if(arrElement != -1)
    {
        arrElement = $.extend({}, arrElement, modifiedData);
        $.each($('#manageVideosTable tbody>tr'),function(key,elem){
            var element = $(elem);
            if(element.data('id') == modifiedData.idVideo)
            {
                $.each(element.find('div'),function(key,elem){
                    $(elem).html(arrElement[$(elem).data('id')]);
                });
            }
        });
    }
    $('#closeVideoModal').trigger('click');
    Helper.alertMsg($('#alerts'), Helper.getAlertTypes()[0], datos.msg);
}

function editVid()
{
    var videoId = $(this).data('id');
    $('#idVideo').val(videoId);
    $('#videofrm').attr('action','editVideo.php');
    var arrElement = Helper.getItemFromArray(videos, videoId, 'idVideo');
    if(arrElement !== -1)
    {
        $('#videoTitle').html('Edit '+ arrElement.client +'Video');
        $.each($('#videofrm input'),function(key,elem){
            elem.value = arrElement[elem.name];
        });
        $.each($('#videofrm textarea'),function(key,elem){
            elem.value = arrElement[elem.name];
        });
    }
}

function deleteVid()
{
    $(this).addClass("disableClick");
    var videoId = $(this).data('id');
    $.ajax({
        type:'POST',
        url:'../privateFunctions/deleteVideo',
        dataType:'json',
        timeout: 4000,
        success:function(datos)
        {
            deleteVidComplete(datos,videoId);
        },
        error: function(datos)
        {
            deleteVidComplete(datos,videoId);
        },
        data:{'idVideo':videoId}
    });
}

function getTrElemById(id)
{
    var ret = undefined;
    $.each($('#manageVideosTable tbody>tr'),function(key,elem){
        var element = $(elem);
        if(element.data('id') === id)
        {
            ret = element;
            return;
        }
    });
    return ret;
}

function deleteVidComplete(datos,id){
    Helper.deleteByPropertyAndValueInArray('idVideo',id,videos);
    var htmlElement = getTrElemById(id);
    if(htmlElement !== undefined)
    {
        htmlElement.css('background-color','#F9E6E6');
        var children = htmlElement.children();
        var height = $(children[0]).height();
        //set height for divs so slide up works it!
        var tdDivs = htmlElement.children().find('div');
        tdDivs.height(height+'px');
        tdDivs.slideUp(1500,function(){
            htmlElement.remove();
        });
    }
    //make json call to get one more elem for this page and add it
}