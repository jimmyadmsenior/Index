import { useState } from "react";
import Button from "./Button";
import { AppleLogoIcon, ListIcon, XIcon } from "@phosphor-icons/react";

const navLinks = [
  { id: 1, label: "Design", url: "#Design" },
  { id: 2, label: "Câmera", url: "#Camera" },
  { id: 3, label: "Performace", url: "#Design" },
  { id: 4, label: "Cores", url: "#Cores" },
];

function NavBar() {
  const [mobileOpen, setMobileOpen] = useState(false);

  function openMenuMobile() {
    if (mobileOpen === false) {
      setMobileOpen(true);
    } else {
      setMobileOpen(false);
    }
  }

  return (
    <>
      <header
        className="fixed top-0  w-full z-40"
        data-aos="zoom-in"
        data-aos-duration="1000"
      >
        <div className="flex items-center justify-between w-[95%] mx-auto  bg-black/80 backdrop-blur-md rounded-2xl mt-1 px-2">
          <AppleLogoIcon className="text-4xl" weight="fill" />
          <nav className="mx-auto px-4 py-2 hidden  md:flex items-center justify-center gap-8">
            {navLinks.map((link) => (
              <a
                href={link.url}
                key={link.id}
                className=" hover:text-gray-300 hover:scale-105 duration-300 font-black"
              >
                {link.label}
              </a>
            ))}
            <a href="#Buy">
              <Button variant={"blue"} name={"Comprar"}></Button>
            </a>
          </nav>
          <button
            className="text-5xl pl-5 block md:hidden "
            onClick={openMenuMobile}
          >
            {mobileOpen ? <XIcon weight="bold" /> : <ListIcon weight="bold" />}
          </button>
        </div>
      </header>
      {mobileOpen && (
        <nav
          className={
            "transition-all duration-300 flex fixed md:hidden left-0  items-center justify-center flex-col z-35 w-full h-full  backdrop-blur-2xl"
          }
          data-aos="fade-down"
          data-aos-duration="1000"
        >
          {navLinks.map((link) => (
            <div
              key={link.id}
              className="p-5 border-b-2 mb-2 w-[80%] text-center"
            >
              <a
                href={link.url}
                onClick={() => setMobileOpen(false)}
                className=" hover:text-gray-300 hover:scale-105 duration-300 font-black text-3xl"
                data-aos="zoom-out-up"
                data-aos-duration="2000"
              >
                {link.label}
              </a>
            </div>
          ))}
          <a href="#Buy">
            <Button
              variant={"responive"}
              name={"Comprar"}
              className="text-2xl"
              onClick={() => setMobileOpen(false)}
            ></Button>
          </a>
        </nav>
      )}
    </>
  );
}

export default NavBar;
