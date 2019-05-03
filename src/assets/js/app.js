import $ from 'jquery';
import whatInput from 'what-input';

window.$ = $;

import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';
import './lib/slick';
const PSY_Carousel = require( './lib/psy-carousel');
var psy_carousel = new PSY_Carousel;

$(document).foundation();
