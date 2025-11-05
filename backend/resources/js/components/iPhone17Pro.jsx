import React from 'react';
import Hero from '../screen/Hero';
import Intro from '../screen/Intro';
import Highlights from '../screen/Highlights';
// import CamSpecs from '../screen/CamSpecs';
// import ColorsPhone from '../screen/ColorsPhone';

function iPhone17Pro({ isAuthenticated = false }) {
  console.log('iPhone17Pro componente carregado! Autenticado:', isAuthenticated);
  
  return (
    <div className="bg-black min-h-screen text-white">
      <div className="text-center py-4 text-green-400">
        DEBUG: React iPhone17Pro carregado! ✅
      </div>
      <Hero />
      <Intro isAuthenticated={isAuthenticated} />
      <Highlights />
      {/* Outros componentes serão adicionados gradualmente */}
    </div>
  );
}

export default iPhone17Pro;