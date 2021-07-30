var button = document.querySelector('#submit-button');

braintree.dropin.create({
  authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
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