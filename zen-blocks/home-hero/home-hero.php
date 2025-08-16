<?php
/**
 * Home Hero Zen Block
 * Folder and first class must match: home-hero
 * - Single root wrapper only
 * - Uses zen-edit for content; controls only for show/hide toggles
 */
?>
<div class="home-hero">
  <div class="home-hero__inner" style="max-width: <?php echo intval($max_width); ?>px;">
    <?php if ($show_badge): ?>
      <div class="home-hero__badge" aria-label="Announcement">
        <span zen-edit="badge_label" zen-type="text">New AI Enhancement</span>
      </div>
    <?php endif; ?>

    <h1 class="home-hero__title">
      <span zen-edit="title_line_1" zen-type="text">Ultimate Protection for</span><br />
      <span zen-edit="title_line_2" zen-type="text">Your Digital World</span>
    </h1>

    <?php if ($show_subtitle): ?>
      <div class="home-hero__subtitle" zen-type="wysiwyg" zen-edit="subtitle">
        <p>Stay safe from viruses, malware, and cyber threats with our cutting-edge antivirus solution. Secure your
          devices with real-time protection and advanced security features.</p>
      </div>
    <?php endif; ?>

    <?php if ($show_button): ?>
      <div class="home-hero__cta">
        <a zen-edit="cta_link" zen-type="link" class="home-hero__button">
          <span zen-edit="cta_text" zen-type="text">Get the Antivirus</span>
        </a>
      </div>
    <?php endif; ?>
  </div>
</div>