import React from 'react';
import { createRoot } from 'react-dom/client';
import iPhone17Pro from './components/iPhone17Pro';

// Inicializar componente React se existir elemento na página
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM carregou, procurando elemento iphone17-react');
    const iphone17Container = document.getElementById('iphone17-react');
    console.log('Container encontrado:', iphone17Container);
    
    if (iphone17Container) {
        const isAuthenticated = iphone17Container.dataset.authenticated === 'true';
        console.log('Autenticado:', isAuthenticated);
        console.log('Criando root React...');
        const root = createRoot(iphone17Container);
        console.log('Renderizando componente...');
        root.render(<iPhone17Pro isAuthenticated={isAuthenticated} />);
        console.log('Componente renderizado!');
    } else {
        console.error('Elemento #iphone17-react não encontrado!');
    }
});