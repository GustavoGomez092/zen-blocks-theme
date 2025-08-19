// Service Section - GSAP animations and behavior
const animateServiceSection = () => {
  const components = document.querySelectorAll('.service-section');
  if (!components.length) return;

  // Respect reduced motion
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  components.forEach(component => {
    // Only animate if animations are enabled and user prefers motion
    if (!component.classList.contains('animated') || prefersReduced) return;

    // Elements to animate
    const elements = [
      { el: component.querySelector('.service-image'), delay: 0 },
      { el: component.querySelector('.service-title'), delay: 0.1 },
      { el: component.querySelector('.service-description'), delay: 0.2 },
      { el: component.querySelector('.service-hours'), delay: 0.3 },
      { el: component.querySelector('.cta-button'), delay: 0.4 }
    ].filter(item => item.el); // Remove null elements

    if (elements.length > 0) {
      // Set initial states using GSAP
      window.gsap.set(elements.map(item => item.el), {
        opacity: 0,
        y: 30
      });

      // Create ScrollTrigger animations
      elements.forEach(({ el, delay }) => {
        window.gsap.to(el, {
          opacity: 1,
          y: 0,
          duration: 0.8,
          ease: "power2.out",
          delay: delay,
          scrollTrigger: {
            trigger: component,
            start: "top 75%",
            once: true // Only animate once
          }
        });
      });

      // Special animation for the image - slide in from left or right based on layout
      const serviceImage = component.querySelector('.service-image');
      const isReversed = component.classList.contains('layout-reverse');
      
      if (serviceImage) {
        window.gsap.fromTo(serviceImage, 
          { 
            opacity: 0,
            x: isReversed ? 40 : -40,
            scale: 0.95
          },
          { 
            opacity: 1,
            x: 0,
            scale: 1,
            duration: 1,
            ease: "power2.out",
            scrollTrigger: {
              trigger: component,
              start: "top 75%",
              once: true
            }
          }
        );
      }

      // CTA button hover animation
      const ctaButton = component.querySelector('.cta-link');
      if (ctaButton) {
        ctaButton.addEventListener('mouseenter', () => {
          window.gsap.to(ctaButton, {
            scale: 1.05,
            duration: 0.3,
            ease: "power2.out"
          });
        });

        ctaButton.addEventListener('mouseleave', () => {
          window.gsap.to(ctaButton, {
            scale: 1,
            duration: 0.3,
            ease: "power2.out"
          });
        });
      }
    }
  });
};

// Initialize animations when DOM is ready
jQuery(document).ready(() => {
  animateServiceSection();
});
