(function ($) {

  const anotherQuote = $('.quote-box');

  $('#another-quote').on('click', function (event) {
    event.preventDefault();
    anotherQuote[0].innerHTML = '';

    $.ajax({
      method: 'GET',
      url: qodVars.rest_url + '/wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1',
      beforeSend: function (xhr) {
        xhr.setRequestHeader('X-WP-Nonce', qodVars.wpapi_nonce);
      }
    })

      .done(function (data) {
        console.log(data);

        data.forEach(element => {

          if (element._qod_quote_source_url.length > 0) {
            let ranQuoteSrc1 = (`
            <p class='quote-content'>${element.content.rendered}</p>
            <p class='quote-author'> — ${element.title.rendered}, <span class='quote-src-link'><a href="${element._qod_quote_source_url}" target="_blank">${element._qod_quote_source}</a></span></p>
            `);
            anotherQuote.append(ranQuoteSrc1);
          } else if (element._qod_quote_source.length > 0) {
            let ranQuoteSrc2 = (` 
            <p class='quote-content'>${element.content.rendered}</p>
            <p class='quote-author'> — ${element.title.rendered}<span class='quote-source'>,  ${element._qod_quote_source}</span></p>
            `);
            anotherQuote.append(ranQuoteSrc2);
          } else {
            let ranQuoteSrc3 = (`
            <p class='quote-content'>${element.content.rendered}</p>
            <p class='quote-author'> — ${element.title.rendered}</p>
            `);
            anotherQuote.append(ranQuoteSrc3);
          }
        });

      }); // end of .done()

  }); // end of event listener

})(jQuery); // end of DOM Content Load
