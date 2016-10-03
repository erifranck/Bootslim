import { WOW } from 'wowjs';
require('bootstrap');

const wow = new WOW({
  boxClass:     'wow',      // default
  animateClass: 'animated', // default
  offset:       20,          // default
  mobile:       true,       // default
  live:         true        // default
});
console.log(wow);
wow.init();
