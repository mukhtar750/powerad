import { useState } from 'react';
import { motion } from 'motion/react';
import { Slider } from './ui/slider';
import { X, Check } from 'lucide-react';

export function BeforeAfterSection() {
  const [sliderValue, setSliderValue] = useState([50]);

  const beforePoints = [
    'Manual phone calls and emails',
    'No real-time availability',
    'Opaque pricing',
    'Weeks to close deals',
    'Payment delays',
    'No performance data',
  ];

  const afterPoints = [
    'Automated digital platform',
    'Live availability updates',
    'Transparent pricing',
    'Instant bookings',
    'Secure instant payments',
    'Real-time analytics & insights',
  ];

  return (
    <section className="relative py-24 bg-gradient-to-b from-[#363366] to-[#2a2850]">
      <div className="max-w-7xl mx-auto px-8">
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.8 }}
          className="text-center mb-16"
        >
          <div className="inline-block px-4 py-2 rounded-full bg-[#F58634]/10 border border-[#F58634]/20 mb-6">
            <span className="text-[#F58634] text-sm">Transformation</span>
          </div>
          
          <h2 className="text-5xl md:text-6xl text-white mb-6">
            Before & After{' '}
            <span className="bg-gradient-to-r from-[#F58634] to-[#ff9d5c] bg-clip-text text-transparent">
              PowerAD
            </span>
          </h2>
          
          <p className="text-xl text-white/70 max-w-3xl mx-auto">
            See the dramatic difference PowerAD makes to your outdoor advertising workflow
          </p>
        </motion.div>

        <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
          {/* Before */}
          <motion.div
            initial={{ opacity: 0, x: -20 }}
            whileInView={{ opacity: 1, x: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.6 }}
            className="bg-white/5 backdrop-blur-xl border border-red-500/30 rounded-2xl p-8"
          >
            <div className="flex items-center gap-3 mb-6">
              <div className="w-12 h-12 rounded-xl bg-red-500/20 flex items-center justify-center">
                <X className="w-6 h-6 text-red-400" />
              </div>
              <div>
                <h3 className="text-2xl text-white">Before PowerAD</h3>
                <p className="text-white/60 text-sm">Traditional approach</p>
              </div>
            </div>

            <ul className="space-y-4">
              {beforePoints.map((point, index) => (
                <motion.li
                  key={point}
                  initial={{ opacity: 0, x: -10 }}
                  whileInView={{ opacity: 1, x: 0 }}
                  viewport={{ once: true }}
                  transition={{ delay: index * 0.1, duration: 0.4 }}
                  className="flex items-start gap-3 text-white/70"
                >
                  <X className="w-5 h-5 text-red-400 flex-shrink-0 mt-0.5" />
                  <span>{point}</span>
                </motion.li>
              ))}
            </ul>

            <div className="mt-8 p-4 bg-red-500/10 border border-red-500/20 rounded-xl">
              <p className="text-red-400 text-sm text-center">
                Average deal closing time: <span className="text-lg">4-6 weeks</span>
              </p>
            </div>
          </motion.div>

          {/* After */}
          <motion.div
            initial={{ opacity: 0, x: 20 }}
            whileInView={{ opacity: 1, x: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.6 }}
            className="bg-white/5 backdrop-blur-xl border border-[#F58634]/30 rounded-2xl p-8"
          >
            <div className="flex items-center gap-3 mb-6">
              <div className="w-12 h-12 rounded-xl bg-gradient-to-br from-[#F58634]/20 to-[#F58634]/10 flex items-center justify-center">
                <Check className="w-6 h-6 text-[#F58634]" />
              </div>
              <div>
                <h3 className="text-2xl text-white">With PowerAD</h3>
                <p className="text-white/60 text-sm">Digital transformation</p>
              </div>
            </div>

            <ul className="space-y-4">
              {afterPoints.map((point, index) => (
                <motion.li
                  key={point}
                  initial={{ opacity: 0, x: 10 }}
                  whileInView={{ opacity: 1, x: 0 }}
                  viewport={{ once: true }}
                  transition={{ delay: index * 0.1, duration: 0.4 }}
                  className="flex items-start gap-3 text-white/70"
                >
                  <Check className="w-5 h-5 text-[#F58634] flex-shrink-0 mt-0.5" />
                  <span>{point}</span>
                </motion.li>
              ))}
            </ul>

            <div className="mt-8 p-4 bg-gradient-to-r from-[#F58634]/20 to-[#ff9d5c]/20 border border-[#F58634]/30 rounded-xl">
              <p className="text-[#F58634] text-sm text-center">
                Average deal closing time: <span className="text-lg">Minutes</span>
              </p>
            </div>
          </motion.div>
        </div>

        {/* Interactive Comparison Slider */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ delay: 0.4, duration: 0.8 }}
          className="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-8"
        >
          <h3 className="text-2xl text-white text-center mb-8">
            Efficiency Comparison
          </h3>

          <div className="relative h-64 mb-6">
            <div className="absolute inset-0 flex items-end">
              {/* Before Bar */}
              <div
                className="bg-gradient-to-t from-red-500 to-red-400 rounded-t-lg transition-all duration-500"
                style={{ width: `${sliderValue[0]}%`, height: '30%' }}
              >
                <div className="text-white text-center p-2 text-sm">Before: 30%</div>
              </div>

              {/* After Bar */}
              <div
                className="bg-gradient-to-t from-[#F58634] to-[#ff9d5c] rounded-t-lg transition-all duration-500 ml-2"
                style={{ width: `${100 - sliderValue[0]}%`, height: '95%' }}
              >
                <div className="text-white text-center p-2 text-sm">After: 95%</div>
              </div>
            </div>
          </div>

          <Slider
            value={sliderValue}
            onValueChange={setSliderValue}
            max={100}
            step={1}
            className="mb-4"
          />

          <p className="text-white/60 text-center text-sm">
            Slide to compare efficiency levels
          </p>
        </motion.div>

        {/* Stats Comparison */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ delay: 0.6, duration: 0.8 }}
          className="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6"
        >
          <div className="bg-gradient-to-br from-[#F58634]/20 to-[#F58634]/5 backdrop-blur-xl border border-[#F58634]/30 rounded-2xl p-6 text-center">
            <div className="text-4xl text-white mb-2">300%</div>
            <div className="text-white/70">Increase in bookings</div>
          </div>

          <div className="bg-gradient-to-br from-[#F58634]/20 to-[#F58634]/5 backdrop-blur-xl border border-[#F58634]/30 rounded-2xl p-6 text-center">
            <div className="text-4xl text-white mb-2">90%</div>
            <div className="text-white/70">Time saved</div>
          </div>

          <div className="bg-gradient-to-br from-[#F58634]/20 to-[#F58634]/5 backdrop-blur-xl border border-[#F58634]/30 rounded-2xl p-6 text-center">
            <div className="text-4xl text-white mb-2">100%</div>
            <div className="text-white/70">Payment reliability</div>
          </div>
        </motion.div>
      </div>
    </section>
  );
}
