<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
    <script>
        $(document).ready(function () {
            oTable = $('#QUData').dataTable({
                "aaSorting": [[1, "desc"], [2, "desc"]],
                "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('all') ?>"]],
                "iDisplayLength": <?= $Settings->rows_per_page ?>,
                'bProcessing': true, 'bServerSide': true,
                'sAjaxSource': '<?= admin_url('quotes/getQuotes' . ($warehouse_id ? '/' . $warehouse_id : '')) ?>',
                'fnServerData': function (sSource, aoData, fnCallback) {
                    aoData.push({
                        "name": "<?= $this->security->get_csrf_token_name() ?>",
                        "value": "<?= $this->security->get_csrf_hash() ?>"
                    });
                    $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
                },
                'fnRowCallback': function (nRow, aData, iDisplayIndex) {
                    var oSettings = oTable.fnSettings();
                    nRow.id = aData[0];
                    nRow.className = "quote_link";
                    return nRow;
                },
                "aoColumns": [{"bSortable": false,"mRender": checkbox}, {"mRender": fld}, null, null, null, null, {"mRender": currencyFormat}, {"mRender": row_status}, {"bSortable": false,"mRender": attachment}, {"bSortable": false}]
            }).fnSetFilteringDelay().dtFilter([
                {column_number: 1, filter_default_label: "[<?=lang('date');?> (yyyy-mm-dd)]", filter_type: "text", data: []},
                {column_number: 2, filter_default_label: "[<?=lang('reference_no');?>]", filter_type: "text", data: []},
                {column_number: 3, filter_default_label: "[<?=lang('biller');?>]", filter_type: "text", data: []},
                {column_number: 4, filter_default_label: "[<?=lang('customer');?>]", filter_type: "text", data: []},
                {column_number: 5, filter_default_label: "[<?=lang('supplier');?>]", filter_type: "text", data: []},
                {column_number: 6, filter_default_label: "[<?=lang('total');?>]", filter_type: "text", data: []},
                {column_number: 7, filter_default_label: "[<?=lang('status');?>]", filter_type: "text", data: []},
            ], "footer");
            <?php if ($this->session->userdata('remove_quls')) {
            ?>
            if (localStorage.getItem('quitems')) {
                localStorage.removeItem('quitems');
            }
            if (localStorage.getItem('qudiscount')) {
                localStorage.removeItem('qudiscount');
            }
            if (localStorage.getItem('qutax2')) {
                localStorage.removeItem('qutax2');
            }
            if (localStorage.getItem('qushipping')) {
                localStorage.removeItem('qushipping');
            }
            if (localStorage.getItem('quref')) {
                localStorage.removeItem('quref');
            }
            if (localStorage.getItem('quwarehouse')) {
                localStorage.removeItem('quwarehouse');
            }
            if (localStorage.getItem('qusupplier')) {
                localStorage.removeItem('qusupplier');
            }
            if (localStorage.getItem('qunote')) {
                localStorage.removeItem('qunote');
            }
            if (localStorage.getItem('qucustomer')) {
                localStorage.removeItem('qucustomer');
            }
            if (localStorage.getItem('qubiller')) {
                localStorage.removeItem('qubiller');
            }
            if (localStorage.getItem('qucurrency')) {
                localStorage.removeItem('qucurrency');
            }
            if (localStorage.getItem('qudate')) {
                localStorage.removeItem('qudate');
            }
            if (localStorage.getItem('qustatus')) {
                localStorage.removeItem('qustatus');
            }
            <?php $this->sma->unset_data('remove_quls');
            } ?>
        });

    </script>

<?php if ($Owner || $GP['bulk_actions']) {
    echo admin_form_open('quotes/quote_actions', 'id="action-form"');
} ?>
    <div class="box">
        <div class="box-header">
            <h2 class="blue"><i
                    class="fa-fw fa fa-heart-o"></i>Static Offers
            </h2>

            <div class="box-icon">
                <ul class="btn-tasks">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-tasks tip" data-placement="left" title="<?= lang('actions') ?>"></i></a>
                        <ul class="dropdown-menu pull-right" class="tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li>
                                <a href="<?= admin_url('offers/static_add') ?>">
                                    <i class="fa fa-plus-circle"></i> Add Offers
                                </a>
                            </li>

                        </ul>
                    </li>
                    <?php if (!empty($warehouses)) {
                        ?>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip" data-placement="left" title="<?= lang('warehouses') ?>"></i></a>
                            <ul class="dropdown-menu pull-right" class="tasks-menus" role="menu" aria-labelledby="dLabel">
                                <li><a href="<?= admin_url('quotes') ?>"><i class="fa fa-building-o"></i> <?= lang('all_warehouses') ?></a></li>
                                <li class="divider"></li>
                                <?php
                                foreach ($warehouses as $warehouse) {
                                    echo '<li><a href="' . admin_url('quotes/' . $warehouse->id) . '"><i class="fa fa-building"></i>' . $warehouse->name . '</a></li>';
                                } ?>
                            </ul>
                        </li>
                        <?php
                    } ?>
                </ul>
            </div>
        </div>
        <div class="box-content">
            <div class="row">
                <div class="col-lg-12">

                    <!--<p class="introtext"><?= lang('list_results'); ?></p>-->

                    <div class="table-responsive">
                        <table id="" class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr class="active">
                                <!--<th style="min-width:30px; width: 30px; text-align: center;">-->
                                <!--    <input class="checkbox checkft" type="checkbox" name="check"/>-->
                                <!--</th>-->
                                <th>#</th>
                                <th>Offer Title</th>
                                <th>Offer Amount</th>
                                <th>Offer Image</th>
                                <th>Offer Description</th>
                                <th>Created on</th>
                                <th style="width:115px; text-align:center;"><?= lang('actions'); ?></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            if(isset($offers) and !is_null($offers) and sizeof($offers) > 0) {

                                foreach($offers as $key => $banner)
                                { ?>
                                    <tr class="text-center">
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $banner['offer_title'] ?></td>
                                        <td><?= $banner['offer_amount']  ?><?php if($banner['offer_type'] == "PERCENT"){ echo" %";}else{echo " ₹";} ?></td>
                                        <td><img src="<?= $banner['offer_image'] ?>"  width=100 height=50/></td>
                                        <td><?= $banner['offer_desc'] ?></td>
                                        <td><?= date('d M,y h:ia',strtotime($banner['created_at'])) ?></td>
                                        <td>
                                            <div class="text-center"><div class="btn-group text-left "><button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">Actions <span class="caret"></span></button>
                                                    <ul class="dropdown-menu pull-right" role="menu">
                                                        <li><a href="<?= admin_url('offers/static_edit/').$banner['offer_id'] ?>"><i class="fa fa-file-text-o"></i> EDIT</a></li>

                                                        <li class="divider"></li>
                                                        <li><a href="<?= admin_url('offers/static_delete/').$banner['offer_id'] ?>" ><i class="fa fa-trash-o"></i> DELETE</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                            }else{ ?>
                                <tr>
                                    <td colspan="10"
                                        class="dataTables_empty">No offers found

                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php if ($Owner || $GP['bulk_actions']) {
    ?>
    <div style="display: none;">
        <input type="hidden" name="form_action" value="" id="form_action"/>
        <?= form_submit('performAction', 'performAction', 'id="action-form-submit"') ?>
    </div>
    <?= form_close() ?>
    <?php
} ?>