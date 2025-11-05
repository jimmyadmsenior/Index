import Card from "../components/Card";

function Highlights() {
  return (
    <section id="Design" className="py-6 px-6 flex flex-col justify-center">
      <div className="max-w-6xl gap-10 flex flex-col mx-auto">
        <div className="text-center mb-10">
          <h2 className="text-3xl md:text-4xl font-black bg-gradient-to-r from-blue-500 to-red-500 bg-clip-text text-transparent">
            Design Revolucionário
          </h2>
          <p className="text-xl md:text-2xl my-5 text-gray-400">
            Cada detalhe foi pensado para criar a melhor experiência.
          </p>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-2 gap-5">
          <Card variant="default" className="text-center">
            <img
              src="/media/titanium-design.jpg"
              alt="titanium-design"
              className="rounded-2xl mb-4"
              loading="lazy"
            />
            <h3 className="text-xl md:text-2xl font-bold bg-gradient-to-r from-blue-500 to-red-500 bg-clip-text text-transparent text-center">
              Titânio Premium
            </h3>
            <p className="text-center text-gray-300">
              Estrutura em titânio do grau aeroespacial. O smartphone mais forte
              e leve
            </p>
          </Card>
          <Card variant="default">
            <img
              src="/media/ios-features.jpg"
              alt="ios-features"
              className="rounded-2xl mb-4"
              loading="lazy"
            />
            <h3 className="text-xl md:text-2xl text-center font-bold bg-gradient-to-r from-blue-500 to-red-500 bg-clip-text text-transparent">
              iOS 19
            </h3>
            <p className="text-center text-gray-300">
              Sistema operacional mais avançado do mundo com IA integrada
            </p>
          </Card>
        </div>
        <Card variant="default">
          <h3 className="text-xl md:text-2xl font-bold bg-gradient-to-r from-blue-500 to-red-500 bg-clip-text text-transparent">
            A19 Pro
          </h3>
          <p className="mb-4 text-gray-300">O chip mais poderoso em um smartphone</p>
          <img
            src="/media/A19pro.jpg"
            alt="chip-a18-pro"
            className="rounded-2xl"
            loading="lazy"
          />
          <ul className="space-y-3 text-gray-300">
            <li>- CPU 20% mais rápida</li>
            <li>- GPU 25% mais eficiente</li>
            <li>- Neural Engine com 16 núcleos</li>
            <li>- Ray Tracing acelerado por hardware</li>
          </ul>
        </Card>
        <div className="flex justify-center gap-3 items-center flex-col w-full mt-10">
          <h3 className="text-3xl md:text-4xl font-bold bg-gradient-to-r from-blue-500 to-red-500 bg-clip-text text-transparent text-center">
            Estrutura unibody. Eles têm a força.
          </h3>
          <p className="text-center w-[70%] text-gray-400">
            Apresentamos o iPhone 17 Pro e o iPhone 17 Pro Max. Projetados de
            dentro para fora, eles são os modelos de iPhone mais potentes já
            produzidos. O coração do novo design é a estrutura unibody em
            alumínio forjado a quente que maximiza o desempenho, a capacidade da
            bateria e a durabilidade.
          </p>
          <img
            src="/media/shell-titânio.webp"
            alt="shell-titânio"
            className="rounded-2xl w-[80%]"
            loading="lazy"
          />
        </div>
      </div>
    </section>
  );
}

export default Highlights;