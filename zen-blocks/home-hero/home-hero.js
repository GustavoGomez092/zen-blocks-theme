
// Home Hero - window.gsap animations and behavior
const animateComponent =() => {

  const root = document.querySelector('.home-hero');
  if (!root) return;

  // Respect reduced motion
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Elements to animate in
  const elements = [
    { el: root.querySelector('.home-hero__badge'), delay: 0.05 },
    { el: root.querySelector('.home-hero__title'), delay: 0.12 },
    { el: root.querySelector('.home-hero__subtitle'), delay: 0.24 },
    { el: root.querySelector('.home-hero__button'), delay: 0.36 }
  ].filter(item => item.el); // Remove null elements

  if (!prefersReduced && elements.length > 0) {
    // Set initial states using window.gsap
    window.gsap.set(elements.map(item => item.el), {
      opacity: 0,
      y: 14
    });

    // Create ScrollTrigger animation
    elements.forEach(({ el, delay }) => {
      window.gsap.to(el, {
        opacity: 1,
        y: 0,
        duration: 0.48,
        ease: "power2.out",
        delay: delay,
        scrollTrigger: {
          trigger: root,
          start: "top 80%", // Equivalent to threshold: 0.2
          once: true // Only animate once
        }
      });
    });
  }
};

jQuery(document).ready(() => {
  animateComponent();
});