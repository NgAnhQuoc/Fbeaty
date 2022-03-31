<style>
    .modal-footer:hover a{
        background-color: black!important;
        color: white!important;
    }
</style>
<input type="hidden" name="" id="asset" value="{{asset("/uploads/")}}">
<div class="modal right fade" id="giohang-fixed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog w-75" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Giỏ hàng (<span id="soluonghang">0</span>)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" style="overflow: scroll;">
                <table class="table">
                    <tbody id="modalgiohang">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <a id="nutcheckout"  href="" class="w-100 btn nutcheckout text-white font-weight-bold rounded-pill" style="background-color: #ff9298; ">
                    Thanh toán: <span id="tongtien">0</span> (VND)
                </a>
            </div>
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->

