var button = document.querySelector('#submit-button');

braintree.dropin.create({
  authorization: SANDBOX_KEY,
  selector: '#dropin-container'
}, function (err, instance) {
  button.addEventListener('click', function () {
    instance.requestPaymentMethod(function (err, payload) {
      if(err){
        button.setAttribute('type', 'button');
      } else {
        button.setAttribute('type', 'submit');
      }
    });
  })
});