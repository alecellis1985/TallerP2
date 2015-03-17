																   $(document).ready(startVideos);

function startVideos()
{
    var editGridId ='';
    $('.deleteVid').click(deleteVid);
    $('.editVid').click(editVid);
    $('#addVid').click(addVid);
    $('#videofrm').submit(saveVid);
    $(".commentsVid").click(videoDetails);
    $('#closeVideoModal').click(clearData);
    $('.close').click(clearData);
}

function clearData()
{
    $("#videoFormErrors").parent().addClass("hide");
    $('#videofrm')[0].reset();
}

function addVid()
{
    $('#videofrm').attr('action', 'addVideo.php');
    $('#videoTitle').html('Add new video');
    $("#videoFormErrors").parent().addClass("hide");
    $('#videofrm')[0].reset();
}

function saveVid(e)
{
    e.preventDefault();
    //Date Validation
    var date = new Date();
    var month = (date.getMonth()+1)<10?'0'+(date.getMonth()+1):(date.getMonth()+1);
    var day = (date.getDate())<10?'0'+(date.getDate()):(date.getDate());;
    if($('input[name="releaseDate"]').val() < date.getFullYear() +'-'+ month +'-'+ day)
    {
        
        $("#videoFormErrors").text("Invalid date. Please make sure the date selected is after or equal to "+ day +'-'+month+'-'+date.getFullYear());
        $("#videoFormErrors").parent().removeClass("hide");
        return;
    }
    var videoId = $('input[name="url"]').val();
    var url = 'http://gdata.youtube.com/feeds/api/videos/'+videoId;
    $.ajax({
        type: "GET",
        dataType: "xml",
        url: url,
        timeout: 4000,
        success: function (data) {
            $("#videoFormErrors").parent().addClass("hide");
            completeSaveVideo(e.target);
        },
        error: function (data) {
            $("#videoFormErrors").text("Invalid video URL. Please make sure the video exists on YouTube.com");
            $("#videoFormErrors").parent().removeClass("hide");
        }
    });


}

function completeSaveVideo(targetBtn) {
    var modifiedData = {
        idVideo: $('#idVideo').val(),
        client: $('input[name="client"]').val(),
        url: $('input[name="url"]').val(),
        releaseDate: $('input[name="releaseDate"]').val(),
        description: $('textarea[name="description"]').val().replace("*", ""),
        title: $('input[name="title"]').val(),
        featured: $('input[name="destacado"]').prop("checked")
    };

    var action = $(targetBtn).attr('action');
    var url = '../privateFunctions/' + action;
    $('#closeVideoModal').trigger('click');
    $.ajax({
        type: "POST",
        dataType: "json",
        url: url,
        data: modifiedData,
        timeout: 4000,
        success: function (datos)
        {
            if (action === "editVideo.php")
            {
                var htmlElement = getTrElemById(editGridId,parseInt(modifiedData.idVideo));
                closeDetails(htmlElement.next());
                completeEditVideo(datos, modifiedData,editGridId);
            }
            else if (action === "addVideo.php")
            {
                completeAddVideo(datos);
            }
            Helper.alertMsg($('#alerts'), Helper.getAlertTypes()[0], datos.msg);
        },
        error: function (datos)
        {
            Helper.alertMsg($('#alerts'), Helper.getAlertTypes()[1], datos.responseJSON.msg);
        }
    });
}

function completeAddVideo(datos)
{
    videos.push(datos.data[0]);
    $('#manageVideosTable tbody').append(generateTr(datos.data[0]));
}

function generateTr(data)
{
    var ratingSpan = '<span class="star-rating">';
    //rating cannot be more than 0 because vid is new
    for (var i = 1; i < 6; i++) {
        ratingSpan += '<i></i>';
    }
    ratingSpan += '</span>';
    var destacadoClass = data.featured ? 'glyphicon-ok' : 'glyphicon-remove';
    var deletedClass = data.deleted == 1 ? 'glyphicon-remove' : 'glyphicon-ok';
    if (data.featured) {
        var currentFeatured = $(".glyphicon-ok[data-id='destacado']");
        currentFeatured.removeClass("glyphicon-ok");
        currentFeatured.addClass("glyphicon-remove");
    }   
    
    var deleteBtn = '';
    if(editGridId === 'manageVideosTable')
    {
        deleteBtn = '<div><button type="button" class="btn btn-danger deleteVid" data-id="' + data.idVideo + '">Delete</button></div>';
    }
    
    var tr = '<tr data-id="'+data.idVideo+'">'+
        '<td><div data-id="title"> '+ data.title +'</div></td>'+
        '<td><div data-id="client">'+ data.client +'</div></td>'+
        '<td><div data-id="client">'+ data.views +'</div></td>'+
        '<td align="center" valign="middle">'+
            '<div data-id="rating">'+
                ratingSpan + 
            '</div>'+
        '</td>'+
        '<td><div data-id="url">' + data.url + '</div></td>'+
        '<td><div data-id="destacado" class="glyphicon ' + destacadoClass + '"></div></td>'+
        '<td><div data-id="deleted" class="glyphicon ' + deletedClass + '"></div></td>'+
        '<td><div data-id="releaseDate">' + data.releaseDate + '</div></td>'+
        '<td><div data-id="description" >' + data.description + '</div></td>'+
        '<td>'+
            '<div><button type="button" class="btn btn-default editVid" data-id="' + data.idVideo + '" data-toggle="modal" data-target="#videoModal">Edit</button></div>'+
        '</td>'+
        '<td>'+
            '<div><button type="button" class="btn btn-default commentsVid" data-id="' + data.idVideo + '">Comments &#x25BC;</button></div>'+
        '</td>'+
        '<td>'+
        deleteBtn+
//            '<div><button type="button" class="btn btn-danger deleteVid" data-id="' + data.idVideo + '">Delete</button></div>'+
            
        '</td>'+
    '</tr>';
    var trElem = $(tr);
    trElem.find('.commentsVid').click(videoDetails);
    trElem.find('.editVid').click(editVid);
    if(editGridId === 'manageVideosTable')
    {
        trElem.find('.deleteVid').click(deleteVid);
    }
    return trElem;
}

function completeEditVideo(datos, modifiedData,tableId)
{
    var arrElement = Helper.getItemFromArray(videos, modifiedData.idVideo, 'idVideo');
    if (arrElement != -1)
    {
        $.extend(arrElement, modifiedData);
        
        $.each($('#'+tableId+' tbody>tr'),function(key,elem){
            var element = $(elem);
            if (element.data('id') == modifiedData.idVideo)
            {
                element.replaceWith(generateTr(arrElement));
            }
        });
    }
}

function editVid()
{
    
    var videoId = $(this).data('id');
    var table = Helper.getParentElement(this, 'table');
    editGridId = $(table).attr('id');
    $('#idVideo').val(videoId);
    $('#videofrm').attr('action', 'editVideo.php');
    var arrElement = Helper.getItemFromArray(videos, videoId, 'idVideo');
    if (arrElement !== -1)
    {
        $('#videoTitle').html('Edit ' + arrElement.title + ' Video');
        $.each($('#videofrm input'), function (key, elem) {
            elem.value = arrElement[elem.name];
        });
        $.each($('#videofrm textarea'), function (key, elem) {
            elem.value = arrElement[elem.name];
        });
        $.each($('#videofrm input[type="checkbox"]'), function (key, elem) {
            var boolVal = arrElement[elem.name] === "1" ? true : false;
            $(elem).prop('checked', boolVal);
            $(elem).prop('disabled', boolVal);
        });
    }
}

function deleteVid()
{
    $(this).addClass("disableClick");
    var videoId = $(this).data('id');
    $.ajax({
        type: 'POST',
        url: '../privateFunctions/deleteVideo',
        dataType: 'json',
        timeout: 4000,
        data: {'idVideo': videoId},
        success: function (datos)
        {
            deleteVidComplete(datos, videoId);
            Helper.alertMsg($('#alerts'), Helper.getAlertTypes()[0], datos.msg);
        },
        error: function (datos)
        {
//            deleteVidComplete(datos,videoId);
            Helper.alertMsg($('#alerts'), Helper.getAlertTypes()[1], datos.responseJSON.msg);
        }
    });
}

function getTrElemById(gridId,id)
{
    var ret = undefined;
    $.each($('#'+gridId+'>tbody>tr'), function (key, elem) { //>tr[class!="videoDetails"]
        var element = $(elem);
        if (element.data('id') === id)
        {
            ret = element;
            return;
        }
    });
    return ret;
}

//Deletes video from videos grid and. Adds element to deleted grid
function deleteVidComplete(datos, id) {
//    Helper.deleteByPropertyAndValueInArray('idVideo', id, videos);
    var htmlElement = getTrElemById('manageVideosTable',id);
    closeDetails(htmlElement.next());
    if (htmlElement !== undefined)
    {
        htmlElement.css('background-color', '#F9E6E6');
        var children = htmlElement.children();
        var height = $(children[0]).height();
        var tdDivs = htmlElement.children().find('div');
        tdDivs.height(height + 'px');
        tdDivs.slideUp(1500, function () {
            htmlElement.remove();
        });
        
    }
    var arrElement = Helper.getItemFromArray(videos, id, 'idVideo');
    arrElement.deleted = 1;
    editGridId = '';
    $('#manageVideosTableDeleted tbody').append(generateTr(arrElement));
}

function videoDetails() {
    var vidId = $(this).data('id');
    var table = Helper.getParentElement(this, 'table');
    var tr = getTrElemById($(table).attr('id'),vidId);
    if (closeDetails(tr.next()))
    {
        $(this).html('Comments &#x25BC;');
        return;
    }
    else
    {
        $(this).html('Comments &#x25B2;');

    }
    var data = {videoId: vidId};
    $.ajax({
        type: "POST",
        dataType: "html",
        beforeSend: function (e) {
            $('.loadingOverlay').css('display', 'block');
        },
        success: function (data) {
            processVideoDetails(data, tr);
        },
        timeout: 4000,
        error: problemas,
        url: "../privateFunctions/videoDetailsPrivate.php",
        data: data
    }).done(function (e) {
        $('.loadingOverlay').css('display', 'none');
    });
}

function closeDetails(tr)
{
    if (tr.attr('class') === 'videoDetails')
    {
        tr.find('.videoDetails').slideUp('slow', function () {
            tr.remove();
        });
        return true;
    }
    return false;
}

function problemas() {
}

function processVideoDetails(data, tr) {

    var divAnimation = $('<div style="display:none" class="videoDetails"></div>');
    divAnimation.append(data);
    var container = $('<tr class="videoDetails"><td colspan="12"></td></tr>');
    container.find('td').append(divAnimation);
    container.insertAfter(tr);
    divAnimation.slideDown('slow');
}