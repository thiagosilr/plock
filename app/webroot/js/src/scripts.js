/**
* This is your App script template. Is already working, all you need to do it build your functions and play :)
* Here you can already use Jquery, Modernizr and Bootstrap.js
*/
;(function() {
var App,
__bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };

App = (function() 
{
  	// Constructor
    function App() 
    {
        this.initialize();
    }

    App.prototype.initialize = function() 
    {
        this.deleteModal();
    }
    
    // Delete modal.
    App.prototype.deleteModal = function() 
    {
        // Changes the URL to delete on each customer click
        $('.btn-remove-modal').bind('click', function(e) 
        {
            var uid, name, href, pattern, $label, $link;

            $label  = $('.label-uname');
            $link   = $('.modal-link');
            uid     = $(this).attr('data-uid');
            name    = $(this).attr('data-uname');
            href    = $link.attr('href');
            pattern = /\d+$/g;

            // Find the last ID in URL
            aux = href.replace(pattern,uid);

            $link.attr('href', aux );

            // Changes modal label
            $label.html(name);
        });
    }

    return App;
  })();

  $(function() 
  {
    return App = new App();
  });

}).call(this);