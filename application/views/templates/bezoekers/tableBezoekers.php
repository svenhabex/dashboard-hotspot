<table class="table" id="bezoekers-table">
    <thead>
    <tr>
        <th>Naam</th>
        <th>Aantal checkins</th>
        <th>Tijdstip</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($visitors as $visitor){ ?>
        <tr>
            <td><?= $visitor->visitor; ?></td>
            <td><?= $visitor->count; ?></td>
            <td><?php echo date("d/m/Y H:i", $visitor->time); ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function(){
        var bezoekersTable = $('#bezoekers-table').DataTable({
            dom: 'lfrtip'
        });
        bezoekersTable.draw();
    });
</script>