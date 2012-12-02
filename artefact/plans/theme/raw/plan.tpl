{include file="header.tpl"}
<div id="planswrap">
    <div class="rbuttons">
        <a class="btn" href="{$WWWROOT}artefact/plans/new.php?id={$plan}">{str section="artefact.plans" tag="newtask"}</a>
    </div>
{if !$tasks.data}
    <div>{str tag="planstasksdesc" section="artefact.plans"}</div>
    <div class="message">{$strnotasksaddone|safe}</div>
{else}
<table id="taskslist" class="fullwidth listing">
    <thead>
        <tr>
            <th class="completiondate">{str tag='completiondate' section='artefact.plans'}</th>
            <th class="plantasktitle">{str tag='title' section='artefact.plans'}</th>
            <th class="plantaskdescription">{str tag='description' section='artefact.plans'}</th>
            <th class="completed">{str tag='completed' section='artefact.plans'}</th>
            <th class="planscontrols"></th>
        </tr>
    </thead>
    <tbody>
        {$tasks.tablerows|safe}
    </tbody>
</table>
   {$tasks.pagination|safe}
{/if}
</div>
{include file="footer.tpl"}
