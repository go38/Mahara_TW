{if $MAINNAV}
    <div id="top-nav-wrapper">
        <div id="main-nav" class="dropdown-main">
            <ul>
                {strip}
                    {foreach from=$MAINNAV item=item}
                        {if $item.weight == 10}
                            <li class="{if $item.selected}selected{/if} dropdown-nav-home"{if $item.accesskey} id="{$item.accesskey}"{/if}>
                                <span>
                                    <a href="{$WWWROOT}{$item.url}"{if $item.accesskey} accesskey="{$item.accesskey}"{/if} class="{if $item.path}{$item.path}{else}dashboard{/if}">{$item.title}</a>
                                </span>
                        {else}
                            <li{if $item.accesskey} id="{$item.accesskey}"{/if} {if $item.selected} class="selected"{/if}>
                                <span>
                                    <a href="{$WWWROOT}{$item.url}"{if $item.accesskey} accesskey="{$item.accesskey}"{/if} class="{if $item.path}{$item.path}{else}dashboard{/if}">{$item.title}</a>
                                </span>
                        {/if}
                        {if $item.submenu}
                            <ul class="dropdown-sub">
                                {strip}
                                    {foreach from=$item.submenu item=subitem}
                                        <li>
                                            <span>
                                                <a href="{$WWWROOT}{$subitem.url}"{if $subitem.accesskey} accesskey="{$subitem.accesskey}"{/if}>{$subitem.title}</a>
                                            </span>
                                        </li>
                                    {/foreach}
                                {/strip}
                            </ul>
                        {/if}
                            </li>
                    {/foreach}
                    {if $ADMIN || $INSTITUTIONALADMIN}
                        <li>
                            <span>
                                <a href="{$WWWROOT}" accesskey="h" class="return-site">{str tag="returntosite"}</a>
                            </span>
                        </li>
                    {elseif $USER->get('admin')}
                        <li>
                            <span>
                                <a href="{$WWWROOT}admin/" accesskey="a" class="admin-site">{str tag="siteadministration"}</a>
                            </span>
                        </li>
                    {elseif $USER->is_institutional_admin()}
                        <li>
                            <span>
                                <a href="{$WWWROOT}admin/users/search.php" accesskey="a" class="admin-user">{str tag="institutionadministration"}</a>
                            </span>
                        </li>
                    {/if}
                {/strip}
            </ul>
        </div>
        <div id="menu-date">
            <?php echo date("F j, Y"); ?>
        </div>
    </div>
{else}
    <div id="top-nav-wrapper">
        <div id="main-nav">
            <ul>
                {strip}
                    <li{if $item.selected} class="selected"{/if}>
                        <span>
                                <a href="{$WWWROOT}" accesskey="h" class="return-site">{str tag="returntosite"}</a>
                        </span>
                    </li>
                {/strip}
            </ul>
        </div>
        <div id="menu-date">
            <?php echo date("F j, Y"); ?>
        </div>
    </div>
{/if}