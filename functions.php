<?php
// Check if zen blocks plugin is active and installed
require_once get_template_directory() . '/includes/plugin-installer.php';

// add style to the blocks editor
add_action('enqueue_block_editor_assets', function () {
  wp_enqueue_style('zen-blocks-editor-styles', get_template_directory_uri() . '/editor-styles.css', array(), '1.0.0');
});

// add script to the blocks editor
add_action('enqueue_block_editor_assets', function () {
  wp_enqueue_script('zen-blocks-editor-script', get_template_directory_uri() . '/editor-scripts.js', array(), '1.0.0', true);
});

// Function to enqueue a module script
function enqueue_module_script($handle, $src, $deps = array(), $version = '1.0.0', $in_footer = true)
{
  wp_enqueue_script($handle, $src, $deps, $version, $in_footer);

  add_filter('script_loader_tag', function ($tag, $script_handle, $script_src) use ($handle) {
    if ($script_handle === $handle) {
      return str_replace('<script ', '<script type="module" ', $tag);
    }
    return $tag;
  }, 10, 3);
}

// A function to check if the dist folder exists
function dist_folder_exists()
{
  return file_exists(get_template_directory() . '/dist');
}

// Function to enqueue assets for both frontend and admin
function enqueue_vite_assets()
{
  if (dist_folder_exists()) {
    // Production build - enqueue built files
    wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/dist/theme-lib.js', array(), '1.0.0', true);
    wp_enqueue_style('theme-styles', get_template_directory_uri() . '/dist/theme-lib.css', array(), '1.0.0');
  } else {
    // Development - enqueue from Vite dev server
    enqueue_module_script('theme-scripts-dev', 'http://localhost:5173/wp-content/themes/blank/dist/index.js');
  }
}

// Enqueue for frontend
add_action('wp_enqueue_scripts', 'enqueue_vite_assets');

// Enqueue for WordPress admin
add_action('admin_enqueue_scripts', 'enqueue_vite_assets');

// Optional: Enqueue for block editor specifically (if you want to target the Gutenberg editor)
add_action('enqueue_block_editor_assets', 'enqueue_vite_assets');

// Optional: Enqueue for login page (if needed)
add_action('login_enqueue_scripts', 'enqueue_vite_assets');


function zenb_dequeue_block_styles()
{
  // Only run in production (when not debugging)
  if (defined('WP_DEBUG') && WP_DEBUG) {
    return; // Keep CSS in development
  }

  // Mirror the exact logic from Block_Registrar::getTemplates()
  $template_dir = get_template_directory() . '/zen-blocks';
  $templates = [];

  // Get additional block paths from filter (same as plugin)
  $block_paths = apply_filters('zenb_block_paths', [$template_dir]);

  foreach ($block_paths as $path) {
    if (is_dir($path)) {
      // Find all block directories (exact same logic as plugin)
      $block_dirs = glob($path . '/*', GLOB_ONLYDIR);

      foreach ($block_dirs as $dir) {
        $block_name = basename($dir);
        $block_file = $dir . '/' . $block_name . '.php';

        if (file_exists($block_file)) {
          $templates[] = $block_file;
        }
      }
    }
  }

  // Process each template (mirror the registerBlocks logic)
  foreach ($templates as $template) {
    $template_name = basename(dirname($template));
    if ($template_name === 'templates' || $template_name === 'blocks') {
      $template_name = basename($template, '.php');
    }

    // Get the template directory
    $template_dir = dirname($template);

    // Check for CSS file (same logic as plugin)
    $style_path = $template_dir . '/' . $template_name . '.css';

    if (file_exists($style_path)) {
      $style_handle = 'zen-blocks-' . $template_name;

      // Dequeue and deregister the style
      wp_dequeue_style($style_handle);
      wp_deregister_style($style_handle);
    }
  }
}

// Hook into both frontend and editor
add_action('wp_enqueue_scripts', 'zenb_dequeue_block_styles', 999);
add_action('enqueue_block_editor_assets', 'zenb_dequeue_block_styles', 999);
add_action('admin_enqueue_scripts', 'zenb_dequeue_block_styles', 999);


// enqueue jQuery in front and admin
function enqueue_jquery()
{
  wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'enqueue_jquery');
add_action('admin_enqueue_scripts', 'enqueue_jquery');