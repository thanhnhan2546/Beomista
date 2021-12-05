<div class="container-right">

    <button type="button" class="btn btn-info btn-lg-right btnAdd" data-toggle="modal" data-target="#myModal">Thêm khách hàng</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 130%;">
                <div class="modal-header">
                    <h4>Thêm khách hàng</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                    <form method="POST" action="{{route('khachhang.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="makhAdd">Mã khách hàng</label>
                                    <input type="text" name="MAKH" id="makhAdd" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="hokhAdd">Họ khách hàng</label>
                                    <input  type="text" name="HOKH" id="hokhAdd" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="gioitinhAdd">Giới tính</label>
                                    <input type="text" name="GIOITINH" id="gioitinhAdd" class="form-control" placeholder="">
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="col-md-6" style="margin-left: 20% ;">
                                <div class="form-group">
                                    <label for="tenkhAdd">Tên khách hàng</label>
                                    <input type="text" name="TENKH" id="tenkhAdd" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="emailAdd">Email</label>
                                    <input type="text" name="EMAIL" id="emailAdd" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="sdtAdd">Số điện thoại</label>
                                    <input type="text" name="SDT" id="sdtAdd" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>

                    </form>


                </div>
            </div>

        </div>

    </div>
</div>