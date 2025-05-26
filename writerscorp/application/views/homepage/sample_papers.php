<style>
   
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 120px 0 80px;
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="mesh" width="10" height="10" patternUnits="userSpaceOnUse"><circle cx="5" cy="5" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23mesh)"/></svg>');
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            background: linear-gradient(45deg, #fff, #e3f2fd);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.4rem;
            margin-bottom: 2.5rem;
            opacity: 0.95;
            max-width: 600px;
        }

        .hero-btn {
            background: linear-gradient(45deg, var(--accent-color), #44a08d);
            border: none;
            padding: 18px 40px;
            font-size: 1.2rem;
            font-weight: 600;
            border-radius: 50px;
            color: white;
            box-shadow: 0 10px 30px rgba(78, 205, 196, 0.4);
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            display: inline-block;
        }

        .hero-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(78, 205, 196, 0.6);
            color: white;
        }

        /* Samples Section */
        .samples-section {
            padding: 80px 0;
            background: var(--light-bg);
        }

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

        /* Sample Cards */
        .sample-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: none;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .sample-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        }

        .sample-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .sample-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            color: white;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

        .sample-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .sample-title a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .sample-title a:hover {
            color: var(--primary-color);
        }

        .sample-description {
            color: #7f8c8d;
            margin-bottom: 2rem;
            line-height: 1.7;
            font-size: 1rem;
        }

        .sample-meta {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .meta-item i {
            margin-right: 0.5rem;
            color: var(--accent-color);
        }

        .sample-btn {
            background: linear-gradient(45deg, var(--accent-color), #44a08d);
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .sample-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(78, 205, 196, 0.4);
            color: white;
        }

        /* Quality Badge */
        .quality-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(45deg, var(--success-color), #27ae60);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, var(--dark-color) 0%, #34495e 100%);
            color: white;
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            opacity: 0.1;
            transform: translate(50%, -50%);
        }

        .cta-content {
            position: relative;
            z-index: 2;
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

        .cta-btn {
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

        .cta-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(78, 205, 196, 0.4);
            color: white;
        }

        /* Stats */
        .stats-container {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-top: 3rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--accent-color);
            display: block;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.8rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }
            
            .sample-card {
                padding: 2rem 1.5rem;
            }
            
            .section-title {
                font-size: 2.2rem;
            }
            
            .cta-title {
                font-size: 2rem;
            }
            
            .stats-container {
                flex-direction: column;
                gap: 1.5rem;
            }
        }

        /* Loading animation placeholder */
        .loading-placeholder {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
    </style>

    <!-- Hero Section -->
    
    <div class="mesh-background-div relative">
    <div class="mesh-hero-gradient d-flex h-100">
        <div class="container-lg">
            <div class="row align-items-center">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center">
                    <br> <br>
                    <h1 class="mesh-page-title infinite wow animate__slideDownSlightly" data-wow-duration="1.5s" data-wow-delay=".0s">
                        Sample Papers
                    </h1>
                    <p class="mesh-page-description my-3 infinite wow animate__slideUpSlightly" data-wow-duration="1.5s" data-wow-delay=".0s">
                        Explore our collection of high-quality FlexPath course samples. See the excellence and expertise that our tutors bring to every assignment, helping students achieve academic success.
                    </p>
                    </p>
                    <a href="<?php echo base_url('order_now'); ?>" class="mesh-button px-3 infinite wow animate__slideLeftSlightly" data-wow-duration="1.5s" data-wow-delay=".0s">
                        Place Your Order Now
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

    <!-- Samples Section -->
    <div class="samples-section">
        <div class="container">
          

            <div class="row">
                <?php
                foreach($samples->result() as $row) {  ?>
                <div class="col-lg-6 col-md-6 col-12 mb-4">
                    <div class="sample-card">
                      
                        
                        <h2 class="sample-title">
                            <a href="#"><?php echo $row->sample_title; ?></a>
                        </h2>
                        
                   
                        
                        <p class="sample-description">
                            <?php echo $row->sample_paragraph; ?>
                        </p>
                        
                        <a href="<?php echo base_url() ?>paper_details/<?php echo $row->sample_slug; ?>" class="mesh-button ms-3 my-3">
                            <i class="fas fa-arrow-right me-2"></i>Read More
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

  