define(["jQuery", "ckeditor-jquery"], function($) {
    var _blog = function() {
        this.getName = function() {
            return 'From blog bundle amd module'
        }
    };

    var _init = function(route) {
        var el = $('#editable');

        if (el.length > 0 && route === 'blog/show') {
            el.attr('contenteditable', 'true');

            CKEDITOR.disableAutoInline = true;
            CKEDITOR.inline('editable');
        }
    };

    return {
        _blog: _blog,
        _init: _init
    };
});