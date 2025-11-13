import { motion, useInView } from 'motion/react';
import { useRef, useEffect, useState } from 'react';

interface CounterProps {
  end: number;
  duration?: number;
  prefix?: string;
  suffix?: string;
  decimals?: number;
}

function Counter({ end, duration = 2, prefix = '', suffix = '', decimals = 0 }: CounterProps) {
  const [count, setCount] = useState(0);
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true });

  useEffect(() => {
    if (!isInView) return;

    const steps = 60;
    const increment = end / steps;
    let current = 0;
    const stepDuration = (duration * 1000) / steps;

    const timer = setInterval(() => {
      current += increment;
      if (current >= end) {
        setCount(end);
        clearInterval(timer);
      } else {
        setCount(current);
      }
    }, stepDuration);

    return () => clearInterval(timer);
  }, [isInView, end, duration]);

  return (
    <span ref={ref}>
      {prefix}
      {decimals > 0 ? count.toFixed(decimals) : Math.floor(count).toLocaleString()}
      {suffix}
    </span>
  );
}

export function StatsCounter() {
  return (
    <section className="relative py-24 bg-gradient-to-b from-[#1a1a2e] to-[#363366]">
      <div className="max-w-7xl mx-auto px-8">
        <div className="grid grid-cols-2 md:grid-cols-4 gap-8">
          {[
            { label: 'Billboard Owners', value: 500, suffix: '+', icon: '🏢' },
            { label: 'Verified Partners', value: 150, suffix: '+', icon: '🤝' },
            { label: 'Active Campaigns', value: 1200, suffix: '+', icon: '📊' },
            { label: 'Success Rate', value: 98, suffix: '%', icon: '✓' },
          ].map((stat, index) => (
            <motion.div
              key={stat.label}
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ delay: index * 0.1, duration: 0.6 }}
              className="text-center group"
            >
              <motion.div
                className="text-6xl mb-2"
                whileHover={{ scale: 1.2, rotate: 10 }}
                transition={{ type: 'spring', stiffness: 300 }}
              >
                {stat.icon}
              </motion.div>
              <div className="text-5xl md:text-6xl text-white mb-3 tabular-nums">
                <Counter
                  end={stat.value}
                  prefix={stat.prefix}
                  suffix={stat.suffix}
                  decimals={stat.decimals}
                />
              </div>
              <div className="text-white/60 text-lg">{stat.label}</div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
