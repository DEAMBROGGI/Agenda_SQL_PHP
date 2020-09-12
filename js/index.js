$(function(){
  var l = new Login();
})


class Login {
  constructor() {
    this.submitEvent()
  }

  submitEvent() {
    $('form').submit((event) => {
      event.preventDefault()
      this.sendForm()
    })
  }

  sendForm() {
    let form_data = new FormData();
    form_data.append('username', $('#username').val())
    form_data.append('passw', $('#passw').val())
    
    $.ajax({
      url: 'server/check_login.php',
      cache: false,
      processData: false,
      contentType: false,
      data: form_data,
      type: 'POST',
      dataType: "json",
    }).done(function (data) {
     
      if (data.acceso == "concedido") {
        window.location.href = 'test.html';
        user = data.id;
        console.log(user);
      } else {
        alert(data.acceso);
      }
    }).fail(function () {
      alert("Algo salió mal");
    });

  
    
  }
}
