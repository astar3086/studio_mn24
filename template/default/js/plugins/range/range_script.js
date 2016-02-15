
$(document).ready(function() {



  var $first_range = $('#first-range');
  var $first_output = $('#first-output');

  var $second_range = $('#second-range');
  var $second_output = $('#second-output');

  var $third_range = $('#third-range');
  var $third_output = $('#third-output');

  var $four_range = $('#four-range');
  var $four_output = $('#four-output');

  // var $five_output = $("#five-output");
  // var $six_output = $("#six-output");


  // Initialize rangeslider.js
  $first_range.rangeslider({
    polyfill: false
  });

  $second_range.rangeslider({
    polyfill: false
  });

  $third_range.rangeslider({
    polyfill: false
  });

  $four_range.rangeslider({
    polyfill: false
  });

  // Current value output
  $first_output[0].innerHTML = $first_range[0].value;
  $second_output[0].innerHTML = $second_range[0].value;
  $third_output[0].innerHTML = $third_range[0].value;
  $four_output[0].innerHTML = $four_range[0].value;


  // $five_output[0].innerHTML = $third_range[0].value;
  // $six_output[0].innerHTML = $four_range[0].value;



  $first_range.on('input', function() {
    $first_output[0].innerHTML = this.value;
  });

  $second_range.on('input', function() {
    $second_output[0].innerHTML = this.value;
  });

  $third_range.on('input', function() {
    $third_output[0].innerHTML = this.value;

    // $five_output[0].innerHTML = this.value;

  });

  $four_range.on('input', function() {
    $four_output[0].innerHTML = this.value;

    // $six_output[0].innerHTML = this.value;
  });

  // create an observer instance
  var observer1 = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
      if (mutation.type === 'attributes') {
        $first_range.rangeslider('update', true);
        $first_output[0].innerHTML = $first_range[0].value;
      }
    });
  });

  var observer2 = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
      if (mutation.type === 'attributes') {
        $second_range.rangeslider('update', true);
        $second_output[0].innerHTML = $second_range[0].value;
      }
    });
  });


  var observer3 = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
      if (mutation.type === 'attributes') {
        $third_range.rangeslider('update', true);
        $third_output[0].innerHTML = $third_range[0].value;
      }
    });
  });

  var observer4 = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
      if (mutation.type === 'attributes') {
        $four_range.rangeslider('update', true);
        $four_output[0].innerHTML = $four_range[0].value;
      }
    });
  });

  // var observer5 = new MutationObserver(function(mutations) {
  //   mutations.forEach(function(mutation) {
  //     if (mutation.type === 'attributes') {
  //       $third_range.rangeslider('update', true);
  //       $five_output[0].innerHTML = $third_range[0].value;
  //     }
  //   });
  // });

  // var observer6 = new MutationObserver(function(mutations) {
  //   mutations.forEach(function(mutation) {
  //     if (mutation.type === 'attributes') {
  //       $four_range.rangeslider('update', true);
  //       $six_output[0].innerHTML = $four_range[0].value;
  //     }
  //   });
  // });

  observer1.observe($first_range[0], {
    attributes: true
  });

  observer2.observe($second_range[0], {
    attributes: true
  });

  observer3.observe($third_range[0], {
    attributes: true
  });

  observer4.observe($four_range[0], {
    attributes: true
  });

  // observer5.observe($third_range[0], {
  //   attributes: true
  // });

  // observer6.observe($four_range[0], {
  //   attributes: true
  // });

  $('input[type=text]').on('input', function() {
    $first_range[0].setAttribute(this.name, this.value);
  });

  $('input[type=text]').on('input', function() {
    $second_range[0].setAttribute(this.name, this.value);
  });

   $('input[type=text]').on('input', function() {
    $third_range[0].setAttribute(this.name, this.value);
  });

  $('input[type=text]').on('input', function() {
    $four_range[0].setAttribute(this.name, this.value);
  });





});



