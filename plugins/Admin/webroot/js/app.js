$(function(){
    if (typeof(Bloodhound) != 'undefined') {
        var suburbs = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('title'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            identify: function (obj) {
                return obj.id;
            },
            sufficient: 1,
            prefetch: {
                cache: true,
                url: '/suburbs/Suburbs/index.json',
                transform: function (response) {
                    return response.data;
                }
            },
            remote: {
                url: '/suburbs/Suburbs/index.json?q=%QUERY',
                wildcard: '%QUERY',
                transform: function (response) {
                    return response.data;
                }
            }
        });

        $('input[name="suburb_name"]').typeahead(null, {
            name: 'suburbs',
            display: 'title',
            source: suburbs,
            minLength: 3,
            highlight: true
        }).bind('typeahead:select', function (ev, suggestion) {
            $('input[name="suburb_id"]').val(suggestion.id);
        });
    }
});
