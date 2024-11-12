<?php
function antiinjection($koneksi, $data) {
    // Remove any slashes, HTML tags, and special characters
    $filter_sql = mysqli_real_escape_string($koneksi, stripslashes(strip_tags(htmlspecialchars($data))));
    
    return $filter_sql;
}
?>
