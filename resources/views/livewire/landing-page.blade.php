<div>
    <!-- Navigation -->
    <nav class="nav">
        <div class="container nav-inner">
            <a href="#" class="logo">
                <span class="logo-dot"></span>
                neonflow
            </a>

            <ul class="nav-menu">
                <li><a href="#home">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>

            <a href="#contact" class="nav-cta">Get Started</a>

            <button class="mobile-toggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-circle"></i>
                    Available for new projects
                </div>

                <h1 class="hero-title">
                    Build the future<br>
                    with <span class="highlight">NeonFlow</span>
                </h1>

                <p class="hero-desc">
                    We craft digital experiences that drive growth. Modern solutions
                    for modern businesses with cutting-edge technology.
                </p>

                <div class="hero-btns">
                    <a href="#contact" class="btn btn-primary">
                        Start Project
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="#features" class="btn btn-ghost">
                        <i class="fas fa-play"></i>
                        View Demo
                    </a>
                </div>

                <div class="hero-stats">
                    <div class="stat">
                        <h4>500+</h4>
                        <p>Projects Completed</p>
                    </div>
                    <div class="stat">
                        <h4>99.9%</h4>
                        <p>Uptime Guaranteed</p>
                    </div>
                    <div class="stat">
                        <h4>24/7</h4>
                        <p>Expert Support</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <div class="section-header">
                <p class="section-label">Features</p>
                <h2 class="section-title">Why choose us</h2>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>Lightning Fast</h3>
                    <p>Optimized performance with sub-second load times. Built for speed from the ground up.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-halved"></i>
                    </div>
                    <h3>Enterprise Security</h3>
                    <p>Bank-grade encryption and security protocols to keep your data safe and protected.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3>Clean Code</h3>
                    <p>Maintainable, scalable codebase following industry best practices and standards.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <h3>Cloud Native</h3>
                    <p>Built for the cloud with auto-scaling, high availability, and global distribution.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Analytics</h3>
                    <p>Real-time insights and comprehensive analytics dashboard for data-driven decisions.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>24/7 Support</h3>
                    <p>Round-the-clock expert support team ready to help whenever you need assistance.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            <div class="section-header">
                <p class="section-label">Services</p>
                <h2 class="section-title">What we offer</h2>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <span class="service-num">01</span>
                    <h3>Web Development</h3>
                    <p>Custom web applications built with modern frameworks and technologies.</p>
                    <ul class="service-list">
                        <li><i class="fas fa-check"></i> Laravel & PHP</li>
                        <li><i class="fas fa-check"></i> React & Vue.js</li>
                        <li><i class="fas fa-check"></i> Next.js & Nuxt</li>
                    </ul>
                </div>

                <div class="service-card featured">
                    <span class="service-badge">Popular</span>
                    <span class="service-num">02</span>
                    <h3>Mobile Apps</h3>
                    <p>Native and cross-platform mobile applications for iOS and Android.</p>
                    <ul class="service-list">
                        <li><i class="fas fa-check"></i> React Native</li>
                        <li><i class="fas fa-check"></i> Flutter</li>
                        <li><i class="fas fa-check"></i> Native iOS/Android</li>
                    </ul>
                </div>

                <div class="service-card">
                    <span class="service-num">03</span>
                    <h3>Cloud Solutions</h3>
                    <p>Scalable cloud infrastructure and DevOps automation services.</p>
                    <ul class="service-list">
                        <li><i class="fas fa-check"></i> AWS & GCP</li>
                        <li><i class="fas fa-check"></i> Docker & K8s</li>
                        <li><i class="fas fa-check"></i> CI/CD Pipelines</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="section-header">
                <p class="section-label">Testimonials</p>
                <h2 class="section-title">What clients say</h2>
            </div>

            <div class="testimonial-wrapper">
                <div class="testimonial-card {{ $activeTestimonial == 0 ? 'active' : '' }}">
                    <p class="testimonial-quote">
                        "NeonFlow transformed our digital presence completely. The team delivered beyond expectations with exceptional attention to detail."
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h4>Sarah Johnson</h4>
                            <span>CEO, TechVenture</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card {{ $activeTestimonial == 1 ? 'active' : '' }}">
                    <p class="testimonial-quote">
                        "Incredible work ethic and technical expertise. They built exactly what we envisioned, on time and within budget."
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h4>Michael Chen</h4>
                            <span>Founder, StartupX</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card {{ $activeTestimonial == 2 ? 'active' : '' }}">
                    <p class="testimonial-quote">
                        "The support team is phenomenal. Any issue we had was resolved within hours. Truly a reliable technology partner."
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h4>Emily Rodriguez</h4>
                            <span>CTO, CloudBase</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-nav">
                    @for ($i = 0; $i < 3; $i++)
                        <button
                        wire:click="setTestimonial({{ $i }})"
                        class="nav-dot {{ $activeTestimonial == $i ? 'active' : '' }}"></button>
                        @endfor
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <p class="section-label">Contact</p>
                    <h2>Let's work together</h2>
                    <p>Ready to start your next project? Get in touch and let's create something amazing together.</p>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-location-dot"></i>
                        </div>
                        <div>
                            <h4>Address</h4>
                            <p>123 Tech Street, Jakarta</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h4>Phone</h4>
                            <p>+62 21 1234 5678</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4>Email</h4>
                            <p>hello@neonflow.dev</p>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    @if (session()->has('success'))
                    <div class="form-success">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                    @endif

                    <form wire:submit.prevent="submitContact">
                        <div class="form-group">
                            <label class="form-label">Full Name</label>
                            <input
                                type="text"
                                class="form-input"
                                placeholder="John Doe"
                                wire:model="name">
                            @error('name') <span class="form-error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input
                                type="email"
                                class="form-input"
                                placeholder="john@example.com"
                                wire:model="email">
                            @error('email') <span class="form-error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Message</label>
                            <textarea
                                class="form-input"
                                rows="4"
                                placeholder="Tell us about your project..."
                                wire:model="message"></textarea>
                            @error('message') <span class="form-error">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-full" wire:loading.attr="disabled">
                            <span wire:loading.remove>
                                Send Message
                                <i class="fas fa-paper-plane"></i>
                            </span>
                            <span wire:loading>
                                <i class="fas fa-spinner fa-spin"></i>
                                Sending...
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="#" class="logo">
                        <span class="logo-dot"></span>
                        neonflow
                    </a>
                    <p>Building digital experiences that drive growth and innovation.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <div>
                    <h4 class="footer-title">Services</h4>
                    <ul class="footer-links">
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Mobile Apps</a></li>
                        <li><a href="#">Cloud Solutions</a></li>
                        <li><a href="#">UI/UX Design</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="footer-title">Company</h4>
                    <ul class="footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="footer-title">Legal</h4>
                    <ul class="footer-links">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} NeonFlow. All rights reserved.</p>
            </div>
        </div>
    </footer>
</div>