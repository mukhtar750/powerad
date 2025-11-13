import { motion } from 'motion/react';
import { Button } from './ui/button';
import { ArrowRight, Sparkles, Rocket } from 'lucide-react';

export function CTASection() {
  return (
    <section className="relative py-32 overflow-hidden">
      {/* Animated Background */}
      <div className="absolute inset-0 bg-gradient-to-br from-[#F58634] via-[#ff9d5c] to-[#F58634]">
        <motion.div
          className="absolute inset-0"
          animate={{
            backgroundPosition: ['0% 0%', '100% 100%'],
          }}
          transition={{
            duration: 20,
            repeat: Infinity,
            repeatType: 'reverse',
          }}
          style={{
            backgroundImage: 'radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 0%, transparent 50%), radial-gradient(circle at 80% 80%, rgba(255,255,255,0.1) 0%, transparent 50%)',
            backgroundSize: '100% 100%',
          }}
        />
      </div>

      {/* Floating Elements */}
      <div className="absolute inset-0 overflow-hidden">
        {[...Array(20)].map((_, i) => (
          <motion.div
            key={i}
            className="absolute w-2 h-2 bg-white/30 rounded-full"
            style={{
              left: `${Math.random() * 100}%`,
              top: `${Math.random() * 100}%`,
            }}
            animate={{
              y: [-20, -40, -20],
              x: [0, Math.random() * 20 - 10, 0],
              opacity: [0.3, 0.8, 0.3],
            }}
            transition={{
              duration: 3 + Math.random() * 2,
              repeat: Infinity,
              delay: Math.random() * 2,
            }}
          />
        ))}
      </div>

      <div className="relative z-10 max-w-5xl mx-auto px-8 text-center">
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.8 }}
        >
          <motion.div
            animate={{
              rotate: [0, 360],
            }}
            transition={{
              duration: 20,
              repeat: Infinity,
              ease: 'linear',
            }}
            className="inline-block mb-6"
          >
            <Rocket className="w-16 h-16 text-white" />
          </motion.div>

          <h2 className="text-6xl md:text-7xl text-white mb-6">
            Ready to Transform Your
            <br />
            <span className="inline-flex items-center gap-4">
              Advertising Game?
              <Sparkles className="w-12 h-12" />
            </span>
          </h2>

          <p className="text-2xl text-white/90 mb-12 max-w-3xl mx-auto">
            Join 500+ billboard owners and 1,000+ advertisers already using PowerAD to revolutionize outdoor advertising in Africa
          </p>

          <div className="flex flex-col sm:flex-row items-center justify-center gap-6">
            <Button
              size="lg"
              className="h-16 px-12 text-lg bg-white text-[#F58634] hover:bg-white/90 hover:scale-105 shadow-2xl group"
            >
              Start Your Journey
              <ArrowRight className="w-6 h-6 ml-2 group-hover:translate-x-2 transition-transform" />
            </Button>
            <Button
              size="lg"
              variant="outline"
              className="h-16 px-12 text-lg bg-transparent border-2 border-white text-white hover:bg-white/10 hover:scale-105"
            >
              Schedule a Demo
            </Button>
          </div>

          <p className="mt-8 text-white/70">
            No credit card required • Get started in 2 minutes • Cancel anytime
          </p>
        </motion.div>
      </div>
    </section>
  );
}
