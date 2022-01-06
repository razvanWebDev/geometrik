<?php
    $currentPageName = pathinfo(basename($_SERVER['PHP_SELF']), PATHINFO_FILENAME);
?>
<header>
    <a href="/" id="logo-section">
        <img id="logo" src="img/" alt="">
        <h1>GEOMETRIK<br><span class="subtitle-span">Arhitecture Office</span></h1>
    </a>
    <nav class="header-menu">
        <ul class="nav-links">
            <?php
                $query = "SELECT * FROM nav_links ORDER BY id";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['name'];
                    $link_to = $row['link_to'];
                    $currentPageClass = ($currentPageName == $link_to ? 'current-page' : '');
                    $link_to = ($link_to == "index" ? "/" : $link_to);
                    
                    echo "<li class=".$currentPageClass."><a href=".$link_to.">$name</a></li>";
                }
            ?>
        </ul>
    </nav>
    <div id="hamburger">
        <div class="line1 blue-bg"></div>
        <div class="line2 blue-bg"></div>
        <div class="line3 blue-bg"></div>
    </div>
</header>