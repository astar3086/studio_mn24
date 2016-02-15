<header id="header" class="header_section">

    {assign var=c_action value=Request::current()->action()}
    {assign var=c_controller value=Request::current()->controller()}
    {assign var=uri value=$this->request->uri}

    {if $current_user->isGuest() !== true }
        <input type="hidden" value="1" name="is_guest">
    {else}
        <input type="hidden" value="0" name="is_guest">
    {/if}

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#calculate" id="toTop"><img class="img-responsive logo" src="{$base_UI}/img/Logo.png" alt="logo"></a>
                <!-- <a class="navbar-brand" href="#">Project name</a> -->
            </div>
            <div class="collapse navbar-collapse">
                <ul id="menu" class="nav navbar-nav margin_for_nav">
                    <li><a href="#rules_for_credit">{__('hmenu_get')}</a></li>
                    <li><a href="#how_return_credit">{__('hmenu_return')}</a></li>

                    <li><a href="#affiliate_program">{__('hmenu_bonus')}</a></li>
                    <li><a href="#">{__('hmenu_info')}</a></li>
                    <li><a href="#movie_section">{__('hmenu_about')}</a></li>
                    <li><a href="#calculator_2">{__('hmenu_investe')}</a></li>
                    <li><i class="purp-elipse"></i>
                        {foreach $localis as $key => $item}
                            {if $key neq $local}
                                <a href="#" class="i18n" data-i18n="{$key}"><i class="fa fa-user"></i>  {$item}</a>
                            {/if}
                        {/foreach}
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="wrap_login pull-right">
        <ul class="nav navbar-nav ">
            {if $current_user->isGuest() !== true }
                <li><a id="ExitBtn" data-url="/{Route::get('pages')->uri(['controller'=>'Auth','action'=>'logout'])}" href="javascript:void(0);">Logout</a></li>
            {else}
                {*<li><a id="registerButton" href="#" >{__('register')}</a></li>*}
                {*<li><a id="loginButton" href="#" >{__('authorize')}</a></li>*}
                <li><a href="#" data-toggle="modal" data-target="#login">{__('authorize')}</a></li>
            {/if}
        </ul>
    </div>
</header>

<div class="log">
    {if $current_user->isGuest() == true }

        <!-- Modal -->
        <div class="modal fade" id="login" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                        <!-- <h4 class="modal-title">Modal Header</h4> -->
                        <img src="{$base_UI}/img/Logo.png" alt="">
                    </div>
                    <div class="modal-body text-center">
                        <form id="loginForm" method="post" action="/{Route::get('pages')->uri(['controller'=>'Auth','action'=>'login'])}">
                            <p class="text_heading">Вхід в систему</p>

                            <div class="modal-inputs">
                                <input name="email" type="text">
                                <i class="fa fa-envelope-o"></i>

                            </div>

                            <br>

                            <div class="modal-inputs">
                                <input name="password" type="password">
                                <i class="fa fa-lock"></i>

                            </div>

                            <div class="wrap_btn_login">
                                <button class="bg_button login_btn">
                                    <a href="#" id="loginButton" role="button">Вхід</a></button>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">

                        <p class="text_heading text-center">- АБО - </p>
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->


                        <div class="wrap_footer">
                            <p><a id="forgot_pass" href="#">Забули пароль?</a></p>
                            <div id="recovery" style="display:none;">

                                <div class="modal-inputs inputs-recovery-email">
                                    <input type="email">
                                    <!-- <i class="fa fa-lock"></i> -->

                                </div>
                                <div class="wrap_btn_recovery">
                                    <button class="bg_button recovery_btn"><a  href="#" role="button">Нагадати</a></button>

                                </div>

                            </div>
                            <p><a href="#" data-toggle="modal" data-target="#registration">Реєстрація</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="registration" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                        <!-- <h4 class="modal-title">Modal Header</h4> -->
                        <img src="{$base_UI}/img/Logo.png" alt="">
                    </div>
                    <div class="modal-body text-center">
                        <p class="text_heading">Реєстрація</p>


                        <form id="registerForm" method="post" class="form-horizontal" action="/{Route::get('pages')->uri(['controller'=>'Auth','action'=>'register'])}">

                            <label for="email">{__('Email address')}</label>
                            <div class="modal-inputs">
                                <input name="email" id="email" type="email">


                            </div>

                            <br>
                            <label for="pass">{__('Password')}</label>
                            <div class="modal-inputs">
                                <input name="pass" id="pass" type="password">


                            </div>

                            <br>
                            <label for="pass2">{__('Re-enter password')}</label>
                            <div class="modal-inputs">
                                <input name="pass2" id="pass2" type="password">


                            </div>

                            <br>
                            <label for="phone">{__('Phone')}*</label>
                            <div class="modal-inputs">
                                <input name="phone" id="phone" type="tel">


                            </div>

                            <br>
                            <label for="first_name">{__('Real name')}</label>
                            <div class="modal-inputs">
                                <input name="first_name" id="first_name" type="text">


                            </div>

                            <br>

                            <label for="sex">{__('Sex')}</label>
                            <div class="modal-radio">
                                <input name="gender" class="radio_btn"  type="radio" checked value="0"> <span class="text-left">Чол</span>
                                <input name="gender" class="radio_btn"  type="radio" value="1"> <span class="text-left">Жін</span>


                            </div>

                            <br>
                            <label for="birthday">{__('Birthday')}</label>
                            <div class="modal-inputs">
                                <input name="birthday" id="birthday" type="date">


                            </div>

                            <br>



                        </form>



                        <div class="wrap_btn_registration">
                            <button class="bg_button registration_btn"><a id="registerButton" href="#" role="button">Реєстрація</a></button>

                        </div>
                    </div>
                    <div class="modal-footer">




                    </div>
                </div>

            </div>
        </div>

    {/if}
</div>