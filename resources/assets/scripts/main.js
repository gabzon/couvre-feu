//http://noraesae.github.io/perfect-scrollbar/


/** import external dependencies */
import 'jquery';
import 'bootstrap';
import 'fancybox/dist/js/jquery.fancybox.js';
import 'sticky-kit/dist/sticky-kit.js';
//import 'perfect-scrollbar/dist/js/perfect-scrollbar.jquery.js';
import 'jscrollpane/script/jquery.mousewheel.js';
import 'jscrollpane/script/jquery.jscrollpane.js';


/** import local dependencies */
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

/**
 * Populate Router instance with DOM routes
 * @type {Router} routes - An instance of our router
 */
const routes = new Router({
  /** All pages */
  common,
  /** Home page */
  home,
  /** About Us page, note the change from about-us to aboutUs. */
  aboutUs,
});

/** Load Events */
jQuery(document).ready(() => routes.loadEvents());
