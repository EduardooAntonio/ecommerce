  
  var form = document.getElementById('form-product');

  if (form.addEventListener) {
    form.addEventListener("submit", validarProduct);
  } else if(form.attachEvent) {
    form.attachEvent("onsubmit", validarProduct);
  }

  function validarProduct(evt) {

      var desproduct = document.getElementById('desproduct');
      var vlprice = document.getElementById('vlprice');
      var desurl = document.getElementById('desurl');
      var contErro = 0;

      //validação nome
      var caixa_desproduct = document.querySelector('.msg-nome');
      if (desproduct.value == "") {
        caixa_desproduct.innerHTML = 'Preencher o Nome do produto!';
        caixa_desproduct.style.display = 'block';
        contErro += 1;
      } else if (desproduct.value.length < 2) {
        caixa_desproduct.innerHTML = 'Preencher o nome com o minimo de 2 caracteres!';
        caixa_desproduct.style.display = 'block';
        contErro += 1;
      } else {
        caixa_desproduct.style.display = 'none';
      }


      //validação preco
      var caixa_vlprice = document.querySelector('.msg-preco');
      if (vlprice.value == "") {
        caixa_vlprice.innerHTML = 'Preencher o preço do produto!';
        caixa_vlprice.style.display = 'block';
        contErro += 1;
      } else {
        caixa_vlprice.style.display = 'none';
      }

      var caixa_desurl = document.querySelector('.msg-url');
      if (desurl.value == "") {
        caixa_desurl.innerHTML = 'Preencher o URL do produto!';
        caixa_desurl.style.display = 'block';
        contErro += 1;
      } else if (desurl.value.length < 2) {
        caixa_desurl.innerHTML = 'Preencher a URL com o minimo de 2 caracteres!';
        caixa_desurl.style.display = 'block';
        contErro += 1;
      } else {
        caixa_desurl.style.display = 'none';
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