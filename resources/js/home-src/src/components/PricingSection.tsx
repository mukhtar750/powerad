import { motion } from 'motion/react';
import { Button } from './ui/button';
import { Check, Star } from 'lucide-react';

export function PricingSection() {
  const plans = [
    {
      name: 'Free',
      price: '₦0',
      period: '',
      description: 'Perfect for getting started',
      features: [
        'List up to 5 billboards',
        'Basic analytics',
        'Community support',
        'Standard visibility',
      ],
      cta: 'Get Started',
      popular: false,
    },
    {
      name: 'Basic',
      price: 'Available on Request',
      period: '',
      description: 'For growing businesses',
      features: [
        'List up to 25 billboards',
        'Advanced analytics',
        'Priority support',
        'Enhanced visibility',
        'Payment integration',
        'Custom branding',
      ],
      cta: 'Request Access',
      popular: false,
    },
    {
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
    },
    {
      name: 'Enterprise',
      price: 'Custom Solutions',
      period: '',
      description: 'For large organizations',
      features: [
        'Everything in Premium',
        'Custom integrations',
        'SLA guarantees',
        'Multi-location support',
        'Advanced security',
        'Custom workflows',
        'Training & onboarding',
        'Regulatory compliance suite',
      ],
      cta: 'Contact Sales',
      popular: false,
    },
  ];

  return (
    <section id="pricing" className="relative py-24 bg-gradient-to-b from-[#2a2850] to-[#363366]">
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
            Choose the perfect plan for your business. Start free and unlock more features as you grow.
          </p>
        </motion.div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          {plans.map((plan, index) => (
            <motion.div
              key={plan.name}
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ delay: index * 0.1, duration: 0.6 }}
              className={`relative bg-white/5 backdrop-blur-xl border rounded-2xl p-8 hover:bg-white/10 transition-all ${
                plan.popular
                  ? 'border-[#F58634] scale-105 shadow-xl shadow-[#F58634]/20'
                  : 'border-white/10'
              }`}
            >
              {plan.popular && (
                <div className="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-gradient-to-r from-[#F58634] to-[#ff9d5c] flex items-center gap-2">
                  <Star className="w-4 h-4 text-white" fill="white" />
                  <span className="text-white text-sm">Most Popular</span>
                </div>
              )}

              <div className="mb-6">
                <h3 className="text-2xl text-white mb-2">{plan.name}</h3>
                <p className="text-white/60 text-sm">{plan.description}</p>
              </div>

              <div className="mb-6">
                <div className="flex items-baseline gap-2">
                  <span className="text-3xl text-white">{plan.price}</span>
                </div>
              </div>

              <Button
                className={`w-full mb-6 ${
                  plan.popular
                    ? 'bg-gradient-to-r from-[#F58634] to-[#ff9d5c] hover:from-[#e57525] hover:to-[#f58d4d]'
                    : 'bg-white/10 hover:bg-white/20 border border-white/20'
                }`}
                asChild
              >
                <a href={plan.name === 'Free' ? '/register' : '#'}>{plan.cta}</a>
              </Button>

              <ul className="space-y-3">
                {plan.features.map((feature) => (
                  <li key={feature} className="flex items-start gap-3 text-white/70 text-sm">
                    <Check className="w-5 h-5 text-[#F58634] flex-shrink-0 mt-0.5" />
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
            All plans can start free — premium options coming soon.
          </p>
        </motion.div>
      </div>
    </section>
  );
}
