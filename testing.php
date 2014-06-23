<?php    
    $data = '[{"id":"1","title":"test1","description":"description1","image":"http://host2.demo16753.atservers.net/images/products/small/25.jpg"},{"id":"1","title":"test1","description":"description1","image":"http://host2.demo16753.atservers.net/images/products/small/25.jpg"},{"id":"1","title":"test1","description":"description1","image":"http://host2.demo16753.atservers.net/images/products/small/25.jpg"},{"id":"1","title":"test1","description":"description1","image":"http://host2.demo16753.atservers.net/images/products/small/25.jpg"},{"id":"1","title":"test1","description":"description1","image":"http://host2.demo16753.atservers.net/images/products/small/25.jpg"},]';
    echo $_GET['callback'] . '(' . $data . ')';
?>
