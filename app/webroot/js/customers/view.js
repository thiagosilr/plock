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

    App.prototype.events = function() 
    {
        // Filter Connection
        $('.filter-connection').live('click', function()
        {
            var $filter;

            $filter = $(this).attr('id').split('-');
            
            // Performs the filter.
            if ($filter[1] == 'all')
            {
                $('table#domain-connection-'+$filter[0]+' tbody tr').show();
            }
            else
            {
                $('table#domain-connection-'+$filter[0]+' tbody tr').hide();
                $('table#domain-connection-'+$filter[0]+' tbody tr.connection-type-'+$filter[0]+'-'+$filter[1]).show();
            }
            
            // Marks the selected filter.
            $('.filter-connection-'+$filter[0]+' li').removeClass('active');
            $(this).parents('li').addClass('active');
            
            return false;
        });
    }

    return App;
})();

App = new App();