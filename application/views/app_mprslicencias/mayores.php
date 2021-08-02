<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!--style>
  .modal:nth-of-type(even) {
    z-index: 1052 !important;
  }
  .modal-backdrop.show:nth-of-type(even) {
      z-index: 1051 !important;
  }
 data-toggle="modal" href="#myModal"
</style-->
<a class="btn btn-primary" id="firstmodla">Launch modal</a>

        <div class="modal" id="arixgeneralmodal2"  tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5> <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer"></div>
                </div>
            </div>
        </div>
          <div class="modal" id="arixgeneralmodal"  tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <!--button type="button" class="close" data-dismiss="modal" aria-label="Close"-->
                    <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <!--button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button-->
                </div>
                </div>
            </div>
        </div>

<script>
$('#firstmodla').click(function(){
	$('#myModal').modal({show:true});
})
$('#openBtn').click(function(){
	$('#myModal2').modal({show:true});
})
</script>