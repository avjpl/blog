define(['lodash'], function(_) {
    var loader = function() {
        this.getUrlParts = function() {
            return _.filter(window.location.pathname.split('/'), function(str) {
                return str !== ''
            });
        }
    }

    return loader;
});