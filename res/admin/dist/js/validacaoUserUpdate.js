  
  var form = document.getElementById('form-user');

  if (form.addEventListener) {
    form.addEventListener("submit", validarUser);
  } else if(form.attachEvent) {
    form.attachEvent("onsubmit", validarUser);
  }

  function validarUser(evt) {

      var desperson = document.getElementById('desperson');
      var deslogin = document.getElementById('deslogin');
      var despassword = document.getElementById('despassword');
      var desemail = document.getElementById('desemail');
      var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
      var contErro = 0;

      //validação nome
      var caixa_desperson = document.querySelector('.msg-nome');
      if (desperson.value == "") {
        caixa_desperson.innerHTML = 'Preencher o Nome!';
        caixa_desperson.style.display = 'block';
        contErro += 1;
      } else if (desperson.value.length < 2) {
        caixa_desperson.innerHTML = 'Preencher o nome com o minimo de 2 caracteres!';
        caixa_desperson.style.display = 'block';
        contErro += 1;
      } else {
        caixa_desperson.style.display = 'none';
      }

      //validação senha
      /*var caixa_despassword = document.querySelector('.msg-senha');
      if (despassword.value == "") {
        caixa_despassword.innerHTML = 'Preencher a senha!';
        caixa_despassword.style.display = 'block';
        contErro += 1;
      } else if (despassword.value.length < 5) {
        caixa_despassword.innerHTML = 'Preencher a senha com o minimo de 5 caracteres!';
        caixa_despassword.style.display = 'block';
        contErro += 1;
      } else {
        caixa_despassword.style.display = 'none';
      }*/

      //validação login
      var caixa_deslogin = document.querySelector('.msg-login');
      if (deslogin.value == "") {
        caixa_deslogin.innerHTML = 'Preencher o login!';
        caixa_deslogin.style.display = 'block';
        contErro += 1;
      }else if (deslogin.value.length < 4) {
        caixa_deslogin.innerHTML = 'Preencher o login com o minimo de 4 caracteres!';
        caixa_deslogin.style.display = 'block';
        contErro += 1;
      } else {
        caixa_deslogin.style.display = 'none';
      }

      //validação email
      var caixa_email = document.querySelector('.msg-email');
      if(desemail.value == ""){
        caixa_email.innerHTML = "Favor preencher o E-mail";
        caixa_email.style.display = 'block';
        contErro += 1;
      }else if(filtro.test(desemail.value)){
        caixa_email.style.display = 'none';
      }else{
        caixa_email.innerHTML = "Formato do E-mail inválido";
        caixa_email.style.display = 'block';
        contErro += 1;
      }



      // conta os erros e previne o botao de fazer o submit no form
      if (contErro > 0) {
        
       evt.preventDefault();

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