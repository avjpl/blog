define(['lodash'], function(_) {
    var loader = function() {
        this.getUrlParts = function() {
            return _.filter(window.location.pathname.split('/'), function(str) {
                return str !== '' && str !== ('app_dev.php' || 'app.php');
            });
        }

        this.lookup = function(part, idx) {
            var reg = /(\/app_dev.php\/|\/app.php\/)/i,
                val;

            switch(idx) {
                case 'index':
                    val = window.location.pathname.match(part)[idx];
                    break;

                case 'input':
                    val = window.location.pathname.match(part)[idx].replace(reg, '');
                    break

                default:
                    if (typeof idx === 'number' && !!window.location.pathname.match(part)) {
                        val = window.location.pathname.match(part)[0];
                    } else {
                        val = this.getUrlParts()[0];
                    }
            }

            return val;
        }
    }

    return loader;
});