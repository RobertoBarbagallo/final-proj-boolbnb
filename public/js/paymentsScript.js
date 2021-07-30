// Braitree Script

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

// Form Action Script

// var form = document.querySelector('#postform');

// // let sponsoredId = [];

// const SELECTED_STRUCTURE_ID = SELECTED_STRUCTURE['id'];

// sponsoredStructuresId.forEach(id => {

//   singleSponsoredId = id['structure_id']
//   // sponsoredId.push(singleSponsoredId)
//   if (singleSponsoredId == SELECTED_STRUCTURE_ID) {
//     console.log('gia sponsorizzata')
//     form.action = "{{ route('user.structures.paymentUpdate', $structure->id) }}"
//   } else {
//     form.action = "{{ route('user.structures.payment', $structure->id) }}"
//   }

// });





// if (condition) {
  
// }
