import { motion } from 'motion/react';
import { Button } from './ui/button';
import { Check, Star } from 'lucide-react';

export function PricingSection() {
  const plans = [
    {
      name: 'Starter',
      price: 'Free',
      description: 'Join the ecosystem',
      features: [
        'Essential platform access',
        'Basic verification status',
        'Standard communication tools',
        'Secure payment processing',
        'Basic analytics overview',
      ],
      cta: 'Get Started',
      link: '/register',
      highlight: false,
      blurFeatures: true,
    },
    {
      name: 'Coming Soon',
      price: 'Coming Soon',
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
      link: '#',
      highlight: true,
      popular: true,
      blurFeatures: false,
    },
    {
      name: 'Coming Soon',
      price: 'Coming Soon',
      description: 'Streamlined oversight',
      features: [
        'Standard permit management',
        'Basic compliance checks',
        'Standard enforcement tools',
        'Basic revenue tracking',
        'Standard collaboration',
      ],
      cta: 'Coming Soon',
      link: '#',
      highlight: false,
      blurFeatures: true,
    },
  ];

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

        <div className="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
          {plans.map((plan, index) => (
            <motion.div
              key={plan.name}
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ delay: index * 0.2, duration: 0.6 }}
              className={`relative bg-white/5 backdrop-blur-xl border rounded-2xl p-8 
              hover:bg-white/10 transition-all ${
                plan.highlight
                  ? 'border-[#F58634] scale-105 shadow-xl shadow-[#F58634]/20 z-10'
                  : 'border-white/10 hover:border-white/20'
              }`}
            >
              {plan.popular && (
                <div className="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-gradient-to-r from-[#F58634] to-[#ff9d5c] flex items-center gap-2">
                  <Star className="w-4 h-4 text-white" fill="white" />
                  <span className="text-white text-sm">Most Popular</span>
                </div>
              )}

              <div className="mb-6 text-center">
                <h3 className="text-2xl text-white mb-2">{plan.name}</h3>
                <p className="text-white/60 text-sm">{plan.description}</p>
              </div>

              <div className="mb-6 text-center">
                <span className="text-3xl text-white">{plan.price}</span>
              </div>

              <Button
                className={`w-full mb-6 ${
                  plan.highlight
                    ? 'bg-gradient-to-r from-[#F58634] to-[#ff9d5c] hover:from-[#e57525] hover:to-[#f58d4d]'
                    : 'bg-white/10 hover:bg-white/20'
                }`}
                asChild
              >
                <a href={plan.link || '#'}>{plan.cta}</a>
              </Button>

              <ul className={`space-y-3 ${plan.blurFeatures ? 'filter blur-[5px] opacity-50 select-none grayscale' : ''}`}>
                {plan.features.map((feature) => (
                  <li
                    key={feature}
                    className="flex items-start gap-3 text-white/70 text-sm"
                  >
                    <Check
                      className={`w-5 h-5 flex-shrink-0 mt-0.5 ${
                        plan.highlight ? 'text-[#F58634]' : 'text-white/50'
                      }`}
                    />
                    <span>{feature}</span>
                  </li>
                ))}
              </ul>
            </motion.div>
          ))}
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
