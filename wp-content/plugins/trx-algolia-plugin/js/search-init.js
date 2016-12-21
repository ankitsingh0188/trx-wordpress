(function($, window, document, undefined) {
  $('.enable-algoliasearch').trxAlgoliaSearch({
    applicationId: '58GFT8DOWX',
    applicationSecret: 'cf6ad84c315c27184b2da887b4dd85f4', //  Make  sure  you use the "admin" application secret.
    index: 'jurisdiction_presiding_officer', //  Name  of  the  index which will  be  queried during  search.
    protocol: 'https:',
    enableDistinct: true,
    attributeForDistinct: 'name',
    highlightPreTag: '<span  class="bg-success">', //  Highlight words will  be  wrapped around  these tags.
    highlightPostTag: '</span>',
    typoTolerance: false,
    emptyMessage: 'No selection made', //  If  there is  no  suggestion, and you still press "enter" key,  an  alert will appear  with  this  message.
    keyNameMapping: {
      name: 'Name',
      city: 'City',
      presiding_officer: 'Presiding  Officer'
    }, //  Key label mapping.  These labels  will  be  prefixed in  the suggestion.
    relativeUrl: 'listings', //  Use "jurisdiction"  for redirecting to  "http://trxrev.com/jurisdiction/<id>?code=<jurisdiction_code>"
    classSearchSuggestion: 'list-group-item', //  Every search  suggestion  HTML  wrapper will  have  this  class.
    classSelectedSearchSuggestion: 'list-group-item-info', //  A selected  search  suggestion  HTML  wrapper will  have  this  class.
    idSearchSuggestions: 'search-suggestions', //  Element  with  this  ID  will  render  the search  suggestions.
    idSearchForm: 'search-form' //  Search  form  ID.
  });
})(jQuery, window, document);