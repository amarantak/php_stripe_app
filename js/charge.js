// Create a Stripe client
var stripe = Stripe('pk_test_51Q2aif2L80WeTT2nIzCBH1xreUXkGkimxTvyD3mSixDXEKRkyPNw6WdZHMlD0KcMs8r2Vius8i4WScHX2pskdbXa006803CnWU');

// Create an instance of Elements
var elements = stripe.elements();

// Function to get CSS variable value
function getCssVariable(variable) {
  return getComputedStyle(document.documentElement).getPropertyValue(variable).trim();
}

// Custom styling can be passed to options when creating an Element.
var style = {
  base: {
    color: 'red',
    fontFamily: '"Lato", sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder':{
      color: '#141414'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Cutoms Style button with BS
document.querySelector('#payment-form button').classList =
  'btn custom-color custom-color2 font-weight-bold btn-block mt-4';

// Create an instance of the card Element
var card = elements.create('card', { style: style });

// Add an instance of the card Element into the `card-element` <div>
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server
      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}