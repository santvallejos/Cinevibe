// Setup Axios — reemplaza el bootstrap.js de Laravel (sobreescrito por archivos de Bootstrap)
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Bootstrap JS — versión ESM, compatible con Vite
import './bootstrap.esm.min';
