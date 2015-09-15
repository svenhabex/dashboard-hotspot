<?php $this->load->view('templates/nav.php'); ?>

<!-- bootstrap validator -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.1/css/bootstrapValidator.min.css"/>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.1/js/bootstrapValidator.min.js"></script>
<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
    <main id="content" class="content" role="main">
        <h1 class="page-title">Wijzig wachtwoord</h1>
        <div class="row">
            <div class="col-md-12">
                <section class="widget">
                    <div class="widget-body">
                        <form class="m-t" role="form" id="changePasswordForm" action="<?php echo site_url('Wachtwoord/setNewPassword/'); ?>" method="post">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Huidig wachtwoord" name="currentPassword" id="currentPassword">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Nieuw wachtwoord" name="inputPassword" id="inputPassword">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Bevestig nieuw wachtwoord" name="confirmPassword" id="confirmPassword">
                            </div>

                            <button type="submit" class="btn btn-primary block full-width m-b"><i class="fa fa-check"></i>&nbsp;&nbsp;Bevestig wachtwoord</button>
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
                currentPassword: {
                    trigger: 'blur',
                    validators: {
                        notEmpty: {
                            message: verplicht
                        },
                        callback: {
                            message: 'Foutief wachtwoord',
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }
                                var wrongPass = null;
                                $.ajax({
                                    async: false,
                                    url: '<?php echo site_url('Wachtwoord/checkUserPassword/'); ?>',
                                    type: 'post',
                                    data: {"pass": $('#currentPassword').val()},
                                    success: function(response) {
                                        wrongPass = eval(response);
                                    }
                                });

                                if (!wrongPass) {
                                    return {
                                        valid: false,
                                        message: 'Foutief wachtwoord'
                                    }
                                }
                                return true;
                            }
                        }
                    }
                },
                inputPassword: {
                    validators: {
                        notEmpty: {
                            message: verplicht
                        },
                        stringLength: {
                            min: 6,
                            message: 'Wachtwoord moet minstens 6 karakters bevatten'
                        }
                    }
                },
                confirmPassword: {
                    validators: {
                        notEmpty: {
                            message: verplicht
                        },
                        callback: {
                            message: 'Geen geldig wachtwoord',
                            callback: function(value, validator, $field) {
                                if (value === '') {
                                    return true;
                                }
                                if ($('#inputPassword').val() != value) {
                                    return {
                                        valid: false,
                                        message: 'Wachtwoorden komen niet overeen'
                                    }
                                }
                                return true;
                            }
                        }
                    }
                }
            }
        });
    });
</script>