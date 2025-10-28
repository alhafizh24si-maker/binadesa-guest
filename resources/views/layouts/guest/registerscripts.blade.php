<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS jika diperlukan
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    easing: 'ease-in-out',
                    once: true
                });
            }

            // Password strength indicator
            const passwordInput = document.getElementById('password');
            const passwordStrengthFill = document.getElementById('passwordStrengthFill');
            const passwordStrengthText = document.getElementById('passwordStrengthText');
            const passwordConfirmation = document.getElementById('password_confirmation');
            const passwordMatchText = document.getElementById('passwordMatchText');

            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;
                let text = '';
                let color = '';

                // Check password strength
                if (password.length >= 8) strength++;
                if (password.match(/[a-z]+/)) strength++;
                if (password.match(/[A-Z]+/)) strength++;
                if (password.match(/[0-9]+/)) strength++;
                if (password.match(/[!@#$%^&*(),.?":{}|<>]+/)) strength++;

                switch(strength) {
                    case 0:
                    case 1:
                        text = 'Sangat Lemah';
                        color = '#dc3545';
                        break;
                    case 2:
                        text = 'Lemah';
                        color = '#fd7e14';
                        break;
                    case 3:
                        text = 'Cukup';
                        color = '#ffc107';
                        break;
                    case 4:
                        text = 'Kuat';
                        color = '#20c997';
                        break;
                    case 5:
                        text = 'Sangat Kuat';
                        color = '#198754';
                        break;
                }

                const width = (strength / 5) * 100;
                passwordStrengthFill.style.width = width + '%';
                passwordStrengthFill.style.backgroundColor = color;
                passwordStrengthText.textContent = text;
                passwordStrengthText.style.color = color;
            });

            // Password confirmation check
            function checkPasswordMatch() {
                const password = passwordInput.value;
                const confirmPassword = passwordConfirmation.value;

                if (confirmPassword === '') {
                    passwordMatchText.textContent = '';
                    passwordMatchText.style.color = '';
                } else if (password === confirmPassword) {
                    passwordMatchText.textContent = 'Kata sandi cocok';
                    passwordMatchText.style.color = '#198754';
                } else {
                    passwordMatchText.textContent = 'Kata sandi tidak cocok';
                    passwordMatchText.style.color = '#dc3545';
                }
            }

            passwordInput.addEventListener('input', checkPasswordMatch);
            passwordConfirmation.addEventListener('input', checkPasswordMatch);

            // NIK validation (16 digits)
            const nikInput = document.getElementById('nik');
            nikInput.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '').slice(0, 16);
            });

            // Telepon validation
            const teleponInput = document.getElementById('telepon');
            teleponInput.addEventListener('input', function() {
                this.value = this.value.replace(/\D/g, '').slice(0, 13);
            });
        });
    </script>
</body>
</html>
