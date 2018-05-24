window._ = require('lodash')
$ = window.$ = window.jQuery = require('jquery')
window.Popper = require('popper.js').default

require('jquery-validation')

let lang = $('meta[name=language]').attr('content')
if (lang && lang != 'en') {
  require('jquery-validation/dist/localization/messages_' + lang + '.js')
}

$(document).ready(function () {
  $('.validate').validate()
})
