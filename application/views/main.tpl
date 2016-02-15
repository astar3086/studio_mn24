{extends file="layout/index.tpl"}
{block name="content"}

    <input type="hidden" value="1"
           name="is_guest_allowed">


    <section id="calculate">

        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 calculator">

                        <div class="calculator_heading">
                            <h1>{__('credit_head1')}</h1>
                            <p class="light">{__('credit_head2')}</p>
                        </div>

                        <div class="row">

                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">

                                <div class="rangers semi-bold">

                                    <div class="wrap-ranger">
                                        <p>{__('credit_summ')}:  <span class="bg_calc"><output id="first-output"></output></span>   {__('money_symbol')}.</p>
                                        <span class="minus">-</span><input class="ranges" id="first-range" type="range" min="0" max="9000" style="position: relative;overflow: hidden;opacity: 0;"><span class="plus">+</span>
                                    </div>

                                    <div class="wrap-ranger">
                                        <p>{__('credit_termin')}:  <span class="bg_calc2"><span><output id="second-output"></output></span> <img src="{$base_UI}/img/calendar.png" alt=""></span>        днів.</p>
                                        <span class="minus">-</span><input class="ranges" type="range" id="second-range" value="0" min="1" max="31" style="position: relative;overflow: hidden;opacity: 0;"><span class="plus">+</span>
                                    </div>

                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="calculator_infos">
                                    <p>
                                        <span><div class="sdate">06.01.2016</div> ({__('day_1')})</span>
                                        <br>
                                        <span>до погашення:</span>
                                        <br>
                                        <span>Сума:        <span class="summ">3500</span> {__('money_symbol')}</span>
                                        <br>
                                        <span>Відсотки:    <span class="proc">272</span>  {__('money_symbol')}</span>
                                        <br>
                                        <span>Всього:     <span class="amount">3772</span>  {__('money_symbol')}</span>
                                    </p>
                                </div>
                                <p class="wrap_btn_and_promo_code">
                                    <a class="bg_button get_credit_btn" href="#" role="button">ОТРИМАТИ КРЕДИТ</a>
                                    <br>
                                    <span class="promo_code light">застосувати промокод</span>
                                </p>

                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>



    <section id="rules_for_credit" class="rules_for_credit">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>ЩОБ ОТРИМАТИ ОНЛАЙН КРЕДИТ ПОТРІБНО</h2>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-3 text-center">
                    <figure>
                        <p><img src="{$base_UI}/img/icon_7.png" alt="" /></p>
                        <figcaption>Банківська картка</figcaption>
                    </figure>
                </div>
                <div class="col-lg-3 text-center">
                    <figure>
                        <p><img src="{$base_UI}/img/icon_6.png" alt="" /></p>
                        <figcaption>Бути доросліше 18 років</figcaption>
                    </figure>
                </div>
                <div class="col-lg-3 text-center">
                    <figure>
                        <p><img src="{$base_UI}/img/icon_5.png" alt="" /></p>
                        <figcaption>Паспорт та ІПН</figcaption>
                    </figure>
                </div>
                <div class="col-lg-3 text-center">
                    <figure>
                        <p><img src="{$base_UI}/img/icon_4.png" alt="" /></p>
                        <figcaption>Телефон та E-mail</figcaption>
                    </figure>
                </div>

            </div>
        </div>

    </section>

    <section id="table_section" class="table_section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center ">
                    <h2 class="heading_of_table semi-bold"><span class="green_text bold">MONEY24</span> ПРОПОНУЄ ВАМ, НАЙВИГІДНІШІ УМОВИ<br>
                        ОН-ЛАЙН КРЕДИТУВАННЯ В УКРАЇНІ!*</h2>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="table">
                        <div class="table_row table_row_bg_first">
                            <div class="table_cell"></div>
                            <div class="table_cell text-center"><img src="{$base_UI}/img/logo_table.png" alt=""></div>
                            <div class="table_cell text-center"><img src="{$base_UI}/img/other_service.png" alt=""></div>

                        </div>
                        <div class="table_row">
                            <div class="table_cell table_cell_heading semi-bold">Місячна % ставка</div>
                            <div class="table_cell text-center table_cell_bigger">42,5%</div>
                            <div class="table_cell text-center table_cell_bigger">від 60% до 66,5%</div>

                        </div>
                        <div class="table_row  table_row_bg_first">
                            <div class="table_cell table_cell_heading semi-bold">Максимальна сума кредиту</div>
                            <div class="table_cell text-center table_cell_bigger">9000 грн</div>
                            <div class="table_cell text-center table_cell_bigger">7500 грн</div>

                        </div>
                        <div class="table_row ">
                            <div class="table_cell table_cell_heading table_cell_line-height semi-bold">Програма лояльності для<br> постійних клієнтів</div>
                            <div class="table_cell text-center table_cell_bigger"><img src="{$base_UI}/img/yes.png" alt=""><br><span class="table_cell_span">знижка 40%</span></div>
                            <div class="table_cell text-center table_cell_bigger table_cell_img_margin"><img src="{$base_UI}/img/no.png" alt=""></div>

                        </div>
                        <div class="table_row table_row_bg_first">
                            <div class="table_cell table_cell_heading semi-bold">Додаткові (разові) платежі</div>
                            <div class="table_cell text-center table_cell_bigger"><img src="{$base_UI}/img/no.png" alt=""></div>
                            <div class="table_cell text-center table_cell_bigger"><img src="{$base_UI}/img/yes.png" alt=""></div>

                        </div>
                        <div class="table_row ">
                            <div class="table_cell table_cell_heading semi-bold">Розміп пені</div>
                            <div class="table_cell text-center table_cell_bigger">1,5 %</div>
                            <div class="table_cell text-center table_cell_bigger">до 12%</div>

                        </div>
                        <div class="table_row table_row_bg_first ">
                            <div class="table_cell table_cell_heading table_cell_line-height semi-bold">Самовільне списання коштів з картки<br> позичальника, за наявності прострочки</div>
                            <div class="table_cell text-center table_cell_bigger table_cell_img_margin"><img src="{$base_UI}/img/no.png" alt=""></div>
                            <div class="table_cell text-center table_cell_bigger table_cell_img_margin"><img src="{$base_UI}/img/yes.png" alt=""></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="how_return_credit" class="how_return_credit">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 text-center">
                    <h2>ЯК ПОВЕРНУТИ КРЕДИТ ОНЛАЙН</h2>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-offset-1 col-lg-3  text-center">
                    <figure>
                        <p><img src="{$base_UI}/img/icon_1.png" alt="" /></p>
                        <figcaption class="text-left step-heading">1.Банківською картою</figcaption>
                        <p class="text-left text-descriotion">
                            This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi
                        </p>
                    </figure>
                </div>
                <div class="col-lg-offset-1 col-lg-3 text-center">
                    <figure>
                        <p><img src="{$base_UI}/img/icon_2.png" alt="" /></p>
                        <figcaption class="text-left step-heading">2.Платіжнім терміналом</figcaption>
                        <p class="text-left text-descriotion">
                            This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi
                        </p>
                    </figure>
                </div>
                <div class=" col-lg-offset-1 col-lg-3 text-center">
                    <figure>
                        <p><img src="{$base_UI}/img/icon_3.png" alt="" /></p>
                        <figcaption class="text-left step-heading">3.Банківським переказом</figcaption>
                        <p class="text-left text-descriotion">
                            This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi
                        </p>
                    </figure>
                </div>
            </div>
        </div>
    </section>




    <section id="affiliate_program" class="affiliate_program">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrap_text">
                        <h2>Заробляй з Money24 по нашій партнерській програмі</h2>
                        <p>
                            Money24 - це перший онлайн-сервіс в Україні, який дозволяє дуже просто і надзвичайно швидко отримати кредит на банківську картку в будь-якому місці і в будь-який час, навіть у вихідні та святкові дні, всього за кілька хвилин.
                        </p>
                        <p>
                            Ми запрошуємо до співпраці сайти, компанії і фізичних осіб у рамках програми по залученню нових користувачів в нашу систему.
                        </p>
                        <p>
                            Money24 пропонує нашим партнерам заробити реальні гроші - ми виплачуємо 50 грн. за кожного приведеного користувача, який отримає кредит в нашій системі.
                        </p>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-lg-offset-1 col-lg-3  text-center">
                    <figure>
                        <p><img src="{$base_UI}/img/icon_10.png" alt="" /></p>
                        <figcaption class="text-left ">1. Надішліть Вашому другу email або СМС з Особистого Кабінету з рекомендацією отримати кредит в Money24.</figcaption>

                    </figure>
                </div>
                <div class="col-lg-offset-1 col-lg-3 text-center">
                    <figure>
                        <p><img src="{$base_UI}/img/icon_9.png" alt="" /></p>
                        <figcaption class="text-left "> 2. Ваш друг реєструється на нашому сайті і відправляє заявку на отримання кредиту.</figcaption>

                    </figure>
                </div>
                <div class=" col-lg-offset-1 col-lg-3 text-center">
                    <figure>
                        <p><img src="{$base_UI}/img/icon_8.png" alt="" /></p>
                        <figcaption class="text-left ">
                            3. Якщо ми видаємо йому кредит, то Ви отримуєте 50 грн. Чим більше друзів Ви приведете - тим більше заробите!
                        </figcaption>

                    </figure>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center wrap_btn">
                    <a class="bg_button send_message" href="#" role="button">НАДІСЛАТИ ЗАПРОШЕННЯ</a>
                </div>
            </div>


        </div>

    </section>








    <section id="movie_section" class="movie_section">

    </section>

    <section id="info_section" class="info_section">
        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center info_item">
                    <div class="img_centre">
                        <img class="img-responsive" src="{$base_UI}/img/checked21.png" alt="">
                    </div>

                    <h3 class="bold">З НАМИ ПРОСТО</h3>
                    <p class="light">взяти кредит і позика<br>
                        без довідок, поручителів<br>
                        і прихованих платежів</p>

                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center info_item">
                    <div class="img_centre">
                        <img class="img-responsive" src="{$base_UI}/img/padlock27.png" alt="">
                    </div>
                    <h3 class="bold">З НАМИ НАДІЙНО</h3>
                    <p class="light">всі особисті дані, зазначені<br>
                        в процесі реєстраціїї,<br>
                        захищені шифруванням<br>
                        за допомогою протоколу SLL</p>

                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center info_item">
                    <div class="img_centre">
                        <img class="img-responsive" src="{$base_UI}/img/speedometer.png" alt="">
                    </div>
                    <h3 class="bold">З НАМИ ШВИДКО</h3>
                    <p class="light">всього 15 хвилин<br>
                        на розгляд заявки<br>
                        та видачу грошей</p>

                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center info_item">
                    <div class="img_centre">
                        <img class="img-responsive" src="{$base_UI}/img/wallet33.png" alt="">
                    </div>
                    <h3 class="bold">З НАМИ ЕКОНОМНО</h3>
                    <p class="light">найнижчий проценти на<br>
                        миттєві кредити в Україні</p>

                </div>
            </div>

    </section>


    <section id="calculator_2" class="calculator_2">

        <div class="container">
            <div class="row">

                <div class="col-lg-8">
                    <div class="wrap_calculator">

                        <div class="wrap_for_rang">
                            <div class="inline_block head_text_calc">Сума вкладу:</div>


                            <div class="inline_block block float_left320">

                                <span class="minus">-</span>
                            </div>
                            <div class="inline_block block wrap_ranger">

                                <!-- <div class="bg_outputs"> -->
                                <!-- <output class=" bg_outputs" id="five-output"></output> -->
                                <!-- </div> -->

                                <input class="range_width" id="third-range" type="range" min="0" max="9000" style="position: relative;overflow: hidden;opacity: 0;">

                            </div>

                            <div class="inline_block block float_right320">
                                <span class="plus">+</span>
                            </div>

                            <div class="inline_block wrap_text_frame">

                                <div class="inline_block text_frame">
                                    <output class="output_font" id="third-output"></output>
                                </div>
                                <div class="inline_block currency">
                                    <span>грн</span>
                                </div>
                            </div>

                        </div>


                        <div class="wrap_for_rang">
                            <div class="inline_block head_text_calc">Термін вкладу:</div>

                            <div class="inline_block block float_left320">

                                <span class="minus">-</span>
                            </div>
                            <div class="inline_block block wrap_ranger">

                                <!-- <div class="bg_outputs"> -->
                                <!-- <output class="bg_outputs " id="six-output"></output>  -->
                                <!-- </div> -->

                                <input class="range_width" type="range" id="four-range" value="0" min="1" max="31" style="position: relative;overflow: hidden;opacity: 0;">

                            </div>
                            <div class="inline_block block float_right320">
                                <span class="plus">+</span>
                            </div>

                            <div class="inline_block wrap_text_frame">
                                <div class="inline_block text_frame">
                                    <output class="output_font" id="four-output"></output>
                                </div>

                                <div class="inline_block days">
                                    <span>днів</span>
                                </div>
                            </div>

                        </div>







                    </div>
                </div>

                <div class="col-lg-4 text-right">

                    <div class="wrap_procent">
                        <div class="semi-bold">
                            <span>33</span><span>%</span>
                            <span>річніх</span>
                        </div>

                        <div class="money">
                            <span>1232,13</span><span> грн</span>
                        </div>

                        <div class="income">
                            (Ваш дохід до сплати податку)
                        </div>

                        <div class="wrap_btn">
                            <a class="bg_button put" href="#" role="button">ВКЛАСТИ</a>
                        </div>

                    </div>


                </div>
            </div>


        </div>

    </section>


    <section id="table2" class="table2">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="table">

                        <div class="table_row text-center">
                            <div class="table_cell caption border_bottom border_right middle">Термін вкладу</div>
                            <div class="table_cell caption border_bottom">1000 <br>грн</div>
                            <div class="table_cell caption border_bottom">10 000 <br>грн</div>
                            <div class="table_cell caption border_bottom">50 000 <br>грн</div>
                            <div class="table_cell caption border_bottom">100 000 <br>грн</div>
                            <div class="table_cell caption border_bottom">250 000+ <br>грн</div>
                        </div>

                        <div class="table_row text-center">
                            <div class="table_cell caption border_right">30 днів</div>
                            <div class="table_cell">28 %</div>
                            <div class="table_cell">29 %</div>
                            <div class="table_cell">30 %</div>
                            <div class="table_cell">31 %</div>
                            <div class="table_cell">32 %</div>
                        </div>
                        <div class="table_row text-center">
                            <div class="table_cell caption border_right">90 днів</div>
                            <div class="table_cell">29 %</div>
                            <div class="table_cell">30 %</div>
                            <div class="table_cell">31 %</div>
                            <div class="table_cell">32 %</div>
                            <div class="table_cell">33 %</div>
                        </div>
                        <div class="table_row text-center">
                            <div class="table_cell caption border_right">180 днів</div>
                            <div class="table_cell">30 %</div>
                            <div class="table_cell">31 %</div>
                            <div class="table_cell">32 %</div>
                            <div class="table_cell">33 %</div>
                            <div class="table_cell">34 %</div>
                        </div>
                        <div class="table_row text-center">
                            <div class="table_cell caption border_right">270 днів</div>
                            <div class="table_cell">31 %</div>
                            <div class="table_cell">32 %</div>
                            <div class="table_cell">33 %</div>
                            <div class="table_cell">34 %</div>
                            <div class="table_cell">35 %</div>
                        </div>
                        <div class="table_row text-center">
                            <div class="table_cell caption border_right">360 днів</div>
                            <div class="table_cell">32 %</div>
                            <div class="table_cell">33 %</div>
                            <div class="table_cell">34 %</div>
                            <div class="table_cell">35 %</div>
                            <div class="table_cell">36 %</div>
                        </div>


                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="under_table">Для суми вкладу від 1 000 000 гривень +1% річних до діючих ставок</p>
                </div>
            </div>
        </div>
    </section>



    <section id="call_friends" class="call_friends">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-5 working">
                    <h3 class="semi-bold">На сайті працює реферальна система</h3><br>
                    <p>Приводьте друзів та отримуйте<br>
                        персональні бонуси!  </p>

                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 work_info">

                    <p>За кожного клієнта, що отримав у нас
                        кредит по Вашій рекомендації, ми
                        перерахуємо на Ваш банківський
                        рахунок 100 грн.</p>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-3 wrap_for_button_section">


                    <div class="wrap_for_button">
                        <!-- <p id="triangle-bottomright"></p> -->
                        <p>
                            <a class="bg_button call_friends_btn" href="#" role="button">ЗАПРОСИТИ ДРУЗІВ</a>
                        </p>
                        <!-- <p id="triangle-topleft"></p> -->
                    </div>

                </div>




            </div>
        </div>
        </div>
    </section>

{/block}

{block name="jscode"}
    <script type="text/javascript">
        $(document).ready(function(){
            $( ".ranges" ).change( function (e)
            {
                var Obj = {
                    amount: Number($( '#first-range' ).val()),
                    period: Number($( '#second-range' ).val())
                };

                showCredit( Obj );
            });

            function showCredit( Obj )
            {
                var procent_rate = 10;
                var day_rate = 0.1;

                var procent = procent_rate + Obj['period'] * day_rate;
                var procent_amount = ((Obj['amount'] / 100) * procent);

                var credit = Obj['amount'] + procent_amount;
                var credit_days = addDays(new Date(), Obj['period']);

                procent_amount = parseInt(procent_amount);
                credit = parseInt(credit);

                $( '.summ' ).html( Obj['amount'] );
                $( '.proc' ).html( procent_amount );
                $( '.amount' ).html( credit );
                $( '.sdate' ).html( credit_days );

            }

            function addDays(theDate, days) {
                var d = new Date(theDate.getTime() + days*24*60*60*1000);

                var curr_date = ('0' + d.getDate()).slice(-2);
                var curr_month = ('0' + (d.getMonth() + 1)).slice(-2);
                var curr_year = d.getFullYear();
                var formated_date = curr_date + "." + curr_month + "." + curr_year;
                return formated_date;
            }

        });
    </script>
{/block}