import Card from "../components/Card";

function CamSpecs() {
  const specs = [
    {
      value: "48MP",
      label: "Principal",
      info: "Sensor quad-pixel com foco automático",
      color: "text-blue-600",
    },
    {
      value: "12MP",
      label: "Ultra Wide",
      info: "Campo de visão de 120 com modo noturno",
      color: "text-orange-600",
    },
    {
      value: "12MP",
      label: "Telefoto 5X",
      info: "Zoom óptico de 5x com estabilização",
      color: "text-blue-600",
    },
  ];

  return (
    <section className="py-2 px-6" id="Camera">
      <div className="max-w-5xl mx-auto text-center">
        <h3 className="text-2xl md:text-4xl mb-10 text-gradient ">
          Sistema de Câmera Pro avançado
        </h3>
        <p className="text-gray-400">
          Toda tecnologia em câmeras que só o iPhone tem
        </p>
      </div>

      <div className="grid grid-cols-1 md:grid-cols-3 gap-5 py-10 items-center text-center justify-center w-[80%] mx-auto">
        {specs.map((spec, index) => (
          <Card key={index} variant={"default"}>
            <strong className={`${spec.color} text-3xl md:text-4xl `}>
              {spec.value}
            </strong>
            <h4 className=" font-bold text-xl md:text-2xl">{spec.label}</h4>
            <p className=" text-gray-400">{spec.info}</p>
          </Card>
        ))}
      </div>
    </section>
  );
}

export default CamSpecs;
