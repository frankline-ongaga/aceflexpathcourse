 <style>
        .cta-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
            padding: 60px 0;
            color: white;
        }
        
        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.1);
            z-index: 1;
        }
        
        .cta-content {
            position: relative;
            z-index: 2;
        }
        
        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }
        
        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-element:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .floating-element:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }
        
        .floating-element:nth-child(3) {
            width: 40px;
            height: 40px;
            top: 40%;
            left: 80%;
            animation-delay: 4s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .main-heading {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            animation: slideInFromTop 1s ease-out;
        }
        
        .sub-heading {
            font-size: 1.4rem;
            margin-bottom: 2.5rem;
            opacity: 0.95;
            animation: slideInFromTop 1s ease-out 0.2s both;
        }
        
        .discount-badge {
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
            border-radius: 50px;
            padding: 15px 30px;
            font-size: 1.2rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 2rem;
            box-shadow: 0 8px 25px rgba(238, 90, 36, 0.3);
            animation: pulse 2s infinite, slideInFromTop 1s ease-out 0.4s both;
            transform: rotate(-2deg);
        }
        
        .cta-button {
            background: linear-gradient(45deg, #4ecdc4, #44a08d);
            border: none;
            padding: 18px 40px;
            font-size: 1.3rem;
            font-weight: 600;
            border-radius: 50px;
            box-shadow: 0 10px 30px rgba(68, 160, 141, 0.4);
            transition: all 0.3s ease;
            animation: slideInFromBottom 1s ease-out 0.8s both;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(68, 160, 141, 0.6);
            background: linear-gradient(45deg, #44a08d, #4ecdc4);
        }
        
        .secondary-cta {
            color: white;
            text-decoration: none;
            border: 2px solid rgba(255, 255, 255, 0.5);
            padding: 12px 30px;
            border-radius: 50px;
            transition: all 0.3s ease;
            display: inline-block;
            margin-left: 20px;
            animation: slideInFromBottom 1s ease-out 1s both;
        }
        
        .secondary-cta:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: white;
            color: white;
            text-decoration: none;
        }
        
        @keyframes slideInFromTop {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideInFromBottom {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse {
            0% { transform: rotate(-2deg) scale(1); }
            50% { transform: rotate(-2deg) scale(1.05); }
            100% { transform: rotate(-2deg) scale(1); }
        }
        
        @media (max-width: 768px) {
            .main-heading {
                font-size: 2.5rem;
            }
            
            .sub-heading {
                font-size: 1.2rem;
            }
            
            .cta-button {
                font-size: 1.1rem;
                padding: 15px 30px;
                margin-bottom: 1rem;
            }
            
            .secondary-cta {
                margin-left: 0;
                margin-top: 1rem;
                display: block;
                text-align: center;
            }
        }
    </style>
 <section class="cta-section">
        <div class="floating-elements">
            <div class="floating-element"></div>
            <div class="floating-element"></div>
            <div class="floating-element"></div>
        </div>
        
        <div class="container">
            <div class="row justify-content-center cta-content">
                <div class="col-lg-8 col-md-10 text-center">
                    <div class="discount-badge">
                        <i class="fas fa-tags me-2"></i>
                        10% OFF First Order!
                    </div>
                    
                    <h3 class="main-heading text-white">
                        Master Your FlexPath Journey
                    </h3>
                    
                    <p class="sub-heading text-white">
                        Get expert guidance, personalized support, and proven strategies to excel in your competency-based education. Join thousands of successful students today!
                    </p>
                    
                    <div class="cta-buttons">
                        <button class="btn cta-button" href="<?= base_url('order_now'); ?>">
                            <i class="fas fa-rocket me-2"></i>
                            Start Your Success Journey
                        </button>
                     
                    </div>
                </div>
            </div>
        </div>
    </section>