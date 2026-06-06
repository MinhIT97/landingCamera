document.addEventListener('DOMContentLoaded', () => {

    // ═══════════════════════════════════════════
    // 0. Theme Switcher
    // ═══════════════════════════════════════════
    const themeToggle = document.getElementById('themeToggleBtn');
    const themePanel = document.getElementById('themePanel');
    const themeOptions = document.querySelectorAll('.theme-option');
    const html = document.documentElement;

    // Load saved theme
    const savedTheme = localStorage.getItem('mew_theme') || 'mint';
    html.setAttribute('data-theme', '');
    if (savedTheme !== 'mint') {
        html.setAttribute('data-theme', savedTheme);
    }
    updateActiveTheme(savedTheme);

    // Toggle panel
    if (themeToggle && themePanel) {
        themeToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            themePanel.classList.toggle('open');
        });

        document.addEventListener('click', (e) => {
            if (!themePanel.contains(e.target) && e.target !== themeToggle) {
                themePanel.classList.remove('open');
            }
        });
    }

    // Select theme
    themeOptions.forEach(option => {
        option.addEventListener('click', () => {
            const theme = option.getAttribute('data-theme');
            if (theme === 'mint') {
                html.removeAttribute('data-theme');
            } else {
                html.setAttribute('data-theme', theme);
            }
            localStorage.setItem('mew_theme', theme);
            updateActiveTheme(theme);
            themePanel.classList.remove('open');
        });
    });

    function updateActiveTheme(theme) {
        themeOptions.forEach(opt => {
            opt.classList.toggle('active', opt.getAttribute('data-theme') === theme);
        });
    }

    // ═══════════════════════════════════════════
    // 1. Scroll Progress Bar
    // ═══════════════════════════════════════════
    const progressBar = document.getElementById('scrollProgress');
    window.addEventListener('scroll', () => {
        const scrollTop = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const progress = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
        if (progressBar) progressBar.style.width = progress + '%';
    });

    // ═══════════════════════════════════════════
    // 2. Navbar Scrolled State
    // ═══════════════════════════════════════════
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // ═══════════════════════════════════════════
    // 3. Hero Particles Canvas
    // ═══════════════════════════════════════════
    const canvas = document.getElementById('heroParticles');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        let particles = [];
        let animationId;

        function getParticleRGB() {
            const style = getComputedStyle(document.documentElement);
            const rgb = style.getPropertyValue('--particle-rgb').trim();
            return rgb || '16, 185, 129';
        }

        function resizeCanvas() {
            const hero = document.getElementById('heroSection');
            canvas.width = hero.offsetWidth;
            canvas.height = hero.offsetHeight;
        }

        function createParticles() {
            const count = Math.min(60, Math.floor(canvas.width / 20));
            particles = [];
            for (let i = 0; i < count; i++) {
                particles.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height,
                    radius: Math.random() * 2 + 0.5,
                    vx: (Math.random() - 0.5) * 0.3,
                    vy: (Math.random() - 0.5) * 0.3,
                    opacity: Math.random() * 0.5 + 0.1,
                    pulseSpeed: Math.random() * 0.02 + 0.005,
                    pulseDir: 1
                });
            }
        }

        function drawParticles() {
            const rgb = getParticleRGB();
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => {
                p.x += p.vx;
                p.y += p.vy;
                if (p.x < 0 || p.x > canvas.width) p.vx *= -1;
                if (p.y < 0 || p.y > canvas.height) p.vy *= -1;
                p.opacity += p.pulseSpeed * p.pulseDir;
                if (p.opacity >= 0.6) p.pulseDir = -1;
                if (p.opacity <= 0.1) p.pulseDir = 1;

                ctx.beginPath();
                ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(${rgb}, ${p.opacity})`;
                ctx.fill();
            });

            for (let i = 0; i < particles.length; i++) {
                for (let j = i + 1; j < particles.length; j++) {
                    const dx = particles[i].x - particles[j].x;
                    const dy = particles[i].y - particles[j].y;
                    const dist = Math.sqrt(dx * dx + dy * dy);
                    if (dist < 120) {
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        ctx.strokeStyle = `rgba(${rgb}, ${0.04 * (1 - dist / 120)})`;
                        ctx.lineWidth = 0.5;
                        ctx.stroke();
                    }
                }
            }

            animationId = requestAnimationFrame(drawParticles);
        }

        resizeCanvas();
        createParticles();
        drawParticles();

        window.addEventListener('resize', () => {
            resizeCanvas();
            createParticles();
        });
    }

    // ═══════════════════════════════════════════
    // 4. Intersection Observer — Reveal on Scroll
    // ═══════════════════════════════════════════
    const revealElements = document.querySelectorAll('.reveal');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

    revealElements.forEach(el => revealObserver.observe(el));

    // ═══════════════════════════════════════════
    // 5. Stats Counter Animation
    // ═══════════════════════════════════════════
    const statNumbers = document.querySelectorAll('.stat-number');
    let statsAnimated = false;

    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !statsAnimated) {
                statsAnimated = true;
                statNumbers.forEach(stat => {
                    const target = parseFloat(stat.getAttribute('data-target'));
                    const isDecimal = stat.getAttribute('data-decimal') === 'true';
                    const duration = 2000;
                    const startTime = performance.now();

                    function updateCounter(currentTime) {
                        const elapsed = currentTime - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        const eased = 1 - Math.pow(1 - progress, 3);
                        const current = (target * eased);
                        stat.textContent = isDecimal ? current.toFixed(1) : Math.floor(current);
                        if (progress < 1) {
                            requestAnimationFrame(updateCounter);
                        } else {
                            stat.textContent = isDecimal ? target.toFixed(1) : target;
                        }
                    }
                    requestAnimationFrame(updateCounter);
                });
                statsObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    const statsSection = document.querySelector('.stats-section');
    if (statsSection) statsObserver.observe(statsSection);

    // ═══════════════════════════════════════════
    // 6. Testimonial Slider
    // ═══════════════════════════════════════════
    const track = document.querySelector('.testimonial-track');
    const cards = document.querySelectorAll('.testimonial-card');
    const prevBtn = document.querySelector('.t-prev');
    const nextBtn = document.querySelector('.t-next');
    let currentIndex = 0;

    function getCardsPerView() {
        if (window.innerWidth <= 768) return 1;
        if (window.innerWidth <= 1200) return 2;
        return 3;
    }

    function updateSlider() {
        if (!track || !cards.length) return;
        const cardsPerView = getCardsPerView();
        const maxIndex = Math.max(0, cards.length - cardsPerView);
        if (currentIndex > maxIndex) currentIndex = maxIndex;
        const cardWidth = cards[0].getBoundingClientRect().width;
        const gap = 24;
        const offset = currentIndex * (cardWidth + gap);
        track.style.transform = `translateX(-${offset}px)`;
        if (prevBtn) prevBtn.style.opacity = currentIndex === 0 ? '0.5' : '1';
        if (nextBtn) nextBtn.style.opacity = currentIndex === maxIndex ? '0.5' : '1';
    }

    if (prevBtn) prevBtn.addEventListener('click', () => { if (currentIndex > 0) { currentIndex--; updateSlider(); } });
    if (nextBtn) nextBtn.addEventListener('click', () => {
        const cpv = getCardsPerView();
        if (currentIndex < Math.max(0, cards.length - cpv)) { currentIndex++; updateSlider(); }
    });
    window.addEventListener('resize', updateSlider);

    let startX = 0, endX = 0;
    if (track) {
        track.addEventListener('touchstart', (e) => { startX = e.touches[0].clientX; }, { passive: true });
        track.addEventListener('touchmove', (e) => { endX = e.touches[0].clientX; }, { passive: true });
        track.addEventListener('touchend', () => {
            const threshold = 50;
            const cpv = getCardsPerView();
            const maxIdx = Math.max(0, cards.length - cpv);
            if (startX && endX) {
                if (startX - endX > threshold && currentIndex < maxIdx) { currentIndex++; updateSlider(); }
                else if (endX - startX > threshold && currentIndex > 0) { currentIndex--; updateSlider(); }
            }
            startX = 0; endX = 0;
        });
    }
    setTimeout(updateSlider, 100);

    // ═══════════════════════════════════════════
    // 7. Booking Modal
    // ═══════════════════════════════════════════
    const modal = document.getElementById('bookingModal');
    const modalTitle = document.getElementById('modalTitleField');
    const closeBtn = document.querySelector('.modal-close');
    const openBtns = document.querySelectorAll('.btn-book-trigger');
    const bookingForm = document.getElementById('bookingForm');
    const toast = document.getElementById('successToast');
    let currentSelectedPackage = 'Tư Vấn Đặt Lịch';

    openBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            currentSelectedPackage = btn.getAttribute('data-package') || 'Tư Vấn Đặt Lịch';
            if (modalTitle) modalTitle.textContent = `Đăng Ký Thuê: ${currentSelectedPackage}`;
            if (modal) modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    });

    function closeModal() { if (modal) modal.classList.remove('active'); document.body.style.overflow = ''; }
    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (modal) modal.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });

    if (bookingForm) {
        bookingForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const submitBtn = bookingForm.querySelector('.btn-submit');
            const originalText = submitBtn.textContent;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang xử lý...';

            const payload = {
                name: document.getElementById('fullName').value,
                phone: document.getElementById('phoneNum').value,
                facebook: document.getElementById('emailAddr').value,
                booking_date: document.getElementById('dateSelect').value,
                message: document.getElementById('messageText').value,
                package: currentSelectedPackage
            };

            fetch('/booking', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(payload)
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) { bookingForm.reset(); closeModal(); showToast(); }
                else alert('Có lỗi xảy ra: ' + (data.message || 'Không thể gửi yêu cầu.'));
            })
            .catch(err => { console.error(err); alert('Có lỗi mạng xảy ra. Vui lòng thử lại!'); })
            .finally(() => { submitBtn.disabled = false; submitBtn.textContent = originalText; });
        });
    }

    function showToast() {
        if (!toast) return;
        toast.classList.add('active');
        setTimeout(() => toast.classList.remove('active'), 4000);
    }

    // ═══════════════════════════════════════════
    // 8. FAQ Accordion
    // ═══════════════════════════════════════════
    document.querySelectorAll('.faq-question').forEach(btn => {
        btn.addEventListener('click', () => {
            const faqItem = btn.parentElement;
            const isActive = faqItem.classList.contains('active');
            document.querySelectorAll('.faq-item.active').forEach(item => {
                item.classList.remove('active');
                item.querySelector('.faq-question').setAttribute('aria-expanded', 'false');
            });
            if (!isActive) {
                faqItem.classList.add('active');
                btn.setAttribute('aria-expanded', 'true');
            }
        });
    });

    // ═══════════════════════════════════════════
    // 9. Back to Top Button
    // ═══════════════════════════════════════════
    const backToTopBtn = document.getElementById('backToTop');
    if (backToTopBtn) {
        window.addEventListener('scroll', () => {
            backToTopBtn.classList.toggle('visible', window.scrollY > 400);
        });
        backToTopBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    }

    // ═══════════════════════════════════════════
    // 10. Mobile Hamburger Menu
    // ═══════════════════════════════════════════
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenuClose = document.getElementById('mobileMenuClose');
    const navMenu = document.getElementById('navMenu');
    const navOverlay = document.getElementById('navOverlay');

    function openMobileMenu() { if (navMenu) navMenu.classList.add('active'); if (navOverlay) navOverlay.classList.add('active'); document.body.style.overflow = 'hidden'; }
    function closeMobileMenu() { if (navMenu) navMenu.classList.remove('active'); if (navOverlay) navOverlay.classList.remove('active'); document.body.style.overflow = ''; }
    if (mobileMenuToggle) mobileMenuToggle.addEventListener('click', openMobileMenu);
    if (mobileMenuClose) mobileMenuClose.addEventListener('click', closeMobileMenu);
    if (navOverlay) navOverlay.addEventListener('click', closeMobileMenu);

    // ═══════════════════════════════════════════
    // 11. Smooth scrolling for nav links
    // ═══════════════════════════════════════════
    document.querySelectorAll('.nav-link').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId && targetId.startsWith('#')) {
                e.preventDefault();
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    closeMobileMenu();
                    document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                    window.scrollTo({ top: targetElement.offsetTop - 80, behavior: 'smooth' });
                }
            }
        });
    });
});
