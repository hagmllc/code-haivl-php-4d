<?php

include("include/config.php");
$thebaseurl = $config['baseurl'];
header("Content-Type: application/xml; charset=utf-8");

$top = '<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

<url>
  <loc>'.$thebaseurl.'/</loc>
  <priority>1.00</priority>
  <changefreq>weekly</changefreq>
</url>
';

$bottom = '<url>
  <loc>'.$thebaseurl.'/hot</loc>
  <priority>0.80</priority>
  <changefreq>weekly</changefreq>
</url>
<url>
  <loc>'.$thebaseurl.'/trending</loc>
  <priority>0.80</priority>
  <changefreq>weekly</changefreq>
</url>
<url>
  <loc>'.$thebaseurl.'/vote</loc>
  <priority>0.80</priority>
  <changefreq>weekly</changefreq>
</url>
<url>
  <loc>'.$thebaseurl.'/top</loc>
  <priority>0.80</priority>
  <changefreq>weekly</changefreq>
</url>
<url>
  <loc>'.$thebaseurl.'/fast</loc>
  <priority>0.80</priority>
  <changefreq>weekly</changefreq>
</url>
<url>
  <loc>'.$thebaseurl.'/login</loc>
  <priority>0.50</priority>
  <changefreq>weekly</changefreq>
</url>
<url>
  <loc>'.$thebaseurl.'/signup</loc>
  <priority>0.50</priority>
  <changefreq>weekly</changefreq>
</url>
<url>
  <loc>'.$thebaseurl.'/about</loc>
  <priority>0.30</priority>
  <changefreq>weekly</changefreq>
</url>
<url>
  <loc>'.$thebaseurl.'/rules</loc>
  <priority>0.30</priority>
  <changefreq>weekly</changefreq>
</url>
<url>
  <loc>'.$thebaseurl.'/faq</loc>
  <priority>0.30</priority>
  <changefreq>weekly</changefreq>
</url>
<url>
  <loc>'.$thebaseurl.'/contact</loc>
  <priority>0.30</priority>
  <changefreq>weekly</changefreq>
</url>
<url>
  <loc>'.$thebaseurl.'/terms_of_service</loc>
  <priority>0.30</priority>
  <changefreq>weekly</changefreq>
</url>
<url>
  <loc>'.$thebaseurl.'/privacy_policy</loc>
  <priority>0.30</priority>
  <changefreq>weekly</changefreq>
</url>
</urlset>';

echo $top;

$ketnoi = mysql_connect($DBHOST, $DBUSER, $DBPASSWORD);
if (!$ketnoi)
{
die("Không thể kết nối tới MySQL Server: ".mysql_error($ketnoi));
}
mysql_select_db($DBNAME, $ketnoi) or die ("Không chọn được CSDL: ".mysql_error($ketnoi));

$truyvan = "SELECT * FROM posts ORDER BY PID DESC";
$ketqua = mysql_query($truyvan, $ketnoi);
if (!$ketqua)
die("Không thể thực hiện truy vấn SQL: ".mysql_error($ketnoi));

while($row = mysql_fetch_row($ketqua))
{
echo "<url>\n  <loc>".$thebaseurl."/gag/".$row[0]."</loc>\n  <priority>0.80</priority>\n  <changefreq>weekly</changefreq>\n</url>\n";
}
mysql_free_result($ketqua);
mysql_close($ketnoi);

echo $bottom;

?>
