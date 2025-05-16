// tailwind.config.js
module.exports = {
  content: ["./Carrinho_Pagamento.html"],
  theme: {
    extend: {},
  },
  plugins: [],
  experimental: {
    // precisa de Tailwind 3.3+ e navegador que suporte :has()
    hasSupport: true,
  },
};
