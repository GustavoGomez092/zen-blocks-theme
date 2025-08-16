# Blank WordPress Block Theme

A modern WordPress block theme built with Tailwind CSS v4, GSAP animations, and Lenis smooth scrolling. This theme features a custom block development system with "zen-blocks" and integrates seamlessly with WordPress Blocks architecture.

## Features

### Core Technologies
- **WordPress 6.8+** Block Theme
- **Tailwind CSS v4** with Vite integration
- **GSAP** for smooth animations with ScrollTrigger
- **Lenis** for buttery smooth scrolling
- **Vite** for modern asset building and development
- **Custom Block System** (zen-blocks) for reusable components

### Theme Capabilities
- ✅ Full Site Editing (FSE) support
- ✅ Custom block development framework
- ✅ Responsive design with modern CSS
- ✅ Smooth scrolling and animations
- ✅ Performance optimized asset loading
- ✅ Development/Production build pipeline

## Prerequisites

- WordPress 6.8 or higher
- PHP 8 or higher
- Node.js 20+ and npm
- Modern web browser with ES6+ support

## Installation

### 1. Download and Install Theme

```bash
# Clone or download the repository
git clone <repository-url> blank-theme
cd blank-theme

# Install dependencies
npm install
```

### 2. Upload to WordPress

1. Upload the entire theme folder to `/wp-content/themes/`
2. Activate the theme in WordPress Admin → Appearance → Themes

### 3. Development Setup

```bash
# Start development server (with hot reload)
npm run dev

# Build for production
npm run build
```

## Development Workflow

### Asset Building

The theme uses Vite for modern asset building:

- **Development**: `npm run dev` - Starts Vite dev server on `localhost:5173`
- **Production**: `npm run build` - Builds optimized assets to `/dist/`

### File Structure

```
blank-theme/
├── dist/                   # Built assets (production)
├── parts/                  # Template parts
│   ├── header.html
│   └── footer.html
├── templates/              # Page templates
│   └── index.html
├── zen-blocks/             # Custom blocks
│   └── home-hero/
│       ├── home-hero.php   # Block template
│       ├── home-hero.css   # Block styles
│       ├── home-hero.js    # Block JavaScript
│       └── home-hero.json  # Block configuration
├── functions.php           # Theme functions
├── index.js               # Main JavaScript entry
├── index.css              # Main CSS entry
├── theme.json             # WordPress theme configuration
├── vite.config.js         # Vite configuration
└── package.json           # Dependencies
```

## Custom Blocks System (zen-blocks)

This theme includes a custom block development framework called "zen-blocks":

### Creating a New Block

1. Create a new folder in `/zen-blocks/` (e.g., `my-block`)
2. Add required files:
   - `my-block.php` - Block template
   - `my-block.css` - Block styles
   - `my-block.js` - Block JavaScript (optional)
   - `my-block.json` - Block configuration

### Example Block Structure

```php
<?php // my-block/my-block.php ?>
<div class="my-block">
  <h2 zen-edit="title" zen-type="text">Default Title</h2>
  <div zen-edit="content" zen-type="wysiwyg">
    <p>Default content here</p>
  </div>
</div>
```

```css
/* my-block/my-block.css */
.my-block {
  @apply p-6 bg-white rounded-lg shadow-md;
  
  h2 {
    @apply text-2xl font-bold mb-4;
  }
}
```

### Block Configuration (JSON)

```json
{
  "name": "zen-blocks/my-block",
  "title": "My Custom Block",
  "category": "design",
  "icon": "admin-generic",
  "description": "A custom block example",
  "supports": {
    "align": ["wide", "full"],
    "customClassName": true
  },
  "zenb": {
    "controls": {
      "show_title": {
        "type": "toggle",
        "label": "Show Title",
        "default": true
      }
    }
  }
}
```

## Styling with Tailwind CSS

### Custom Configuration

The theme includes a custom Tailwind configuration in `index.css`:

```css
@theme {
  --color-primary: #2c4f50;
  --color-secondary: #ee804d;
  --spacing-xs: 5px;
  --spacing-sm: 10px;
  /* ... more custom properties */
}
```

### Utility Classes

```css
@utility container {
  padding-left: 10px;
  padding-right: 10px;
  margin: 0 auto;
  /* Responsive padding */
}

@utility inner-container {
  width: 100%;
  max-width: 1310px;
  margin-left: auto;
  margin-right: auto;
}
```

## Animations & Interactions

### GSAP Integration

The theme includes GSAP with ScrollTrigger for smooth animations:

```javascript
// Example animation in zen-blocks
window.gsap.to(element, {
  opacity: 1,
  y: 0,
  duration: 0.48,
  ease: "power2.out",
  scrollTrigger: {
    trigger: root,
    start: "top 80%",
    once: true
  }
});
```

### Lenis Smooth Scrolling

Automatic smooth scrolling is enabled site-wide with accessibility considerations:

- Respects `prefers-reduced-motion`
- Prevents conflicts with admin areas
- Works with block editor

## WordPress Integration

### Block Editor Support

- Custom CSS for block editor compatibility
- JavaScript enhancements for admin interface
- Automatic asset loading (dev/production)

### Theme Functions

Key features in `functions.php`:

- **Vite Asset Loading**: Automatic dev/production switching
- **Block Dequeuing**: Performance optimization for production
- **Admin Enhancements**: Better editing experience
- **Module Script Support**: Modern JavaScript loading

### Site Editor

The theme supports Full Site Editing with:

- Custom template parts (header, footer)
- Global styles configuration
- Block patterns support
- Template hierarchy

## Performance Optimization

### Production Optimizations

- CSS/JS minification and bundling
- Automatic block CSS dequeuing in production
- Tree-shaking for unused code
- Modern browser targeting

### Development Features

- Hot module replacement
- Fast refresh for CSS changes
- Source maps for debugging
- CORS configuration for local development

## Browser Support

- Chrome/Edge 88+
- Firefox 78+
- Safari 14+
- Modern mobile browsers

## Contributing

1. Fork the repository
2. Create a feature branch: `git checkout -b feature-name`
3. Make your changes
4. Test thoroughly
5. Submit a pull request

### Development Guidelines

- Follow WordPress coding standards
- Use semantic HTML5
- Write accessible markup
- Test in block editor
- Document custom functions

## Troubleshooting

### Common Issues

**Assets not loading in development:**
- Check if Vite dev server is running (`npm run dev`)
- Verify port 5173 is available
- Check CORS settings

**Blocks not appearing:**
- Ensure block folder name matches class name
- Check JSON configuration syntax
- Verify PHP template structure

**Styles not applying:**
- Import block CSS in `index.js`
- Check Tailwind content paths in `vite.config.js`
- Ensure CSS is properly scoped

## License

This theme is licensed under the GNU General Public License v2 or later.
