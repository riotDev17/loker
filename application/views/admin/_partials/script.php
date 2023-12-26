   <?php if ($this->session->flashdata('pesan')) : ?>
       <script>
           document.addEventListener('DOMContentLoaded', function() {
               const toast = window.Swal.mixin({
                   toast: true,
                   position: 'top-end',
                   showConfirmButton: false,
                   timer: 3000,
                   padding: '2em',
               });

               toast.fire({
                   icon: 'success',
                   title: '<?= $this->session->flashdata('pesan') ?>',
                   padding: '2em',
               });
           });
       </script>
   <?php endif; ?>
   <?php if ($this->session->flashdata('error')) : ?>
       <script>
           document.addEventListener('DOMContentLoaded', function() {
               const toast = window.Swal.mixin({
                   toast: true,
                   position: 'top-end',
                   showConfirmButton: false,
                   timer: 3000,
                   padding: '2em',
               });

               toast.fire({
                   icon: 'error',
                   title: '<?= $this->session->flashdata('error') ?>',
                   padding: '2em',
               });
           });
       </script>
   <?php endif; ?>
   <?php if ($this->session->flashdata('success')) : ?>
       <script>
           document.addEventListener('DOMContentLoaded', function() {
               const toast = window.Swal.mixin({
                   toast: true,
                   position: 'top-end',
                   showConfirmButton: false,
                   timer: 3000,
                   padding: '2em',
               });

               toast.fire({
                   icon: 'success',
                   title: '<?= $this->session->flashdata('success') ?>',
                   padding: '2em',
               });
           });
       </script>
   <?php endif; ?>
   <script src="assets/js/alpine-collaspe.min.js"></script>
   <script src="assets/js/alpine-persist.min.js"></script>
   <script defer src="assets/js/alpine-ui.min.js"></script>
   <script defer src="assets/js/alpine-focus.min.js"></script>
   <script defer src="assets/js/alpine.min.js"></script>
   <script src="assets/js/custom.js"></script>

   <script>
       document.addEventListener('alpine:init', () => {
           // main section
           Alpine.data('scrollToTop', () => ({
               showTopButton: false,
               init() {
                   window.onscroll = () => {
                       this.scrollFunction();
                   };
               },

               scrollFunction() {
                   if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                       this.showTopButton = true;
                   } else {
                       this.showTopButton = false;
                   }
               },

               goToTop() {
                   document.body.scrollTop = 0;
                   document.documentElement.scrollTop = 0;
               },
           }));

           // theme customization
           Alpine.data('customizer', () => ({
               showCustomizer: false,
           }));

           // sidebar section
           Alpine.data('sidebar', () => ({
               init() {
                   const selector = document.querySelector('.sidebar ul a[href="' + window.location.pathname + '"]');
                   if (selector) {
                       selector.classList.add('active');
                       const ul = selector.closest('ul.sub-menu');
                       if (ul) {
                           let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                           if (ele) {
                               ele = ele[0];
                               setTimeout(() => {
                                   ele.click();
                               });
                           }
                       }
                   }
               },
           }));
       });
   </script>