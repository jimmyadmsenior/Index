import clsx from "clsx";

function Card({ variant, ...props }) {
  const cardClass = clsx(
    "flex flex-col  justify-center h-full rounded-2xl from-gray-700/70 to-gray-950/80 blur-4xl  ",
    {
      "bg-linear-to-b  hover:bg-gray-800 transition-all duration-300 p-3 md:p-7 text-center gap-2 hover:scale-[1.02] active:scale-[1.02] cursor-pointer ":
        variant === "default",
      "bg-linear-[125deg] from-gray-700/70 to-transparent border-gray-700 border-1 p-4 gap-2":
        variant === "border",
    }
  );

  return (
    <div
      {...props}
      className={cardClass}
      data-aos="fade-up"
      data-aos-duration="1000"
    ></div>
  );
}

export default Card;
