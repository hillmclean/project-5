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

        data.forEach(element => {
          let ranQuote = (`
          <p class='quote-content'>${element.content.rendered}</p>
          <p class='quote-author'>${element.title.rendered}</p>
          <a href="${element._qod_quote_source_url}" target="_blank">
            <p class='quote-source'>${element._qod_quote_source}</p>
          </a>
          `);
          anotherQuote.append(ranQuote);
        });

      }); // end of .done()


  }); // end of event listener

})(jQuery); // end of DOM Content Load
