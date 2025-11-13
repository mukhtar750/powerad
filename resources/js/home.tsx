import { createRoot } from 'react-dom/client';
import App from './home-src/src/App.tsx';
import './home-src/src/index.css';

const rootEl = document.getElementById('root');
if (rootEl) {
  createRoot(rootEl).render(<App />);
} else {
  console.error('Root element #root not found in home-react.blade.php');
}