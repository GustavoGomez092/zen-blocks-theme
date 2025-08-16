import './index.css'
// you MUST import the CSS files for the components you create here in order for the @apply directive to work
import './zen-blocks/home-hero/home-hero.css';

import gsap from "gsap";
import scrollTrigger from "gsap/ScrollTrigger";
import Lenis from 'lenis'

gsap.registerPlugin(scrollTrigger);

// Initialize Lenis
const lenis = new Lenis({
  autoRaf: true,
});

window.gsap = gsap;
window.ScrollTrigger = scrollTrigger;
window.Lenis = lenis;