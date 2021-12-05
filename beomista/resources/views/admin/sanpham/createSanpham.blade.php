<div class="container-right">
@if(session()->get('quyen')=='admin')
    <button type="button" class="btn btn-info btn-lg-right btnAdd" data-toggle="modal" data-target="#myModal">Thêm sản phẩm</button>
@endif
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 130%;">
                <div class="modal-header">
                    <h4>Thêm sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                    <form method="POST" action="{{route('sanpham.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="maspAdd">Mã sản phẩm</label>
                                    <input value="" type="text" name="MASP" id="maspAdd" class="form-control" >
                                </div>
                               <input type="hidden" name="NGAYLAP" value="">
                               <input type="hidden" name="SLBAN" value="0">
                                <div class="form-group">
                                    <label for="dongiaAdd">Đơn giá</label>
                                    <input type="number" name="DONGIA" id="dongiaAdd" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="motaAdd">Mô tả</label>
                                    <textarea rows="4" type="text" name="MOTA" id="motaAdd" class="form-control" placeholder=""></textarea>
                                </div>
                               
                                <div class="form-group">
                                    <label for="dvtinhAdd">Đơn vị tính</label>
                                    <input type="text" name="DVTINH" id="dvtinhAdd" class="form-control" placeholder="">
                                </div>
                                <button type="submit" class="btn btn-primary btnUpdate">Submit</button>
                            </div>
                            <div class="col-md-6" style="margin-left: 20% ;">
                                <div class="form-group">
                                    <label for="tenspAdd">Tên sản phẩm</label>
                                    <textarea rows="4" type="text" name="TENSP" id="tenspAdd" class="form-control" placeholder=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="dongiaAdd">Hình ảnh</label>
                                    <input type="file" name="uploadAdd" id="anhAdd" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="maloaiAdd">Mã loại</label>
                                    <select name="MALOAI" id="maloaiAdd">
                                        
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