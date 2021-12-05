<div class="container-right">


   
    <!-- Modal -->
    <div class="modal fade" id="MyModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 130%;">
                <div class="modal-header">
                    <h4>Cập nhật nhà cung cấp</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                <form action="" id="form-edit" method="POST" role="form">
                        @csrf 
                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="manccEdit">Mã nhà cung cấp</label>
                                    <input type="text" name="MANCC" id="manccEdit" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="sdtEdit">Số điện thoại</label>
                                    <input type="text" name="SDT" id="sdtEdit" class="form-control" placeholder="">
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="col-md-6" style="margin-left: 20% ;">
                                <div class="form-group">
                                    <label for="tennccEdit">Tên nhà cung cấp</label>
                                    <input  type="text" name="TENNCC" id="tennccEdit" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="diachiEdit">Địa chỉ</label>
                                    <input type="text" name="DIACHI" id="diachiEdit" class="form-control" placeholder="">
                                </div>
                                
                                <div class="form-group">
                                    <label for="emailEdit">Email</label>
                                    <input type="text" name="EMAIL" id="emailEdit" class="form-control" placeholder="">
                                </div>
                                
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>
</div>