import { motion } from 'motion/react';
import { 
  Search, 
  Calendar, 
  CreditCard, 
  BarChart3, 
  Shield, 
  Zap, 
  Globe, 
  MessageSquare 
} from 'lucide-react';

export function FeaturesSection() {
  const features = [
    {
      icon: Search,
      title: 'Smart Discovery',
      description: 'AI-powered billboard matching based on your campaign goals, budget, and target audience',
    },
    {
      icon: Calendar,
      title: 'Real-Time Booking',
      description: 'See live availability and book billboard space instantly with automated confirmations',
    },
    {
      icon: CreditCard,
      title: 'Integrated Payments',
      description: 'Secure payment processing with escrow protection and automated reconciliation',
    },
    {
      icon: BarChart3,
      title: 'Advanced Analytics',
      description: 'Track campaign performance, impressions, ROI, and audience insights in real-time',
    },
    {
      icon: Shield,
      title: 'Compliance Tools',
      description: 'Built-in APCON and LASAA compliance checks for hassle-free regulatory approval',
    },
    {
      icon: Zap,
      title: 'Automated Workflows',
      description: 'Streamline operations from booking to installation with smart automation',
    },
    {
      icon: Globe,
      title: 'Pan-African Vision',
      description: 'Built for scale - expanding across Nigeria, Ghana, Kenya, and beyond',
    },
    {
      icon: MessageSquare,
      title: 'Unified Communication',
      description: 'Integrated messaging and collaboration tools for all stakeholders',
    },
  ];

  return (
    <section id="features" className="relative py-24 bg-gradient-to-b from-[#363366] to-[#2a2850]">
      <div className="max-w-7xl mx-auto px-8">
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.8 }}
          className="text-center mb-16"
        >
          <div className="inline-block px-4 py-2 rounded-full bg-[#F58634]/10 border border-[#F58634]/20 mb-6">
            <span className="text-[#F58634] text-sm">Features</span>
          </div>
          
          <h2 className="text-5xl md:text-6xl text-white mb-6">
            Everything you need to{' '}
            <span className="bg-gradient-to-r from-[#F58634] to-[#ff9d5c] bg-clip-text text-transparent">
              succeed
            </span>
          </h2>
          
          <p className="text-xl text-white/70 max-w-3xl mx-auto">
            Powerful features designed specifically for the African outdoor advertising market
          </p>
        </motion.div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          {features.map((feature, index) => (
            <motion.div
              key={feature.title}
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ delay: index * 0.05, duration: 0.6 }}
              className="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 hover:bg-white/10 hover:border-[#F58634]/30 transition-all group cursor-pointer"
            >
              <div className="w-12 h-12 rounded-xl bg-gradient-to-br from-[#F58634]/20 to-[#F58634]/10 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                <feature.icon className="w-6 h-6 text-[#F58634]" />
              </div>
              
              <h3 className="text-lg text-white mb-2">{feature.title}</h3>
              <p className="text-white/60 text-sm leading-relaxed">{feature.description}</p>
            </motion.div>
          ))}
        </div>

        {/* Special Callout */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ delay: 0.6, duration: 0.8 }}
          className="mt-16 bg-gradient-to-r from-[#F58634]/20 to-[#ff9d5c]/20 backdrop-blur-xl border border-[#F58634]/30 rounded-3xl p-12 text-center"
        >
          <Globe className="w-16 h-16 text-[#F58634] mx-auto mb-6" />
          <h3 className="text-3xl text-white mb-4">Built for the African Market</h3>
          <p className="text-white/70 text-lg max-w-2xl mx-auto">
            PowerAD understands the unique challenges and opportunities of African outdoor advertising. Our platform is designed with local regulations, payment methods, and market dynamics in mind.
          </p>
        </motion.div>
      </div>
    </section>
  );
}
