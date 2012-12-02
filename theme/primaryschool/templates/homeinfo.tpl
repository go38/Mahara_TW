<div id="home-info-container">
<div id="home-info" class="home-info-table{if $USER->is_logged_in()} loggedin{/if}">
<div id="homebox">
{if $USER->is_logged_in()}
   <div class="btn-findfriends"><a href="{$WWWROOT}user/find.php">Find Friends</a></div>
   <div class="btn-mygroups"><a href="{$WWWROOT}group/mygroups.php">My Groups</a></div>
   <div class="btn-updateprofile"><a href="{$WWWROOT}artefact/internal/">Update Profile</a></div>
   <div class="btn-discuss"><a href="{$WWWROOT}group/topics.php">Discuss</a></div>
   <div class="btn-uploadfiles"><a href="{$WWWROOT}artefact/file">Upload Files</a></div>
   <div class="btn-createpages"><a href="{$WWWROOT}view">Create Pages</a></div>
   <div class="btn-writejournal"><a href="{$WWWROOT}artefact/blog">Write Journal</a></div>
   <div class="btn-sharepages"><a href="{$WWWROOT}view/share.php">Share Pages</a></div>
{else}
	<div class="btn-logintoexplore">Login to explore!</div>
{/if}
</div>
</div>
<p>Click on an activity above</p>
<div class="cb"></div>
</div>
