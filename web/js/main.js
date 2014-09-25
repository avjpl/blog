require.config({
    paths: {
        'jQuery': '../bower_components/jquery/dist/jquery',
        'lodash': '../bower_components/lodash/dist/lodash',
        'ckeditor-core':'../bower_components/ckeditor/ckeditor',
        'ckeditor-jquery':'../bower_components/ckeditor/adapters/jquery'
    },
    shim: {
        'jQuery': {
            exports: '$'
        },
        'ckeditor-jquery':{
            deps:['jQuery','ckeditor-core']
        }
    }
});

require(['loader', '../bundles/bloggerblog/js/blog'], function(loader) {
    var _loader = new loader();
//  var _parts = _loader.getUrlParts();
//    console.log(_parts);
//    console.log(_loader.lookup());
//    console.log(_loader.lookup('blog/show', 0));
//    console.log(_loader.lookup('blog/show', 'index'));
//    console.log(_loader.lookup('blog/show', 'input'));

    switch(_loader.lookup()) {
        case 'blog':
            var _blog = require('../bundles/bloggerblog/js/blog');

            _blog._init(_loader.lookup('blog/show', 0));
        break;

        default:
            console.log('must be at / (root)');
    }
});