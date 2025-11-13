import { FloatingNav } from './components/FloatingNav';
import { HeroNew } from './components/HeroNew';
import { StatsCounter } from './components/StatsCounter';
import { ProblemSection } from './components/ProblemSection';
import { SolutionSection } from './components/SolutionSection';
import { FeaturesSection } from './components/FeaturesSection';
import { InteractiveBillboardMap } from './components/InteractiveBillboardMap';
import { BeforeAfterSection } from './components/BeforeAfterSection';
import { PricingSection } from './components/PricingSection';
import { TestimonialsSection } from './components/TestimonialsSection';
import { VisionSection } from './components/VisionSection';
import { CTASection } from './components/CTASection';
import { Footer } from './components/Footer';

export default function App() {
  return (
    <div className="min-h-screen bg-[#0a0a1a] overflow-x-hidden">
      <FloatingNav />
      <HeroNew />
      <StatsCounter />
      <ProblemSection />
      <SolutionSection />
      <FeaturesSection />
      <InteractiveBillboardMap />
      <BeforeAfterSection />
      <PricingSection />
      <TestimonialsSection />
      <VisionSection />
      <CTASection />
      <Footer />
    </div>
  );
}
