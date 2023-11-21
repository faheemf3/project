jQuery(function($) {
    // init Masonry
    var $grid = $('.grid').masonry({
        // options
        itemSelector: '.grid-item',
        columnWidth: 300
    });
    // layout Masonry after each image loads
    $grid.imagesLoaded().progress( function() {
        $grid.masonry('layout');
    });
});