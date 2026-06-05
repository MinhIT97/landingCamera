document.addEventListener('DOMContentLoaded', () => {
    // 1. Navbar Scrolled State
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // 2. Testimonial Slider
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
        const cardsPerView = getCardsPerView();
        const maxIndex = Math.max(0, cards.length - cardsPerView);
        
        if (currentIndex > maxIndex) {
            currentIndex = maxIndex;
        }
        
        const cardWidth = cards[0].getBoundingClientRect().width;
        const gap = 24; // matches gap in CSS
        const offset = currentIndex * (cardWidth + gap);
        
        track.style.transform = `translateX(-${offset}px)`;
        
        // Update arrow button opacity
        prevBtn.style.opacity = currentIndex === 0 ? '0.5' : '1';
        nextBtn.style.opacity = currentIndex === maxIndex ? '0.5' : '1';
    }

    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateSlider();
        }
    });

    nextBtn.addEventListener('click', () => {
        const cardsPerView = getCardsPerView();
        const maxIndex = Math.max(0, cards.length - cardsPerView);
        if (currentIndex < maxIndex) {
            currentIndex++;
            updateSlider();
        }
    });

    // Handle resize
    window.addEventListener('resize', () => {
        updateSlider();
    });
    
    // Initial call
    setTimeout(updateSlider, 100);

    // 3. Booking Modal
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
            modalTitle.textContent = `Đăng Ký Thuê: ${currentSelectedPackage}`;
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    });

    function closeModal() {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    closeBtn.addEventListener('click', closeModal);
    
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });

    // 4. Form Submission
    bookingForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        const submitBtn = bookingForm.querySelector('.btn-submit');
        const originalText = submitBtn.textContent;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang xử lý...';

        const name = document.getElementById('fullName').value;
        const phone = document.getElementById('phoneNum').value;
        const facebook = document.getElementById('emailAddr').value;
        const booking_date = document.getElementById('dateSelect').value;
        const message = document.getElementById('messageText').value;

        fetch('/booking', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                name,
                phone,
                facebook,
                booking_date,
                message,
                package: currentSelectedPackage
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Reset form and close modal
                bookingForm.reset();
                closeModal();
                
                // Show toast notification
                showToast();
            } else {
                alert('Có lỗi xảy ra: ' + (data.message || 'Không thể gửi yêu cầu.'));
            }
        })
        .catch(err => {
            console.error(err);
            alert('Có lỗi mạng xảy ra. Vui lòng thử lại!');
        })
        .finally(() => {
            // Restore button
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        });
    });

    function showToast() {
        toast.classList.add('active');
        setTimeout(() => {
            toast.classList.remove('active');
        }, 4000);
    }
    
    // Smooth scrolling for navigation links
    document.querySelectorAll('.nav-link').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId.startsWith('#')) {
                e.preventDefault();
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    // Remove active from all links
                    document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                    // Add active to current
                    this.classList.add('active');
                    
                    const offsetPosition = targetElement.offsetTop - 80;
                    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
});
