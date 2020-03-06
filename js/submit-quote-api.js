(function ($) {

  $('#post-form').on('submit', function (event) {
    event.preventDefault();
    console.log(event.target[1].value.length + 'this');
    console.log(event.target[0].value.length + 'this');

    let author = event.target[0].value;
    let content = event.target[1].value;

    if (author === '' || content === '') {
      alert('Error!');
    } else {



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
          '_qod_quote_source_url': event.target[3].value,
          'status': 'draft'
        },
        success: function (data) {
          console.log(data);
        },
        error: function (error) {
          console.log(error);
        }
      })

      alert('success!');
    }

    $('#post-form')[0].reset();
  }); // end of event listener
})(jQuery);