import { useState, useEffect } from 'react';
import { motion } from 'motion/react';
import { Button } from './ui/button';
import { ArrowRight, Play, CheckCircle, TrendingUp, Users, Shield } from 'lucide-react';
// Use secondary logo from public assets for homepage
const logoImage = '/images/secondary logo.png';

export function Hero() {
  const [loaps, setLoaps] = useState(0);
  const [revenue, setRevenue] = useState(0);
  const [campaigns, setCampaigns] = useState(0);

  useEffect(() => {
    const loapsInterval = setInterval(() => {
      setLoaps(prev => (prev < 500 ? prev + 5 : 500));
    }, 20);

    const revenueInterval = setInterval(() => {
      setRevenue(prev => (prev < 2.5 ? prev + 0.05 : 2.5));
    }, 30);

    const campaignsInterval = setInterval(() => {
      setCampaigns(prev => (prev < 1200 ? prev + 15 : 1200));
    }, 20);

    return () => {
      clearInterval(loapsInterval);
      clearInterval(revenueInterval);
      clearInterval(campaignsInterval);
    };
  }, []);

  return (
    <section className="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-[#363366] via-[#2a2850] to-[#1a1a2e]">
      {/* Video Background Overlay */}
      <div className="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1676491405940-9cd5d8cbf954?w=1920')] bg-cover bg-center opacity-20"></div>
      <div className="absolute inset-0 bg-gradient-to-b from-transparent via-[#363366]/50 to-[#363366]"></div>

      {/* Animated Background Elements */}
      <div className="absolute inset-0 overflow-hidden pointer-events-none">
        <motion.div
          className="absolute top-20 left-10 w-72 h-72 bg-[#F58634]/20 rounded-full blur-3xl"
          animate={{
            scale: [1, 1.2, 1],
            opacity: [0.3, 0.5, 0.3],
          }}
          transition={{
            duration: 8,
            repeat: Infinity,
            ease: "easeInOut"
          }}
        />
        <motion.div
          className="absolute bottom-20 right-10 w-96 h-96 bg-[#F58634]/15 rounded-full blur-3xl"
          animate={{
            scale: [1.2, 1, 1.2],
            opacity: [0.5, 0.3, 0.5],
          }}
          transition={{
            duration: 8,
            repeat: Infinity,
            ease: "easeInOut"
          }}
        />
      </div>

      {/* Navbar */}
      <nav className="absolute top-0 left-0 right-0 z-50 py-6 px-8">
        <div className="max-w-7xl mx-auto flex items-center justify-between">
          <motion.div
            initial={{ opacity: 0, x: -20 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.6 }}
            className="flex items-center gap-3"
          >
            <img src={logoImage} alt="PowerAD Secondary Logo" className="h-10" />
          </motion.div>

          <motion.div
            initial={{ opacity: 0, x: 20 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.6 }}
            className="hidden md:flex items-center gap-8"
          >
            <a href="#features" className="text-white/80 hover:text-white transition-colors">Features</a>
            <a href="#pricing" className="text-white/80 hover:text-white transition-colors">Pricing</a>
            <a href="#about" className="text-white/80 hover:text-white transition-colors">About</a>
            <Button variant="outline" className="border-white/20 text-white hover:bg-white/10" asChild>
              <a href="/login">Sign In</a>
            </Button>
            <Button className="bg-gradient-to-r from-[#F58634] to-[#ff9d5c] hover:from-[#e57525] hover:to-[#f58d4d]" asChild>
              <a href="/register">Get Started</a>
            </Button>
          </motion.div>
        </div>
      </nav>

      {/* Hero Content */}
      <div className="relative z-10 max-w-7xl mx-auto px-8 py-32 text-center">
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ delay: 0.2, duration: 0.8 }}
          className="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 mb-8"
        >
          <Shield className="w-4 h-4 text-[#F58634]" />
          <span className="text-sm text-white/90">APCON & LASAA Verified Platform</span>
        </motion.div>

        <motion.h1
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ delay: 0.3, duration: 0.8 }}
          className="text-6xl md:text-7xl lg:text-8xl text-white mb-6 leading-tight max-w-5xl mx-auto"
        >
          The Hub for{' '}
          <span className="bg-gradient-to-r from-[#F58634] via-[#ff9d5c] to-[#F58634] bg-clip-text text-transparent">
            Outdoor Advertising
          </span>{' '}
          in Africa
        </motion.h1>

        <motion.p
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ delay: 0.4, duration: 0.8 }}
          className="text-xl md:text-2xl text-white/70 mb-12 max-w-3xl mx-auto leading-relaxed"
        >
          Nigeria's first digital marketplace and workflow hub connecting billboard owners, advertisers, and service providers in one seamless platform.
        </motion.p>

        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ delay: 0.5, duration: 0.8 }}
          className="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16"
        >
          <Button
            size="lg"
            className="h-16 px-8 bg-gradient-to-r from-[#F58634] to-[#ff9d5c] hover:from-[#e57525] hover:to-[#f58d4d] text-white shadow-lg shadow-[#F58634]/25 text-lg group"
          >
            Get Started Free
            <ArrowRight className="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" />
          </Button>
          <Button
            size="lg"
            variant="outline"
            className="h-16 px-8 bg-white/5 border-white/20 text-white hover:bg-white/10 backdrop-blur-md text-lg"
          >
            <Play className="w-5 h-5 mr-2" />
            Watch Demo
          </Button>
        </motion.div>

        {/* Live Stats */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ delay: 0.6, duration: 0.8 }}
          className="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto"
        >
          <div className="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-all group">
            <div className="flex items-center justify-between mb-2">
              <Users className="w-8 h-8 text-[#F58634]" />
              <TrendingUp className="w-5 h-5 text-green-400" />
            </div>
            <div className="text-4xl text-white mb-1">{loaps}+</div>
            <div className="text-white/60">Active Billboard Owners</div>
          </div>

          <div className="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-all group">
            <div className="flex items-center justify-between mb-2">
              <TrendingUp className="w-8 h-8 text-[#F58634]" />
              <TrendingUp className="w-5 h-5 text-green-400" />
            </div>
            <div className="text-4xl text-white mb-1">150+</div>
          <div className="text-white/60">Verified Partnerships</div>

          </div>

          <div className="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-all group">
            <div className="flex items-center justify-between mb-2">
              <CheckCircle className="w-8 h-8 text-[#F58634]" />
              <TrendingUp className="w-5 h-5 text-green-400" />
            </div>
            <div className="text-4xl text-white mb-1">{campaigns}+</div>
            <div className="text-white/60">Successful Campaigns</div>
          </div>
        </motion.div>

        {/* Trust Badges */}
        <motion.div
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          transition={{ delay: 0.8, duration: 0.8 }}
          className="mt-12 flex flex-wrap items-center justify-center gap-8 text-white/60 text-sm"
        >
          <div className="flex items-center gap-2">
            <CheckCircle className="w-5 h-5 text-[#F58634]" />
            APCON Certified
          </div>
          <div className="flex items-center gap-2">
            <CheckCircle className="w-5 h-5 text-[#F58634]" />
            LASAA Approved
          </div>
          <div className="flex items-center gap-2">
            <CheckCircle className="w-5 h-5 text-[#F58634]" />
            Made in Nigeria
          </div>
        </motion.div>
      </div>

      {/* Scroll Indicator */}
      <motion.div
        className="absolute bottom-8 left-1/2 -translate-x-1/2"
        animate={{ y: [0, 10, 0] }}
        transition={{ duration: 2, repeat: Infinity }}
      >
        <div className="w-6 h-10 border-2 border-white/30 rounded-full flex items-start justify-center p-2">
          <motion.div
            className="w-1.5 h-1.5 bg-white/60 rounded-full"
            animate={{ y: [0, 12, 0] }}
            transition={{ duration: 2, repeat: Infinity }}
          />
        </div>
      </motion.div>
    </section>
  );
}
