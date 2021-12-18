<?php
    $currentPageName = pathinfo(basename($_SERVER['PHP_SELF']), PATHINFO_FILENAME);
?>
<header>
    <a href="/" id="logo-section">
        <img id="logo" src="img/" alt="">
        <h1>GEOMETRIK</h1>
    </a>
    <hr>
        <ul class="nav-links">
            <li class="<?php echo $currentPageName == "index" ? "current-page" : ""; ?>"><a href="index">Home</a></li>
            <li class="<?php echo $currentPageName == "about" ? "current-page" : ""; ?>"><a href="about">About Us</a></li>
            <li class="<?php echo $currentPageName == "architecture" ? "current-page" : ""; ?>"><a href="architecture">Architecture</a></li>
            <li class="<?php echo $currentPageName == "art-instalations" ? "current-page" : ""; ?>"><a href="art-instalations">Art / Instalations</a></li>
            <li class="<?php echo $currentPageName == "contact" ? "current-page" : ""; ?>"><a href="contact">Contact</a></li>
        </ul>
    </nav>
    <div id="hamburger">
        <div class="line1 blue-bg"></div>
        <div class="line2 blue-bg"></div>
        <div class="line3 blue-bg"></div>
    </div>
</header>