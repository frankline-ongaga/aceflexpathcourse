<style>
       
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 100px 0 80px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.1);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        /* Universities Grid */
        .universities-section {
            padding: 80px 0;
            background: var(--light-bg);
        }

        .university-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: none;
            height: 100%;
        }

        .university-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .university-logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 2rem;
            color: white;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .university-name {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .university-program {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        .program-details {
            margin-bottom: 1.5rem;
        }

        .detail-section {
            margin-bottom: 1.2rem;
        }

        .detail-label {
            font-weight: 700;
            color: var(--dark-color);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .detail-content {
            color: #6c757d;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .programs-list {
            color: var(--primary-color);
            font-weight: 500;
        }

        .help-section {
            background: var(--light-bg);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .help-title {
            font-weight: 700;
            color: var(--accent-color);
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .help-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .help-item {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 0.8rem;
            color: #6c757d;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .help-item::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--accent-color);
            font-weight: bold;
        }

        .btn-university {
            background: linear-gradient(45deg, var(--accent-color), #44a08d);
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
            text-decoration: none;
            display: inline-block;
        }

        .btn-university:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(78, 205, 196, 0.4);
            color: white;
            text-decoration: none;
        }

        /* Section Headers */
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 1rem;
        }

        .section-description {
            font-size: 1.2rem;
            color: #7f8c8d;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Special highlighting for featured universities */
        .featured-university {
            border: 2px solid var(--accent-color);
            position: relative;
        }

        .featured-badge {
            position: absolute;
            top: -12px;
            right: 20px;
            background: var(--accent-color);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--dark-color) 0%, #34495e 100%);
            color: white;
            padding: 60px 0;
            text-align: center;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .cta-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .btn-cta {
            background: linear-gradient(45deg, var(--accent-color), #44a08d);
            border: none;
            padding: 18px 40px;
            font-size: 1.2rem;
            border-radius: 50px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(78, 205, 196, 0.4);
            color: white;
            text-decoration: none;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .university-card {
                padding: 2rem 1.5rem;
            }
            
            .section-title {
                font-size: 2.2rem;
            }
        }
    </style>

    <!-- Hero Section -->


 <div class="mesh-background-div relative">
    <div class="mesh-hero-gradient d-flex h-100">
        <div class="container-lg">
            <div class="row align-items-center">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center">
                    <br>  <br>  <br>
                    <h1 class="mesh-page-title infinite wow animate__slideDownSlightly" data-wow-duration="1.5s" data-wow-delay=".0s">
                        Some of the universities we support
                    </h1>
                    <p class="mesh-page-description my-3 infinite wow animate__slideUpSlightly" data-wow-duration="1.5s" data-wow-delay=".0s">
                       Expert support for competency-based education programs across leading universities. 
                        Get personalized assistance tailored to your specific institution's requirements.
                    </p>
                    <a href="<?php echo base_url('order_now'); ?>" class="mesh-button px-3 infinite wow animate__slideLeftSlightly" data-wow-duration="1.5s" data-wow-delay=".0s">
                       Place your order
                    </a>
                </div>
                <!-- Image column (commented out)
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-end">
                    <img src="assets/images/teaspage.png" alt="" class="w-100" style="--animate-duration: 6s; height:100%" />
                </div>
                -->
            </div>
        </div>
    </div>
</div>

    <!-- Universities Section -->
    <section class="universities-section" id="universities">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Partner Universities</h2>
                <p class="section-description">
                    We specialize in competency-based education programs from these leading institutions
                </p>
            </div>

            <div class="row">
                <!-- Capella University -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="university-card featured-university">
                        <div class="featured-badge">Most Popular</div>
                        <div class="university-logo">
                          <img src="<?= base_url('universitieslogo/capella.webp'); ?>" alt="capella university flexpath help">
                        </div>
                        <h3 class="university-name">Capella University</h3>
                        <p class="university-program">FlexPath Program</p>
                        
                        <div class="program-details">
                            <div class="detail-section">
                                <div class="detail-label">Flagship Programs:</div>
                                <div class="detail-content programs-list">RN to BSN, MSN, MHA, MBA, DBA, DNP, IT, Psychology, Business</div>
                            </div>
                            <div class="detail-section">
                                <div class="detail-label">Format:</div>
                                <div class="detail-content">Fully online, self-paced, flat-rate tuition every 12 weeks</div>
                            </div>
                        </div>

                        <div class="help-section">
                            <div class="help-title">How AceFlexPathCourse.com Helps:</div>
                            <ul class="help-list">
                                <li class="help-item">Expert help with Capella's NURS-FPX, MBA-FPX, and MHA-FPX assessments</li>
                                <li class="help-item">Guidance on rubrics, APA formatting, and capstone writing</li>
                                <li class="help-item">Progress tracking and time management coaching</li>
                            </ul>
                        </div>
                        
                        <a href="<?= base_url('order_now'); ?>" class="mesh-button ms-3 my-3">
                            <i class="fas fa-arrow-right me-2"></i>Get Capella Support
                        </a>
                    </div>
                </div>

                <!-- Western Governors University -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="university-card">
                        <div class="university-logo">
                          <img src="<?= base_url('universitieslogo/westerngovernors.webp'); ?>" alt="western governors university flexpath help">
                        </div>
                        <h3 class="university-name">Western Governors University</h3>
                        <p class="university-program">WGU Competency-Based Learning</p>
                        
                        <div class="program-details">
                            <div class="detail-section">
                                <div class="detail-label">Flagship Programs:</div>
                                <div class="detail-content programs-list">Nursing (BSN, MSN), Business, IT, Education, Healthcare</div>
                            </div>
                            <div class="detail-section">
                                <div class="detail-label">Format:</div>
                                <div class="detail-content">Competency-based learning with flexible deadlines</div>
                            </div>
                        </div>

                        <div class="help-section">
                            <div class="help-title">How AceFlexPathCourse.com Helps:</div>
                            <ul class="help-list">
                                <li class="help-item">Tutoring for course content mastery, project planning, and paper writing</li>
                                <li class="help-item">Practice questions, revisions, and plagiarism-free assistance</li>
                                <li class="help-item">Feedback-driven improvement tailored to WGU's assessment model</li>
                            </ul>
                        </div>
                        
                        <a href="<?= base_url('order_now'); ?>" class="mesh-button ms-3 my-3">
                            <i class="fas fa-arrow-right me-2"></i>Get WGU Support
                        </a>
                    </div>
                </div>

                <!-- Purdue University Global -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="university-card">
                        <div class="university-logo">
                            <img src="<?= base_url('universitieslogo/purdue.webp'); ?>" alt="purdue university flexpath help">
                        </div>
                        <h3 class="university-name">Purdue University Global</h3>
                        <p class="university-program">ExcelTrack® Program</p>
                        
                        <div class="program-details">
                            <div class="detail-section">
                                <div class="detail-label">Flagship Programs:</div>
                                <div class="detail-content programs-list">Business, IT, Criminal Justice, Nursing, Health Sciences</div>
                            </div>
                            <div class="detail-section">
                                <div class="detail-label">Format:</div>
                                <div class="detail-content">Self-paced ExcelTrack® competency-based courses</div>
                            </div>
                        </div>

                        <div class="help-section">
                            <div class="help-title">How AceFlexPathCourse.com Helps:</div>
                            <ul class="help-list">
                                <li class="help-item">Assistance with ExcelTrack® writing projects and assessments</li>
                                <li class="help-item">Personalized academic coaching for goal setting and pacing</li>
                                <li class="help-item">Research guidance and editing for graduate-level work</li>
                            </ul>
                        </div>
                        
                        <a href="<?= base_url('order_now'); ?>" class="mesh-button ms-3 my-3">
                            <i class="fas fa-arrow-right me-2"></i>Get Purdue Support
                        </a>
                    </div>
                </div>

                <!-- SNHU -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="university-card">
                        <div class="university-logo">
                        <img src="<?= base_url('universitieslogo/snhu.webp'); ?>" alt="Southern New Hampshire University flexpath help">

                        </div>
                        <h3 class="university-name">Southern New Hampshire University</h3>
                        <p class="university-program">College for America</p>
                        
                        <div class="program-details">
                            <div class="detail-section">
                                <div class="detail-label">Flagship Programs:</div>
                                <div class="detail-content programs-list">Business, Healthcare Management, Communications</div>
                            </div>
                            <div class="detail-section">
                                <div class="detail-label">Format:</div>
                                <div class="detail-content">Project-based, competency-driven education</div>
                            </div>
                        </div>

                        <div class="help-section">
                            <div class="help-title">How AceFlexPathCourse.com Helps:</div>
                            <ul class="help-list">
                                <li class="help-item">Support for applied learning projects and real-world case studies</li>
                                <li class="help-item">Feedback on writing, presentation, and analysis tasks</li>
                                <li class="help-item">Clarity on rubrics and how to meet learning outcomes</li>
                            </ul>
                        </div>
                        
                        <a href="<?= base_url('order_now'); ?>" class="mesh-button ms-3 my-3">
                            <i class="fas fa-arrow-right me-2"></i>Get SNHU Support
                        </a>
                    </div>
                </div>

                <!-- Walden University -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="university-card">
                        <div class="university-logo">
                             <img src="<?= base_url('universitieslogo/walden.webp'); ?>" alt="Walden university flexpath help">
                        </div>
                        <h3 class="university-name">Walden University</h3>
                        <p class="university-program">Tempo Learning®</p>
                        
                        <div class="program-details">
                            <div class="detail-section">
                                <div class="detail-label">Known For:</div>
                                <div class="detail-content programs-list">Social Work, Psychology, Nursing, Education, Public Health</div>
                            </div>
                            <div class="detail-section">
                                <div class="detail-label">Flexibility:</div>
                                <div class="detail-content">Competency-based format allowing students to move through content as they master it</div>
                            </div>
                        </div>

                        <div class="help-section">
                            <div class="help-title">How AceFlexPathCourse.com Helps:</div>
                            <ul class="help-list">
                                <li class="help-item">Supports progress through competency demonstrations and learning assessments</li>
                                <li class="help-item">Offers editing, proofreading, and project consultation for dissertations and fieldwork reports</li>
                                <li class="help-item">Helps balance Tempo Learning pace with full-time careers and family obligations</li>
                            </ul>
                        </div>
                        
                        <a href="<?= base_url('order_now'); ?>" class="mesh-button ms-3 my-3">
                            <i class="fas fa-arrow-right me-2"></i>Get Walden Support
                        </a>
                    </div>
                </div>

                <!-- University of Wisconsin -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="university-card">
                        <div class="university-logo">
                              <img src="<?= base_url('universitieslogo/universityofwisconsin.webp'); ?>" alt="university of wisconsin flexpath help">
                        </div>
                        <h3 class="university-name">University of Wisconsin</h3>
                        <p class="university-program">UW Flexible Option</p>
                        
                        <div class="program-details">
                            <div class="detail-section">
                                <div class="detail-label">Known For:</div>
                                <div class="detail-content programs-list">Health Sciences, Nursing, Business, Information Science & Technology</div>
                            </div>
                            <div class="detail-section">
                                <div class="detail-label">Flexibility:</div>
                                <div class="detail-content">Subscription-based, self-paced learning; students complete competencies as they master them</div>
                            </div>
                        </div>

                        <div class="help-section">
                            <div class="help-title">How AceFlexPathCourse.com Helps:</div>
                            <ul class="help-list">
                                <li class="help-item">Offers tutoring for project-based assessments and reflection papers</li>
                                <li class="help-item">Supports working adults with coaching on pacing and skill demonstration</li>
                                <li class="help-item">Provides editing and academic guidance tailored to UW's unique CBE model</li>
                            </ul>
                        </div>
                        
                        <a href="<?= base_url('order_now'); ?>" class="mesh-button ms-3 my-3">
                            <i class="fas fa-arrow-right me-2"></i>Get UW Support
                        </a>
                    </div>
                </div>

                <!-- Northern Arizona University -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="university-card">
                        <div class="university-logo">
                              <img src="<?= base_url('universitieslogo/nau.webp'); ?>" alt="Northern Arizona University flexpath help">
                        </div>
                        <h3 class="university-name">Northern Arizona University</h3>
                        <p class="university-program">Personalized Learning</p>
                        
                        <div class="program-details">
                            <div class="detail-section">
                                <div class="detail-label">Known For:</div>
                                <div class="detail-content programs-list">Liberal Arts, Small Business, Computer Information Tech, RN to BSN</div>
                            </div>
                            <div class="detail-section">
                                <div class="detail-label">Flexibility:</div>
                                <div class="detail-content">Competency-based, pay-as-you-go structure with full academic freedom</div>
                            </div>
                        </div>

                        <div class="help-section">
                            <div class="help-title">How AceFlexPathCourse.com Helps:</div>
                            <ul class="help-list">
                                <li class="help-item">Guides students through project-based work and subject mastery in nursing and business</li>
                                <li class="help-item">Helps with time management, writing support, and mastering learning objectives</li>
                                <li class="help-item">Tailors feedback and coaching to NAU's assessment standards</li>
                            </ul>
                        </div>
                        
                        <a href="<?= base_url('order_now'); ?>" class="mesh-button ms-3 my-3">
                            <i class="fas fa-arrow-right me-2"></i>Get NAU Support
                        </a>
                    </div>
                </div>

                <!-- UMass Global (formerly Brandman) -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="university-card">
                        <div class="university-logo">
                            <img src="<?= base_url('universitieslogo/umass.webp'); ?>" alt="UMass Global University flexpath help">
                        </div>
                        <h3 class="university-name">UMass Global</h3>
                        <p class="university-program">MyPath (formerly Brandman University)</p>
                        
                        <div class="program-details">
                            <div class="detail-section">
                                <div class="detail-label">Known For:</div>
                                <div class="detail-content programs-list">Business, Criminal Justice, Organizational Leadership, IT</div>
                            </div>
                            <div class="detail-section">
                                <div class="detail-label">Flexibility:</div>
                                <div class="detail-content">100% online, self-paced learning with one-course-at-a-time progression</div>
                            </div>
                        </div>

                        <div class="help-section">
                            <div class="help-title">How AceFlexPathCourse.com Helps:</div>
                            <ul class="help-list">
                                <li class="help-item">Offers step-by-step help with MyPath assignments and capstone projects</li>
                                <li class="help-item">Provides writing and research coaching to meet university's academic expectations</li>
                                <li class="help-item">Supports busy adult learners aiming to accelerate degree completion</li>
                            </ul>
                        </div>
                        
                        <a href="<?= base_url('order_now'); ?>" class="mesh-button ms-3 my-3">
                            <i class="fas fa-arrow-right me-2"></i>Get UMass Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="order">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="cta-title">Ready to Accelerate Your Success?</h2>
                    <p class="cta-subtitle">
                        Don't see your university? Contact us! We provide expert support for competency-based programs nationwide.
                    </p>
                    <a href="<?= base_url('order_now'); ?>" class="mesh-button ms-3 my-3 text-center">Get Started Today</a>
                </div>
            </div>
        </div>
    </section>