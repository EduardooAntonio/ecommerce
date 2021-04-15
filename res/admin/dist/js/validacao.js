  
  var form = document.getElementById('form-login');

  if (form.addEventListener) {
    form.addEventListener("submit", validarLogin);
  } else if(form.attachEvent) {
    form.attachEvent("onsubmit", validarLogin);
  }

  function validarLogin(evt) {

      var login = document.getElementById('login');
      var password = document.getElementById('password');
      var contErro = 0;

      var caixa_login = document.querySelector('.msg-nome');
      if (login.value == "") {
        caixa_login.innerHTML = 'Preencher o Login!';
        caixa_login.style.display = 'block';
        contErro += 1;
      } else {
        caixa_login.style.display = 'none';
      }

      var caixa_password = document.querySelector('.msg-senha');
      if (password.value == "") {
        caixa_password.innerHTML = 'Preencher a senha!';
        caixa_password.style.display = 'block';
        contErro += 1;
      } else if (password.value.length < 5) {
        caixa_password.innerHTML = 'Preencher a senha com o minimo de 5 caracteres!';
        caixa_password.style.display = 'block';
        contErro += 1;
      } else {
        caixa_password.style.display = 'none';
      }


      if (contErro > 0) {
        event.preventDefault();

      }


      // Campo senha 2
      
      /*var caixa_password2 = document.querySelector('.msg-senha');
      if (password.value == "") {
        caixa_password2.innerHTML = 'Preencher a senha!';
        caixa_password2.style.display = 'block';
        contErro += 1;
      } else if (senha.value.lenght < 5) {
        caixa_password2.innerHTML = 'Preencher a senha com o minimo de 5 caracteres!';
        caixa_login.style.display = 'block';
      } else {
        caixa_login.style.display = 'none';
      }
      
      if (senha.value != "" && senha2.value != "" && senha.value != senha2.value) {
        caixa_password2.innerHTML = 'O campo Repita a senha é diferente do campo senha!';
        contErro += 1;
      }

      */





  }