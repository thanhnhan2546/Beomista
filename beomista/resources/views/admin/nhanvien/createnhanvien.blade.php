<div class="container-right">

    <button type="button" class="btn btn-info btn-lg-right btnAdd" data-toggle="modal" data-target="#myModal">Thêm nhân viên</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 130%;">
                <div class="modal-header">
                    <h4>Thêm Nhân viên</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                    <form method="POST" action="{{route('nhanvien.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="manvAdd">Mã nhân viên</label>
                                    <input type="text" name="MANV" id="manvAdd" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="honvAdd">Họ nhân viên</label>
                                    <input  type="text" name="HONV" id="honvAdd" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="gioitinhAdd">Giới tính</label>
                                    <select name="GIOITINH" id="gioitinhAdd" class="form-control" >
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ngsinhAdd">Ngày sinh</label>
                                    <input type="date" name="NGSINH" id="ngsinhAdd" class="form-control" placeholder="">
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="col-md-6" style="margin-left: 20% ;">
                                <div class="form-group">
                                    <label for="tenkhAdd">Tên nhân viên</label>
                                    <input type="text" name="TENNV" id="tennvAdd" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="dchiAdd">Địa chỉ</label>
                                    <input type="text" name="DCHI" id="dchiAdd" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="emailAdd">Email</label>
                                    <input type="email" name="EMAIL" id="emailAdd" class="form-control" placeholder="">
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