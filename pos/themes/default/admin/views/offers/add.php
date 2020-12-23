<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<script>
    $(document).ready(function () {
        productDet()

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
    function productDet() {
        //url: "<?= admin_url('products/getSubCategories') ?>/"
        //var baseUrl= "<?php echo base_url();?>";
        $.ajax({
            method:"POST",
            url:"<?= admin_url('products/getAllProducts') ?>",
            data: {  },
            xhrFields: {
                withCredentials: true
            },
            async: false,
            crossDomain: true,
            dataType: "json",

            success: function(data) {
                //console.log(data);
                if(data.error===false){
                    $('#productDetails').append(data.options);
                    $('.js-example-basic-single').select2({
                        placeholder: "Select One",
                        allowClear: true,
                        minimumInputLength: 2,
                    });
                }
            },
            error: function(fail)
            {
                console.log("fail");
            },
        });
    }
    function add_new_products(){

        $('#add_product_model').modal('show');
    }
    function add_prduct(){
        $('#ajaxCall').hide()
        $('#add_product_model').modal('hide');
        $('#products_offed').hide('fast')
        let $vaue = $('#productDetails').val();
        let $name =  $('option:selected', '#productDetails').attr('prod_name');
        let $old_added = $('#products_added').val()
        $('#products_added').val($old_added+'_'+$vaue)
        $('#value_test').html($old_added+'_'+$vaue)
        $('#product-list-group').append(`
                                    <li class="list-group-item row_${$vaue}"><div class="row" ><div class="col-sm-10" >${$name}</div><div class="col-sm-2 text-right"><button type="button" onclick="remove_product(${$vaue})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></div></div></li>

        `)
        $('#products_offed').show('slow')
    }
    function remove_product($id){
        // $('row_'+$id).hide();
        let $vaue = $('#value_test').html();
        let $myarray = $vaue.split("_");
        if(jQuery.inArray($id, $myarray)){
            $myarray = jQuery.grep($myarray, function(value) {
                return value != $id;
            });
            let newVal = ' ';
            $.each($myarray, function (key, val) {
                if(key == 0){

                }else{
                    newVal += '_' + val
                }
            });
            $('#products_added').val(newVal)
            $('#value_test').html(newVal)
            $('.row_'+$id).hide()
        }else{
            console.log(typeof($vaue));
        }
    }
</script>
<div id="value_test" style="display: none"></div>

<div class="modal" tabindex="-1" role="dialog" id="add_product_model">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Product list</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <select class="js-example-basic-single"  id="productDetails" placeholder="Select product" style="width: 100%"></select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="add_prduct()">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="box">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-heart-o"></i>Add Banner Details
        </h2>


    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">

                <?php
                echo admin_form_open('offers/add_offer', 'id="action-form" enctype="multipart/form-data"');?>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title"  name='offer_title' aria-describedby="titleHelp" placeholder="Enter Title" required>
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" class="form-control" id="amount"  name='offer_amount' aria-describedby="titleHelp" placeholder="Enter Amount" required>
                </div>
                <div class="form-group">
                    <label for="offer_type">Offer Type</label>
                    <select name="offer_type" id="offer_type" class="form-control">
                        <option value="AMOUNT">Amount (₹)</option>
                        <option value="PERCENT">Percentage (%)</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="productDetails">Offer Products</label>
                            <input type="hidden" id="products_added" name="offer_products" >
                        </div>
                        <div class="col-sm-6 text-right">
                            <button type="button" class="btn btn-primary btn-sm" onclick="add_new_products()">Add product</button>
                        </div>
                    </div>
                    <div id="products_offed" style="display: none" >
                        <ul class="list-group " style="margin-top:2px;  max-width: 55rem;" id="product-list-group">

                        </ul>

                    </div>

                </div>


                <div class="form-group">
                    <label for="image_new">Image</label>
                    <input type="file" class="form-control" id="image_new"  name='offer_image' aria-describedby="image_newHelp" required accept="image/x-png,image/gif,image/jpeg">
                </div>
                <div class="form-group">
                    <label for="descri"  >Description</label>
                    <textarea class="form-control" name='offer_desc'></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
