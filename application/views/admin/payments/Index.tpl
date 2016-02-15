{extends file="../../layout/System/frame.tpl"}
{block name="js"}
    <script type="text/javascript">

    </script>
{/block}
{block name=content}

    <!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">

                {if $isAdmin}
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="box">
                                <a href="{Url::get('SystemRoute','Payments','Add')}" class="btn btn-block btn-social btn-github">
                                    <i class="fa fa-github"></i> Add Payments
                                </a>
                            </div>
                        </div>
                    </div>
                {/if}

                <!-- /.box-header -->
				<div class="box-body table-responsive">
					<table id="viewList" class="table table-bordered table-hover">
						<thead>
							<tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Price</th>
                                <th>Remaining</th>
                                <th>Date</th>
								<th></th>
							</tr>
						</thead>
						<tfoot>
							<tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Price</th>
                                <th>Remaining</th>
                                <th>Date</th>
                                <th></th>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		
			
				<!-- /.box-header -->
				<div class="box-body table-responsive">
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>
</section>
    <!-- /.content -->
{/block}