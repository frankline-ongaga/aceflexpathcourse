
<div class="mesh-background-div relative">
    <div class="mesh-hero-gradient d-flex h-100">
        <div class="container-lg">
            <div class="row align-items-center">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center">
                    <h1 class="mesh-page-title infinite wow animate__slideDownSlightly" data-wow-duration="1.5s" data-wow-delay=".0s">
                        How It Works
                    </h1>
                    <p class="mesh-page-description my-3 infinite wow animate__slideUpSlightly" data-wow-duration="1.5s" data-wow-delay=".0s">
                        How to get help with your Flex Path Course
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

 <style>
        :root {
            --primary-color: #3b82f6;
            --secondary-color: #8b5cf6;
            --success-color: #10b981;
            --accent-color: #f59e0b;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --bg-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .process-section {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            position: relative;
            overflow: hidden;
        }

        .process-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1" fill="%23ffffff" opacity="0.1"/><circle cx="80" cy="80" r="1" fill="%23ffffff" opacity="0.1"/><circle cx="40" cy="60" r="0.5" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.5;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
            position: relative;
            z-index: 2;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            background: var(--bg-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }

        .section-subtitle {
            font-size: 1.125rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .process-container {
            position: relative;
            z-index: 2;
        }

        .process-step {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .process-step::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--bg-gradient);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .process-step:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .process-step:hover::before {
            transform: scaleX(1);
        }

        .step-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .step-number {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--bg-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.25rem;
            margin-right: 1rem;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
            }
            50% {
                box-shadow: 0 4px 25px rgba(59, 130, 246, 0.5);
            }
        }

        .step-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
            margin: 0;
        }

        .step-content {
            color: var(--text-light);
            line-height: 1.6;
            font-size: 1rem;
        }

        .step-icon {
            position: absolute;
            top: 2rem;
            right: 2rem;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(59, 130, 246, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 1.25rem;
        }

        .connection-line {
            position: absolute;
            left: 50%;
            top: 100%;
            width: 2px;
            height: 2rem;
            background: linear-gradient(to bottom, var(--primary-color), transparent);
            transform: translateX(-50%);
            z-index: 1;
        }

        .process-step:last-child .connection-line {
            display: none;
        }

        .cta-section {
            text-align: center;
          //  margin-top: 3rem;
            position: relative;
            z-index: 2;
        }

        .cta-button {
            background: var(--bg-gradient);
            border: none;
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.125rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
            color: white;
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem;
            }
            
            .process-step {
                padding: 1.5rem;
                margin-bottom: 1.5rem;
            }
            
            .step-header {
                flex-direction: column;
                text-align: center;
            }
            
            .step-number {
                margin-right: 0;
                margin-bottom: 1rem;
            }
            
            .step-icon {
                position: static;
                margin: 1rem auto 0;
            }
            
            .connection-line {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .process-step {
                padding: 1rem;
            }
            
            .section-title {
                font-size: 1.75rem;
            }
            
            .step-title {
                font-size: 1.25rem;
            }
        }

        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.6s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .process-step:nth-child(1) { animation-delay: 0.1s; }
        .process-step:nth-child(2) { animation-delay: 0.2s; }
        .process-step:nth-child(3) { animation-delay: 0.3s; }
        .process-step:nth-child(4) { animation-delay: 0.4s; }
    </style>
  
   <!-- End process -->
   <!-- =========={ PROCESS }==========  -->
   <section id="process" class="process-section py-5">
        <div class="container">
            <div class="section-header fade-in">
                <h2 class="section-title">How It Works</h2>
                <p class="section-subtitle">
                    Our streamlined process makes it easy to get high-quality flex path writing assistance. 
                    Follow these simple steps to get started with your order.
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <div class="process-container">
                        
                        <div class="process-step fade-in">
                            <div class="step-icon">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                            <div class="connection-line"></div>
                            <div class="step-header">
                                <div class="step-number">1</div>
                                <h3 class="step-title">Place Your Order</h3>
                            </div>
                            <div class="step-content">
                                Fill in the order form with the details of your essay writing assignment or any other academic writing assignment you might have. The options include selecting the paper type, academic level, writing style (APA, MLA etc), number of pages, deadlines and others. You can also upload the files you might have for your assignment.
                            </div>
                        </div>

                        <div class="process-step fade-in">
                            <div class="step-icon">
                                <i class="bi bi-credit-card"></i>
                            </div>
                            <div class="connection-line"></div>
                            <div class="step-header">
                                <div class="step-number">2</div>
                                <h3 class="step-title">Make Payment</h3>
                            </div>
                            <div class="step-content">
                                The next step is to submit payment for your order. Currently we use PayPal in our ordering system. If you want to pay through Bitcoins, bank transfer, Stripe, or any other payment method, contact our support team.
                            </div>
                        </div>

                        <div class="process-step fade-in">
                            <div class="step-icon">
                                <i class="bi bi-pencil-square"></i>
                            </div>
                            <div class="connection-line"></div>
                            <div class="step-header">
                                <div class="step-number">3</div>
                                <h3 class="step-title">Wait for the Paper to be Written</h3>
                            </div>
                            <div class="step-content">
                                We will assign the academic writing assignment or online class to the most qualified writer or online class helper. Any academic writer we will assign your order will take your online class or write your paper according to the instructions you have.
                            </div>
                        </div>

                        <div class="process-step fade-in">
                            <div class="step-icon">
                                <i class="bi bi-download"></i>
                            </div>
                            <div class="step-header">
                                <div class="step-number">4</div>
                                <h3 class="step-title">Download Your Custom Paper</h3>
                            </div>
                            <div class="step-content">
                                We will send you an email notifying you that your paper or online class is ready. If it's a custom-written paper, you will need to login into your client account to download and review. If it's an online class, you will need to login into your online class to check if it was done successfully. If you are not satisfied with the custom written paper received from us, request a revision.
                            </div>
                        </div>

                    </div>
                </div>
            </div>

         
        </div>
    </section>
   
   
   <?php include 'cta.php'; ?>
</main>
<!-- end main -->

