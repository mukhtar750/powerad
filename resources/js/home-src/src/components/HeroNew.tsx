import { useState, useEffect } from 'react';
import { motion, useScroll, useTransform } from 'motion/react';
import { Button } from './ui/button';
import { ArrowRight, Play, Sparkles, TrendingUp, Shield, Zap } from 'lucide-react';
// Use primary logo for the initial navbar at the top of the homepage
const logoImage = '/images/primarylogo.png';

export function HeroNew() {
  const [mousePosition, setMousePosition] = useState({ x: 0, y: 0 });
  const { scrollY } = useScroll();
  const opacity = useTransform(scrollY, [0, 300], [1, 0]);
  const scale = useTransform(scrollY, [0, 300], [1, 0.8]);

  useEffect(() => {
    const handleMouseMove = (e: MouseEvent) => {
      setMousePosition({
        x: (e.clientX / window.innerWidth - 0.5) * 20,
        y: (e.clientY / window.innerHeight - 0.5) * 20,
      });
    };

    window.addEventListener('mousemove', handleMouseMove);
    return () => window.removeEventListener('mousemove', handleMouseMove);
  }, []);

  // Animated counters
  const [stats, setStats] = useState({ billboards: 0, revenue: 0, campaigns: 0 });

  useEffect(() => {
    const duration = 2000;
    const steps = 60;
    const interval = duration / steps;

    const targets = { billboards: 5000, revenue: 25, campaigns: 12000 };

    let step = 0;
    const timer = setInterval(() => {
      step++;
      const progress = step / steps;

      setStats({
        billboards: Math.floor(targets.billboards * progress),
        revenue: parseFloat((targets.revenue * progress).toFixed(1)),
        campaigns: Math.floor(targets.campaigns * progress),
      });

      if (step >= steps) clearInterval(timer);
    }, interval);

    return () => clearInterval(timer);
  }, []);

  return (
    <section id="hero" className="relative min-h-screen flex items-center justify-center overflow-hidden bg-[#0a0a1a]">
      {/* Animated Video Background */}
      <div className="absolute inset-0">
        <div className="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1519501025264-65ba15a82390?w=1920')] bg-cover bg-center opacity-30" />
        <div className="absolute inset-0 bg-gradient-to-b from-[#0a0a1a]/50 via-[#363366]/80 to-[#363366]" />
      </div>

      {/* Particle Effect */}
      <div className="absolute inset-0 overflow-hidden">
        {[...Array(50)].map((_, i) => (
          <motion.div
            key={i}
            className="absolute w-1 h-1 bg-[#F58634]/30 rounded-full"
            style={{
              left: `${Math.random() * 100}%`,
              top: `${Math.random() * 100}%`,
            }}
            animate={{
              y: [0, -30, 0],
              opacity: [0.3, 1, 0.3],
              scale: [1, 1.5, 1],
            }}
            transition={{
              duration: 3 + Math.random() * 2,
              repeat: Infinity,
              delay: Math.random() * 2,
            }}
          />
        ))}
      </div>

      {/* Floating Orbs */}
      <motion.div
        className="absolute top-20 left-20 w-96 h-96 bg-[#F58634]/20 rounded-full blur-3xl"
        animate={{
          scale: [1, 1.3, 1],
          x: [0, 50, 0],
          y: [0, 30, 0],
        }}
        transition={{
          duration: 10,
          repeat: Infinity,
          ease: "easeInOut",
        }}
        style={{
          x: mousePosition.x,
          y: mousePosition.y,
        }}
      />
      <motion.div
        className="absolute bottom-20 right-20 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl"
        animate={{
          scale: [1.3, 1, 1.3],
          x: [0, -50, 0],
          y: [0, -30, 0],
        }}
        transition={{
          duration: 10,
          repeat: Infinity,
          ease: "easeInOut",
        }}
        style={{
          x: -mousePosition.x,
          y: -mousePosition.y,
        }}
      />

      {/* Initial Navbar */}
      <nav className="absolute top-0 left-0 right-0 z-50 py-8 px-8">
        <div className="max-w-7xl mx-auto flex items-center justify-between">
          <motion.div
            initial={{ opacity: 0, x: -20 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.6 }}
          >
            <img src={logoImage} alt="PowerAD Secondary Logo" className="h-12" />
          </motion.div>

          <motion.div
            initial={{ opacity: 0, x: 20 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.6 }}
            className="hidden md:flex items-center gap-6"
          >
            <a href="#features" className="text-white/80 hover:text-white transition-colors">Features</a>
            <a href="#pricing" className="text-white/80 hover:text-white transition-colors">Pricing</a>
            <a href="#testimonials" className="text-white/80 hover:text-white transition-colors">Reviews</a>
            <Button variant="ghost" className="text-white hover:bg-white/10" asChild>
              <a href="/login">Sign In</a>
            </Button>
            <Button className="bg-gradient-to-r from-[#F58634] to-[#ff9d5c] hover:shadow-lg hover:shadow-[#F58634]/50 transition-all" asChild>
              <a href="/register">Get Started</a>
            </Button>
          </motion.div>
        </div>
      </nav>

      {/* Hero Content */}
      <motion.div style={{ opacity, scale }} className="relative z-10 max-w-7xl mx-auto px-8 py-32 text-center">
        <motion.div
          initial={{ opacity: 0, scale: 0.9 }}
          animate={{ opacity: 1, scale: 1 }}
          transition={{ delay: 0.2, duration: 0.8 }}
          className="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-gradient-to-r from-[#F58634]/20 to-purple-500/20 backdrop-blur-xl border border-[#F58634]/30 mb-8 shadow-lg shadow-[#F58634]/10"
        >
          <Sparkles className="w-5 h-5 text-[#F58634]" />
          <span className="text-white">Africa's No. 1 OOH Platform</span>
          <Shield className="w-5 h-5 text-green-400" />
        </motion.div>

        <motion.h1
          initial={{ opacity: 0, y: 30 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ delay: 0.3, duration: 0.8 }}
          className="text-7xl md:text-8xl lg:text-9xl text-white mb-8 leading-none"
        >
          Africa's
          <br />
          <span className="relative inline-block">
            <span className="bg-gradient-to-r from-[#F58634] via-[#ff9d5c] to-[#F58634] bg-clip-text text-transparent animate-gradient">
              Digital Billboard
            </span>
            <motion.div
              className="absolute -inset-2 bg-gradient-to-r from-[#F58634]/20 to-purple-500/20 blur-2xl -z-10"
              animate={{
                opacity: [0.5, 0.8, 0.5],
              }}
              transition={{
                duration: 3,
                repeat: Infinity,
              }}
            />
          </span>
          <br />
          <span className="text-white/90">Marketplace</span>
        </motion.h1>

        <motion.p
          initial={{ opacity: 0, y: 30 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ delay: 0.4, duration: 0.8 }}
          className="text-2xl md:text-3xl text-white/70 mb-12 max-w-4xl mx-auto leading-relaxed"
        >
          The complete platform connecting{' '}
          <span className="text-[#F58634]">billboard owners</span>,{' '}
          <span className="text-[#F58634]">advertisers</span>,{' '}
          <span className="text-[#F58634]">service providers</span>, and{' '}
          <span className="text-[#F58634]">regulators</span> across Nigeria and beyond
        </motion.p>

        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ delay: 0.5, duration: 0.8 }}
          className="flex flex-col sm:flex-row items-center justify-center gap-6 mb-20"
        >
          <Button
            size="lg"
            className="h-16 px-10 text-lg bg-gradient-to-r from-[#F58634] to-[#ff9d5c] hover:shadow-2xl hover:shadow-[#F58634]/50 hover:scale-105 transition-all group"
            asChild
          >
            <a href="/register">
              Start Your Journey
              <ArrowRight className="w-6 h-6 ml-2 group-hover:translate-x-2 transition-transform" />
            </a>
          </Button>
          <Button
            size="lg"
            variant="outline"
            className="h-16 px-10 text-lg bg-white/5 border-2 border-white/20 text-white hover:bg-white/10 backdrop-blur-xl hover:scale-105 transition-all group"
          >
            <Play className="w-6 h-6 mr-2 group-hover:scale-110 transition-transform" />
            Watch Platform Demo
          </Button>
        </motion.div>

        {/* Floating Stats Cards */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
          {[
            { icon: TrendingUp, label: 'Active Billboards', value: stats.billboards.toLocaleString(), suffix: '+', color: 'from-blue-500 to-cyan-500' },
            { icon: Zap, label: 'Revenue Facilitated', value: `₦${stats.revenue}B`, suffix: '+', color: 'from-[#F58634] to-[#ff9d5c]' },
            { icon: Shield, label: 'Successful Campaigns', value: stats.campaigns.toLocaleString(), suffix: '+', color: 'from-green-500 to-emerald-500' },
          ].map((stat, index) => (
            <motion.div
              key={stat.label}
              initial={{ opacity: 0, y: 50, rotateX: -20 }}
              animate={{ opacity: 1, y: 0, rotateX: 0 }}
              transition={{ delay: 0.6 + index * 0.1, duration: 0.8 }}
              whileHover={{ scale: 1.05, y: -5 }}
              className="relative group cursor-pointer"
            >
              <div className="absolute inset-0 bg-gradient-to-r from-[#F58634]/20 to-purple-500/20 rounded-2xl blur-xl group-hover:blur-2xl transition-all" />
              <div className="relative bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-8 hover:bg-white/10 hover:border-[#F58634]/30 transition-all">
                <div className={`w-14 h-14 rounded-xl bg-gradient-to-br ${stat.color} flex items-center justify-center mb-4 group-hover:scale-110 transition-transform`}>
                  <stat.icon className="w-7 h-7 text-white" />
                </div>
                <div className="text-5xl text-white mb-2 tabular-nums">
                  {stat.value}{stat.suffix}
                </div>
                <div className="text-white/60">{stat.label}</div>
                <motion.div
                  className="absolute top-2 right-2 w-2 h-2 bg-green-400 rounded-full"
                  animate={{
                    opacity: [1, 0.3, 1],
                    scale: [1, 1.2, 1],
                  }}
                  transition={{
                    duration: 2,
                    repeat: Infinity,
                  }}
                />
              </div>
            </motion.div>
          ))}
        </div>

        {/* Trust Indicators */}
        <motion.div
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          transition={{ delay: 1, duration: 0.8 }}
          className="mt-16 flex flex-wrap items-center justify-center gap-8 text-white/40 text-sm"
        >
          {[
            { text: 'APCON Certified', icon: '✓' },
            { text: 'LASAA Approved', icon: '✓' },
            { text: 'ISO 27001 Compliant', icon: '✓' },
            { text: 'Made in Nigeria 🇳🇬', icon: '🇳🇬' },
          ].map((badge) => (
            <motion.div
              key={badge.text}
              whileHover={{ scale: 1.1, color: '#F58634' }}
              className="flex items-center gap-2 cursor-pointer transition-colors"
            >
              <span>{badge.icon}</span>
              <span>{badge.text}</span>
            </motion.div>
          ))}
        </motion.div>
      </motion.div>

      {/* Scroll Indicator */}
      <motion.div
        className="absolute bottom-12 left-1/2 -translate-x-1/2"
        animate={{ y: [0, 15, 0] }}
        transition={{ duration: 2, repeat: Infinity }}
      >
        <div className="flex flex-col items-center gap-2">
          <span className="text-white/40 text-sm">Scroll to explore</span>
          <div className="w-6 h-10 border-2 border-white/30 rounded-full flex items-start justify-center p-2">
            <motion.div
              className="w-1.5 h-1.5 bg-[#F58634] rounded-full"
              animate={{ y: [0, 16, 0] }}
              transition={{ duration: 2, repeat: Infinity }}
            />
          </div>
        </div>
      </motion.div>
    </section>
  );
}
