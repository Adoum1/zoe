<?php
/**
 * Created by PhpStorm.
 * User: gomab
 * Date: 09/07/19
 * Time: 17:59
 */
?>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="span5">
                <h3>Nous contacter</h3>
                <div>
                    <form class="form-main" name="ajax-form" id="ajax-form" action="#" method="post">
                        <div id="ajaxsuccess">E-mail was successfully sent.</div>
                        <div class="error" id="err-name">Please enter name</div>
                        <input name="name" id="name" type="text" value="Nom" onfocus="if(this.value == 'Name') this.value='';" onblur="if(this.value == '') this.value='Name';">

                        <div class="error" id="err-email">Please enter e-mail</div>
                        <div class="error" id="err-emailvld">E-mail is not a valid format</div>
                        <input  name="email" id="email" type="text" value="E-mail" onfocus="if(this.value == 'E-mail') this.value='';" onblur="if(this.value == '') this.value='E-mail';">

                        <div class="error" id="err-message">Please enter message</div>
                        <textarea  name="message" id="message" onfocus="if(this.value == 'Message') this.value='';" onblur="if(this.value == '') this.value='Message';">Message</textarea><br>
                        <div>
                            <div class="error" id="err-form">There was a problem validating the form please check!</div>
                            <div class="error" id="err-timedout">The connection to the server timed out!</div>
                            <div class="error" id="err-state"></div>
                        </div>
                        <button id="send" class="btn f-right">Envoyé le message <i class="icon-ok"></i></button>
                    </form>
                </div>
            </div>
            <div class="span3 offset3">
                <h3>Adresse</h3>
                81 rue Sunnyvale<br>
                Roubaix, 59100<br>
                France<br>
                <br>
                <i class="icon-phone"></i>+33 880 555 999<br>
                <i class="icon-envelope"></i><a href="mailto:support@example.com">support@zoe.com</a><br>


                <div class="row space40"></div>

                <a href="#" class="social-network sn2 behance"></a>
                <a href="#" class="social-network sn2 facebook"></a>
                <a href="#" class="social-network sn2 pinterest"></a>
                <a href="#" class="social-network sn2 flickr"></a>
                <a href="#" class="social-network sn2 dribbble"></a>
                <a href="#" class="social-network sn2 lastfm"></a>
                <a href="#" class="social-network sn2 forrst"></a>
                <a href="#" class="social-network sn2 xing"></a>
            </div>
        </div>

        <div class="row space50"></div>
        <div class="row">
            <div class="span6">
                <div class="logo-footer">
                    Design by <a href="https://www.freshdesignweb.com">freshDesignweb</a>
                </div>
            </div>
            <div class="span6 right">
                &copy; 2020. Tous droits rexervés.
            </div>
        </div>

    </div>
</footer>
