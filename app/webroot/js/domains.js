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
        this.events();
    }

    App.prototype.addConnection = function($connectionType, $host, $user, $password)
    {
        var $container, $content, $last, $id, $tabindex;

        $container = $('.container-line-connections');
        $content   = $('.line-connection');
        $last      = $content.last();

        // Count 
        $id = $last.length == 0
            ? $last.length
            : parseFloat($last.attr('alt')) + 1;

        // Tabindex
        $tabindex = $last.length == 0
            ? 3
            : parseFloat($last.attr('valtabindex'));
            
        // Variables for Template.
        var template = 
        {
            id: $id,
            tabindex: $tabindex,
            host: $host,
            user: $user,
            password: $password
        };

        $('#connectionTemplate').tmpl(template).appendTo($container).each(function()
        {
            $(this).children('.connection-type').children('select').val($connectionType);
            $(this).children('.connection-type').children('select').focus();
        });
    }

    App.prototype.events = function() 
    {
        /**
        * Add connection.
        */
        $('.add-line').live('click', function()
        {
            App.prototype.addConnection('', '', '');
        });

        /**
        * Remove connection.
        */
        $('.remove-line').live('click', function()
        {
            var $container;
            $container = $(this).parent().parent();
            $container.remove();
        });
    }

    return App;
})();

App = new App();