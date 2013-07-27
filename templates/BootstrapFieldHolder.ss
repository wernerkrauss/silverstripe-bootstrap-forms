<div id="$Name" class="$HolderClasses" $HolderAttributes>
    <label class="control-label" for="$ID">$Title Name:</label>
    <div class="controls">
        <% if $Icon %>
            <div class="input-prepend">
            <span class="add-on"><i class="icon-$Icon"></i></span>
            $Field
            </div>       
        <% else %>
            $Field
        <% end_if %>
        <% if $HelpText %>
        <p class="help-block">$HelpText</p>
        <% end_if %>
        <% if $InlineHelpText %>
        <span class="help-inline">$InlineHelpText</span>
        <% end_if %>    
    </div>
</div>

