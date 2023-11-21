   // When the user clicks on the button, scroll to the top of the document
            function topFunction(){
              document.body.scrollTop = 0; // For Safari
              document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            }
          jQuery(document).ready(function(){
            mybutton = document.getElementById("myBtn");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};

                function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    mybutton.style.display = "block";
                } else {
                    mybutton.style.display = "none";
              }
          }

  });

(function($) {

//main navigation
    $('.decents-blog-main-navigation ul li.menu-item-has-children').find('> a').after('<button class="submenu-toggle"><i class="fa fa-plus"></i></button>');
    $('.decents-blog-main-navigation ul li.page_item_has_children').find('> a').after('<button class="submenu-toggle"><i class="fa fa-plus"></i></button>');
    $('.decents-blog-main-navigation ul li button.submenu-toggle').on('click', function() {
        $(this).parent('li.menu-item-has-children').toggleClass('active');
        $(this).parent('li.page_item_has_children').toggleClass('active');
        $(this).siblings('.sub-menu').stop(true, false, true).slideToggle();
        $(this).siblings('.children').stop(true, false, true).slideToggle();
    });
    $('.decents-blog-main-navigation .toggle-button').click(function() {
        $('.primary-menu-list').animate({
            width: 'toggle',
        });
    });
    $('.decents-blog-main-navigation .close').click(function() {
        $('.primary-menu-list').animate({
            width: 'toggle',
        });
    });
    //for accessibility
    $('.decents-blog-main-navigation ul li a, .decents-blog-main-navigation ul li button').focus(function() {
        $(this).parents('li').addClass('focused');
    }).blur(function() {
        $(this).parents('li').removeClass('focused');
    });
})(jQuery);

(function($) {

    "use strict";

    jQuery(document).ready(function() {
        

    //infinite pagination
    /*new pagination style*/
    var paged = parseInt(decents_blog_ajax.paged) + 1;
    var max_num_pages = parseInt(decents_blog_ajax.max_num_pages);
    //alert(max_num_pages);
    var next_posts = decents_blog_ajax.next_posts;
    //alert(next_posts);
    $(document).on( 'click', '.show-more', function( event ) {
      event.preventDefault();
        var show_more = $(this);
        var click = show_more.attr('data-click');
        if( (paged-1) >= max_num_pages){
            show_more.html(decents_blog_ajax.no_more_posts)
        }
        if( click == 0 || (paged-1) >= max_num_pages){
            return false;
        }
        show_more.html('<i class="fa fa-spinner fa-spin fa-fw"></i>');
        show_more.attr("data-click", 0);
        var page = parseInt( show_more.attr('data-number') );

        $('#free-temp-post').load(next_posts + ' .grid-item', function() {
            /*http://stackoverflow.com/questions/17780515/append-ajax-items-to-masonry-with-infinite-scroll*/
            paged++;/*next page number*/
            next_posts = next_posts.replace(/(\/?)page(\/|d=)[0-9]+/, '$1page$2'+ paged);
            var html = $('#free-temp-post').html();
            $('#free-temp-post').html('');

            // Make jQuery object from HTML string
            var $moreBlocks = $( html ).filter('.grid-item');
            // Append new blocks to container
            $('.grid').append( $moreBlocks ).imagesLoaded(function(){
                // Have Masonry position new blocks
                $('.grid').masonry( 'appended', $moreBlocks );
            });

            show_more.attr("data-number", page+1);
            show_more.attr("data-click", 1);
            show_more.html("<i class='fa fa-refresh'></i>"+decents_blog_ajax.show_more)
        });
        return false;
    });
    
    //end pagination
    });

})(jQuery);


  // Navbar Area sticky

    jQuery(window).on('scroll', function() {
        if (jQuery(this).scrollTop() >150){  
            jQuery('.navbar-area').addClass("sticky-nav");
        }
        else{
            jQuery('.navbar-area').removeClass("sticky-nav");
        }
    });
jQuery(document).ready(function() {


var $grid = jQuery('.grid').masonry({
  // options...
  itemSelector: '.grid-item',
  gutter: 20
});

$grid.imagesLoaded().progress( function() {
  $grid.masonry('layout');
});

});

// Navbar Area sticky

jQuery(window).on('scroll', function() {
    if (jQuery(this).scrollTop() >150){  
        jQuery('.enable_sticky').addClass("sticky-nav");
    }
    else{
        jQuery('.enable_sticky').removeClass("sticky-nav");
    }
});
