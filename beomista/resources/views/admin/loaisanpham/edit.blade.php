<div class="container-right">


   
    <!-- Modal -->
    <div class="modal fade" id="MyModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 130%;">
                <div class="modal-header">
                    <h4>Cập nhật loai sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                <form action="" id="form-edit" method="POST" role="form">
                        @csrf 
                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="maspEdit">Mã loại sản phẩm</label>
                                    <input value="" type="text" name="MASP" id="maspEdit" class="form-control" readonly>
                                </div>
                               
                                <div class="form-group">
                                    <label for="dongiaEdit">Tên loại</label>
                                    <input type="text" name="DONGIA" id="dongiaEdit" class="form-control" placeholder="">
                                </div>
                                
                                <button type="submit" class="btn btn-primary btnUpdate">Submit</button>
                            </div>
                           
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>
</div>