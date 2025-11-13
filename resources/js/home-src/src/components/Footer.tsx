import { motion } from 'motion/react';
import { Facebook, Twitter, Linkedin, Instagram, Mail, Phone, MapPin } from 'lucide-react';
// Use secondary logo from public assets for homepage
const logoImage = '/images/secondary logo.png';

export function Footer() {
  const footerLinks = {
    Product: ['Features', 'Pricing', 'Integrations', 'API', 'Changelog'],
    Company: ['About Us', 'Careers', 'Press Kit', 'Partners', 'Contact'],
    Resources: ['Blog', 'Help Center', 'Documentation', 'Community', 'Events'],
    Legal: ['Privacy Policy', 'Terms of Service', 'Cookie Policy', 'GDPR', 'Compliance'],
  };

  return (
    <footer className="relative bg-gradient-to-b from-[#2a2850] to-[#1a1a2e] pt-24 pb-12">
      <div className="max-w-7xl mx-auto px-8">
        {/* Main Footer Content */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-12 mb-16">
          {/* Brand Column */}
          <div className="lg:col-span-2">
            <motion.div
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.6 }}
            >
        <img src={logoImage} alt="PowerAD Secondary Logo" className="h-12 mb-4" />
              <p className="text-white/60 mb-6 leading-relaxed">
                Africa's first digital marketplace and workflow hub for outdoor advertising. Connecting Africa's OOH ecosystem.
              </p>

              {/* Social Links */}
              <div className="flex gap-3">
                <a
                  href="#"
                  className="w-10 h-10 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white/10 hover:border-[#F58634]/30 transition-all"
                >
                  <Facebook className="w-5 h-5 text-white/70" />
                </a>
                <a
                  href="#"
                  className="w-10 h-10 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white/10 hover:border-[#F58634]/30 transition-all"
                >
                  <Twitter className="w-5 h-5 text-white/70" />
                </a>
                <a
                  href="#"
                  className="w-10 h-10 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white/10 hover:border-[#F58634]/30 transition-all"
                >
                  <Linkedin className="w-5 h-5 text-white/70" />
                </a>
                <a
                  href="#"
                  className="w-10 h-10 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center hover:bg-white/10 hover:border-[#F58634]/30 transition-all"
                >
                  <Instagram className="w-5 h-5 text-white/70" />
                </a>
              </div>
            </motion.div>
          </div>

          {/* Links Columns */}
          {Object.entries(footerLinks).map(([category, links], index) => (
            <motion.div
              key={category}
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ delay: index * 0.1, duration: 0.6 }}
            >
              <h3 className="text-white mb-4">{category}</h3>
              <ul className="space-y-3">
                {links.map((link) => (
                  <li key={link}>
                    <a
                      href="#"
                      className="text-white/60 hover:text-[#F58634] transition-colors text-sm"
                    >
                      {link}
                    </a>
                  </li>
                ))}
              </ul>
            </motion.div>
          ))}
        </div>

        {/* Contact Info */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
          className="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-8 mb-12"
        >
          <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div className="flex items-start gap-3">
              <MapPin className="w-5 h-5 text-[#F58634] mt-1" />
              <div>
                <div className="text-white mb-1">Address</div>
                <div className="text-white/60 text-sm">31 Parakou Street, Wuse II, Abuja, Nigeria </div>
              </div>
            </div>

            <div className="flex items-start gap-3">
              <Mail className="w-5 h-5 text-[#F58634] mt-1" />
              <div>
                <div className="text-white mb-1">Email</div>
                <div className="text-white/60 text-sm"> hello@poweradinternational.com</div>
              </div>
            </div>

            <div className="flex items-start gap-3">
              <Phone className="w-5 h-5 text-[#F58634] mt-1" />
              <div>
                <div className="text-white mb-1">Phone</div>
                <div className="text-white/60 text-sm">0901 777 7728</div>
              </div>
            </div>
          </div>
        </motion.div>

        {/* Regulatory Badges */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.6 }}
          className="flex flex-wrap items-center justify-center gap-8 mb-12 pb-12 border-b border-white/10"
        >
          {/* APCON badge removed as requested */}

          {/* LASAA badge removed as requested */}

          <div className="flex items-center gap-2 text-white/60 text-sm">
            <img
              src="https://flagicons.lipis.dev/flags/4x3/ng.svg"
              alt="Nigeria flag"
              className="w-8 h-8 rounded object-cover"
            />
            <span>Made in Nigeria</span>
            <img
              src="https://flagicons.lipis.dev/flags/4x3/ng.svg"
              alt="Nigeria flag"
              className="w-8 h-8 rounded object-cover"
            />
          </div>
        </motion.div>

        {/* Bottom Bar */}
        <div className="flex flex-col md:flex-row items-center justify-between gap-4 text-white/40 text-sm">
          <div>
            © 2025 PowerAD International. All rights reserved.
          </div>
          <div className="flex gap-6">
            <a href="#" className="hover:text-white/60 transition-colors">
              Privacy
            </a>
            <a href="#" className="hover:text-white/60 transition-colors">
              Terms
            </a>
            <a href="#" className="hover:text-white/60 transition-colors">
              Cookies
            </a>
          </div>
        </div>
      </div>
    </footer>
  );
}
