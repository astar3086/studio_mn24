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
            <h3 class="box-title">Edit Payment</h3>
        </div><!-- /.box-header -->
    </div><!-- /.box -->

    <!-- Form Element sizes -->
    <div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">Main Fields</h3>
    </div>
    <form role="form" id="editForm" action="{Url::get('SystemRoute','Payments','EditData')}/{$data->iduser_payment}/" method="POST">
    <div class="box-body">

        <div class="form-group">
            <label for="" class="required">
                Price
            </label>
            <input type="text" value="{$data->price}" class="form-control" name="price" id="price">
            <div class="errorMessage" id="name_em_" style=""></div>
        </div>

        <div class="form-group">
            <label>User</label>
            <select name="page_type" class="form-control">
                <option></option>
                {foreach $users as $key => $item}
                    {if $data->iduser eq $item->iduser }
                        {assign var=issel value='selected'}
                    {else}
                        {assign var=issel value=''}
                    {/if}

                    <option value="{$item->iduser}" {$issel}>{$item->first_name} {$item->last_name}</option>

                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <label>Credit</label>
            <select name="page_type" class="form-control">
                <option></option>
                {foreach $userCredit as $key => $item}
                    {if $data->iduser_credit eq $item->iduser_credit }
                        {assign var=issel value='selected'}
                    {else}
                        {assign var=issel value=''}
                    {/if}

                    <option value="{$item->iduser_credit}" {$issel}>{$item->price}</option>

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