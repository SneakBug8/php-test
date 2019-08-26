<?php

class SitemapGenerator
{
    public function bootstrap()
    {
        $sitemap = new \SitemapPHP\Sitemap('https://sneakbug8.com');

        $sitemap->setPath(basePath() . "../sitemaps/");

        require_once basePath() . "services/post.service.php";
        require_once basePath() . "services/page.service.php";
        require_once basePath() . "services/sidenote.service.php";

        PostService::AppendToSitemap($sitemap);
        PageService::AppendToSitemap($sitemap);
        SidenoteService::AppendToSitemap($sitemap);

        $sitemap->createSitemapIndex('https://sneakbug8.com/sitemap/', 'Today');
    }
}

$generator = new SitemapGenerator();
$generator->bootstrap();