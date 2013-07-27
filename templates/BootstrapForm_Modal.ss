
<% if IncludeFormTag %>
<form $AttributesHTML>
<% end_if %>
    <div class="modal-body">
	<% if Message %>
		<% if MessageType == "good" %>
			<div id="{$FormName}_error" class="alert alert-success">$Message</div>
		<% else_if MessageType == "info" %>
			<div id="{$FormName}_error" class="alert alert-info">$Message</div>	
		<% else_if MessageType == "bad" %>
			<div id="{$FormName}_error" class="alert alert-error">$Message</div>	
		<% end_if %>
	<% end_if %>
	
	<fieldset>
		<% if Legend %><legend>$Legend</legend><% end_if %> 
		<% loop Fields %>
			$FieldHolder
		<% end_loop %>
		<div class="clear"><!-- --></div>
	</fieldset>
    </div>

    <div class="modal-footer">
	<% if Actions %>
		<% loop Actions %>
			$Field
		<% end_loop %>
        <% else %>
                <button href="#" class="btn" data-dismiss="modal" aria-hidden="true"><%t CLOSE 'Abbrechen' %></button>
	<% end_if %>
    </div>
<% if IncludeFormTag %>
</form>
<% end_if %>
