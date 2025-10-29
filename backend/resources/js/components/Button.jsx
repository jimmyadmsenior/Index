import clsx from "clsx";

function Button({ name, variant = "white", onClick, ...props }) {
  const buttonclass = clsx(
    "px-6 py-2 rounded-3xl text-lg hover:scale-105 active:scale-105 duration-300 transition-transform cursor-pointer",
    {
      "bg-blue-600 border-2 border-transparent hover:bg-blue-700 text-white":
        variant === "blue",
      "border-2 border-gray-400 text-gray-400 hover:border-gray-300 hover:text-gray-300": 
        variant === "white",
      "bg-blue-600 border-2 border-transparent hover:bg-blue-700 shadow-lg shadow-gray-300/20 hover:shadow-gray-300/30 duration-300 text-white":
        variant === "blue-shadow",
      "bg-blue-600 border-2 border-transparent hover:bg-blue-700 font-extrabold text-white":
        variant === "responsive",
    }
  );

  return (
    <button 
      {...props} 
      className={buttonclass} 
      onClick={onClick}
    >
      {name}
    </button>
  );
}

export default Button;