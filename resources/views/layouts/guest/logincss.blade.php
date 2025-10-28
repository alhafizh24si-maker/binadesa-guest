<style>
        :root {
            --primary-color: #2c5aa0;
            --secondary-color: #34a853;
            --accent-color: #fbbc05;
            --dark-color: #2c3e50;
            --light-color: #f8f9fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 1200px;
            margin: 0 auto;
        }

        .login-left {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 60px 40px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M0,0 L100,0 L100,100 Z" fill="rgba(255,255,255,0.1)"/></svg>');
            background-size: cover;
        }

        .login-right {
            padding: 60px 40px;
            background: white;
        }

        .logo-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 10px 25px rgba(44, 90, 160, 0.3);
        }

        .logo i {
            font-size: 50px;
            color: white;
        }

        .brand-title {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }

        .brand-subtitle {
            color: var(--dark-color);
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .login-feature {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            position: relative;
            z-index: 1;
        }

        .login-feature-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .login-feature-icon i {
            font-size: 24px;
            color: white;
        }

        .login-feature-text h5 {
            margin-bottom: 5px;
            font-weight: 600;
        }

        .login-feature-text p {
            margin: 0;
            opacity: 0.9;
            font-size: 0.9rem;
        }

        .login-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 10px;
        }

        .login-subtitle {
            color: #6c757d;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 500;
            color: var(--dark-color);
            margin-bottom: 8px;
        }

        .form-control {
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(44, 90, 160, 0.25);
        }

        .btn-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(44, 90, 160, 0.3);
        }

        .login-divider {
            text-align: center;
            margin: 30px 0;
            position: relative;
        }

        .login-divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e9ecef;
        }

        .login-divider span {
            background: white;
            padding: 0 15px;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .social-login {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .social-btn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            text-decoration: none;
            color: var(--dark-color);
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            transform: translateY(-2px);
        }

        .social-btn i {
            margin-right: 8px;
            font-size: 18px;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .desa-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)),
                        url('https://images.unsplash.com/photo-1568515387631-8b650bbcdb90?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80');
            background-size: cover;
            background-position: center;
            border-radius: 15px;
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .feature-highlight {
            background: linear-gradient(135deg, #fff3cd, #ffeaa7);
            border-left: 4px solid var(--accent-color);
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }

        @media (max-width: 991.98px) {
            .login-left {
                padding: 40px 30px;
            }

            .login-right {
                padding: 40px 30px;
            }

            .brand-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 767.98px) {
            body {
                padding: 20px;
            }

            .login-container {
                border-radius: 15px;
            }

            .login-left {
                border-radius: 15px 15px 0 0;
            }

            .login-right {
                border-radius: 0 0 15px 15px;
            }
        }
    </style>
</head>
