self.addEventListener('activate', () => {
  console.log('ServiceWorker activated')
})

self.addEventListener('fetch', () => {})

self.addEventListener('install', () => {
  console.log('ServiceWorker installed')
})
