import CamSpecs from "./screen/CamSpecs";
import ColorsPhone from "./screen/ColorsPhone";
import Footer from "./components/Footer";
import Hero from "./screen/Hero";
import Highlights from "./screen/Highlights";
import Intro from "./screen/Intro";
import NavBar from "./components/NavBar";

function App() {
  return (
    <div>
      <NavBar />
      <Hero />
      <Intro />
      <Highlights />
      <CamSpecs />
      <ColorsPhone />
      <Footer />
    </div>
  );
}

export default App;
