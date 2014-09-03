require.config({
  paths: {
    'jQuery': '../bower_components/jquery/dist/jquery',
    'lodash': '../bower_components/lodash/dist/lodash'
  },
  shim: {
    'jQuery': {
        exports: '$'
    }
  }
});

require(['loader', '../bundles/bloggerblog/js/blog'], function(loader) {
  var _loader = new loader();
  var _parts = _loader.getUrlParts();

    switch(_parts[_parts.length - 1]) {
      case 'contact':
        var _blog = require('../bundles/bloggerblog/js/blog'),
            _blog = new _blog;

          console.log(_blog.getName());
        break;

        default:
          console.log('must be at / (root)');
    }
});