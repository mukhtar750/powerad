import { motion } from 'motion/react';
import { Star, Quote } from 'lucide-react';
import { Card, CardContent } from './ui/card';
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselNext,
  CarouselPrevious,
} from './ui/carousel';

export function TestimonialsSection() {
  const testimonials = [
    {
      name: 'Nanneh Kemteh-Giadom',
      role: 'Executive Director',
      company: 'The EduCapital Learning Centre',
      content: 'PowerAD helped us plan and promote our education campaigns more effectively. Smart targeting and analytics expanded our reach and deepened engagement across regions.',
      rating: 5,
      image: '/images/educapital.jpg',
    },
    {
      name: 'Opeyemi Anipole',
      role: 'CEO, Bowbonish Ltd.',
      company: 'Bowbonish Ltd.',
      content: 'PowerAD streamlined how we plan and deliver campaigns on our co-owned billboard site in Abuja. Its transparent process and effective execution improved our results and client satisfaction.',
      rating: 5,
      image: '/images/bowbosh.jpg',
    },
    {
      name: 'Nelson Ekwemadu Luke',
      role: 'CEO, Gravel Spring Ltd.',
      company: 'Gravel Spring',
      content: 'PowerAD enhanced how we promote our travel packages. Targeted placements and performance tracking increased our visibility, inquiries, and conversions.',
      rating: 5,
      image: '/images/gravel.jpg',
    },
    
  ];

  return (
    <section id="testimonials" className="relative py-24 bg-gradient-to-b from-[#2a2850] to-[#363366]">
      <div className="max-w-7xl mx-auto px-8">
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ duration: 0.8 }}
          className="text-center mb-16"
        >
          <div className="inline-block px-4 py-2 rounded-full bg-[#F58634]/10 border border-[#F58634]/20 mb-6">
            <span className="text-[#F58634] text-sm">Testimonials</span>
          </div>
          
          <h2 className="text-5xl md:text-6xl text-white mb-6">
            Loved by our{' '}
            <span className="bg-gradient-to-r from-[#F58634] to-[#ff9d5c] bg-clip-text text-transparent">
              clients
            </span>
          </h2>
          
          <p className="text-xl text-white/70 max-w-3xl mx-auto">
            See what our customers have to say about transforming their outdoor advertising business
          </p>
        </motion.div>

        <motion.div
          initial={{ opacity: 0, y: 20 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ delay: 0.2, duration: 0.8 }}
        >
          <Carousel
            opts={{
              align: "start",
              loop: true,
            }}
            className="w-full"
          >
            <CarouselContent>
              {testimonials.map((testimonial, index) => {
                const isLogo = testimonial.image.startsWith('/images/');
                return (
                <CarouselItem key={index} className="md:basis-1/2 lg:basis-1/3">
                  <Card className="bg-white/5 backdrop-blur-xl border-white/10 hover:bg-white/10 transition-all h-full">
                    <CardContent className="p-8">
                      <Quote className="w-10 h-10 text-[#F58634] mb-4" />
                      
                      <div className="flex gap-1 mb-4">
                        {[...Array(testimonial.rating)].map((_, i) => (
                          <Star key={i} className="w-5 h-5 text-[#F58634] fill-[#F58634]" />
                        ))}
                      </div>

                      <p className="text-white/80 mb-6 leading-relaxed">
                        "{testimonial.content}"
                      </p>

                      <div className="flex items-center gap-4">
                        <div className="w-12 h-12 rounded-full bg-gradient-to-br from-[#F58634] to-[#ff9d5c] overflow-hidden">
                          <img
                            src={testimonial.image}
                            alt={testimonial.name}
                            className={`w-full h-full ${isLogo ? 'object-contain bg-white p-1' : 'object-cover'}`}
                          />
                        </div>
                        <div>
                          <div className="text-white">{testimonial.name}</div>
                          <div className="text-white/60 text-sm">{testimonial.role}</div>
                          <div className="text-white/40 text-xs">{testimonial.company}</div>
                        </div>
                      </div>
                    </CardContent>
                  </Card>
                </CarouselItem>
              );})}
            </CarouselContent>
            <CarouselPrevious className="bg-white/10 border-white/20 text-white hover:bg-white/20" />
            <CarouselNext className="bg-white/10 border-white/20 text-white hover:bg-white/20" />
          </Carousel>
        </motion.div>
      </div>
    </section>
  );
}
