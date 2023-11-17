(function($) {
    $(document).ready(function() {
        var api = wp.customize;
        api.bind('ready', function() {
            $(['control', 'section', 'panel']).each(function(i, type) {
                $('a[rel="tc-'+type+'"]').click(function(e) {
                    e.preventDefault();
                    var id = $(this).attr('href').replace('#', '');
                    if(api[type].has(id)) {
                        api[type].instance(id).focus();
                    }
                });
            });
        });
    });
})(jQuery);
