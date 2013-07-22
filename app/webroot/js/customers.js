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

    App.prototype.addContact = function($name, $phone, $email) 
    {
        var $container, $content, $last, $id, $tabindex;

        $container = $('.container-line-contacts');
        $content   = $('.line-contact');
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
            name: $name,
            phone: $phone,
            email: $email
        };

        $('#contactTemplate').tmpl(template).appendTo($container).each(function()
        {
            $(this).children('.contact-name').children('input').focus();
        });
    }

    App.prototype.events = function() 
    {
        /**
        * Add contact.
        */
        $('.add-line').live('click', function()
        {
            App.prototype.addContact('', '', '');
        });

        /**
        * Remove contact.
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