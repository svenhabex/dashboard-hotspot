<?php $this->load->view('templates/nav.php'); ?>

<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
    <main id="content" class="content" role="main">
        <h1 class="page-title">Dashboard <small><small>Al uw statistieken in één oogopslag</small></small></h1>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <section class="widget bg-primary text-white">
                    <div class="widget-body clearfix">
                        <div class="row">
                            <div class="col-xs-3">
                                <span class="widget-icon">
                                    <i class="fa fa-users"></i>
                                </span>
                            </div>
                            <div class="col-xs-9">
                                <h5 class="no-margin">AANTAL BEZOEKERS</h5>
                                <p class="h2 no-margin fw-normal"><?= $numberVisitors ?></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-6 col-sm-12">
                <section class="widget bg-gray text-white">
                    <div class="widget-body clearfix">
                        <div class="row">
                            <div class="col-xs-3">
                                <span class="widget-icon">
                                    <i class="fa fa-clock-o"></i>
                                </span>
                            </div>
                            <div class="col-xs-9">
                                <h5 class="no-margin">GEMIDDELDE DUUR</h5>
                                <p class="h2 no-margin fw-normal">-- min</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <section class="widget">
                    <header>
                        <h4>
                            <span class="fw-semi-bold">Aantal</span> bezoekers
                        </h4>
                        <div class="widget-controls">
                            <a href="#" data-widgster="close"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </header>
                    <div class="widget-body">
                        <p class="fs-mini text-muted">
                            Aantal bezoekers voor <span class="fw-semi-bold"><?= $_SESSION['name'] ?></span>.
                        </p>
                        <div id="bezoekers-graph">
                            <?php $this->load->view('templates/graphs/bezoekers-graph'); ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
</div>

<script type="text/javascript">
    $(document).ready(function(){
    });
</script>