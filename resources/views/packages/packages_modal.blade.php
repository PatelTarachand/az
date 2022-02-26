
  <!-- The Modal -->
  <div class="modal fade" id="AddModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <button type="button" class="close modal-dismiss-btn" data-dismiss="modal">&times;</button>
        <div class="modal-header">
          <h4 class="modal-title">Sub Category</h4>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
            <form action="#" id="modalForm" class="form-horizontal">
                @csrf
                <input type="hidden" id="package_id" name="package_id">
                <div class="form-group">
                  <label class="col-sm-3 col-lg-2 control-label">Package Name</label>
                  <div class="col-sm-9 col-lg-10 controls">
                    <input type="text" name="name" id="name" class="form-control show-popover" data-trigger="hover" data-content="Enter package name" data-original-title="name" data-placement="top" autofocus />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-lg-2 control-label">Amount</label>
                  <div class="col-sm-9 col-lg-10 controls">
                 <input type="text" name="amount" id="amount" class="form-control show-popover" data-trigger="hover" data-content="Enter amount" data-original-title="amount" data-placement="top" autofocus />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-lg-2 control-label">Days</label>
                  <div class="col-sm-9 col-lg-10 controls">
                 <input type="text" name="days" id="days" class="form-control show-popover" data-trigger="hover" data-content="Enter days" data-original-title="days" data-placement="top" autofocus />
                  </div>
                </div>

                
                <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <span id="actionBtn">Save</span></button>
                  <button type="button" class="btn">Cancel</button>
                </div>
                </div>
                
            </form>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>