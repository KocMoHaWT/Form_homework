<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Landing_page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <section class="wrapper">
        <div class="contain">
            <div class="slider" id="slider">
            </div>
        </div>
        <div class="form" id="form_check">
            <div  class="formBlock" id="form_2">
                <span class="sign2 secondForm">Game of Thrones</span>
                <div class="info">
                    <span>You've successfully joined the game. Tell us more about yourself</span>
                </div>
                <form class="form_check">
                    <input type="hidden" name="form" value="form2">
                    <label for="name">What are you</label>
                    <span>Alpha-numeric username</span>
                    <input class="input--border input"
                           type="text"
                           name="name"
                           placeholder="arya"
                           id="name"
                           required>
                    <div>
                        <?php
                        if(isset($_SESSION['error']) && key($_SESSION['error']) === 'name') {
                            echo '<p class="red">'.$_SESSION['error']['name'].'</p>';
                        }
                        ?>
                    </div>
                    <label for="houseSelect">Your Great House</label>
                    <select class="input--border input"
                            id="selectClans"
                            name="houseSelect"
                            required>
                        <option hidden selected disabled value=""> Select House</option>
                    </select>
                    <div>
                        <?php
                        if(isset($_SESSION['error']) && key($_SESSION['error']) === 'houseSelect') {
                            echo '<p class="red">'.$_SESSION['error']['houseSelect'].'</p>';
                        }
                        ?>
                    </div>
                    <label for="list">Your preferences, hobbies, wishes, ets.</label>
                    <textarea class="input--border"
                              placeholder="I have a long TOKILL list"
                              rows="3"
                              id="list"
                              name="textArea"
                              required>
                                </textarea>

                    <div class="hide" id="error-div">Please fill all inputs</div>
                    <div>
                        <?php
                        if(isset($_SESSION['error']) && key($_SESSION['error']) === 'textArea') {
                            echo '<p class="red">'.$_SESSION['error']['textArea'].'</p>';
                        }
                        ?>
                    </div>
                    <input type="submit"
                           value="submit"
                           id="sub_2">
                </form>

            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/select.js"></script>
    <script src="js/validation.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/handleSecondForm.js"></script>
</body>
</html>