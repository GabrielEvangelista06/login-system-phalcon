$(document).ready(function () {
  validateLogin()
})

function validateLogin() {
  $('#loginForm').on('submit', function (evt) {
    $.ajax({
      url: '/login/auth',
      method: 'POST',
      data: $('#loginForm').serialize(),
      success: function (result) {
        window.location.href = ''
      },
      error: function (response) {
        const json = JSON.parse(response.responseText)
        $('#loginFormHeader').html(json.message)
      }
    })

    evt.preventDefault()
  })
}
