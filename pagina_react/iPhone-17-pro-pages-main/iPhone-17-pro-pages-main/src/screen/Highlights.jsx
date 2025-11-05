import Card from "../components/Card";
import titaniumDesign from "../../public/assets/titanium-design.jpg";
import iosFeatures from "../../public/assets/ios-features.jpg";
import A19pro from "../../public/assets/A19pro.jpg";
import shellTitanio from "../../public/assets/shell-titânio.webp";
function Highlights() {
  return (
    <section id="Design" className="py-6 px-6 flex flex-col justify-center">
      <div className="max-w-6xl gap-10 flex flex-col mx-auto ">
        <div className="text-center mb-10">
          <h2 className="text-3xl md:text-4xl font-black text-gradient">
            Design Revolucionário
          </h2>
          <p className="text-xl md:text-2xl my-5  text-gray-400 ">
            Cada detalhe foi pensado para criar a melhor experiência.
          </p>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-2 gap-5  ">
          <Card variant={"default"} className="text-center">
            <img
              src={titaniumDesign}
              alt="titanium-design"
              className="rounded-2xl mb-4"
              loading="lazy"
            />
            <h3 className="text-xl md:text-2xl font-bold text-gradient text-center">
              Titânio Premium
            </h3>
            <p className="text-center  ">
              Estrutura em titânio do grau aeroespacial. O smatphone mais forte
              e leve
            </p>
          </Card>
          <Card variant={"default"}>
            <img
              src={iosFeatures}
              alt="ios-features"
              className="rounded-2xl mb-4"
              loading="lazy"
            />
            <h3 className="text-xl md:text-2xl text-center font-bold text-gradient">
              iOS 26
            </h3>
            <p className="text-center  ">
              Sistema operacional mais avançado do mundo com IA integrada
            </p>
          </Card>
        </div>
        <Card variant={"default"}>
          <h3 className="text-xl md:text-2xl font-bold text-gradient ">
            A19 Pro
          </h3>
          <p className="mb-4 ">O chip mais poderoso em um smartphone</p>
          <img
            src={A19pro}
            alt="chip-a18-pro"
            className="rounded-2xl"
            loading="lazy"
          />
          <ul className="space-y-3 text-gray-300">
            <li>- CPU 20% mais rápida</li>
            <li>- GPU 25% mais eficiente</li>
            <li>- Neural Engine com 16 núcleos </li>
            <li>- Ray Tracing acelerado por hardware</li>
          </ul>
        </Card>
        <div className="flex justify-center gap-3 items-center flex-col w-full mt-10">
          <h3 className="text-3xl md:text-4xl font-bold text-gradient text-center">
            Estrutura unibody. Eles têm a força.
          </h3>
          <p className="text-center w-[70%]  text-gray-400 ">
            Apresentamos o iPhone 17 Pro e o iPhone 17 Pro Max. Projetados de
            dentro para fora, eles são os modelos de iPhone mais potentes já
            produzidos. O coração do novo design é a estrutura unibody em
            alumínio forjado a quente que maximiza o desempenho, a capacidade da
            bateria e a durabilidade.
          </p>
          <img
            src={shellTitanio}
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
