$(document).ready(startVideos);

function startVideos()
{
    $('.deleteVid').click(deleteVid);
    $('.editVid').click(editVid);
    $('#addVid').click(addVid);
    $('#videofrm').submit(saveVid);
    $("#allVideosLink").attr("href","../videoList.php");
    $("#homeLink").attr("href","../index.php");
    $("#logOut").data("url","../logout.php");
    $("#manageVideosId").attr("href","manageVideos.php");
    $(".commentsVid").click(videoDetails);
    $("#homeFooterLink").attr("href","../videoList.php");
    $("#videoListFooterLink").attr("href","../index.php");
}

function addVid()
{
    $('#videofrm').attr('action','addVideo.php');
    $('#videoTitle').html('Add new video');
    $('#videofrm')[0].reset();
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
    var action =$(this).attr('action');
    var url = '../privateFunctions/'+action;
    $('#closeVideoModal').trigger('click');
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
                completeAddVideo(datos);
            }
            Helper.alertMsg($('#alerts'), Helper.getAlertTypes()[0], datos.msg);
        },
        error: function(datos)
        {
            Helper.alertMsg($('#alerts'), Helper.getAlertTypes()[1], datos.responseJSON.msg);
        }        
    });
}

function completeAddVideo(datos)
{
    videos.push(datos.data);
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
        data:{'idVideo':videoId},
        success:function(datos)
        {
            deleteVidComplete(datos,videoId);
            Helper.alertMsg($('#alerts'), Helper.getAlertTypes()[0], datos.msg);
        },
        error: function(datos)
        {
//            deleteVidComplete(datos,videoId);
            Helper.alertMsg($('#alerts'), Helper.getAlertTypes()[1], datos.responseJSON.msg);
        }
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
    closeDetails(htmlElement.next());
    if(htmlElement !== undefined)
    {
        htmlElement.css('background-color','#F9E6E6');
        var children = htmlElement.children();
        var height = $(children[0]).height();
        var tdDivs = htmlElement.children().find('div');
        tdDivs.height(height+'px');
        tdDivs.slideUp(1500,function(){
            htmlElement.remove();
        });
    }
    //make json call to get one more elem for this page and add it
}

function videoDetails() {
    var vidId = $(this).data('id');
    var tr = getTrElemById(vidId);
    if(closeDetails(tr.next()))
    {
        return;
    }
    var data = {videoId: vidId};
    $.ajax({
        type: "POST",
        dataType: "html",
        beforeSend: function (e) {
            $('.loadingOverlay').css('display', 'block');
        },
        success: function (data) {
            processVideoDetails(data,tr);
        },
        timeout: 4000,
        error: problemas,
        url: "../videoDetails.php",
        data: data
    }).done(function (e) {
        $('.loadingOverlay').css('display', 'none');
    });
}

function closeDetails(tr)
{
    if(tr.attr('class') === 'videoDetails')
    {
        tr.find('.videoDetails').slideUp('slow',function(){
            tr.remove();
        });
        return true;
    }
    return false;
}

function problemas(){}

function processVideoDetails(data,tr) {
    
    var divAnimation = $('<div style="display:none" class="videoDetails"></div>');
    divAnimation.append(data);
    var container = $('<tr class="videoDetails"><td colspan="10"></td></tr>');
    container.find('td').append(divAnimation);
    container.insertAfter(tr);
    divAnimation.slideDown('slow');
}