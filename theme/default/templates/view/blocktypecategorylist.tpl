<h3 class="rd-edittab-title">Blocktype List<span class="rd-edittab"></span></h3>
<ul>
{foreach from=$categories key=name item=category}
    <li class="{$category.class}"><a href="{$WWWROOT}view/blocks.php?id={$viewid}&amp;c={$category.name}&amp;new={$new}">{$category.title}</a></li>
{/foreach}
</ul>
