(function ($) {

  const anotherQuote = $('.quote-box');

  $('#another-quote').on('click', function (event) {
    event.preventDefault();
    anotherQuote[0].innerHTML = '';

    $.ajax({
      method: 'GET',
      url: qodVars.rest_url + '/wp/v2/posts',
      beforeSend: function (xhr) {
        xhr.setRequestHeader('X-WP-Nonce', qodVars.wpapi_nonce);
      }
    })

      .done(function (data) {
        console.log(data);
      });


  }); // end of .done()

})(jQuery); // end of DOM Content Load
