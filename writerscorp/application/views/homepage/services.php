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

        /* Services Grid */
        .services-section {
            padding: 80px 0;
            background: var(--light-bg);
        }

        .service-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: none;
            height: 100%;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .service-icon {
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

        .service-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 1rem;
        }

        .service-subtitle {
            color: #7f8c8d;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        .course-list {
            list-style: none;
            padding: 0;
            margin-bottom: 1.5rem;
        }

        .course-item {
            background: var(--light-bg);
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 0.8rem;
            border-left: 4px solid var(--accent-color);
            transition: all 0.3s ease;
        }

        .course-item:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }

        .course-code {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 0.9rem;
        }

        .course-description {
            margin: 0.5rem 0 0 0;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .btn-service {
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
        }

        .btn-service:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(78, 205, 196, 0.4);
            color: white;
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

        /* Special highlighting for capstone courses */
        .capstone-highlight {
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
            color: white;
            border-left: none !important;
        }

        .capstone-highlight .course-code {
            color: white;
            font-weight: 700;
        }

        .capstone-highlight .course-description {
            color: rgba(255, 255, 255, 0.9);
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
        }

        .btn-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(78, 205, 196, 0.4);
            color: white;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .service-card {
                padding: 2rem 1.5rem;
            }
            
            .section-title {
                font-size: 2.2rem;
            }
        }

        /* Animation classes */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in-up.visible {
            opacity: 1;
            transform: translateY(0);
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
                        Expert FlexPath Course Support Services
                    </h1>
                    <p class="mesh-page-description my-3 infinite wow animate__slideUpSlightly" data-wow-duration="1.5s" data-wow-delay=".0s">
                       Comprehensive guidance across all FlexPath programs. From RN to BSN through doctoral studies, 
                        we provide personalized tutoring to accelerate your academic success.
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

    <!-- Services Section -->
    <section class="services-section" id="services">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Our FlexPath Services</h2>
                <p class="section-description">
                    Specialized support for every FlexPath program with expert tutors who understand competency-based education
                </p>
            </div>

            <div class="row">
                <!-- RN to BSN -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="service-card">
                       
                        <h3 class="service-title">RN to BSN</h3>
                        <p class="service-subtitle">Bachelor of Science in Nursing • Courses: NURS-FPX4000 to NURS-FPX4900</p>
                        
                        <ul class="course-list">
                            <li class="course-item">
                                <div class="course-code">NURS-FPX4000</div>
                                <div class="course-description">Guidance on developing professional nursing goals, leadership qualities, and interprofessional collaboration.</div>
                            </li>
                            <li class="course-item">
                                <div class="course-code">NURS-FPX4030 & 4040</div>
                                <div class="course-description">Support in patient-centered care planning, care coordination, and applying evidence-based practices.</div>
                            </li>
                            <li class="course-item">
                                <div class="course-code">NURS-FPX4050 & 4060</div>
                                <div class="course-description">Assistance with quality improvement, healthcare policy analysis, and ethical decision-making.</div>
                            </li>
                            <li class="course-item">
                                <div class="course-code">NURS-FPX4900 (Capstone)</div>
                                <div class="course-description">Personalized coaching for the final project, including proposal development, scholarly writing, and presentation preparation.</div>
                            </li>
                        </ul>
                        
                        <a class="mesh-button ms-3 my-3" href="<?= base_url('order_now'); ?>">
                            <i class="fas fa-arrow-right me-2"></i>Get BSN Support
                        </a>
                    </div>
                </div>

                <!-- RN to MSN -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="service-card">
                        
                        <h3 class="service-title">RN to MSN</h3>
                        <p class="service-subtitle">Master of Science in Nursing • Courses: NHS-FPX5004 to NURS-FPX6620</p>
                        
                        <ul class="course-list">
                            <li class="course-item">
                                <div class="course-code">NHS-FPX5004</div>
                                <div class="course-description">Help with leadership self-assessments and crafting a personal leadership development plan.</div>
                            </li>
                            <li class="course-item">
                                <div class="course-code">NHS-FPX6004</div>
                                <div class="course-description">Coaching on interprofessional collaboration and healthcare delivery models.</div>
                            </li>
                            <li class="course-item">
                                <div class="course-code">NURS-FPX6011 & 6021</div>
                                <div class="course-description">Support for informatics in nursing practice and patient-centered care strategies.</div>
                            </li>
                            <li class="course-item">
                                <div class="course-code">NURS-FPX6210 & 6216</div>
                                <div class="course-description">Guidance on financial planning, budgeting, and organizational leadership in nursing.</div>
                            </li>
                            <li class="course-item">
                                <div class="course-code">NURS-FPX6410 & 6412</div>
                                <div class="course-description">Help with quality improvement initiatives and ethical practice.</div>
                            </li>
                            <li class="course-item">
                                <div class="course-code">NURS-FPX6620 (Capstone)</div>
                                <div class="course-description">One-on-one support for completing the MSN capstone, including topic selection, proposal writing, and final presentation.</div>
                            </li>
                        </ul>
                        
                   
                          <a class="mesh-button ms-3 my-3" href="<?= base_url('order_now'); ?>">
                            <i class="fas fa-arrow-right me-2"></i>Get MSN Support
                        </a>
                    </div>
                </div>

                <!-- MHA -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="service-card">
                     
                        <h3 class="service-title">MHA</h3>
                        <p class="service-subtitle">Master of Health Administration • Courses: MHA-FPX5012 to MHA-FPX5068</p>
                        
                        <ul class="course-list">
                            <li class="course-item">
                                <div class="course-code">MHA-FPX5012 Assessment 1</div>
                                <div class="course-description">Help with conducting an organizational analysis, identifying performance gaps, and recommending improvements.</div>
                            </li>
                            <li class="course-item">
                                <div class="course-code">MHA-FPX5020 & 5030</div>
                                <div class="course-description">Assistance in strategic planning, leadership communication, and change management assessments.</div>
                            </li>
                            <li class="course-item">
                                <div class="course-code">MHA-FPX5040</div>
                                <div class="course-description">Coaching on compliance, ethics, and regulatory guidelines in healthcare organizations.</div>
                            </li>
                            <li class="course-item">
                                <div class="course-code">MHA-FPX5062 & 5068</div>
                                <div class="course-description">Support with financial analysis, budgeting in healthcare, and final presentations on administrative initiatives.</div>
                            </li>
                        </ul>
                        
                        
                        <a class="mesh-button ms-3 my-3" href="<?= base_url('order_now'); ?>">
                            <i class="fas fa-arrow-right me-2"></i>Get MHA Support
                        </a>
                    </div>
                </div>

                <!-- Psychology -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="service-card">
                       
                        <h3 class="service-title">Psychology</h3>
                        <p class="service-subtitle">Psychology Programs • Courses: PHI-FPX2000 to PSYC-FPX3500</p>
                        
                        <ul class="course-list">
                            <li class="course-item">
                                <div class="course-code">PHI-FPX2000</div>
                                <div class="course-description">Help with ethical decision-making, personal values, and applying philosophical principles to psychology.</div>
                            </li>
                            <li class="course-item">
                                <div class="course-code">PSYC-FPX2300 to PSYC-FPX3500</div>
                                <div class="course-description">Guidance on writing research-based assessments, analyzing human development and behavior, and using APA style accurately.</div>
                            </li>
                            <li class="course-item">
                                <div class="course-code">Assessment 1 Focus</div>
                                <div class="course-description">Expert assistance in interpreting psychological concepts and designing evidence-supported responses.</div>
                            </li>
                        </ul>
                        
                     
                        <a class="mesh-button ms-3 my-3" href="<?= base_url('order_now'); ?>">
                            <i class="fas fa-arrow-right me-2"></i>Get Psychology Support
                        </a>
                    </div>
                </div>

                <!-- MBA -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="service-card">
                       
                        <h3 class="service-title">MBA</h3>
                        <p class="service-subtitle">Master of Business Administration • Courses: MBA-FPX5002 and beyond</p>
                        
                        <ul class="course-list">
                            <li class="course-item">
                                <div class="course-code">MBA-FPX5002</div>
                                <div class="course-description">Support with organizational strategy, data-driven decision-making, and leadership analysis.</div>
                            </li>
                            <li class="course-item">
                                <div class="course-code">Finance, Marketing, Operations</div>
                                <div class="course-description">Help with interpreting financial data, marketing case studies, and operational efficiency strategies.</div>
                            </li>
                            <li class="course-item">
                                <div class="course-code">Simulations and Capstones</div>
                                <div class="course-description">Coaching on business simulations, presentations, and solving real-world business challenges.</div>
                            </li>
                        </ul>
                        
                      
                         <a class="mesh-button ms-3 my-3" href="<?= base_url('order_now'); ?>">
                            <i class="fas fa-arrow-right me-2"></i>>Get MBA Support
                        </a>
                    </div>
                </div>

                <!-- DNP -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="service-card">
                       
                        <h3 class="service-title">DNP</h3>
                        <p class="service-subtitle">Doctor of Nursing Practice • Courses: NHS-FPX8002 and beyond</p>
                        
                        <ul class="course-list">
                            <li class="course-item">
                                <div class="course-code">NHS-FPX8002</div>
                                <div class="course-description">Help with developing scholarly writing, synthesizing research, and aligning academic goals with practice-based evidence.</div>
                            </li>
                            <li class="course-item">
                                <div class="course-code">Capstone Preparation</div>
                                <div class="course-description">Assistance with identifying practice gaps, designing interventions, and compiling doctoral-quality reports and presentations.</div>
                            </li>
                            <li class="course-item">
                                <div class="course-code">Research Application</div>
                                <div class="course-description">Coaching on integrating research into clinical decision-making and population health initiatives.</div>
                            </li>
                        </ul>
                      

                         <a class="mesh-button ms-3 my-3" href="<?= base_url('order_now'); ?>">
                            <i class="fas fa-arrow-right me-2"></i>>Get DNP Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>