<div id="$Name" class="$HolderClasses" $HolderAttributes>
    <label class="control-label" for="$ID">$Title Bar </label>
    <div class="controls">    
        <% if AppendedText || PrependedText %>
        	<div class="<% if AppendedText %>$input-append<% end_if %><% if PrependedText %> input-prepend<% end_if %>">
        		<% if PrependedText %><span class="add-on">$PrependedText</span><% end_if %>
                        <% if $Icon %><span class="add-on"><i class="icon-$Icon"></i></span><% end_if %>
                        $Field
                        <% if AppendedText %><span class="add-on">$AppendedText</span><% end_if %>
        	</div>
        <% else %>
        <% if $Icon %>
            <div class="input-prepend">
            <span class="add-on"><i class="icon-$Icon"></i></span>
            $Field
            </div>       
        <% else %>
            $Field
        <% end_if %>
        <% end_if %>

        <% if HelpText %>
        <p class="help-block">$HelpText</p>
        <% end_if %>
        <% if InlineHelpText %>
        <span class="help-inline">$InlineHelpText</span>
        <% end_if %>

    </div>
</div>
