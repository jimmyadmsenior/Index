function Footer() {
  const sections = [
    {
      title: "Comprar e Saber Mais",
      links: ["iPhone 17 pro", "iPhone 17", "Comprar modelos", "Acessórios"],
    },
    {
      title: "Especificações",
      links: ["Características técnicas", "Câmera", "Bateria", "Display"],
    },
    {
      title: "Suporte",
      links: ["Suporte ao iPhone", "AppleCare+", "iOS 19", "Contato"],
    },
    {
      title: "Apple",
      links: ["Sobre a Apple", "Newsroom", "Privacidade", "Carreiras"],
    },
  ];

  const links = ["Politica de Privacidade", "Termos de uso", "Vendas"];

  return (
    <footer className="bg-gray-800/80 border-t-2 border-gray-800 backdrop-blur-2xl w-full flex items-center justify-center overflow-y-hidden ">
      <div
        className="flex flex-col w-[90%] md:w-[70%] mt-5 "
        data-aos="fade-up"
        data-aos-duration="3000"
      >
        <section className="grid grid-cols-1 md:grid-cols-4 ">
          {sections.map((sections, index) => (
            <div key={index} className="flex flex-col gap-3 p-2 md:py-7 ">
              <h5 className="font-bold">{sections.title}</h5>
              <ul className="text-gray-400 text-[13px] flex flex-col font-medium gap-1 ">
                {sections.links.map((link, Linkindex) => (
                  <li key={Linkindex}>
                    <a className="hover:text-white active:text-white ">
                      {link}
                    </a>
                  </li>
                ))}
              </ul>
            </div>
          ))}
        </section>
        <div className="flex gap-4 flex-wrap-reverse text-center md:text-left justify-center md:justify-between text-gray-400 text-[13px] font-medium border-t border-gray-800 py-6">
          <div>
            <p>Copyright&copy; 2025 Apple Inc. Todos os diretos reservados</p>
            <p className="text-[12px] mt-4  text-gray-500">
              Site criado para fins educativos - Aula do Youtube
            </p>
          </div>
          <div className="flex gap-4">
            {links.map((link, index) => (
              <a key={index} href="#" className="hover:text-white">
                {link}
              </a>
            ))}
          </div>
        </div>
      </div>
    </footer>
  );
}

export default Footer;
