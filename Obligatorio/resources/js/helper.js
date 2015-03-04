/**
 * 
 * @type Function| returns all basic functions
 */
var Helper = (function() {
    var alertTypes = ['success' , 'danger', 'info'];
    var getUserAsync = function()
    {
        var deferred = $.Deferred();
        $.ajax({
            type: "POST",
            dataType: "json",
            success: function(result){ deferred.resolve(result)},
            timeout: 4000,
            error: errorLogIn,
            url: "getUser.php",
        });  
        return deferred.promise();
    };
    
    var getParentElem = function (element, tagg) {
        if (element === null || element === undefined)
            return null;
        if (element.nodeName.toLowerCase() === tagg.toLowerCase()) {
            return element;
        }
        else {
            return getParentElem(element.parentElement, tagg);
        };
    };
    var isUndefinedOrNull = function (obj) {
        return obj === null || obj === undefined;
    }
    /**
     * Deletes an element from an array 
     * eg: deleteByPropertyAndValueInArray('id', 23, myArray)
     * result = 1 element deleted
     * @param {string} property
     * @param {any} value
     * @param {array} arr
     * @returns {deletes element if found}
     */
    var deleteByPropertyAndValueInArr = function (property, value, arr) {
        var arrLength = arr.length;
        while (arrLength--) {
            if (arr[arrLength][property] == value) {
                arr.splice(arrLength, 1);
                return;
            }
        }
    };
    /**
     * gets an el ement from an array by a given field and value, if not found returns -1
     * @param {array} arr
     * @param {STRING/INT} value
     * @param {type} field
     * @returns {element, if not found -1}
     */
    var getItemByFieldValue = function (arr, value, field)
    {
        if (isUndefinedOrNull(arr) || isUndefinedOrNull(value) || isUndefinedOrNull(field)) {
            return -1;
        }
        var arrLength = arr.length;
        while (arrLength--)
        {
            if (arr[arrLength][field] == value)
                return arr[arrLength];
        }
        return -1;
    };
    
    return {
        /**
         * Alert Types to use for alertMsg function
         * @returns {Array alert types: 'success' , 'error', 'block'}
         */
        getAlertTypes:function()
        {
            return alertTypes;
        },
        getUser:function()
        {
            return getUserAsync();
        },
        getParentElement:function(element, tagg)
        {
            return getParentElem(element, tagg);
        },
        deleteByPropertyAndValueInArray:function(property, value, arr)
        {
            deleteByPropertyAndValueInArr(property, value, arr);
        },
        getItemFromArray:function(arr, value, field)
        {
            return getItemByFieldValue(arr, value, field);
        },
        /**
         * Function to show 'success' , 'error', 'block' messages in the container div.
         * @param {DomObj} containerDiv div where we append the alert
         * @param {Helper String} alertType type of the alert 'success' , 'error', 'block'
         * @param {String} msg: message that will be shown
         * @returns {nothing}
         */
        alertMsg: function(containerDiv,alertType,msg) {
            var alert = $('<div class="alert alert-'+alertType+'" style="display:none">'+
                        '<p id="sucessAlert">'+msg+'<p>'+
                    '</div>');
            containerDiv.append(alert);
            alert.slideDown(2500,function(){
                $(this).slideUp(4500,function(){
                   $(this).remove();
               });
            });   
        },
        /**
         * Function to set cookies
         * @param {type} cname
         * @param {type} cvalue
         * @param {type} exdays
         * @returns {undefined}
         */
        setCookie: function(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires="+d.toUTCString();
            document.cookie = cname + "=" + cvalue + "; " + expires;
        },
        /**
         * 
         * @param {type} cname
         * @returns {cookie saved with the same name or undefined if it did not found it.}
         */
         getCookie: function(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i=0; i<ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0)===' ') c = c.substring(1);
                if (c.indexOf(name) === 0) return c.substring(name.length, c.length);
            }
            return undefined;
        }
    };  
})();