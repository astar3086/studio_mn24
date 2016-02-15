{extends file="../../layout/System/frame.tpl"}
{block name="js"}

{/block}
{block name=content}

    <div class="row">
    <!-- left column -->
    <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Add Payment</h3>
        </div><!-- /.box-header -->
    </div><!-- /.box -->

    <!-- Form Element sizes -->
    <div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">Основные поля</h3>
    </div>
    <form role="form" id="editForm" action="{Url::get('SystemRoute','Payments','AddData')}" method="POST">
    <div class="box-body">

        <div class="form-group">
            <label for="" class="required">
                Price
            </label>
            <input type="text" value="" class="form-control" name="price" id="price">
            <div class="errorMessage" id="title_em_" style=""></div>
        </div>

        <div class="form-group">
            <label for="" class="required">
                Date Payment
            </label>
            <input type="text" value="" class="form-control" name="date_pay" id="date_pay">
            <div class="errorMessage" id="title_em_" style=""></div>
        </div>

        <div class="form-group">
            <label>User</label>
            <select name="page_type" class="form-control">
                <option></option>
                {foreach $users as $item}
                    <option value="{$item->iduser}">{$item->first_name} {$item->last_name}</option>
                {/foreach}
            </select>
        </div>

        {*TODO Dynamic credit By User*}
        <div class="form-group">
            <label>Credit</label>
            <select name="page_type" class="form-control">
                <option></option>
                {foreach $userCredit as $item}
                    <option value="{$item->iduser_credit}">{$item->price}</option>
                {/foreach}
            </select>
        </div>
    </div><!-- /.box-body -->

        <div class="box-footer">
            <input class="btn btn-primary" type="submit">
            </input>
        </div>
    </form>


    </div><!-- /.box -->
    </div><!--/.col (left) -->
    <!-- right column -->
    </div>
{/block}