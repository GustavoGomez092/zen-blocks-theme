<div
  class="service-section layout-<?php echo esc_attr($service_layout); ?> <?php echo $enable_animations ? 'animated' : ''; ?>">
  <div class="service-container">
    <?php if ($service_layout === 'reverse'): ?>
      <!-- Service Content (Left in reverse layout) -->
      <div class="service-content">
        <!-- Text Content -->
        <div class="text-content">
          <div class="title-section">
            <div class="title-wrapper">
              <h2 zen-edit="service_title" zen-type="text" class="service-title">
                Spa
              </h2>
            </div>
          </div>

          <div zen-edit="service_description" zen-type="wysiwyg" class="service-description">
            <p>Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or even a very very
              short story. Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or even
              a very very short story.</p>
          </div>
        </div>

        <!-- Hours Information -->
        <?php if ($show_hours): ?>
          <div zen-edit="service_hours" zen-type="text" class="service-hours">
            Hours of Operation: Open 24 hours | Assistance available 6:00 am to 7:00 pm
          </div>
        <?php endif; ?>

        <!-- Call to Action Button -->
        <?php if ($show_cta): ?>
          <div class="cta-button">
            <a zen-edit="cta_link" zen-type="link" href="#" class="cta-link">
              <span zen-edit="cta_text" zen-type="text">Explore Wellness</span>
            </a>
          </div>
        <?php endif; ?>
      </div>

      <!-- Service Image (Right in reverse layout) -->
      <div class="service-image">
        <img zen-edit="service_image" zen-type="image" src="" alt="Spa service treatment image" class="service-img" />
      </div>
    <?php else: ?>
      <!-- Service Image (Left in default layout) -->
      <div class="service-image">
        <img zen-edit="service_image" zen-type="image" src="" alt="Spa service treatment image" class="service-img" />
      </div>

      <!-- Service Content (Right in default layout) -->
      <div class="service-content">
        <!-- Text Content -->
        <div class="text-content">
          <div class="title-section">
            <div class="title-wrapper">
              <h2 zen-edit="service_title" zen-type="text" class="service-title">
                Spa
              </h2>
            </div>
          </div>

          <div zen-edit="service_description" zen-type="wysiwyg" class="service-description">
            <p>Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or even a very very
              short story. Body text for whatever you'd like to say. Add main takeaway points, quotes, anecdotes, or even
              a very very short story.</p>
          </div>
        </div>

        <!-- Hours Information -->
        <?php if ($show_hours): ?>
          <div zen-edit="service_hours" zen-type="text" class="service-hours">
            Hours of Operation: Open 24 hours | Assistance available 6:00 am to 7:00 pm
          </div>
        <?php endif; ?>

        <!-- Call to Action Button -->
        <?php if ($show_cta): ?>
          <div class="cta-button">
            <a zen-edit="cta_link" zen-type="link" href="#" class="cta-link">
              <span zen-edit="cta_text" zen-type="text">Explore Wellness</span>
            </a>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
</div>