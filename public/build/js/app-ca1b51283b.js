




//var algolia = algoliasearch('9JUTOYSC0P', '1a8a0bdc9bf17ec7fea1046d16055136');
//var index = algolia.initIndex('users');
//$(document).ready(function() {
//    var $inputfield = $("#query");
//    var helper = algoliasearchHelper(algolia, 'users', {
//        hitsPerPage: 10000,
//    });
//
//    helper.on("result", searchCallback);
//    $inputfield.keyup(search);
//    search();
//
//    function search() {
//        helper.setQuery($inputfield.val()).search();
//    }
//
//    function searchCallback(content) {
//        if (content.query != $inputfield.val()) {
//            return;
//        }
//
//        if (content.hits.length == 0) {
//            $('#hits').empty();
//            return;
//        }
//
//        var hits = '';
//        for (var i = 0; i < content.hits.length; ++i) {
//            var hit = content.hits[i];
//            hits += '<div class="hit panel">';
//            for (var attribute in hit._highlightResult) {
//                hits += '<div class="attribute">' +
//                    '<img src="'+ hit._highlightResult['avatar'] +'">' +
//                    '<strong>' + attribute + ': </strong>' +
//                    hit._highlightResult[attribute].value +
//                    '</div>';
//            }
//            hits += '</div>';
//        }
//        $('#hits').html(hits);
//    }
//
//    var template = Hogan.compile('<a href="#">{{{_highlightResult.name.value}}}</a>');
//    $('#query').typeahead({hint: true}, {
//        source: algolia.initIndex('users').ttAdapter(),
//        displayKey: 'name', // attribute displayed once selected
//        templates: {
//            suggestion: function(hit) {
//                return template.render(hit); // moustache template rendered by Hogan
//            }
//        }
//    });
//});
//
////$('#q').typeahead({hint: false}, {
////    source: index.ttAdapter({hitsPerPage: 5}),
////    displayKey: 'username',
////    templates: {
////        suggestion: function(hits) {
////            // render the hit
////            return '<div class="hit">' +
////                '<div class="name">' +
////                hits._highlightResult.name.value + ' ' +
////                '</div>' +
////                '</div>';
////        }
////    }
////});

(function ( $ ) {
    $.fn.feedback = function(success, fail) {
        self=$(this);
        self.find('.dropdown-menu-form').on('click', function(e){e.stopPropagation()})

        self.find('.screenshot').on('click', function(){
            self.find('.cam').removeClass('fa-camera fa-check').addClass('fa-refresh fa-spin');
            html2canvas($(document.body), {
                onrendered: function(canvas) {
                    self.find('.screen-uri').val(canvas.toDataURL("image/png"));
                    self.find('.cam').removeClass('fa-refresh fa-spin').addClass('fa-check');
                }
            });
        });

        self.find('.do-close').on('click', function(){
            self.find('.dropdown-toggle').dropdown('toggle');
            self.find('.reported, .failed').hide();
            self.find('.report').show();
            self.find('.cam').removeClass('fa-check').addClass('fa-camera');
            self.find('.screen-uri').val('');
            self.find('textarea').val('');
        });

        failed = function(){
            self.find('.loading').hide();
            self.find('.failed').show();
            if(fail) fail();
        }

        self.find('form').on('submit', function(){
            self.find('.report').hide();
            self.find('.loading').show();
            $.post( $(this).attr('action'), $(this).serialize(), null, 'json').done(function(res){
                if(res.result == 'success'){
                    self.find('.loading').hide();
                    self.find('.reported').show();
                    if(success) success();
                } else failed();
            }).fail(function(){
                failed();
            });
            return false;
        });
    };
}( jQuery ));

$(document).ready(function () {
    $('.feedback').feedback();
});
//# sourceMappingURL=app.js.map