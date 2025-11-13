import { motion } from 'motion/react';
import { Building2, Megaphone, Wrench, Shield, ArrowRight } from 'lucide-react';

export function SolutionSection() {
  const stakeholders = [
    {
      icon: Building2,
      title: 'Billboard Owners (LOAPs)',
      color: 'from-blue-500 to-cyan-500',
      features: [
        'List & manage billboards',
        'Real-time availability',
        'Automated bookings',
        'Payment tracking',
      ],
    },
    {
      icon: Megaphone,
      title: 'Advertisers & Agencies',
      color: 'from-[#F58634] to-[#ff9d5c]',
      features: [
        'Discover billboards',
        'Campaign management',
        'Performance analytics',
        'Instant booking',
      ],
    },
    {
      icon: Wrench,
      title: 'Service Providers',
      color: 'from-purple-500 to-pink-500',
      features: [
        'Get project opportunities',
        'Portfolio showcase',
        'Client management',
        'Secure payments',
      ],
    },
    {
      icon: Shield,
      title: 'Regulators',
      color: 'from-green-500 to-emerald-500',
      features: [
        'Compliance monitoring',
        'Digital approvals',
        'Industry insights',
        'Streamlined oversight',
      ],
    },
  ];

  return (
    <section className="relative py-24 bg-gradient-to-b from-[#2a2850] to-[#363366] overflow-hidden">
      {/* Animated Network Background */}
      <div className="absolute inset-0 opacity-20">
        <svg className="w-full h-full" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <pattern id="network" x="0" y="0" width="100" height="100" patternUnits="userSpaceOnUse">
              <circle cx="50" cy="50" r="2" fill="#F58634" opacity="0.5" />
              <line x1="50" y1="50" x2="100" y2="50" stroke="#F58634" strokeWidth="0.5" opacity="0.3" />
              <line x1="50" y1="50" x2="50" y2="100" stroke="#F58634" strokeWidth="0.5" opacity="0.3" />
            </pattern>
          </defs>
          <rect width="100%" height="100%" fill="url(#network)" />
        </svg>
      </div>

      <div className="relative z-10 max-w-7xl mx-auto px-8">
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.8 }}
          className="text-center mb-16"
        >
          <div className="inline-block px-4 py-2 rounded-full bg-[#F58634]/10 border border-[#F58634]/20 mb-6">
            <span className="text-[#F58634] text-sm">The Solution</span>
          </div>
          
          <h2 className="text-5xl md:text-6xl text-white mb-6">
            One Platform.{' '}
            <span className="bg-gradient-to-r from-[#F58634] to-[#ff9d5c] bg-clip-text text-transparent">
              Four Stakeholders.
            </span>
            <br />
            Infinite Possibilities.
          </h2>
          
          <p className="text-xl text-white/70 max-w-3xl mx-auto">
            PowerAD connects every player in the outdoor advertising ecosystem, creating a seamless, transparent, and efficient marketplace.
          </p>
        </motion.div>

        {/* Stakeholder Cards */}
        <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-16">
          {stakeholders.map((stakeholder, index) => (
            <motion.div
              key={stakeholder.title}
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ delay: index * 0.1, duration: 0.6 }}
              className="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-8 hover:bg-white/10 hover:border-[#F58634]/30 transition-all group"
            >
              <div className={`w-16 h-16 rounded-2xl bg-gradient-to-br ${stakeholder.color} flex items-center justify-center mb-6 group-hover:scale-110 transition-transform`}>
                <stakeholder.icon className="w-8 h-8 text-white" />
              </div>
              
              <h3 className="text-2xl text-white mb-4">{stakeholder.title}</h3>
              
              <ul className="space-y-3">
                {stakeholder.features.map((feature) => (
                  <li key={feature} className="flex items-center gap-3 text-white/70">
                    <ArrowRight className="w-4 h-4 text-[#F58634]" />
                    {feature}
                  </li>
                ))}
              </ul>
            </motion.div>
          ))}
        </div>

        {/* Network Visualization */}
        <motion.div
          initial={{ opacity: 0, scale: 0.95 }}
          whileInView={{ opacity: 1, scale: 1 }}
          viewport={{ once: true }}
          transition={{ duration: 0.8 }}
          className="relative"
        >
          <div className="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-12">
            <div className="flex flex-col md:flex-row items-center justify-center gap-8">
              {/* Center Hub */}
              <div className="relative">
                <motion.div
                  animate={{
                    scale: [1, 1.05, 1],
                  }}
                  transition={{
                    duration: 3,
                    repeat: Infinity,
                    ease: "easeInOut"
                  }}
                  className="w-32 h-32 rounded-full bg-gradient-to-br from-[#F58634] to-[#ff9d5c] flex items-center justify-center shadow-xl shadow-[#F58634]/50"
                >
                  <span className="text-white text-center">
                    <div>PowerAD</div>
                    <div className="text-sm opacity-80">Platform</div>
                  </span>
                </motion.div>

                {/* Connection Lines */}
                <svg className="absolute inset-0 w-full h-full pointer-events-none" style={{ overflow: 'visible' }}>
                  <motion.line
                    x1="50%"
                    y1="50%"
                    x2="-100%"
                    y2="50%"
                    stroke="#F58634"
                    strokeWidth="2"
                    strokeDasharray="5,5"
                    initial={{ pathLength: 0 }}
                    whileInView={{ pathLength: 1 }}
                    viewport={{ once: true }}
                    transition={{ duration: 1.5 }}
                  />
                  <motion.line
                    x1="50%"
                    y1="50%"
                    x2="200%"
                    y2="50%"
                    stroke="#F58634"
                    strokeWidth="2"
                    strokeDasharray="5,5"
                    initial={{ pathLength: 0 }}
                    whileInView={{ pathLength: 1 }}
                    viewport={{ once: true }}
                    transition={{ duration: 1.5 }}
                  />
                </svg>
              </div>

              {/* Connected Nodes */}
              <div className="grid grid-cols-2 gap-4">
                {stakeholders.map((stakeholder, index) => (
                  <motion.div
                    key={stakeholder.title}
                    initial={{ opacity: 0, scale: 0 }}
                    whileInView={{ opacity: 1, scale: 1 }}
                    viewport={{ once: true }}
                    transition={{ delay: index * 0.1 + 0.5, duration: 0.5 }}
                    className={`w-20 h-20 rounded-xl bg-gradient-to-br ${stakeholder.color} flex items-center justify-center`}
                  >
                    <stakeholder.icon className="w-8 h-8 text-white" />
                  </motion.div>
                ))}
              </div>
            </div>

            <p className="text-center text-white/60 mt-8">
              Seamlessly connecting all stakeholders in one unified ecosystem
            </p>
          </div>
        </motion.div>
      </div>
    </section>
  );
}
