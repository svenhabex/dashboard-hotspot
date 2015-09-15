<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>

<?php $this->load->view('templates/nav.php'); ?>

<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
    <main id="content" class="content" role="main">
        <h1 class="page-title">Bezoekers <small><small>Alle bezoekers die zich hebben ingecheckt</small></small></h1>
        <div class="row">
            <div class="col-md-12">
                <section class="widget">
                    <header>
                    </header>
                    <div class="widget-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="periode">Toon bezoekers van:</label>
                                    <select class="form-control" id="periode">
                                        <option value="1">Deze week</option>
                                        <option value="2">Afgelopen maand</option>
                                        <option value="3">Afgelopen 6 maanden</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="tabel">
                            <?php $this->load->view('templates/bezoekers/tableBezoekers') ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#periode').change(function(){
            var value = $(this).val();
            var url = "<?php echo site_url('Bezoekers/changeTable'); ?>";
            $('#tabel').load(url, {value: value});
        });
    });
</script>