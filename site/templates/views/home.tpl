{extends "master.tpl"}
{block "content"}
    <div class="image-header" style="background-image: url('{$header_image}');">
    	<h1 class="title">{$page->title}</h1>
    </div>

    <div class="content">
    	{$page->body}
        <h1>Hello World</h1>

    	{$hello}
    </div>
{/block}