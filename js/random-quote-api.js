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
          // let ranQuote = (`
          //   <p class='quote-content'>${element.content.rendered}</p>
          //   <p class='quote-author'> — ${element.title.rendered}</p>
          // `);
          // anotherQuote.append(ranQuote);
          if (element._qod_quote_source_url.length > 0) {
            let ranQuoteSrc1 = (`
            <p class='quote-content'>${element.content.rendered}</p>
            <p class='quote-author'> — ${element.title.rendered}, </p>
              <a href="${element._qod_quote_source_url}" target="_blank">
              <p class='quote-source'>, ${element._qod_quote_source}</p>
              </a>
            `);
            anotherQuote.append(ranQuoteSrc1);
          } else if (element._qod_quote_source.length > 0) {
            let ranQuoteSrc2 = (` 
            <p class='quote-content'>${element.content.rendered}</p>
            <p class='quote-author'> — ${element.title.rendered}, </p>
            <p class='quote-source'>${element._qod_quote_source}</p>
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
