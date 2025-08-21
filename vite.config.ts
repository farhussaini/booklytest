import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import laravel from 'laravel-vite-plugin'
import { fileURLToPath, URL } from 'node:url'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    laravel({
      input: ['src/assets/main.css', 'src/main.ts'],
      refresh: true,
    }),
    vue(),
  ],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url)),
    },
  },
  server: {
    host: 'localhost',
    port: 5173,
    hmr: {
      host: 'localhost',
      port: 5173,
    },
    cors: true,
  },
})
