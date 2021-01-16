
<div id="navIcons">
    <a title="Home" href="/" id="navHome" class="icon <?php if (is_home() || is_front_page()){ echo "active"; }?>">Home</a>
    <a title="About Me" href="/about" id="navAbout" class="icon <?php if (is_page('about')){ echo "active"; }?>">About</a>
    <a title="Portfolio" href="/portfolio" id="navPortfolio" class="icon <?php if (is_page('portfolio')){ echo "active"; }?>">Portfolio</a>
    <a title="Contact Me" href="/contact" id="navContact" class="icon <?php if (is_page('contact')){ echo "active"; }?>">Contact</a>
    <a title="Awards" href="/awards" id="navAwards" class="icon <?php if (is_page('awards')){ echo "active"; }?>">Awards</a>
    <a title="Testimonials" href="/testimonials" id="navTest" class="icon <?php if (is_page('testimonials')){ echo "active"; }?>">Testimonials</a>
    <a title="Links" href="/links" id="navLinks" class="icon <?php if (is_page('links')){ echo "active"; }?>">Links</a>
</div><!--/navIcons-->