<style>
        :root {
            --primary: #2e7d32;
            --secondary: #4caf50;
            --success: #66bb6a;
            --light: #f8f9fa;
            --dark: #212529;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 1000px;
            margin: 2rem auto;
        }

        .login-left {
            background: linear-gradient(135deg, #2e7d32 0%, #1b5e20 100%);
            color: white;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-right {
            padding: 3rem;
        }

        .login-title {
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #2e7d32;
        }

        .login-subtitle {
            color: #6c757d;
            margin-bottom: 2rem;
        }

        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #2e7d32;
            box-shadow: 0 0 0 0.2rem rgba(46, 125, 50, 0.25);
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #495057;
        }

        .btn-custom {
            background: linear-gradient(135deg, #2e7d32, #4caf50);
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(46, 125, 50, 0.4);
            color: white;
        }

        .login-feature {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .login-feature-icon {
            background: rgba(255, 255, 255, 0.2);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.2rem;
        }

        .login-feature-text h5 {
            margin-bottom: 0.25rem;
            font-weight: 600;
        }

        .login-feature-text p {
            margin-bottom: 0;
            opacity: 0.9;
        }

        .login-divider {
            position: relative;
            text-align: center;
            margin: 1.5rem 0;
        }

        .login-divider::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e9ecef;
        }

        .login-divider span {
            background: white;
            padding: 0 1rem;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .social-login {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .social-btn {
            flex: 1;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 0.75rem;
            text-align: center;
            background: white;
            color: #495057;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .social-btn:hover {
            background: #f8f9fa;
            border-color: #2e7d32;
            color: #2e7d32;
        }

        .alert {
            border-radius: 8px;
            border: none;
        }

        .alert-danger {
            background: rgba(239, 83, 80, 0.1);
            color: #dc3545;
        }

        .alert-success {
            background: rgba(102, 187, 106, 0.1);
            color: #198754;
        }

        @media (max-width: 768px) {
            .login-left {
                padding: 2rem;
            }

            .login-right {
                padding: 2rem;
            }

            .social-login {
                flex-direction: column;
            }

            body {
                padding: 1rem;
            }
        }
    </style>
</head>
