<?php

    function filterHref($href) {
        if(!empty($href) & 
            ($href != 'https://hashnode.com/@paulovitorcs') &
                ($href != 'https://hashnode.com/@TBussola') &
                    ($href != 'https://discord.gg/H5wPNCTRwq') &
                        ($href != '/newsletter') &
                            ($href !== '/') ) {
            return true;
        } else {
            return false;
        }
    }

    function filterName($name){
        if(!empty($name->nodeValue) &
            (!strpos($name->nodeValue, 'css') !== false) &
                    (!strpos($name->nodeValue, 'read') !== false) &
                        (!strpos($name->nodeValue, 'Vitor') !== false) &
                            (!strpos($name->nodeValue, 'Dart') !== false) &
                                ($name->nodeValue !== 'Home') &
                                    (!strpos($name->nodeValue, 'discord') !== false) &
                                        ($name->nodeValue !== 'Newsletter') &
                                            (!strpos($name->nodeValue, 'vantagens') !== false) &
                                                (!strpos($name->nodeValue, 'Bussola') !== false)){
            return true;
        } else {
            return false;
        }
    }

?>