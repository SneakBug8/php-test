<?php

class SitemapGenerator
{
    public function bootstrap()
    {
        $sitemap = new \SitemapPHP\Sitemap('http://php.sneakbug8.ru');

        $sitemap->setPath(basePath() . "sitemaps/");

        require_once basePath() . "services/post.service.php";
        require_once basePath() . "services/page.service.php";
        require_once basePath() . "services/sidenote.service.php";

        PostService::AppendToSitemap($sitemap);
        PageService::AppendToSitemap($sitemap);
        SitemapService::AppendToSitemap($sitemap);

        $sitemap->createSitemapIndex('http://php.sneakbug8.ru/sitemap/', 'Today');
    }
}

$generator = new SitemapGenerator();
$generator->bootstrap();