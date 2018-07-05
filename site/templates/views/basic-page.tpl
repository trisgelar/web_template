{extends "master.tpl"}

{block "content"}

    <div class="image-header" style="background-image: url('{$header_image}');">
    	<h1 class="title">{$page->title}</h1>
    </div>

    <div class="content">
    	{$page->body}

    	{$hello}
    </div>

{/block}