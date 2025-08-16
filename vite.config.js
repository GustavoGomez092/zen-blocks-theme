import { dirname, resolve } from "node:path";
import { fileURLToPath } from "node:url";
import tailwindcss from "@tailwindcss/vite";
import { defineConfig } from "vite";

const __dirname = dirname(fileURLToPath(import.meta.url));

export default defineConfig({
    // Make sure to update this to your theme's directory name
    base: '/wp-content/themes/blank/dist/',
    build: {
    lib: {
        entry: resolve(__dirname, 'index.js'),
        name: 'theme-libs',
        fileName: 'theme-lib',
      },
    },
    resolve: {
      alias: {
        '@': resolve(__dirname, '.'),
      }
    },
    server: {
      port: 5173,
      strictPort: true, // Fail if port is already in use
      cors: {
        origin: true,
        credentials: true,
        methods: ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
        allowedHeaders: ['Content-Type', 'Authorization', 'X-Requested-With']
      },
    },
    plugins: [tailwindcss({
          content: [
        "./**/*.php",
        "./zen-blocks/**/*.{php,js,html,css}",
        "./blank_modules/**/*.{php,js,html,css}",
        "./parts/**/*.{php,js,html,css}",
        "./templates/**/*.{php,js,html,css}",
        "./**/*.{js,css}"
      ]
    })],
});
