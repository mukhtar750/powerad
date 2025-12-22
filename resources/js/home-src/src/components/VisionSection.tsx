import { motion } from 'motion/react';
import { Button } from './ui/button';
import { MapPin, ArrowRight } from 'lucide-react';

export function VisionSection() {
  const roadmap = [
    {
      phase: 'Phase 1',
      location: 'Nigeria',
      status: 'Live',
      year: '2025',
      color: 'from-green-500 to-emerald-500',
    },
    {
      phase: 'Phase 2',
      location: 'West Africa',
      status: 'Q2 2027',
      year: '2027',
      color: 'from-[#F58634] to-[#ff9d5c]',
    },
    {
      phase: 'Phase 3',
      location: 'South Africa',
      status: 'Q4 2028',
      year: '2028',
      color: 'from-blue-500 to-cyan-500',
    },
    {
      phase: 'Phase 4',
      location: 'Pan-African',
      status: '2029',
      year: '2029',
      color: 'from-purple-500 to-pink-500',
    },
  ];

  return (
    <section className="relative py-24 bg-gradient-to-b from-[#363366] to-[#2a2850] overflow-hidden">
      {/* Africa Map Background */}
      <div className="absolute inset-0 opacity-5">
        <svg viewBox="0 0 100 100" className="w-full h-full" preserveAspectRatio="xMidYMid slice">
          <path
            d="M50,10 L60,20 L65,15 L70,25 L75,20 L80,30 L75,40 L70,35 L65,45 L60,40 L55,50 L50,45 L45,55 L40,50 L35,60 L30,55 L25,65 L20,60 L25,50 L20,40 L25,30 L30,35 L35,25 L40,30 L45,20 L50,25 Z"
            fill="white"
          />
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
            <span className="text-[#F58634] text-sm">Our Vision</span>
          </div>
          
          <h2 className="text-5xl md:text-6xl text-white mb-6">
            Transforming{' '}
            <span className="bg-gradient-to-r from-[#F58634] to-[#ff9d5c] bg-clip-text text-transparent">
              African Advertising
            </span>
          </h2>
          
          <p className="text-xl text-white/70 max-w-3xl mx-auto">
            Our roadmap to becoming the leading outdoor advertising platform across Africa
          </p>
        </motion.div>

        {/* Timeline */}
        <div className="relative mb-16">
          {/* Connection Line */}
          <div className="absolute top-1/2 left-0 right-0 h-0.5 bg-white/10 hidden lg:block" />

          <div className="grid grid-cols-1 lg:grid-cols-4 gap-6">
            {roadmap.map((item, index) => (
              <motion.div
                key={item.phase}
                initial={{ opacity: 0, y: 20 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ delay: index * 0.15, duration: 0.6 }}
                className="relative"
              >
                {/* Connector Dot */}
                <div className="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 w-4 h-4 rounded-full bg-gradient-to-r from-[#F58634] to-[#ff9d5c] border-4 border-[#363366] hidden lg:block z-10" />

                <div className="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-all h-full">
                  <div className={`inline-block px-3 py-1 rounded-full bg-gradient-to-r ${item.color} text-white text-sm mb-4`}>
                    {item.phase}
                  </div>

                  <div className="flex items-center gap-2 mb-2">
                    <MapPin className="w-5 h-5 text-[#F58634]" />
                    <h3 className="text-xl text-white">{item.location}</h3>
                  </div>

                  <p className="text-white/60 mb-3">{item.status}</p>
                  <p className="text-white/40 text-sm">{item.year}</p>
                </div>
              </motion.div>
            ))}
          </div>
        </div>

        {/* Map Visualization */}
        <motion.div
          initial={{ opacity: 0, scale: 0.95 }}
          whileInView={{ opacity: 1, scale: 1 }}
          viewport={{ once: true }}
          transition={{ duration: 0.8 }}
          className="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-12 text-center mb-12"
        >
          <div className="max-w-3xl mx-auto">
            <h3 className="text-3xl text-white mb-4">Join the Revolution</h3>
            <p className="text-white/70 text-lg mb-8">
              Be part of Africa's digital transformation in outdoor advertising. Whether you're in Nigeria, Accra, Nairobi, or beyond, PowerAD is your partner for growth.
            </p>

            <div className="flex flex-col sm:flex-row items-center justify-center gap-4">
              <Button
                size="lg"
                className="h-14 px-8 bg-gradient-to-r from-[#F58634] to-[#ff9d5c] hover:from-[#e57525] hover:to-[#f58d4d] text-white shadow-lg shadow-[#F58634]/25 group"
              >
                Schedule a Demo
                <ArrowRight className="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" />
              </Button>
              <Button
                size="lg"
                variant="outline"
                className="h-14 px-8 bg-white/5 border-white/20 text-white hover:bg-white/10 backdrop-blur-md"
              >
                View Expansion Plan
              </Button>
            </div>
          </div>
        </motion.div>

        {/* Stats Grid */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.6 }}
            className="bg-gradient-to-br from-[#F58634]/20 to-[#F58634]/5 backdrop-blur-xl border border-[#F58634]/30 rounded-2xl p-8 text-center"
          >
            <div className="text-5xl text-white mb-2">4</div>
            <div className="text-white/70">Target Countries by 2025</div>
          </motion.div>

          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ delay: 0.1, duration: 0.6 }}
            className="bg-gradient-to-br from-[#F58634]/20 to-[#F58634]/5 backdrop-blur-xl border border-[#F58634]/30 rounded-2xl p-8 text-center"
          >
            <div className="text-5xl text-white mb-2">50K+</div>
            <div className="text-white/70">Billboards on Platform</div>
          </motion.div>

          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ delay: 0.2, duration: 0.6 }}
            className="bg-gradient-to-br from-[#F58634]/20 to-[#F58634]/5 backdrop-blur-xl border border-[#F58634]/30 rounded-2xl p-8 text-center"
          >
            <div className="text-5xl text-white mb-2">₦100B+</div>
            <div className="text-white/70">Projected Annual Volume</div>
          </motion.div>
        </div>
      </div>
    </section>
  );
}
