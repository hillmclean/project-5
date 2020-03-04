jQuery(function ($) {
  $('#get-another-post').on('click', function (e) {
    e.preventDefault();
    $.ajax({
      url: '/wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1',
      success: function (data) {
        var post = data.shift(); // The data is an array of posts. Grab the first one.
        $('.entry-title').text(post.title);
        $('.entry-content').html(post.content);

        // If the Source is available, use it. Otherwise hide it.
        if (typeof post.custom_meta !== 'undefined' && typeof post.custom_meta.Source !== 'undefined') {
          $('#quote-source').html('Source:' + post.custom_meta.Source);
        } else {
          $('#quote-source').text('');
        }
      },
      cache: false
    });
  });
});
