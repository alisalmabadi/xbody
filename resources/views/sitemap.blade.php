@php echo '<?xml version="1.0" encoding="UTF-8"?>'; @endphp

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($site_maps as $site_map)

    <url>
        <loc>{{$site_map['loc']}}</loc>
        <priority>{{$site_map['priority']}}</priority>
        <changefreq>{{$site_map['changefreq']}}</changefreq>

    </url>

    @endforeach
</urlset>