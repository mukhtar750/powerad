import { motion } from 'motion/react';
import { AlertCircle, BarChart3, FileQuestion, Clock, Wallet } from 'lucide-react';

export function ProblemSection() {
  const problems = [
    {
      icon: AlertCircle,
      title: 'Market Fragmentation',
      description: 'Lack of centralized platform connecting all stakeholders in the OOH ecosystem',
    },
    {
      icon: BarChart3,
      title: 'Lack of Data & Analytics',
      description: 'Advertisers struggle with measuring ROI and campaign performance',
    },
    {
      icon: FileQuestion,
      title: 'Lack of Transparency',
      description: 'Pricing opacity and hidden costs create trust issues in the market',
    },
    {
      icon: Clock,
      title: 'Manual Processes',
      description: 'Time-consuming paperwork and offline negotiations slow down deals',
    },
    {
      icon: Wallet,
      title: 'Payment Inefficiencies',
      description: 'Delayed payments and reconciliation challenges hurt cash flow',
    },
  ];

  return (
    <section className="relative py-24 bg-gradient-to-b from-[#363366] to-[#2a2850] overflow-hidden">
      {/* Background Decoration */}
      <div className="absolute inset-0 opacity-10">
        <div className="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS13aWR0aD0iMSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNncmlkKSIvPjwvc3ZnPg==')]"></div>
      </div>

      <div className="relative z-10 max-w-7xl mx-auto px-8">
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.8 }}
          className="text-center mb-16"
        >
          <div className="inline-block px-4 py-2 rounded-full bg-red-500/10 border border-red-500/20 mb-6">
            <span className="text-red-400 text-sm">The Challenge</span>
          </div>
          
          <h2 className="text-5xl md:text-6xl text-white mb-6">
            The{' '}
            <span className="bg-gradient-to-r from-[#F58634] to-[#ff9d5c] bg-clip-text text-transparent">
              ₦50 Billion Problem
            </span>
          </h2>
          
          <p className="text-xl text-white/70 max-w-3xl mx-auto">
            Nigeria's outdoor advertising industry loses billions annually due to inefficiencies, lack of transparency, and fragmented processes.
          </p>
        </motion.div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
          {problems.map((problem, index) => (
            <motion.div
              key={problem.title}
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ delay: index * 0.1, duration: 0.6 }}
              className="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-8 hover:bg-white/10 hover:border-[#F58634]/30 transition-all group"
            >
              <div className="w-14 h-14 rounded-xl bg-gradient-to-br from-red-500/20 to-red-500/10 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                <problem.icon className="w-7 h-7 text-red-400" />
              </div>
              
              <h3 className="text-xl text-white mb-3">{problem.title}</h3>
              <p className="text-white/60 leading-relaxed">{problem.description}</p>
            </motion.div>
          ))}

          {/* Stat Card */}
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ delay: problems.length * 0.1, duration: 0.6 }}
            className="bg-gradient-to-br from-[#F58634]/20 to-[#F58634]/5 backdrop-blur-xl border border-[#F58634]/30 rounded-2xl p-8 flex flex-col items-center justify-center text-center"
          >
            <div className="text-6xl text-white mb-3">₦50B</div>
            <div className="text-white/80 text-lg">Lost Annually</div>
            <div className="text-white/60 text-sm mt-2">Due to market inefficiencies</div>
          </motion.div>
        </div>

        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ delay: 0.6, duration: 0.8 }}
          className="text-center"
        >
          <p className="text-2xl text-white/80">
            It's time for a <span className="text-[#F58634]">change</span>.
          </p>
        </motion.div>
      </div>
    </section>
  );
}
