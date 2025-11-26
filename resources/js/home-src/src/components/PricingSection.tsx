import { motion } from 'motion/react';
import { Button } from './ui/button';
import { Check, Star } from 'lucide-react';

export function PricingSection() {
  const plan = {
    name: 'Premium',
    price: 'Coming Soon',
    period: '',
    description: 'Most popular choice',
    features: [
      'Unlimited billboards',
      'Real-time analytics & AI insights',
      '24/7 Premium support',
      'Maximum visibility',
      'Full payment integration',
      'White-label options',
      'API access',
      'Dedicated account manager',
    ],
    cta: 'Coming Soon',
    popular: true,
  };

  return (
    <section
      id="pricing"
      className="relative py-24 bg-gradient-to-b from-[#2a2850] to-[#363366]"
    >
      <div className="max-w-7xl mx-auto px-8">
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.8 }}
          className="text-center mb-16"
        >
          <div className="inline-block px-4 py-2 rounded-full bg-[#F58634]/10 border border-[#F58634]/20 mb-6">
            <span className="text-[#F58634] text-sm">Pricing</span>
          </div>

          <h2 className="text-5xl md:text-6xl text-white mb-6">
            Plans that{' '}
            <span className="bg-gradient-to-r from-[#F58634] to-[#ff9d5c] bg-clip-text text-transparent">
              scale with you
            </span>
          </h2>

          <p className="text-xl text-white/70 max-w-3xl mx-auto">
            Get started completely free. Premium features are coming soon.
          </p>
        </motion.div>

        {/* Single centered card */}
        <div className="flex justify-center">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.6 }}
            className="relative bg-white/5 backdrop-blur-xl border rounded-2xl p-8 
            hover:bg-white/10 transition-all border-[#F58634] scale-105 
            shadow-xl shadow-[#F58634]/20 max-w-sm md:max-w-md"
          >
            <div className="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-gradient-to-r from-[#F58634] to-[#ff9d5c] flex items-center gap-2">
              <Star className="w-4 h-4 text-white" fill="white" />
              <span className="text-white text-sm">Most Popular</span>
            </div>

            <div className="mb-6 text-center">
              <h3 className="text-2xl text-white mb-2">{plan.name}</h3>
              <p className="text-white/60 text-sm">{plan.description}</p>
            </div>

            <div className="mb-6 text-center">
              <span className="text-3xl text-white">{plan.price}</span>
            </div>

            <Button
              className="w-full mb-6 bg-gradient-to-r from-[#F58634] to-[#ff9d5c] 
              hover:from-[#e57525] hover:to-[#f58d4d]"
              asChild
            >
              <a href="#">{plan.cta}</a>
            </Button>

            <ul className="space-y-3">
              {plan.features.map((feature) => (
                <li
                  key={feature}
                  className="flex items-start gap-3 text-white/70 text-sm"
                >
                  <Check className="w-5 h-5 text-[#F58634] flex-shrink-0 mt-0.5" />
                  <span>{feature}</span>
                </li>
              ))}
            </ul>
          </motion.div>
        </div>

        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ delay: 0.6, duration: 0.8 }}
          className="mt-12 text-center"
        >
          <p className="text-white/60">
            Premium features will be available soon. Enjoy free access meanwhile.
          </p>
        </motion.div>
      </div>
    </section>
  );
}
