<link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">

   <style>
      /* Custom Navbar Styles */
      .navbar-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1030;
        background: #fff;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
      }

      .topbar {
        background: linear-gradient(135deg, #2e7d32 0%, #1b5e20 100%);
        color: white;
        padding: 8px 0;
        font-size: 0.85rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      }

      .topbar a {
        color: rgba(255, 255, 255, 0.9) !important;
        text-decoration: none;
        transition: all 0.3s ease;
      }

      .topbar a:hover {
        color: white !important;
      }

      .navbar-main {
        background: white;
        padding: 0.8rem 0;
        transition: all 0.3s ease;
      }

      .navbar-brand h1 {
        font-weight: 700;
        font-size: 1.8rem;
        background: linear-gradient(135deg, #2e7d32, #4caf50);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin: 0;
      }

      .nav-item .nav-link {
        font-weight: 500;
        color: #495057;
        padding: 0.5rem 1rem;
        margin: 0 0.2rem;
        border-radius: 6px;
        transition: all 0.3s ease;
        position: relative;
      }

      .nav-item .nav-link:hover {
        color: #2e7d32;
        background: rgba(46, 125, 50, 0.05);
      }

      .nav-item .nav-link.active {
        color: #2e7d32;
        font-weight: 600;
      }

      .nav-item .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 1rem;
        right: 1rem;
        height: 2px;
        background: linear-gradient(135deg, #2e7d32, #4caf50);
        border-radius: 2px;
      }

      .dropdown-menu {
        border: none;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 0.5rem 0;
        margin-top: 0.5rem;
      }

      .dropdown-item {
        padding: 0.6rem 1.2rem;
        color: #495057;
        transition: all 0.2s ease;
        font-weight: 500;
      }

      .dropdown-item:hover {
        background: rgba(46, 125, 50, 0.08);
        color: #2e7d32;
      }

      .navbar-actions {
        display: flex;
        align-items: center;
        gap: 0.8rem;
      }

      .action-btn {
        background: none;
        border: none;
        color: #6c757d;
        font-size: 1.2rem;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        position: relative;
      }

      .action-btn:hover {
        background: rgba(46, 125, 50, 0.1);
        color: #2e7d32;
      }

      .notification-badge {
        position: absolute;
        top: -2px;
        right: -2px;
        background: #ff6b6b;
        color: white;
        border-radius: 50%;
        width: 18px;
        height: 18px;
        font-size: 0.7rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
      }

      .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #2e7d32, #4caf50);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px solid transparent;
      }

      .user-avatar:hover {
        transform: scale(1.05);
        border-color: rgba(46, 125, 50, 0.2);
      }

      .user-dropdown-menu {
        border: none;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 0.5rem 0;
        min-width: 200px;
      }

      .user-dropdown-item {
        padding: 0.7rem 1.2rem;
        color: #495057;
        transition: all 0.2s ease;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
      }

      .user-dropdown-item:hover {
        background: rgba(46, 125, 50, 0.08);
        color: #2e7d32;
      }

      .user-dropdown-divider {
        margin: 0.3rem 0;
      }

      .navbar-toggler {
        border: none;
        padding: 0.5rem;
        font-size: 1.2rem;
        color: #2e7d32;
      }

      .navbar-toggler:focus {
        box-shadow: none;
      }

      /* Responsive adjustments */
      @media (max-width: 1199.98px) {
        .nav-item .nav-link {
          padding: 0.5rem 0.8rem;
          margin: 0 0.1rem;
        }
      }

      @media (max-width: 991.98px) {
        .navbar-collapse {
          background: white;
          padding: 1rem;
          border-radius: 0 0 10px 10px;
          box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
          margin-top: 0.5rem;
        }

        .nav-item .nav-link {
          margin: 0.2rem 0;
        }

        .navbar-actions {
          justify-content: center;
          margin-top: 1rem;
          padding-top: 1rem;
          border-top: 1px solid #e9ecef;
        }
      }

      /* Adjust main content for fixed navbar */
      main {
        margin-top: 120px;
      }

      @media (max-width: 991.98px) {
        main {
          margin-top: 80px;
        }
      }
    </style>
</head>
    </style>
  </head>
  <body>
