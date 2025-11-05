import Button from "../components/Button";
import Card from "../components/Card";

function Intro({ isAuthenticated = false }) {
  const specs = [
    { value: "6.3", label: "Display Super Retina XDR", color: "text-blue-600" },
    { value: "A18 Pro", label: "Chip mais rápido", color: "text-orange-600" },
    { value: "48MP", label: "Sistema de câmera", color: "text-blue-600" },
    {
      value: "29h*",
      label: "De bateria",
      color: "text-orange-600",
    },
  ];

  const handleBuyNow = () => {
    if (isAuthenticated) {
      // Fazer requisição para adicionar ao carrinho
      fetch('/carrinho/adicionar', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
          produto_id: 4,
          quantidade: 1
        })
      }).then(response => {
        if (response.ok) {
          window.location.href = '/carrinho';
        }
      });
    } else {
      window.location.href = '/Login';
    }
  };

  return (
    <section className="py-10 px-1 md:py-20 md:px-6" id="Performance">
      <div className="max-w-5xl mx-auto text-center">
        <h1 className="text-5xl md:text-8xl font-bold mb-6 text-white">iPhone 17 Pro</h1>
        <p className="text-2xl md:text-4xl mb-4 bg-gradient-to-r from-blue-500 to-red-500 bg-clip-text text-transparent">
          Titânio. Tão forte. Tão leve. Tão Pro.
        </p>
        <p className="text-lg md:text-xl text-gray-300 mb-10 max-w-3xl mx-auto">
          O design mais refinado que já criamos. Titânio de grau aeroespacial.
          Chip A18 Pro
        </p>
      </div>
      <div className="flex flex-col md:flex-row justify-center items-center gap-4 mb-16">
        <Button variant="blue" name="Compre agora" onClick={handleBuyNow} />
        <Button variant="white" name="Saiba mais" />
      </div>
      <div className="grid grid-cols-2 md:grid-cols-4 gap-5 items-center justify-center w-[80%] mx-auto">
        {specs.map((spec, index) => (
          <Card key={index} variant="default">
            <strong className={`${spec.color} text-2xl md:text-4xl`}>
              {spec.value}
            </strong>
            <p className="text-center text-white">{spec.label}</p>
          </Card>
        ))}
      </div>
    </section>
  );
}

export default Intro;