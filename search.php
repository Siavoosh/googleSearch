<?php
// this line is also for test
if (isset($_GET['q']) && !empty($_GET['q'])) {

    define("PER_PAGE", 10);
    $page = isset($_GET['p']) && !empty($_GET['p']) && is_int((int)$_GET['p']) && (int)$_GET['p'] > 0 ? (int)$_GET['p'] - 1 : 0;
    $count = isset($_GET['c']) && !empty($_GET['c']) && is_int((int)$_GET['c']) && (int)$_GET['c'] > 0 ? ((int)$_GET['c']) : 0;

    $html = "";
    
    do {
        $url = "https://google.com/search?q=" . urlencode($_GET['q']) . "&start=" . ($page++) * PER_PAGE;
        $html .= utf8_encode(file_get_contents($url));
    } while ($count--);

    $pattern = '~[a-z]+://\S+~';
    $links = [];
    if ($num_found = preg_match_all($pattern, $html, $out)) {
        foreach ($out[0] as $l) {
            $l = str_replace("<", "", $l);
            $url_info = parse_url($l);
            if (!strpos($l, "google") && !in_array($url_info['scheme'] . '://' . $url_info['host'], $links))
                $links[] = $url_info['scheme'] . '://' . $url_info['host'];
        }
    }

    echo "<pre>";
    print_r($links);
    echo "</pre>";
} else
    echo 'missed q parameter';
