<?php
include 'inc/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Quiz: What vehicle should you buy?</title>
        <link rel='stylesheet' href='css/styles.css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <h1>What type a vehicle should you own?</h1>
        <?=getMessage()?>
        <form>
            <input id='name' type='text' name='name' placeholder='Type your name here' value=<?=$_GET['name']?>>
            <br/>
            <br/>
            <div class='togglequestion' data-target='.questions'>
                <select>
                    <option value='question1' data-show='.question1'>Question One</option>
                    <option value='question2' data-show='.question2'>Question Two</option>
                    <option value='question3' data-show='.question3'>Question Three</option>
                    <option value='question4' data-show='.question4'>Question Four</option>
                </select>
                <br/>
            </div>
            <div class='questions'>
                <div id='q1' class='question1 hide'>
                    <span><strong>Question One</strong></span>
                    <br/>
                    <input type='radio' id='tleft' name='img1' value='electriccar' <?= ($_GET['img1'] == 'electriccar')?"checked":""  ?>/>
                    <label for='tleft'><img src='img/houses/glasshouse.jpg' alt='glasshouse'></label>
                    
                    <input type='radio' id='tright' name='img1' value='supercar' <?= ($_GET['img1'] == 'supercar')?"checked":""  ?>/>
                    <label for='tright'><img src='img/houses/beachhouse.jpg' alt='beachhouse'></label>
                    <br/>
                    <input type='radio' id='bleft' name='img1' value='truck' <?= ($_GET['img1'] == 'truck')?"checked":""  ?>/>
                    <label for='bleft'><img src='img/houses/mountainhouse.jpg' alt='mountainhouse'></label>
                    
                    <input type='radio' id='bright' name='img1' value='hybrid' <?= ($_GET['img1'] == 'hybrid')?"checked":""  ?>/>
                    <label for='bright'><img src='img/houses/townhouse.jpg' alt='townhouse'></label>
                </div>
                <div id='q2' class='question2 hide'>
                    <span><strong>Question Two</strong></span>
                    <br/>
                    <input type='radio' id='tleft2' name='img2' value='electriccar' <?= ($_GET['img2'] == 'electriccar')?"checked":""  ?>/>
                    <label for='tleft2'><img src='img/traits/electricity.jpg' alt='elecricity'></label>
                    
                    <input type='radio' id='tright2' name='img2' value='hybrid' <?= ($_GET['img2'] == 'hybrid')?"checked":""  ?>/>
                    <label for='tright2'><img src='img/traits/fireandelectric.jpg' alt='hybrid'></label>
                    <br/>
                    <input type='radio' id='bleft2' name='img2' value='truck' <?= ($_GET['img2'] == 'truck')?"checked":""  ?>/>
                    <label for='bleft2'><img src='img/traits/power.jpg' alt='power'></label>
                    
                    <input type='radio' id='bright2' name='img2' value='supercar' <?= ($_GET['img2'] == 'supercar')?"checked":""  ?>/>
                    <label for='bright2'><img src='img/traits/speed.jpg' alt='speed'></label>
                </div>
                <div id='q3' class='question3 hide'>
                    <span><strong>Question Three</strong></span>
                    <br/>
                    <input type='radio' id='tleft3' name='img3' value='hybrid' <?= ($_GET['img3'] == 'hybrid')?"checked":""  ?>/>
                    <label for='tleft3'><img src='img/timeperiods/oldandfuturistic.jpg' alt='oldandnew'></label>
                    
                    <input type='radio' id='tright3' name='img3' value='supercar' <?= ($_GET['img3'] == 'supercar')?"checked":""  ?>/>
                    <label for='tright3'><img src='img/timeperiods/modern.jpg' alt='modern'></label>
                    <br/>
                    <input type='radio' id='bleft3' name='img3' value='truck' <?= ($_GET['img3'] == 'truck')?"checked":""  ?>/>
                    <label for='bleft3'><img src='img/timeperiods/oldfashioned.jpg' alt='oldfashioned'></label>
                    
                    <input type='radio' id='bright3' name='img3' value='electriccar' <?= ($_GET['img3'] == 'electriccar')?"checked":""  ?>/>
                    <label for='bright3'><img src='img/timeperiods/futuristic.jpg' alt='futuristic'></label>
                </div>
                <div id='q4' class='question4 hide'>
                    <span><strong>Question Four</strong></span>
                    <br/>
                    <input type='radio' id='tleft4' name='img4' value='truck' <?= ($_GET['img4'] == 'truck')?"checked":""  ?>/>
                    <label for='tleft4'><img src='img/money/tens.jpg' alt='10'></label>
                    
                    <input type='radio' id='tright4' name='img4' value='supercar' <?= ($_GET['img4'] == 'supercar')?"checked":""  ?>/>
                    <label for='tright4'><img src='img/money/hundreds.jpg' alt='100'></label>
                    <br/>
                    <input type='radio' id='bleft4' name='img4' value='hybrid' <?= ($_GET['img4'] == 'hybrid')?"checked":""  ?>/>
                    <label for='bleft4'><img src='img/money/fifties.jpg' alt='50'></label>
                    
                    <input type='radio' id='bright4' name='img4' value='electriccar' <?= ($_GET['img4'] == 'electriccar')?"checked":""  ?>/>
                    <label for='bright4'><img src='img/money/twenties.jpg' alt='20'></label>
                </div>
            </div>
            <input id='button' type='submit' value='Finish'/>
        </form>
        <script>
            $(document).on('change', '.togglequestion', function(){
                var target = $(this).data('target');
                var show = $("option:selected", this).data('show');
                $(target).children().addClass('hide');
                $(show).removeClass('hide');
            });
            $(document).ready(function(){
                $('.togglequestion').trigger('change');
            });
        </script>
    </body>
</html>