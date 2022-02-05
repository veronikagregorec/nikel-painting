    <div class="social-networks-container">
            <div class="logo-footer">
                <img src="<?php bloginfo('template_directory'); ?>/logo/logoheader4.png" alt="logo" style="width: 250px; height: 60px" class="logo">
            </div>

            <div class="address-footer">
                <h3>Janez Novak s.p.</h3>

                <div style="display:flex;">
                    <i class="material-icons">house</i>
                    <p>Pot iz Ljubljane 85, 1000 Ljubljana</p>
                </div>

                <div style="display:flex;">
                    <i class="material-icons">mail</i>
                    <p>
                        <a href="mailto: &#106;&#097;&#110;&#101;&#122;&#110;&#111;&#118;&#097;&#107;&#064;&#101;&#109;&#097;&#105;&#108;&#046;&#099;&#111;&#109;">Janez Novak</a>
                    </p>
                </div>
            </div>

            <div class="social-footer">
                <a href="#">
                    <img src="<?php bloginfo('template_directory'); ?>/logo/facebook2.png" alt="facebook" style="width: 45px; height: 45px;">
                </a>
            </div>
    </div>


        <div class="copyright">
            <p>&copy 2019 | Vse pravice pridržane &copy Janez Novak s.p. | Izdelava: Veronika G.
            </p>
        </div>

        <button class="scroll-to-top">
            <i class="material-icons">arrow_upward</i>
        </button>

            <div id="cookies" class="cookiesjs">
				
                <p class="cookies-notice">
                    Spletna stran uporablja piškotke zaradi boljše uporabniške izkušnje. Z uporabo spletne strani potrjujete, da se z njihovo uporabo strinjate.
					<a href="<?php echo site_url('/piskotki'); ?>" target="_blank" style="color:#fff;outline:none;">Več o piškotkih.</a>
                </p>
				
                <span class="cookies-button">
                    Razumem
                </span>
            </div>

            <script>
                const cookieBanner = document.querySelector(".cookiesjs");
                const cookieBtn = document.querySelector(".cookies-button");

                setTimeout(() => {
					if (!sessionStorage.getItem("sessionPiskotek"))
						cookieBanner.classList.add("active");
					}, 2000);

                cookieBtn.addEventListener("click", () => {
					cookieBanner.classList.remove("active");
					sessionStorage.setItem("sessionPiskotek", "true");
                });
            </script>

        <?php wp_footer(); ?>
    </body>
</html>