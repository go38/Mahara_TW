{include file="header.tpl"}
{if $GROUP}
    <h2>{$PAGESUBHEADING}{if $SUBPAGEHELPNAME}<span class="page-help-icon">{$PAGEHELPICON|safe}</span>{/if}</h2>
{/if}
{if !$views}
        <div class="message">{str tag=noviews section=collection}</div>
{else}
<table id="collectionviews" class="fullwidth">
    <tbody>
        {foreach from=$views.views item=view}
            <tr class="{cycle values='r0,r1'}">
                {if $views.count > 1}
                <td class="displayordercontrols btns2">
                    {if $view->displayorder == $views.min}
                        <div id="viewdisplayorder_{$view->view}" class="justdown">
                            <a href="{$displayurl}&amp;view={$view->view}&amp;direction=down"><img src="{theme_url filename='images/move-down.gif'}" alt="Move Down" ></a>
                        </div>
                    {elseif $view->displayorder == $views.max}
                        <div id="viewdisplayorder_{$view->view}" class="justup">
                            <a href="{$displayurl}&amp;view={$view->view}&amp;direction=up"><img src="{theme_url filename='images/move-up.gif'}" alt="Move Up" ></a>
                        </div>
                    {else}
                        <div id="viewdisplayorder_{$view->view}">
                            <a href="{$displayurl}&amp;view={$view->view}&amp;direction=up"><img src="{theme_url filename='images/move-up.gif'}" alt="Move Up" ></a>
                            <a href="{$displayurl}&amp;view={$view->view}&amp;direction=down"><img src="{theme_url filename='images/move-down.gif'}" alt="Move Down" ></a>
                        </div>
                    {/if}
                </td>
                {else}
                    <td>&nbsp;</td>
                {/if}
                <td><label><a href="{$view->fullurl}">{$view->title}</a></label></td>
                <td class="s"><div class="fr">{$view->remove|safe}</div></td>
            </tr>
        {/foreach}
    </tbody>
</table>
{/if}
<fieldset>
<legend>{str tag=addviewstocollection section=collection}</legend>
{if $viewsform}
    {$viewsform|safe}
{else}
    {str tag=noviewsavailable section=collection}
{/if}
</fieldset>
<a class="btn" href="{$baseurl}">{str tag=done}</a>
{include file="footer.tpl"}
