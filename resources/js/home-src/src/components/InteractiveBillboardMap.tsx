import { useState } from 'react';
import { motion, AnimatePresence } from 'motion/react';
import { MapPin, Navigation, Maximize2 } from 'lucide-react';
import { Button } from './ui/button';

export function InteractiveBillboardMap() {
  const [selectedCity, setSelectedCity] = useState<string | null>(null);

  const cities = [
    { name: 'Lagos', x: 45, y: 65, billboards: 2500, color: 'from-[#F58634] to-[#ff9d5c]' },
    { name: 'Abuja', x: 55, y: 45, billboards: 1200, color: 'from-blue-500 to-cyan-500' },
    { name: 'Port Harcourt', x: 52, y: 72, billboards: 800, color: 'from-green-500 to-emerald-500' },
    { name: 'Kano', x: 60, y: 30, billboards: 600, color: 'from-purple-500 to-pink-500' },
    { name: 'Ibadan', x: 43, y: 60, billboards: 500, color: 'from-yellow-500 to-orange-500' },
  ];

  return (
    <section className="relative py-32 bg-gradient-to-b from-[#363366] to-[#1a1a2e] overflow-hidden">
      <div className="absolute inset-0">
        <div className="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS13aWR0aD0iMSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNncmlkKSIvPjwvc3ZnPg==')] opacity-5"></div>
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
            <span className="text-[#F58634] text-sm">Live Coverage</span>
          </div>
          
          <h2 className="text-6xl md:text-7xl text-white mb-6">
            Thousands Of Billboards {' '}
            <span className="bg-gradient-to-r from-[#F58634] to-[#ff9d5c] bg-clip-text text-transparent">
            Waiting To Go Live Now
            </span>
          </h2>
          
          <p className="text-xl text-white/70 max-w-3xl mx-auto">
            Real-time availability across major Nigerian cities. Find the perfect location for your campaign.
          </p>
        </motion.div>

        {/* Interactive Map */}
        <motion.div
          initial={{ opacity: 0, scale: 0.95 }}
          whileInView={{ opacity: 1, scale: 1 }}
          viewport={{ once: true }}
          transition={{ duration: 0.8 }}
          className="relative bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-12 overflow-hidden"
        >
          {/* Map Background */}
          <div className="relative w-full aspect-[16/10] bg-gradient-to-br from-[#2a2850] to-[#1a1a2e] rounded-2xl overflow-hidden">
            {/* Nigeria Outline (Simplified) */}
            <svg
              className="absolute inset-0 w-full h-full opacity-20"
              viewBox="0 0 100 100"
              preserveAspectRatio="xMidYMid meet"
            >
              <path
                d="M 40 30 L 50 25 L 65 30 L 70 40 L 65 55 L 60 70 L 50 75 L 45 70 L 40 60 L 38 50 L 40 40 Z"
                fill="none"
                stroke="rgba(245, 134, 52, 0.3)"
                strokeWidth="0.5"
              />
            </svg>

            {/* Connection Lines */}
            <svg className="absolute inset-0 w-full h-full" style={{ overflow: 'visible' }}>
              {cities.map((city, i) =>
                cities.slice(i + 1).map((otherCity, j) => (
                  <motion.line
                    key={`${city.name}-${otherCity.name}`}
                    x1={`${city.x}%`}
                    y1={`${city.y}%`}
                    x2={`${otherCity.x}%`}
                    y2={`${otherCity.y}%`}
                    stroke="rgba(245, 134, 52, 0.15)"
                    strokeWidth="1"
                    strokeDasharray="4,4"
                    initial={{ pathLength: 0 }}
                    whileInView={{ pathLength: 1 }}
                    viewport={{ once: true }}
                    transition={{ duration: 2, delay: i * 0.2 + j * 0.1 }}
                  />
                ))
              )}
            </svg>

            {/* City Markers */}
            {cities.map((city, index) => (
              <motion.div
                key={city.name}
                initial={{ scale: 0, opacity: 0 }}
                whileInView={{ scale: 1, opacity: 1 }}
                viewport={{ once: true }}
                transition={{ delay: index * 0.1, duration: 0.5, type: 'spring' }}
                className="absolute cursor-pointer"
                style={{ left: `${city.x}%`, top: `${city.y}%`, transform: 'translate(-50%, -50%)' }}
                onMouseEnter={() => setSelectedCity(city.name)}
                onMouseLeave={() => setSelectedCity(null)}
              >
                {/* Pulse Effect */}
                <motion.div
                  className={`absolute inset-0 w-16 h-16 rounded-full bg-gradient-to-r ${city.color} opacity-20 -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2`}
                  animate={{
                    scale: [1, 2, 1],
                    opacity: [0.3, 0, 0.3],
                  }}
                  transition={{
                    duration: 3,
                    repeat: Infinity,
                    delay: index * 0.5,
                  }}
                />

                {/* Marker */}
                <motion.div
                  whileHover={{ scale: 1.2 }}
                  className={`relative w-8 h-8 rounded-full bg-gradient-to-r ${city.color} flex items-center justify-center shadow-lg`}
                >
                  <MapPin className="w-5 h-5 text-white" fill="white" />
                </motion.div>

                {/* City Info Card */}
                <AnimatePresence>
                  {selectedCity === city.name && (
                    <motion.div
                      initial={{ opacity: 0, y: 10, scale: 0.9 }}
                      animate={{ opacity: 1, y: 0, scale: 1 }}
                      exit={{ opacity: 0, y: 10, scale: 0.9 }}
                      className="absolute top-full mt-4 left-1/2 -translate-x-1/2 w-56 bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl p-4 shadow-2xl"
                    >
                      <h4 className="text-white mb-2">{city.name}</h4>
                      <div className="text-2xl text-[#F58634] mb-1">
                        {city.billboards.toLocaleString()}
                      </div>
                      <div className="text-white/60 text-sm mb-3">Active Billboards</div>
                      <Button
                        size="sm"
                        className={`w-full bg-gradient-to-r ${city.color} hover:shadow-lg text-xs`}
                      >
                        View Locations
                      </Button>
                    </motion.div>
                  )}
                </AnimatePresence>
              </motion.div>
            ))}
          </div>

          {/* Map Controls */}
          <div className="absolute top-8 right-8 flex flex-col gap-2">
            <Button
              size="sm"
              variant="outline"
              className="bg-white/10 border-white/20 text-white hover:bg-white/20 backdrop-blur-xl"
            >
              <Navigation className="w-4 h-4" />
            </Button>
            <Button
              size="sm"
              variant="outline"
              className="bg-white/10 border-white/20 text-white hover:bg-white/20 backdrop-blur-xl"
            >
              <Maximize2 className="w-4 h-4" />
            </Button>
          </div>

          {/* Legend */}
          <div className="mt-8 flex flex-wrap items-center justify-center gap-6">
            {cities.map((city) => (
              <div key={city.name} className="flex items-center gap-2">
                <div className={`w-3 h-3 rounded-full bg-gradient-to-r ${city.color}`} />
                <span className="text-white/70 text-sm">{city.name}</span>
              </div>
            ))}
          </div>
        </motion.div>

        {/* Stats Below Map */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ delay: 0.4, duration: 0.8 }}
          className="mt-12 grid grid-cols-2 md:grid-cols-4 gap-6"
        >
          {[
            { label: 'Cities Covered', value: '12+' },
            { label: 'States', value: '6' },
            { label: 'Total Billboards', value: '5,000+' },
            { label: 'Available Now', value: '2,300+' },
          ].map((stat) => (
            <div
              key={stat.label}
              className="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 text-center hover:bg-white/10 transition-all"
            >
              <div className="text-3xl text-white mb-2">{stat.value}</div>
              <div className="text-white/60 text-sm">{stat.label}</div>
            </div>
          ))}
        </motion.div>
      </div>
    </section>
  );
}
