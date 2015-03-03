/**
 * 
 * @type Function| returns all basic functions
 */
var Helper = (function() {
    var alertTypes = ['success' , 'error', 'block'];
 
    return {
        /**
         * Alert Types to use for alertMsg function
         * @returns {Array alert types: 'success' , 'error', 'block'}
         */
        getAlertTypes:function()
        {
            return alertTypes;
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