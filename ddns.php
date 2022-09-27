<?php

$config = require __DIR__.'/config.php';

// 设置IPV4的DDNS
if (!empty($config['ip4'])) {
    require __DIR__.'/api/v4/'.$config['ipApi']['v4'].'.php';
    $ip4 = getV4Ip();
    foreach ($config['ip4'] as $dns => $domains) {
        require_once __DIR__.'/dns/'.$dns.'.php';
        foreach ($domains as $domain) {
            setV4($domain, $ip4);
        }
    }
}
if (!empty($config['ip6'])) {
    require __DIR__.'/api/v6/'.$config['ipApi']['v6'].'.php';
    $ip6 = !empty($config['ip6']) ?getV6Ip(): null;
}



