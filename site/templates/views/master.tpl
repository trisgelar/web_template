<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="{$config->urls->templates}images/favicon.ico" />
    <title>{$page->title}</title>
    <meta name="description" content="{$page->summary}" />
    <meta name="generator" content="ProcessWire <?php echo $config->version; ?>" />
    {if $page->seo}
    {$page->seo->render}
    {/if}
    <link rel="stylesheet" href="{$aiom_css}" />
    {block "styles"}{/block}
</head>
<body>
    {include 'partials/header.tpl'}
    {block "content"}{/block}
    {include 'partials/footer.tpl'}
    <script type="text/javascript" src="{$aiom_js}"></script>
    {block "scripts"}{/block}
</body>
</html>