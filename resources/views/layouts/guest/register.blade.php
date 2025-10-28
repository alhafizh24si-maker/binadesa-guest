<style>
    :root {
        --primary: #2e7d32;
        --secondary: #4caf50;
        --success: #66bb6a;
        --light: #f8f9fa;
        --dark: #212529;
        --accent: #ffc107;
    }

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
    }

    .register-container {
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 1000px;
        margin: 2rem auto;
    }

    .register-left {
        background: linear-gradient(135deg, rgba(46, 125, 50, 0.9), rgba(27, 94, 32, 0.9)),
                    url('https://images.unsplash.com/photo-1544551763-46a013bb70d5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80');
        background-size: cover;
        background-position: center;
        background-blend-mode: overlay;
        color: white;
        padding: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .register-left::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M0,0 L100,0 L100,100 Z" fill="rgba(255,255,255,0.1)"/></svg>');
        background-size: cover;
        z-index: 1;
    }

    .register-right {
        padding: 3rem;
    }

    .logo-section {
        text-align: center;
        margin-bottom: 2rem;
        position: relative;
        z-index: 2;
    }

    .logo {
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .logo i {
        font-size: 2.5rem;
        color: white;
    }

    .brand-title {
        font-size: 2.2rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
        position: relative;
        z-index: 2;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .brand-subtitle {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1.1rem;
        position: relative;
        z-index: 2;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }

    .register-title {
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: #2e7d32;
        font-size: 2rem;
    }

    .register-subtitle {
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

    .btn-outline-custom {
        background: transparent;
        border: 2px solid #2e7d32;
        color: #2e7d32;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        width: 100%;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }

    .btn-outline-custom:hover {
        background: #2e7d32;
        color: white;
    }

    .register-feature {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
        position: relative;
        z-index: 2;
    }

    .register-feature-icon {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 1.2rem;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .register-feature-text h5 {
        margin-bottom: 0.25rem;
        font-weight: 600;
        color: white;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }

    .register-feature-text p {
        margin-bottom: 0;
        color: rgba(255, 255, 255, 0.9);
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }

    .feature-highlight {
        background: linear-gradient(135deg, rgba(255, 243, 205, 0.9), rgba(255, 234, 167, 0.9));
        border-left: 4px solid var(--accent);
        padding: 1rem;
        border-radius: 8px;
        margin: 1.5rem 0;
        position: relative;
        z-index: 2;
        backdrop-filter: blur(5px);
    }

    .feature-highlight h5 {
        color: var(--dark);
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .feature-highlight p {
        color: var(--dark);
        margin: 0;
        opacity: 0.9;
    }

    .register-divider {
        position: relative;
        text-align: center;
        margin: 1.5rem 0;
    }

    .register-divider::before {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background: #e9ecef;
    }

    .register-divider span {
        background: white;
        padding: 0 1rem;
        color: #6c757d;
        font-size: 0.9rem;
    }

    .social-register {
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

    .login-link {
        text-align: center;
        margin-top: 1.5rem;
        color: #6c757d;
    }

    .login-link a {
        color: #2e7d32;
        text-decoration: none;
        font-weight: 500;
    }

    .login-link a:hover {
        text-decoration: underline;
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

    .password-strength {
        margin-top: 0.5rem;
    }

    .password-strength-bar {
        height: 5px;
        border-radius: 3px;
        background: #e9ecef;
        margin-bottom: 0.5rem;
        overflow: hidden;
    }

    .password-strength-fill {
        height: 100%;
        width: 0%;
        transition: all 0.3s ease;
        background: linear-gradient(90deg, #dc3545, #ffc107, #28a745);
    }

    .password-strength-text {
        font-size: 0.8rem;
        color: #6c757d;
    }

    .desa-image {
        width: 100%;
        height: 150px;
        background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
                    url('https://images.unsplash.com/photo-1568515387631-8b650bbcdb90?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80');
        background-size: cover;
        background-position: center;
        border-radius: 12px;
        margin-top: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        padding: 1rem;
        position: relative;
        z-index: 2;
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .register-left > * {
        animation: fadeInUp 0.6s ease-out;
    }

    .logo-section {
        animation-delay: 0.1s;
    }

    .feature-highlight {
        animation-delay: 0.2s;
    }

    .register-feature:nth-child(1) {
        animation-delay: 0.3s;
    }

    .register-feature:nth-child(2) {
        animation-delay: 0.4s;
    }

    .register-feature:nth-child(3) {
        animation-delay: 0.5s;
    }

    .desa-image {
        animation-delay: 0.6s;
    }

    @media (max-width: 768px) {
        .register-left {
            padding: 2rem;
            background: linear-gradient(135deg, rgba(46, 125, 50, 0.95), rgba(27, 94, 32, 0.95)),
                        url('https://images.unsplash.com/photo-1544551763-46a013bb70d5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80');
            background-size: cover;
            background-position: center;
        }

        .register-right {
            padding: 2rem;
        }

        .social-register {
            flex-direction: column;
        }

        body {
            padding: 1rem;
        }

        .brand-title {
            font-size: 1.8rem;
        }

        .register-title {
            font-size: 1.6rem;
        }

        .desa-image {
            height: 120px;
        }
    }

    /* Form group enhancements */
    .form-group {
        margin-bottom: 1.5rem;
    }

    .input-group {
        position: relative;
    }

    .input-group-text {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-right: none;
    }

    .input-group .form-control {
        border-left: none;
    }

    .input-group .form-control:focus {
        border-color: #e9ecef;
        box-shadow: none;
    }

    .input-group .form-control:focus + .input-group-text {
        border-color: #2e7d32;
    }

    /* Custom checkbox */
    .form-check-input:checked {
        background-color: #2e7d32;
        border-color: #2e7d32;
    }

    .form-check-input:focus {
        border-color: #2e7d32;
        box-shadow: 0 0 0 0.2rem rgba(46, 125, 50, 0.25);
    }
</style>
