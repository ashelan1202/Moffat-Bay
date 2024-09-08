<footer>
    <div id="footer">
        <div class="links " id="footerLinks">
            <h2 style="color:#F5EFE6;">Helpful Links</h2>
<?php
        foreach($pages as $key => $value){
            if($key != $title){
                echo "<a class=\"link\" href=\"".$value."\"><p>".$key."</p></a>";
            }
        }
        ?>
        </div>
        <div class="hidden"></div>
        <div id="newsletter">
            <h2>Newsletter Sign-up</h2>
            <p>Stay up to date with the most recent news from The Moffat Bay Lodge</p>
            <form name="newsletter" method="POST" action="">
                <p><input type="email" style="border-radius: 20px; border: 0" value="Your Email"></p>
                <input type="submit" name="newsletter-submit">
            </form>
        </div>
        <div class=hidden"></div>
        <div id="contact-us">
            <h2>Contact Us</h2>
            <h3>1-123-456-7891</h3>
            <h3>VistorService@moffatbay.com</h3>
        </div>
        <div
    </div>
</footer>
</body>
</html>