<?php $this->load->view('templates/nav.php'); ?>

<!-- bootstrap validator -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.1/css/bootstrapValidator.min.css"/>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.1/js/bootstrapValidator.min.js"></script>
<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
    <main id="content" class="content" role="main">
        <h1 class="page-title">Wijzig wifi wachtwoord</h1>
        <div class="row">
            <div class="col-md-12">
                <section class="widget">
                    <div class="widget-body">
                        <form class="m-t" role="form" id="changePasswordForm" action="<?php echo site_url('Wachtwoord/setNewWifiPassword/'); ?>" method="post">
                            <div class="form-group">
                                <p>Huidig wifi wachtwoord: </p>
                                <strong><?= $currentWifiPw ?></strong>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="nieuw wifi wachtwoord" name="newWifiPw" id="newWifiPw">
                            </div>

                            <button type="submit" class="btn btn-primary block full-width m-b"><i class="fa fa-check"></i>&nbsp;&nbsp;wifi wachtwoord instellen</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </main>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        verplicht = "Verplict veld";
        $('#changePasswordForm').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                newWifiPw: {
                    validators: {
                        notEmpty: {
                            message: verplicht
                        },
                        stringLength: {
                            min: 4,
                            message: 'Wachtwoord moet minstens 4 karakters bevatten'
                        }
                    }
                }
            }
        });
    });
</script>