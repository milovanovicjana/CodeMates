<!-- Milica Aleksic 716/19 -->

<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mixology(quiz)</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('images/others/logo5.png')?>"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('style_mili.css')?>">
    

</head>

<body>

    <!--KVIZ-->
    <div class="container">
        <div class="row center">
            <div class="col-sm-2"> &nbsp; </div>
            <form class="col-sm-8" name="answer" method="post" action="<?=site_url("RegisteredController/quiz")?>">
                <h1 style="text-align:center">What coctail describes your personality?</h1>
                <br><br>

                <div class="options">
                <h4 style="text-align:center">1. What is the perfect place for a night out?</h4>
                <br>
                <div style="text-align:center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=4 name="inlineRadioOptions1" checked>
                        <label class="form-check-label" for="party">Party</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=3 name="inlineRadioOptions1">
                        <label class="form-check-label" for="restaurant">Restaurant</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=1 name="inlineRadioOptions1">
                        <label class="form-check-label" for="house">House</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=2 name="inlineRadioOptions1">
                        <label class="form-check-label" for="park">Park</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=5 name="inlineRadioOptions1">
                        <label class="form-check-label" for="gig">Gig</label>
                    </div>
                </div>
                </div>

                <br><br>

                <div class="options" >
                <h4 style="text-align:center">2. What colour describes your personality?</h4>
                <br>
                <div style="text-align:center";>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=4 name="inlineRadioOptions2" checked>
                        <label class="form-check-label" for="red">Red</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=3 name="inlineRadioOptions2">
                    <label class="form-check-label" for="green" >Green</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=2 name="inlineRadioOptions2">
                        <label class="form-check-label" for="yellow">Yellow</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=5 name="inlineRadioOptions2">
                        <label class="form-check-label" for="pink" >Pink</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=1 name="inlineRadioOptions2">
                        <label class="form-check-label" for="blue">Blue</label>
                    </div>
                </div>
                </div>

                <br><br>

                <div class="options" >
                <h4 style="text-align:center">3. With which word you identify the most?</h4>
                <br>
                <div style="text-align:center";>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=1 name="inlineRadioOptions3" checked>
                        <label class="form-check-label" for="introvert">Introvert</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=4 name="inlineRadioOptions3">
                    <label class="form-check-label" for="outgoing" >Outgoing</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=5 name="inlineRadioOptions3">
                        <label class="form-check-label" for="adventurous">Adventurous</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=3 name="inlineRadioOptions3">
                        <label class="form-check-label" for="artistic">Artistic</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=2 name="inlineRadioOptions3">
                        <label class="form-check-label" for="laidback" >Laid back</label>
                    </div>
                </div>
                </div>

                <br><br>

                <div class="options" >
                <h4 style="text-align:center">4. Which music genre is your favourite?</h4>
                <br>
                <div style="text-align:center";>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=3 name="inlineRadioOptions4" checked>
                        <label class="form-check-label" for="pop">Pop</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=4 name="inlineRadioOptions4">
                    <label class="form-check-label" for="rock" >Rock</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=1 name="inlineRadioOptions4">
                        <label class="form-check-label" for="jazz">Jazz</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=2 name="inlineRadioOptions4">
                        <label class="form-check-label" for="folk">R&B</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=5 name="inlineRadioOptions4">
                        <label class="form-check-label" for="trans" >Electronic</label>
                    </div>
                </div>
                </div>

                <br><br>

                <div class="options" >
                <h4 style="text-align:center">5. What is the ideal vacation place of your choice?</h4>
                <br>
                <div style="text-align:center";>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=2 name="inlineRadioOptions5" checked>
                        <label class="form-check-label" for="mountain">Mountain</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=4 name="inlineRadioOptions5">
                    <label class="form-check-label" for="city" >City</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=3 name="inlineRadioOptions5">
                        <label class="form-check-label" for="sea">Sea</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=1 name="inlineRadioOptions5">
                        <label class="form-check-label" for="countryside">Countryside</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value=5 name="inlineRadioOptions5">
                        <label class="form-check-label" for="unknown" >Unknown</label>
                    </div>
                </div>
                </div>

                <br>
                <button class="btn btn-lg btn-primary btn-block btn-light button_confirm" type="submit">Finish quiz</button>
            </form>
            <div class="col-sm-2"> &nbsp; </div>
            </div>
        </div>
    </div>

</body>

</html>