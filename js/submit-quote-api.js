(function ($) {

  $('#post-form').on('submit', function (event) {
    console.log(event.target);
    event.preventDefault();


    $.ajax({
      method: 'POST',
      url: qodSubmit.rest_url + '/wp/v2/posts',
      beforeSend: function (xhr) {
        xhr.setRequestHeader('X-WP-Nonce', qodSubmit.nonce);
      },
      data: {
        'title': event.target[0].value,
        'content': event.target[1].value,
        '_qod_quote_source': event.target[2].value,
        'qod_quote_source_url': event.target[3].value,
        'status': 'draft'
      },
      success: function (data) {
        console.log(data);
      },
      error: function (error) {
        console.log(error);
      }
    })

  }); // end of event listener
})(jQuery);