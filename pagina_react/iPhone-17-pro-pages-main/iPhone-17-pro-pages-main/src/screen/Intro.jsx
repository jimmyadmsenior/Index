import Button from "../components/Button";
import Card from "../components/Card";

function Intro() {
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

  return (
    <section className="py-10 px-1 md:py-20 md:px-6" id="Performace">
      <div className="max-w-5xl mx-auto text-center">
        <h1 className="text-5xl md:text-8xl font-bold mb-6">iPhone 17 Pro</h1>
        <p className="text-2xl md:text-4xl mb-4 text-gradient">
          Titânio. Tão forte. Tão leve. Tão Pro.
        </p>
        <p className="text-lg md:text-xl text-gray-300 mb-10 max-w-3xl mx-auto ">
          O design mais refinado que já criamos. Titânio de grau aeroespacial.
          Chip A18 pro
        </p>
      </div>
      <div className="flex flex-col md:flex-row justify-center items-center gap-4 mb-16">
        <Button variant={"blue"} name={"Compre agora"} />
        <Button variant={"white"} name={"Saiba mais"} />
      </div>
      <div className="grid grid-cols-2 md:grid-cols-4 gap-5 items-center justify-center w-[80%] mx-auto">
        {specs.map((spec, index) => (
          <Card key={index} variant={"default"}>
            <strong className={`${spec.color} text-2xl md:text-4xl`}>
              {spec.value}
            </strong>
            <p className="text-center">{spec.label}</p>
          </Card>
        ))}
      </div>
    </section>
  );
}

export default Intro;
