import { ArrowDown } from 'lucide-react';

function Hero() {
  return (
    <section className="relative overflow-hidden h-[300px] md:h-screen">
      <div className="absolute top-18 bottom-0 left-0 right-0 z-0">
        <img
          className="object-cover opacity-90 w-full md:w-full"
          src="/media/hero.jpg"
          alt="iPhone 17 Pro"
          loading="lazy"
        />
      </div>
      <div className="absolute inset-0 bg-gradient-to-b from-black/30 via-transparent to-black/80"></div>
      <div>
        <ArrowDown
          size={32}
          className="size-6 bottom-8 absolute left-1/2 z-10 animate-bounce text-white"
        />
      </div>
    </section>
  );
}

export default Hero;