<?php $this->load->view('templates/nav.php'); ?>
<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
    <main id="content" class="content" role="main">
        <h1 class="page-title">Mail <small><small>instellingen voor het versturen van mails</small></small></h1>
        <div class="row">
            <div class="col-md-12">
                <section class="widget">
                    <header>
                        <legend>Verjaardagen</legend>
                    </header>
                    <div class="widget-body">
                        <p>Iedere bezoeker krijgt bij zijn verjaardag een mail toegestuurd.</p>
                        <p><strong>Tekst:</strong></p>
                        <form class="form-horizontal" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <textarea rows="3" class="autogrow form-control transition-height" id="default-textarea" placeholder="Verjaardagsboodschap.." style="overflow: hidden; word-wrap: break-word; resize: horizontal;"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button class="btn btn-success width-100 mb-xs form-control" role="button">Activeren</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <section class="widget">
                    <header>
                        <legend>Nieuwsbrieven</legend>
                    </header>
                    <div class="widget-body">
                        <p>U kan een nieuwsbrief versturen naar al uw bezoekers.</p>
                        <p><strong>Tekst:</strong></p>
                        <form class="form-horizontal" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <textarea rows="3" class="autogrow form-control transition-height" id="textMail" placeholder="Tekst in nieuwsbrief.." style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 74px;"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <input type="radio" name="radio" id="radio1" value="option1">
                                            <label for="radio1">Alle bezoekers</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" name="radio" id="radio2" value="option2">
                                            <label for="radio2">Bezoekers laatste 6 maanden</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" name="radio" id="radio3" value="option3">
                                            <label for="radio3">Bezoekers laatste 3 maanden</label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" name="radio" id="radio4" value="option4">
                                            <label for="radio4">Bezoekers laatste maand</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <a class="btn btn-success width-100 mb-xs form-control" role="button" id="send">Versturen</a>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        <div id="error" style="color: red"></div>
                        <div id="succes" style="color: green"></div>
                    </div>
                </section>
            </div>
        </div>
    </main>
</div>

<script type="text/javascript">
    $( document ).ready(function() {

        $('#send').click(function(e){
            var text = $('#textMail').val();
            var option = $('input[name=radio]:checked').val()

            if(text == ''){
                $('#error').append('<p>Vul een tekst in!</p>');
            }

            if(option == null){
                $('#error').append('<p>Duidt aan naar welke bezoekers u deze nieuwsbrief wil sturen!</p>');
            }

            if(option != null && text != ''){
                $('#error').text('');
                $('#succes').text('Geslaagd, alle mails worden nu verstuurd!');

                $.ajax({
                    'type': "POST",
                    'url': "<?php echo site_url('Mail/sendNieuwsbrief');?>",
                    'data': {'text' : text, 'option' : option},
                    'success': function (response) {
                        console.log(response);
                    }
                });
            }
        });
    });
</script>