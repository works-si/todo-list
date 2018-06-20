/*!
 * ManagerStudent
 * Application for the course Sistema para Internet
 * https://gitlab.com/si-devs/student-manager-front
 * @author Jaqueline Paschoal and Robson Formigão
 * @version 1.1.1
 * Copyright 2018. MIT licensed.
 */
(function () {

  'use strict';

  var $inputCep = document.querySelector('[data-js="cep"]');
  var $address = document.querySelector('[data-js="address"]');

  $inputCep.addEventListener('blur', function() {
    var CEP = $inputCep.value;

    axios.get('https://viacep.com.br/ws/' + CEP + '/json/')
    .then(function (response) {
      $address.value = response.data.logradouro;
    })
    .catch(function (error) {
      console.log(error);
    })

  }, false)

})();
