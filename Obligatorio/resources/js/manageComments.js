$(document).ready(initFn);


function initFn()
{
    $('.widthrawComment').click(widthrawComment);
}

function widthrawComment()
{
    $(this).addClass("disableClick");
    var that = $(this);
    
    var data = {};
    data.idComments = $(this).data('id');
    var trElem = getTrElemById(data.idComments);
    if(trElem === undefined)
    {
        Helper.alertMsg($('#alerts'), Helper.getAlertTypes()[1], "Error, please refresh the page.");
        return;
    }
    
    var element;
    $.each(trElem.find('div'),function(key,elem){
        if($(elem).data('id') == 'public')
        {
            element = $(elem);
            data.public = $(elem).data('val') === 0 ? 1 : 0;
            return;
        }
    });
    
    $.ajax({
        type:'POST',
        url:'../privateFunctions/commentChangeState',
        dataType:'json',
        timeout: 4000,
        data:data,
        beforeSend: function (e) {
            $('.loadingOverlay').css('display', 'block');
        },
        success:function(datos)
        {
            editCommentComplete(data,element,that);
            Helper.alertMsg($('#alerts'), Helper.getAlertTypes()[0], datos.msg);
        },
        error: function(datos)
        {
            Helper.alertMsg($('#alerts'), Helper.getAlertTypes()[1], datos.responseJSON.msg);
        }
    }).done(function (e) {
        $('.loadingOverlay').css('display', 'none');
    });
}

function editCommentComplete(data,element,btn)
{
    var states = ['Activate','Widthraw'];
    var btnClass = ['btn-success','btn-danger'];
    var iconClass = ['glyphicon-remove','glyphicon-ok']; 
    btn.html(states[data.public]);
//    var prevClass = data.public === 0 ? 1 : 0;
    var prevClass = data.public === 0 ? 1 : 0;
    btn.removeClass(btnClass[prevClass]).addClass(btnClass[data.public]);
    btn.removeClass("disableClick");
    element.data('val',data.public);
    element.removeClass(iconClass[prevClass]).addClass(iconClass[data.public]);
//    element.html(data.public);
}

function getTrElemById(id)
{
    var ret = undefined;
    $.each($('#manageCommentsTable tbody>tr'),function(key,elem){
        var element = $(elem);
        if(element.data('id') === id)
        {
            ret = element;
            return;
        }
    });
    return ret;
}