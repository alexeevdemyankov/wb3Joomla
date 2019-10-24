<div class="row">
    <div class="col-12">
        <div id="wb3_menu"></div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <span id="wb3_main"></span>
    </div>
</div>


<script>
    loadRaw('index.php?option=com_webbase3&format=raw&view=wb3_menu', 'wb3_menu', 0);
    <?php echo ($this->sysUrl) ? "loadRaw('$this->sysUrl','wb3_main',0);" : null;?>
</script>