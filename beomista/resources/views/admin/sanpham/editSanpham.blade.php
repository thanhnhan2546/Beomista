<div class="container-right">


   
    <!-- Modal -->
    <div class="modal fade" id="MyModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 130%;">
                <div class="modal-header">
                    <h4>Cập nhật sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                <form action="" id="form-edit" method="POST" role="form">
                        @csrf 
                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="maspEdit">Mã sản phẩm</label>
                                    <input value="" type="text" name="MASP" id="maspEdit" class="form-control" readonly>
                                </div>
                               
                                <div class="form-group">
                                    <label for="dongiaEdit">Đơn giá</label>
                                    <input type="number" name="DONGIA" id="dongiaEdit" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="motaEdit">Mô tả</label>
                                    <textarea rows="4" type="text" name="MOTA" id="motaEdit" class="form-control" placeholder=""></textarea>
                                </div>
                               
                                <div class="form-group">
                                    <label for="dvtinhEdit">Đơn vị tính</label>
                                    <input type="text" name="DVTINH" id="dvtinhEdit" class="form-control" placeholder="">
                                </div>
                                <button type="submit" class="btn btn-primary btnUpdate">Submit</button>
                            </div>
                            <div class="col-md-6" style="margin-left: 20% ;">
                                <div class="form-group">
                                    <label for="tenspEdit">Tên sản phẩm</label>
                                    <textarea rows="4" type="text" name="TENSP" id="tenspEdit" class="form-control" placeholder=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="dongiaEdit">Hình ảnh</label>
                                    <input type="file" name="ANH" id="uploadEdit" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="maloaiEdit">Mã loại</label>
                                    <select name="MALOAI" id="maloaiEdit">
                                        
                                    </select>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>
</div>