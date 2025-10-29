import clsx from "clsx";

function Card({ variant, children, ...props }) {
  const cardClass = clsx(
    "flex flex-col justify-center h-full rounded-2xl",
    {
      "bg-gradient-to-b from-gray-700/70 to-gray-950/80 hover:bg-gray-800 transition-all duration-300 p-3 md:p-7 text-center gap-2 hover:scale-[1.02] active:scale-[1.02] cursor-pointer":
        variant === "default",
      "bg-gradient-to-br from-gray-700/70 to-transparent border-gray-700 border p-4 gap-2":
        variant === "border",
    }
  );

  return (
    <div
      {...props}
      className={cardClass}
    >
      {children}
    </div>
  );
}

export default Card;