(function ($) {
  $('#another-quote').on('click', function (event) {
    event.preventDefault();
    $.ajax({
      method: 'get',
      url: qod_vars.home_url,
      data: {
        'action': 'qod_comments',
        'security': qod_vars.comment_nonce,
        'the_post_id': qod_vars.post_id
      }
    }).done(function (data) {

      let getContent = data.results.filter(function (item) {
        if (item.multimedia !== null) {
          return item;
        }
      }).slice(0, 12)
    });
  })(jQuery);
