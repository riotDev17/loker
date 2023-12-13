  <script src="<?php echo base_url("assets/js/alpine-collaspe.min.js") ?>"></script>
  <script src="<?php echo base_url("assets/js/alpine-persist.min.js") ?>"></script>
  <script defer src="<?php echo base_url("assets/js/alpine-ui.min.js") ?>"></script>
  <script defer src="<?php echo base_url("assets/js/alpine-focus.min.js") ?>"></script>
  <script defer src="<?php echo base_url("assets/js/alpine.min.js") ?>"></script>
  <script src="<?php echo base_url("assets/js/custom.js") ?>"></script>
  <script defer src="<?php echo base_url("assets/js/apexcharts.js") ?>"></script>

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
              }
          }));

          // theme customization
          Alpine.data('customizer', () => ({
              showCustomizer: false
          }));

          // header section
          Alpine.data('header', () => ({
              init() {
                  const selector = document.querySelector('ul.horizontal-menu a[href="' + window.location.pathname + '"]');
                  if (selector) {
                      selector.classList.add('active');
                      const ul = selector.closest('ul.sub-menu');
                      if (ul) {
                          let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                          if (ele) {
                              ele = ele[0];
                              setTimeout(() => {
                                  ele.classList.add('active');
                              });
                          }
                      }
                  }
              },
          }));
      });
  </script>