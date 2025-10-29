import { useState } from "react";
import Card from "../components/Card";
import Button from "../components/Button";
import iphoneBlue from "../../public/assets/iphone-blue.jpg";
import iphoneOrage from "../../public/assets/iphone-orange.jpg";
import iphoneSilver from "../../public/assets/iphone-silver.jpg";
import smartphone from "../../public/assets/smartphone.png";

function ColorsPhone() {
  const colors = [
    {
      id: "blue",
      name: "Titânio Azul",
      image: iphoneBlue,
      color: "bg-blue-500",
      text: "text-blue-500",
    },
    {
      id: "silver",
      name: "Titânio Natural",
      image: iphoneSilver,
      color: "bg-gray-100",
      text: "text-gray-100",
    },
    {
      id: "orange",
      name: "Titânio Laranja",
      image: iphoneOrage,
      color: "bg-orange-500",
      text: "text-orange-500",
    },
  ];

  const models = [
    {
      name: "Pro Max",
      screen: "6.9 polegadas",
      storage: "256GB, 512GB ou 1TB",
      battery: "33h de video*",
      weight: "221g",
    },
    {
      name: "Pro",
      screen: "6.3 polegadas",
      storage: "128GB, 256GB ou 512GB",
      battery: "29h de video*",
      weight: "199g",
    },
  ];

  const [selectColor, setSelectColor] = useState("blue");

  return (
    <section id="Cores" className="px-8">
      <div className="max-w-full mx-auto flex justify-center items-center flex-col mb-12">
        <h3 className="text-2xl md:text-4xl mb-4 text-gradient text-center ">
          Escolha sua cor
        </h3>
        <p className="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto text-center ">
          Três acabamentoas em titânio lindos
        </p>

        <div className="relative w-full min-w-3xl">
          <div className="relative flex items-center justify-center flex-col min-h-[400px]">
            <img
              src={colors.find((color) => color.id === selectColor).image}
              alt={colors.name}
              className="max-w-[70%] md:max-w-full max-h-[400px] mx-auto"
              loading="lazy"
              data-aos="fade-right"
              data-aos-duration="2000"
            />
            <div className="absolute bottom-8 left-0 right-0 text-center">
              <div className="px-8 py-4 rounded-full backdrop-blur-md bg-black/40 inline-block">
                <h3
                  className={`text-2xl font-semibold ${
                    colors.find((color) => color.id === selectColor).text
                  }`}
                >
                  {colors.find((color) => color.id === selectColor).name}
                </h3>
              </div>
            </div>
          </div>
        </div>
        <div className="flex gap-3 mt-6">
          {colors.map((cor) => (
            <div key={cor.id} className="flex flex-col items-center">
              <button
                key={cor.id}
                className={`${cor.color} ${
                  selectColor === cor.id
                    ? " border-gray-100 scale-[1.05] hover:scale-[1.09]  active:scale-[1.05] "
                    : " border-gray-600 "
                } rounded-full border-2 transition-all duration-300`}
                onClick={() => setSelectColor(cor.id)}
              >
                <div className="w-[50px] h-[50px] "></div>
              </button>
              <p
                className={`${
                  selectColor === cor.id ? "text-white" : "text-transparent"
                } text-4xl font-extrabold`}
              >
                .
              </p>
            </div>
          ))}
        </div>
        <div className="grid grid-cols-1 md:grid-cols-2 gap-4 mt-7 " id="Buy">
          {models.map((model, index) => (
            <Card variant={"border"} key={index}>
              <img
                className="w-6 h-6"
                src={smartphone}
                alt="smartphone"
                loading="lazy"
              />
              <h4 className="font-bold ">{model.name}</h4>
              <p className="text-gray-500 text-[14px]">
                Tela {model.screen} com ProMotion 120Hz e Always-On display
              </p>
              <ul className="text-gray-300 text-[16px]">
                <li>- {model.storage}</li>
                <li>- Bateria com até {model.battery}</li>
                <li>- Peso: {model.weight}</li>
              </ul>
            </Card>
          ))}
        </div>
        <div className="text-center flex flex-col gap-2 mt-7">
          <Button
            name={"Compre agora a partir de R$ 9.299"}
            variant="blue-shadow"
          />
          <p className="text-gray-400 text-[15px]">
            Ou em até 12X de R$ 774.92 sem juros
          </p>
        </div>
      </div>
    </section>
  );
}

export default ColorsPhone;
