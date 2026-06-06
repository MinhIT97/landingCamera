<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEW CAMERA - Tiệm Cho Thuê Máy Ảnh & Thiết Bị Quay Chụp</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Tiệm cho thuê máy ảnh uy tín chất lượng tại TP. HCM. Sẵn hàng Fuji XT100, Canon R50, Canon M50 và DJI Osmo Pocket 3. Thủ tục cọc đơn giản, nhanh gọn, hỗ trợ nhiệt tình.">
    <meta name="keywords" content="thuê máy ảnh, thuê máy ảnh fuji, thuê canon r50, thuê canon m50, thuê pocket 3, mew camera, tiệm cho thuê máy">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Mew Camera">

    <meta property="og:type" content="website">
    <meta property="og:title" content="MEW CAMERA - Tiệm Cho Thuê Máy Ảnh & Thiết Bị Quay Chụp">
    <meta property="og:description" content="Sẵn hàng máy ảnh và gimbal chất lượng cao. Thủ tục nhanh gọn bằng Facebook chính chủ.">
    <meta property="og:image" content="{{ asset('images/mew_logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/mew_style.css') }}?v={{ filemtime(public_path('css/mew_style.css')) }}">

    <script src="{{ asset('js/mew_app.js') }}?v={{ filemtime(public_path('js/mew_app.js')) }}" defer></script>
</head>
<body>

    <!-- Scroll Progress Bar -->
    <div class="scroll-progress" id="scrollProgress"></div>

    <!-- Header / Navbar -->
    <div class="nav-overlay" id="navOverlay"></div>
    <header class="navbar" id="mainHeader">
        <div class="container">
            <a href="#" class="logo" id="logoLink">
                <i class="fa-solid fa-cat"></i>
                <div>
                    MEW CAMERA
                    <span class="logo-sub">Tiệm cho thuê máy</span>
                </div>
            </a>

            <nav>
                <ul class="nav-menu" id="navMenu">
                    <li class="mobile-menu-header">
                        <span class="mobile-menu-title">Danh mục</span>
                        <button class="mobile-menu-close" id="mobileMenuClose" aria-label="Close menu">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </li>
                    <li><a href="#" class="nav-link active">Trang chủ</a></li>
                    <li><a href="#goithue" class="nav-link">Bảng giá</a></li>
                    <li><a href="#thutuc" class="nav-link">Thủ tục cọc</a></li>
                    <li><a href="#quytrinh" class="nav-link">Quy trình</a></li>
                    <li><a href="#faq" class="nav-link">FAQ</a></li>
                    <li><a href="#danhgia" class="nav-link">Đánh giá</a></li>
                    <li><a href="#lienhe" class="nav-link">Liên hệ</a></li>
                </ul>
            </nav>

            <div class="navbar-actions">
                <button class="btn-nav-cta btn-book-trigger" data-package="Tư Vấn Đặt Lịch" id="navCtaButton">
                    <span class="btn-text">Đặt lịch ngay</span> <i class="fa-regular fa-calendar-days"></i>
                </button>
                <button class="hamburger-btn" id="mobileMenuToggle" aria-label="Toggle menu">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="heroSection">
        <canvas id="heroParticles"></canvas>
        <div class="container">
            <div class="hero-grid">
                <div class="hero-content reveal fade-left">
                    <div class="hero-badge">
                        <i class="fa-solid fa-bolt"></i> Dịch vụ cho thuê thiết bị quay chụp tiện lợi
                    </div>
                    <h1 class="hero-title" id="mainHeroTitle">
                        MEW CAMERA<br>
                        <span>TIỆM CHO THUÊ MÁY ẢNH</span>
                    </h1>
                    <p class="hero-desc">
                        Tiệm cho thuê máy ảnh Fuji XT100, Canon R50, Canon M50 và DJI Osmo Pocket 3 chất lượng tốt. Thủ tục nhanh gọn, giá cả phải chăng, hỗ trợ setup chu đáo.
                    </p>

                    <div class="hero-features">
                        <div class="hero-feat-item">
                            <div class="hero-feat-icon"><i class="fa-solid fa-camera"></i></div>
                            <div class="hero-feat-text"><h4>Thiết bị sẵn có</h4><p>Fuji XT100, Canon R50, M50, Pocket 3</p></div>
                        </div>
                        <div class="hero-feat-item">
                            <div class="hero-feat-icon"><i class="fa-solid fa-tag"></i></div>
                            <div class="hero-feat-text"><h4>Từ 100.000đ</h4><p>Cho các gói thuê theo giờ</p></div>
                        </div>
                        <div class="hero-feat-item">
                            <div class="hero-feat-icon"><i class="fa-solid fa-id-card"></i></div>
                            <div class="hero-feat-text"><h4>Thủ tục cọc dễ dàng</h4><p>Xác minh qua Facebook chính chủ</p></div>
                        </div>
                    </div>

                    <div class="hero-actions">
                        <button class="btn-gold btn-book-trigger" data-package="Đặt Thuê Thiết Bị">
                            ĐẶT THUÊ NGAY <i class="fa-solid fa-arrow-right"></i>
                        </button>
                        <a href="#goithue" class="btn-outline">XEM BẢNG GIÁ</a>
                    </div>
                </div>

                <div class="hero-image-wrapper reveal fade-right">
                    <div class="hero-image-glow"></div>
                    <img src="{{ asset('images/hero_camera.png') }}" alt="Canon EOS Professional Camera" class="hero-image" id="heroImage">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Counter Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item reveal fade-up">
                    <div class="stat-icon"><i class="fa-solid fa-camera-retro"></i></div>
                    <div class="stat-number" data-target="500">0</div>
                    <div class="stat-suffix">+</div>
                    <p class="stat-label">Lượt thuê máy</p>
                </div>
                <div class="stat-item reveal fade-up" style="transition-delay: 0.1s;">
                    <div class="stat-icon"><i class="fa-solid fa-star"></i></div>
                    <div class="stat-number" data-target="4.9" data-decimal="true">0</div>
                    <p class="stat-label">Đánh giá trung bình</p>
                </div>
                <div class="stat-item reveal fade-up" style="transition-delay: 0.2s;">
                    <div class="stat-icon"><i class="fa-solid fa-box"></i></div>
                    <div class="stat-number" data-target="4">0</div>
                    <p class="stat-label">Thiết bị sẵn có</p>
                </div>
                <div class="stat-item reveal fade-up" style="transition-delay: 0.3s;">
                    <div class="stat-icon"><i class="fa-solid fa-clock"></i></div>
                    <div class="stat-number" data-target="5">0</div>
                    <p class="stat-label">Phút xác minh cọc</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Rental Pricing Section -->
    <section class="packages" id="goithue">
        <div class="container">
            <div class="section-header reveal fade-up" style="text-align: center;">
                <span class="section-tag" style="justify-content: center;">BẢNG GIÁ DỊCH VỤ</span>
                <h2 class="section-title" style="margin-top: 10px;">THIẾT BỊ HIỆN CÓ</h2>
            </div>

            <div class="packages-grid">
                <!-- Fuji XT100 -->
                <div class="pkg-card reveal fade-up">
                    <h3 class="pkg-title">Fuji XT100</h3>
                    <p class="pkg-desc">Màu ảnh retro film đặc trưng cực đẹp</p>
                    <div class="pkg-img-box"><img src="{{ asset('images/prod_fuji_xt100.png') }}" alt="Fuji XT100"></div>
                    <div class="pkg-price-table">
                        <div class="pkg-price-row"><span class="time">6 Giờ</span><span class="price">100.000đ</span></div>
                        <div class="pkg-price-row"><span class="time">12 Giờ</span><span class="price">170.000đ</span></div>
                        <div class="pkg-price-row"><span class="time">1 Ngày</span><span class="price">220.000đ</span></div>
                        <div class="pkg-price-row"><span class="time">2 Ngày</span><span class="price">370.000đ</span></div>
                    </div>
                    <button class="btn-pkg btn-book-trigger" data-package="Fuji XT100">ĐẶT THUÊ</button>
                </div>

                <!-- Canon R50 (Featured) -->
                <div class="pkg-card featured reveal fade-up" style="transition-delay: 0.1s;">
                    <div class="pkg-badge"><i class="fa-solid fa-star"></i></div>
                    <h3 class="pkg-title">Canon R50</h3>
                    <p class="pkg-desc">Lấy nét siêu nhanh, quay phim 4K sắc nét</p>
                    <div class="pkg-img-box"><img src="{{ asset('images/prod_canon_r50.png') }}" alt="Canon R50"></div>
                    <div class="pkg-price-table">
                        <div class="pkg-price-row"><span class="time">6 Giờ</span><span class="price">140.000đ</span></div>
                        <div class="pkg-price-row"><span class="time">12 Giờ</span><span class="price">190.000đ</span></div>
                        <div class="pkg-price-row"><span class="time">1 Ngày</span><span class="price">260.000đ</span></div>
                        <div class="pkg-price-row"><span class="time">2 Ngày</span><span class="price">420.000đ</span></div>
                    </div>
                    <button class="btn-pkg btn-book-trigger" data-package="Canon R50">ĐẶT THUÊ</button>
                </div>

                <!-- Canon M50 -->
                <div class="pkg-card reveal fade-up" style="transition-delay: 0.2s;">
                    <h3 class="pkg-title">Canon M50</h3>
                    <p class="pkg-desc">Nhỏ gọn, màn hình xoay lật, màu da hồng hào</p>
                    <div class="pkg-img-box"><img src="{{ asset('images/prod_canon_m50.png') }}" alt="Canon M50"></div>
                    <div class="pkg-price-table">
                        <div class="pkg-price-row"><span class="time">6 Giờ</span><span class="price">120.000đ</span></div>
                        <div class="pkg-price-row"><span class="time">12 Giờ</span><span class="price">160.000đ</span></div>
                        <div class="pkg-price-row"><span class="time">1 Ngày</span><span class="price">200.000đ</span></div>
                        <div class="pkg-price-row"><span class="time">2 Ngày</span><span class="price">340.000đ</span></div>
                    </div>
                    <button class="btn-pkg btn-book-trigger" data-package="Canon M50">ĐẶT THUÊ</button>
                </div>

                <!-- Pocket 3 -->
                <div class="pkg-card reveal fade-up" style="transition-delay: 0.3s;">
                    <h3 class="pkg-title">POCKET 3</h3>
                    <p class="pkg-desc">Gimbal bỏ túi quay vlog mượt mà đỉnh cao</p>
                    <div class="pkg-img-box"><img src="{{ asset('images/prod_pocket3.png') }}" alt="Pocket 3"></div>
                    <div class="pkg-price-table">
                        <div class="pkg-price-row" style="margin-top: 19px;"><span class="time">8 Giờ</span><span class="price">110.000đ</span></div>
                        <div class="pkg-price-row" style="padding-top: 20px; padding-bottom: 20px;"><span class="time">1 Ngày</span><span class="price">190.000đ</span></div>
                        <div class="pkg-price-row" style="padding-bottom: 19px; border-bottom: none;"><span class="time">2 Ngày</span><span class="price">320.000đ</span></div>
                    </div>
                    <button class="btn-pkg btn-book-trigger" data-package="Pocket 3">ĐẶT THUÊ</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Deposit Policy Section -->
    <section class="policy-section" id="thutuc">
        <div class="container">
            <div class="section-header reveal fade-up">
                <span class="section-tag">THỦ TỤC & QUY ĐỊNH</span>
                <h2 class="section-title">THỦ TỤC CỌC THIẾT BỊ</h2>
            </div>

            <div class="policy-grid">
                <div class="policy-card reveal fade-left">
                    <h3><i class="fa-solid fa-address-card" style="color: var(--primary)"></i> Phương án cọc (Facebook chính chủ)</h3>
                    <ul class="policy-list" style="margin-top: 20px;">
                        <li class="policy-item">
                           <div class="policy-item-icon"><i class="fa-solid fa-1"></i></div>
                           <div class="policy-item-text"><h4>Phương án 1</h4><p>Căn cước công dân (CCCD) gốc + tiền cọc <strong>1.500.000đ</strong></p></div>
                        </li>
                        <li class="policy-item">
                           <div class="policy-item-icon"><i class="fa-solid fa-2"></i></div>
                           <div class="policy-item-text"><h4>Phương án 2</h4><p>2 Căn cước công dân (CCCD) gốc + tiền cọc <strong>500.000đ</strong></p></div>
                        </li>
                        <li class="policy-item">
                           <div class="policy-item-icon"><i class="fa-solid fa-3"></i></div>
                           <div class="policy-item-text"><h4>Phương án 3</h4><p>Căn cước công dân (CCCD) gốc + tài sản có giá trị tương đương (Laptop, xe máy...)</p></div>
                        </li>
                    </ul>
                </div>

                <div class="policy-card reveal fade-right" style="display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <h3><i class="fa-solid fa-circle-info" style="color: var(--primary)"></i> Lưu ý về thời gian</h3>
                        <ul class="policy-list" style="margin-top: 20px;">
                            <li class="policy-item">
                                <div class="policy-item-icon"><i class="fa-solid fa-clock"></i></div>
                                <div class="policy-item-text"><h4>Phí phát sinh ngoài giờ</h4><p>Trường hợp trả máy muộn hơn thỏa thuận: <strong>+30.000đ / giờ</strong></p></div>
                            </li>
                        </ul>
                    </div>
                    <div class="responsibility-box">
                        <h4><i class="fa-solid fa-circle-exclamation"></i> Trách nhiệm hư hại thiết bị:</h4>
                        <p>Trường hợp phát hiện lỗi hỏng hóc hoặc trầy xước xảy ra trong quá trình sử dụng, người thuê chịu <strong>100% chi phí sửa chữa</strong> của thiết bị.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="why-us">
        <div class="container">
            <div class="why-us-grid">
                <div class="why-us-card reveal fade-up">
                    <div class="why-us-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <div class="why-us-content"><h4>Thiết bị tốt,</h4><p>sạch sẽ sẵn dùng</p></div>
                </div>
                <div class="why-us-card reveal fade-up" style="transition-delay: 0.1s;">
                    <div class="why-us-icon"><i class="fa-solid fa-truck"></i></div>
                    <div class="why-us-content"><h4>Nhận máy</h4><p>nhanh gọn</p></div>
                </div>
                <div class="why-us-card reveal fade-up" style="transition-delay: 0.2s;">
                    <div class="why-us-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                    <div class="why-us-content"><h4>Hỗ trợ</h4><p>hướng dẫn setup cơ bản</p></div>
                </div>
                <div class="why-us-card reveal fade-up" style="transition-delay: 0.3s;">
                    <div class="why-us-icon"><i class="fa-solid fa-rotate"></i></div>
                    <div class="why-us-content"><h4>Hỗ trợ đổi</h4><p>nếu phát sinh lỗi máy</p></div>
                </div>
                <div class="why-us-card reveal fade-up" style="transition-delay: 0.4s;">
                    <div class="why-us-icon"><i class="fa-solid fa-circle-dollar-to-slot"></i></div>
                    <div class="why-us-content"><h4>Giá rõ ràng,</h4><p>đúng niêm yết</p></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Rental Process -->
    <section class="process" id="quytrinh">
        <div class="container">
            <div class="section-header reveal fade-up">
                <span class="section-tag">QUY TRÌNH THUÊ MÁY</span>
            </div>
            <div class="process-timeline">
                <div class="process-step reveal fade-up">
                    <div class="process-icon-box"><i class="fa-solid fa-camera"></i></div>
                    <h4 class="process-step-num">1. Chọn thiết bị</h4>
                    <p class="process-step-title">Chọn máy ảnh Fuji, Canon hoặc Pocket 3</p>
                </div>
                <div class="process-step reveal fade-up" style="transition-delay: 0.1s;">
                    <div class="process-icon-box"><i class="fa-regular fa-calendar-days"></i></div>
                    <h4 class="process-step-num">2. Đặt lịch</h4>
                    <p class="process-step-title">Thống nhất thời gian thuê cụ thể</p>
                </div>
                <div class="process-step reveal fade-up" style="transition-delay: 0.2s;">
                    <div class="process-icon-box"><i class="fa-solid fa-address-card"></i></div>
                    <h4 class="process-step-num">3. Xác minh giấy tờ</h4>
                    <p class="process-step-title">Xác minh danh tính qua Facebook chính chủ</p>
                </div>
                <div class="process-step reveal fade-up" style="transition-delay: 0.3s;">
                    <div class="process-icon-box"><i class="fa-solid fa-box-open"></i></div>
                    <h4 class="process-step-num">4. Nhận máy & Cọc</h4>
                    <p class="process-step-title">Nhận máy, thanh toán và cọc theo gói chọn</p>
                </div>
                <div class="process-step reveal fade-up" style="transition-delay: 0.4s;">
                    <div class="process-icon-box"><i class="fa-solid fa-circle-check"></i></div>
                    <h4 class="process-step-num">5. Trả máy</h4>
                    <p class="process-step-title">Trả máy đúng hẹn, kiểm tra máy và nhận lại cọc</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section" id="faq">
        <div class="container">
            <div class="section-header reveal fade-up">
                <span class="section-tag">CÂU HỎI THƯỜNG GẶP</span>
                <h2 class="section-title">FAQ</h2>
            </div>
            <div class="faq-list">
                <div class="faq-item reveal fade-up">
                    <button class="faq-question" aria-expanded="false">
                        <span>Tôi cần chuẩn bị gì khi đến thuê máy?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <div class="faq-answer"><p>Bạn chỉ cần mang theo CCCD gốc và Facebook cá nhân (đã dùng trên 1 năm) để xác minh danh tính. Tiệm hỗ trợ tối đa về thủ tục giấy tờ.</p></div>
                </div>
                <div class="faq-item reveal fade-up">
                    <button class="faq-question" aria-expanded="false">
                        <span>Có thể thuê máy qua đêm không? Phí phát sinh ra sao?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <div class="faq-answer"><p>Có, bạn hoàn toàn có thể thuê qua đêm. Nếu trả máy muộn hơn thời gian đã thỏa thuận, phí phát sinh là 30.000đ/giờ. Hãy báo trước với tiệm nếu bạn cần thêm thời gian.</p></div>
                </div>
                <div class="faq-item reveal fade-up">
                    <button class="faq-question" aria-expanded="false">
                        <span>Máy có kèm thẻ nhớ, pin, sạc không?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <div class="faq-answer"><p>Tất cả máy đều có pin và sạc đi kèm. Thẻ nhớ có thể được cung cấp theo yêu cầu (vui lòng báo trước khi đặt lịch). Bạn cũng có thể dùng thẻ nhớ cá nhân.</p></div>
                </div>
                <div class="faq-item reveal fade-up">
                    <button class="faq-question" aria-expanded="false">
                        <span>Nếu máy gặp sự cố trong lúc thuê thì sao?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <div class="faq-answer"><p>Hãy liên hệ ngay với tiệm qua Zalo/SĐT. Nếu lỗi từ thiết bị (không do người dùng), tiệm sẽ đổi máy khác cho bạn hoặc hoàn tiền. Nếu lỗi do người dùng gây ra, bạn sẽ chịu chi phí sửa chữa theo chính sách.</p></div>
                </div>
                <div class="faq-item reveal fade-up">
                    <button class="faq-question" aria-expanded="false">
                        <span>Tiệm có ship máy không? Khu vực nào được hỗ trợ?</span>
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <div class="faq-answer"><p>Hiện tại tiệm ưu tiên nhận máy trực tiếp tại Q.1, TP. HCM. Với đơn hàng từ 2 ngày trở lên, tiệm có thể hỗ trợ ship nội thành. Liên hệ trước để được sắp xếp.</p></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="danhgia">
        <div class="container">
            <div class="section-header reveal fade-up">
                <div><span class="section-tag">KHÁCH HÀNG NÓI GÌ VỀ MEW CAMERA</span></div>
                <div class="testimonial-arrows">
                    <button class="testimonial-arrow t-prev" aria-label="Previous review"><i class="fa-solid fa-chevron-left"></i></button>
                    <button class="testimonial-arrow t-next" aria-label="Next review"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
            <div class="testimonial-slider-container">
                <div class="testimonial-track">
                    <div class="testimonial-card">
                        <div>
                            <div class="t-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                            <p class="t-text">"Thuê chiếc Fuji XT100 chụp ảnh kỷ yếu, màu ảnh xuất sắc không cần chỉnh sửa nhiều. Tiệm hỗ trợ hướng dẫn dùng cực kỳ chi tiết cho đứa mới dùng như mình!"</p>
                        </div>
                        <div class="t-user">
                            <img src="{{ asset('images/avatar_minhduc.png') }}" alt="Minh Đức" class="t-avatar">
                            <div class="t-info"><h4>Minh Đức</h4><p>Học sinh THPT</p></div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <div>
                            <div class="t-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                            <p class="t-text">"Mình hay thuê Canon R50 ở tiệm để đi quay sản phẩm vlog. Máy lấy nét nhanh, nhỏ nhẹ mang đi đi lại lại cả ngày không mỏi tay. Giá rất vừa túi tiền."</p>
                        </div>
                        <div class="t-user">
                            <img src="{{ asset('images/avatar_khanhlinh.png') }}" alt="Khánh Linh" class="t-avatar">
                            <div class="t-info"><h4>Khánh Linh</h4><p>Content Creator</p></div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <div>
                            <div class="t-stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                            <p class="t-text">"Thủ tục cọc bên tiệm rất linh hoạt và tạo điều kiện cho các bạn làm phim độc lập. Máy Pocket 3 hoạt động ổn định, chống rung tuyệt vời."</p>
                        </div>
                        <div class="t-user">
                            <img src="{{ asset('images/avatar_minhduc.png') }}" alt="Hoàng Nam" class="t-avatar">
                            <div class="t-info"><h4>Hoàng Nam</h4><p>Vlogger</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section reveal fade-up">
        <div class="container">
            <div class="cta-banner">
                <div class="cta-content">
                    <h2 class="cta-title">SẴN SÀNG QUAY CHỤP<br><span>CÙNG CÁC THIẾT BỊ TỪ MEW CAMERA?</span></h2>
                    <p class="cta-desc">Liên hệ đặt lịch ngay hôm nay để giữ máy cho chuyến đi sắp tới của bạn.</p>
                    <div class="cta-subfeats">
                        <div class="cta-subfeat-item"><i class="fa-solid fa-check"></i> Thủ tục nhanh gọn</div>
                        <div class="cta-subfeat-item"><i class="fa-solid fa-check"></i> Thiết bị chất lượng tốt</div>
                        <div class="cta-subfeat-item"><i class="fa-solid fa-check"></i> Hỗ trợ học sinh, sinh viên</div>
                        <div class="cta-subfeat-item"><i class="fa-solid fa-check"></i> Nhận máy nhanh chóng</div>
                    </div>
                </div>
                <div class="cta-action">
                    <button class="btn-gold btn-book-trigger" data-package="Liên hệ Đặt Lịch ngay" id="ctaSubmitBtn">
                        ĐẶT LỊCH THUÊ NGAY <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer" id="lienhe">
        <div class="container">
            <div class="footer-top">
                <a href="#" class="logo">
                    <i class="fa-solid fa-cat"></i>
                    <div>MEW CAMERA<span class="logo-sub">Tiệm cho thuê máy</span></div>
                </a>
                <div class="footer-contact">
                    <div class="footer-contact-item"><i class="fa-solid fa-phone"></i><span>0988 123 456</span></div>
                    <div class="footer-contact-item"><i class="fa-solid fa-envelope"></i><span>hello@mewcamera.vn</span></div>
                    <div class="footer-contact-item"><i class="fa-solid fa-location-dot"></i><span>123 Nguyễn Trãi, Q.1, TP. HCM</span></div>
                </div>
                <div class="footer-socials">
                    <a href="#" class="footer-social-btn" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="footer-social-btn" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="footer-social-btn" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="#" class="footer-social-btn" aria-label="Youtube"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 Mew Camera. Bảo lưu mọi quyền.</p>
                <div class="footer-links">
                    <a href="#" class="footer-link">Điều khoản dịch vụ</a>
                    <a href="#" class="footer-link">Chính sách bảo mật</a>
                    <a href="#" class="footer-link">Chính sách cọc</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Booking Modal -->
    <div class="modal-overlay" id="bookingModal">
        <div class="modal-card">
            <button class="modal-close" aria-label="Close modal"><i class="fa-solid fa-xmark"></i></button>
            <h3 class="modal-title" id="modalTitleField">Đăng Ký Thuê Thiết Bị</h3>
            <p class="modal-desc">Vui lòng điền thông tin liên hệ dưới đây. Tiệm sẽ check lịch máy và liên hệ lại cho bạn sau 5 phút qua Zalo hoặc SĐT.</p>
            <form id="bookingForm" action="#" method="POST">
                @csrf
                <div class="form-group">
                    <label for="fullName" class="form-label">Họ và Tên</label>
                    <input type="text" id="fullName" class="form-control" placeholder="Nguyễn Văn A" required>
                </div>
                <div class="form-group">
                    <label for="phoneNum" class="form-label">Số Điện Thoại / Zalo</label>
                    <input type="tel" id="phoneNum" class="form-control" placeholder="0988xxxxxx" required>
                </div>
                <div class="form-group">
                    <label for="emailAddr" class="form-label">Link Facebook cá nhân (Để xác minh cọc nhanh)</label>
                    <input type="text" id="emailAddr" class="form-control" placeholder="facebook.com/username" required>
                </div>
                <div class="form-group">
                    <label for="dateSelect" class="form-label">Ngày & Giờ nhận máy mong muốn</label>
                    <input type="datetime-local" id="dateSelect" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="messageText" class="form-label">Lời nhắn (Gói thuê bao lâu, có lấy thêm thẻ nhớ/phụ kiện không...)</label>
                    <textarea id="messageText" class="form-control" rows="3" placeholder="Ví dụ: Mình thuê gói 1 ngày, cần kèm thẻ nhớ 64GB..."></textarea>
                </div>
                <button type="submit" class="btn-submit">GỬI YÊU CẦU ĐẶT LỊCH</button>
            </form>
        </div>
    </div>

    <!-- Success Toast Notification -->
    <div class="toast" id="successToast">
        <i class="fa-solid fa-circle-check"></i>
        <div class="toast-content">
            <h4>Đăng ký thành công!</h4>
            <p>Tiệm sẽ liên hệ hỗ trợ bạn kiểm tra lịch máy ngay.</p>
        </div>
    </div>

    <!-- Theme Switcher -->
    <div class="theme-switcher" id="themeSwitcher">
        <div class="theme-panel" id="themePanel">
            <button class="theme-option active" data-theme="mint" aria-label="Mint theme">
                <span class="theme-dot mint"></span> Mint Xanh
            </button>
            <button class="theme-option" data-theme="rose" aria-label="Rose theme">
                <span class="theme-dot rose"></span> Rose Hồng
            </button>
            <button class="theme-option" data-theme="amber" aria-label="Amber theme">
                <span class="theme-dot amber"></span> Amber Cam
            </button>
        </div>
        <button class="theme-toggle-btn" id="themeToggleBtn" aria-label="Change theme">
            <i class="fa-solid fa-palette"></i>
        </button>
    </div>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop" aria-label="Back to top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <!-- Sticky Mobile CTA -->
    <div class="mobile-cta-bar" id="mobileCtaBar">
        <button class="btn-gold btn-book-trigger" data-package="Đặt Thuê Thiết Bị">
            ĐẶT THUÊ NGAY <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>

</body>
</html>