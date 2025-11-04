<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Kategori Berita - Binadesa</title>

  <!-- ======= Google Font =======-->
    @include('layouts.guest.googlefont')
    <!-- End Google Font-->

    <!-- ======= Styles =======-->
    @include('layouts.guest.styles')
    <!-- End Styles-->

    <!-- ======= Theme Style =======-->
    @include('layouts.guest.css')
    <!-- End Theme Style-->

    <!-- ======= Site Wrap =======-->
    <div class="site-wrap">

      <!-- ======= Header =======-->
      @include('layouts.guest.header')
      <!-- End Header-->

      <!-- Improved Navbar -->
      @include('layouts.guest.navbar')
      <!-- End Improved Navbar -->

      <!-- ======= Main =======-->
        @yield('content')
      <!-- ======= End Main =======-->


      <!-- ======= Footer =======-->
      @include('layouts.guest.footer')
      <!-- End Footer-->

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6281234567890?text=Halo%20Admin%2C%20saya%20ingin%20bertanya%20tentang%20Web%20Binadesa."
       class="whatsapp-float" target="_blank" rel="noopener" title="Hubungi kami di WhatsApp">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <i class="fab fa-whatsapp"></i>

    </a>

    <style>
        /* Floating WhatsApp Button */
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 25px;
            right: 25px;
            background-color: #25D366;
            color: #fff;
            border-radius: 50%;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.3);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: bounceIn 0.8s ease;
        }

        .whatsapp-float:hover {
            background-color: #20ba5a;
            transform: scale(1.1);
            box-shadow: 4px 4px 15px rgba(0,0,0,0.4);
        }

        @keyframes bounceIn {
            0% { transform: scale(0.5); opacity: 0; }
            60% { transform: scale(1.2); opacity: 1; }
            100% { transform: scale(1); }
        }
    </style>

@push('styles')
<style>
    .title-border-radius {
        border-radius: 10px;
    }
    .card {
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .card-header {
        border-bottom: 2px solid rgba(0,0,0,0.1);
    }
    .btn-group .btn {
        margin: 0 2px;
    }
    .badge {
        font-size: 0.8em;
        padding: 0.35em 0.65em;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Auto-dismiss alerts after 5 seconds
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            setTimeout(function() {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }, 5000);
        });

        // Enhanced delete confirmation
        const deleteForms = document.querySelectorAll('form[action*="destroy"]');
        deleteForms.forEach(function(form) {
            form.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menghapus...';
                }
            });
        });

        console.log('Keluarga index page loaded with enhanced features');
    });
</script>
@endpush
    <!-- ======= Javascripts =======-->
    @include('layouts.guest.javascripts')
   <!-- ======= End Javascripts =======-->
