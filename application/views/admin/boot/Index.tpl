{extends file="../../layout/System/frame.tpl"}
{block name="js"}
    <script type="text/javascript">

    </script>
{/block}
{block name=content}

    {if $code == 1}
        <div class="box box-solid bg-green-gradient">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
                <i class="fa fa-calendar"></i>

                <h3 class="box-title">Payment Calendar</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <!-- button with a dropdown -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bars"></i></button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#">Add new credit</a></li>
                            <li><a href="#">Clear events</a></li>
                            <li class="divider"></li>
                            <li><a href="#">View calendar</a></li>
                        </ul>
                    </div>
                    <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
                <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"><div class="datepicker datepicker-inline"><div class="datepicker-days" style="display: block;"><table class="table table-condensed"><thead><tr><th class="prev" style="visibility: visible;">«</th><th colspan="5" class="datepicker-switch">January 2016</th><th class="next" style="visibility: visible;">»</th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td class="old day">27</td><td class="old day">28</td><td class="old day">29</td><td class="old day">30</td><td class="old day">31</td><td class="day">1</td><td class="day">2</td></tr><tr><td class="day">3</td><td class="day">4</td><td class="day">5</td><td class="day">6</td><td class="day">7</td><td class="day">8</td><td class="day">9</td></tr><tr><td class="day">10</td><td class="day">11</td><td class="day">12</td><td class="day">13</td><td class="day">14</td><td class="day">15</td><td class="day">16</td></tr><tr><td class="day">17</td><td class="day">18</td><td class="day">19</td><td class="day">20</td><td class="day">21</td><td class="day">22</td><td class="day">23</td></tr><tr><td class="day">24</td><td class="day">25</td><td class="day">26</td><td class="day">27</td><td class="day">28</td><td class="day">29</td><td class="day">30</td></tr><tr><td class="day">31</td><td class="new day">1</td><td class="new day">2</td><td class="new day">3</td><td class="new day">4</td><td class="new day">5</td><td class="new day">6</td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-months" style="display: none;"><table class="table table-condensed"><thead><tr><th class="prev" style="visibility: visible;">«</th><th colspan="5" class="datepicker-switch">2016</th><th class="next" style="visibility: visible;">»</th></tr></thead><tbody><tr><td colspan="7"><span class="month">Jan</span><span class="month">Feb</span><span class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span class="month">Jun</span><span class="month">Jul</span><span class="month">Aug</span><span class="month">Sep</span><span class="month">Oct</span><span class="month">Nov</span><span class="month">Dec</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-years" style="display: none;"><table class="table table-condensed"><thead><tr><th class="prev" style="visibility: visible;">«</th><th colspan="5" class="datepicker-switch">2010-2019</th><th class="next" style="visibility: visible;">»</th></tr></thead><tbody><tr><td colspan="7"><span class="year old">2009</span><span class="year">2010</span><span class="year">2011</span><span class="year">2012</span><span class="year">2013</span><span class="year">2014</span><span class="year">2015</span><span class="year">2016</span><span class="year">2017</span><span class="year">2018</span><span class="year">2019</span><span class="year new">2020</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div></div></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- Progress bars -->
                        <div class="clearfix">
                            <span class="pull-left">Credit #1</span>
                            <small class="pull-right">90%</small>
                        </div>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                        </div>

                        <div class="clearfix">
                            <span class="pull-left">Credit #2</span>
                            <small class="pull-right">70%</small>
                        </div>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <div class="clearfix">
                            <span class="pull-left">Credit #3</span>
                            <small class="pull-right">60%</small>
                        </div>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                        </div>

                        <div class="clearfix">
                            <span class="pull-left">Credit #4</span>
                            <small class="pull-right">40%</small>
                        </div>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    {/if}

    {if $code == 2}
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Payment Chart</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body chart-responsive">
                <div class="chart" id="revenue-chart" style="height: 300px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="300" version="1.1" width="787" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="50.5" y="261" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M63,261H762" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="50.5" y="202" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4">7,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M63,202H762" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="50.5" y="143" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4">15,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M63,143H762" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="50.5" y="84.00000000000003" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.000000000000028">22,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M63,84.00000000000003H762" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="50.5" y="25.00000000000003" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4.000000000000028">30,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M63,25.00000000000003H762" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="633.7798086172852" y="273.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4">2013</tspan></text><text x="322.9086628525138" y="273.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);" dy="4">2012</tspan></text><path fill="#74a5c1" stroke="none" d="M63,219.05493333333334C82.52677079641538,219.56626666666668,121.58031238924613,222.6231049981125,141.1070831856615,221.10026666666667C160.64270163536025,219.57673833144582,199.71393853475774,209.1350666666667,219.2495569844565,206.86946666666668C238.58167940863754,204.6274666666667,277.2459242569996,204.88256480506598,296.5780466811807,203.06986666666666C315.9013214520784,201.2579981383993,354.54787099387374,194.91349669779092,373.8711457647714,192.3712C393.3979165611868,189.80213003112425,432.45145815401753,182.51724094375237,451.9782289504329,182.6244C471.5138474001316,182.73160761041905,510.58508429952917,204.17807818499128,530.1207027492279,193.22866666666667C549.452825173409,182.39331151832462,588.117070021771,101.94542370540854,607.4491924459521,95.48533333333336C626.5601235380487,89.09915703874188,664.7819857222419,135.13648756583467,683.8929168143385,141.8436C703.4196876107538,148.69665423250134,742.4732292035847,147.7554,762,149.726L762,261L63,261Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#3c8dbc" d="M63,219.05493333333334C82.52677079641538,219.56626666666668,121.58031238924613,222.6231049981125,141.1070831856615,221.10026666666667C160.64270163536025,219.57673833144582,199.71393853475774,209.1350666666667,219.2495569844565,206.86946666666668C238.58167940863754,204.6274666666667,277.2459242569996,204.88256480506598,296.5780466811807,203.06986666666666C315.9013214520784,201.2579981383993,354.54787099387374,194.91349669779092,373.8711457647714,192.3712C393.3979165611868,189.80213003112425,432.45145815401753,182.51724094375237,451.9782289504329,182.6244C471.5138474001316,182.73160761041905,510.58508429952917,204.17807818499128,530.1207027492279,193.22866666666667C549.452825173409,182.39331151832462,588.117070021771,101.94542370540854,607.4491924459521,95.48533333333336C626.5601235380487,89.09915703874188,664.7819857222419,135.13648756583467,683.8929168143385,141.8436C703.4196876107538,148.69665423250134,742.4732292035847,147.7554,762,149.726" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="63" cy="219.05493333333334" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="141.1070831856615" cy="221.10026666666667" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="219.2495569844565" cy="206.86946666666668" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="296.5780466811807" cy="203.06986666666666" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="373.8711457647714" cy="192.3712" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="451.9782289504329" cy="182.6244" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="530.1207027492279" cy="193.22866666666667" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="607.4491924459521" cy="95.48533333333336" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="683.8929168143385" cy="141.8436" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="762" cy="149.726" r="4" fill="#3c8dbc" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><path fill="#eaf2f5" stroke="none" d="M63,240.02746666666667C82.52677079641538,239.8072,121.58031238924613,241.35446642506605,141.1070831856615,239.1464C160.64270163536025,236.93733309173274,199.71393853475774,223.3365417102967,219.2495569844565,222.35893333333334C238.58167940863754,221.39150837696334,277.2459242569996,233.23306051728085,296.5780466811807,231.36626666666666C315.9013214520784,229.5003271839475,354.54787099387374,209.28948157595082,373.8711457647714,207.428C393.3979165611868,205.54691490928414,432.45145815401753,214.43960989052474,451.9782289504329,216.39600000000002C471.5138474001316,218.3532765571914,510.58508429952917,232.37735986038396,530.1207027492279,223.08266666666668C549.452825173409,213.8847931937173,588.117070021771,148.22814457230533,607.4491924459521,142.42573333333334C626.5601235380487,136.689711238972,664.7819857222419,170.46889944279064,683.8929168143385,176.92893333333336C703.4196876107538,183.529532776124,742.4732292035847,190.23343333333335,762,194.66826666666668L762,261L63,261Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#a0d0e0" d="M63,240.02746666666667C82.52677079641538,239.8072,121.58031238924613,241.35446642506605,141.1070831856615,239.1464C160.64270163536025,236.93733309173274,199.71393853475774,223.3365417102967,219.2495569844565,222.35893333333334C238.58167940863754,221.39150837696334,277.2459242569996,233.23306051728085,296.5780466811807,231.36626666666666C315.9013214520784,229.5003271839475,354.54787099387374,209.28948157595082,373.8711457647714,207.428C393.3979165611868,205.54691490928414,432.45145815401753,214.43960989052474,451.9782289504329,216.39600000000002C471.5138474001316,218.3532765571914,510.58508429952917,232.37735986038396,530.1207027492279,223.08266666666668C549.452825173409,213.8847931937173,588.117070021771,148.22814457230533,607.4491924459521,142.42573333333334C626.5601235380487,136.689711238972,664.7819857222419,170.46889944279064,683.8929168143385,176.92893333333336C703.4196876107538,183.529532776124,742.4732292035847,190.23343333333335,762,194.66826666666668" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="63" cy="240.02746666666667" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="141.1070831856615" cy="239.1464" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="219.2495569844565" cy="222.35893333333334" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="296.5780466811807" cy="231.36626666666666" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="373.8711457647714" cy="207.428" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="451.9782289504329" cy="216.39600000000002" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="530.1207027492279" cy="223.08266666666668" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="607.4491924459521" cy="142.42573333333334" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="683.8929168143385" cy="176.92893333333336" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="762" cy="194.66826666666668" r="4" fill="#a0d0e0" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 633.393px; top: 80px; display: none;"><div class="morris-hover-row-label">2013 Q1</div><div class="morris-hover-point" style="color: #a0d0e0">
                            Item 1:
                            10,687
                        </div><div class="morris-hover-point" style="color: #3c8dbc">
                            Item 2:
                            4,460
                        </div></div></div>
            </div>
            <!-- /.box-body -->
        </div>
    {/if}

    {if $code == 3}
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Personal Messages</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Credit</th>
                        <th>Progress</th>
                        <th style="width: 40px">Label</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Credit About</td>
                        <td>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-red">70%</span></td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Error Info</td>
                        <td>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-yellow">70%</span></td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Credit personal data</td>
                        <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-light-blue">70%</span></td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Price from 10,000</td>
                        <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-green">90%</span></td>
                    </tr>
                    </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>
        </div>
    {/if}

    {if $code == 4}
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>5<sup style="font-size: 20px">%</sup></h3>

                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>7<sup style="font-size: 20px">%</sup></h3>

                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>10<sup style="font-size: 20px">%</sup></h3>

                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    {/if}

    {if $code == 5}
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Latest Orders</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th>Credit ID</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Remaining</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><a href="pages/examples/invoice.html">OR9842</a></td>
                            <td>Credit #1</td>
                            <td><span class="label label-success">Shipped</span></td>
                            <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="pages/examples/invoice.html">OR1848</a></td>
                            <td>Credit #2</td>
                            <td><span class="label label-warning">Pending</span></td>
                            <td>
                                <div class="sparkbar" data-color="#f39c12" data-height="20"><canvas width="34" height="20" style="display: inline-block; width: 34px; height: 20px; vertical-align: top;"></canvas></div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New Credit</a>
                <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Credits</a>
            </div>
            <!-- /.box-footer -->
        </div>
    {/if}

{/block}