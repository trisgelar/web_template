# Kumpulan Snippets

## AIOM & Assets
```
    <div class="logo"><img src="{$config->urls->templates}images/LOGO.svg" alt=""></div>
    div class="iconbox-media"  data-menuanchor="section-1"><a href="#section-2"><img src="{$config->urls->templates}images/icon-1.svg" alt="" class="iconbox-media-img iconbox-media-img-lg"></a>

```

## _init.php
```
    // get six random photos from a random gallery
    $view->set('gallery_photos', getRandomGalleryPhotos(6));

    // builds a menu for the footer
    $view->set('footer_menu', getFooterMenu());

    // get six random photos from a random gallery
    $view->set('gallery_photos', getRandomGalleryPhotos(6));

    // builds a menu for the footer
    $view->set('footer_menu', getFooterMenu());

    // $view->set('our_experiences', getCardExperinces());
    // $view->set('our_services', getCardServices());
```

