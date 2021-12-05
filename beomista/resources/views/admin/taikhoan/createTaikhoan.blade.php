<div class="container-right">

    <button type="button" class="btn btn-info btn-lg-right btnAdd" data-toggle="modal" data-target="#myModal">Thêm tài khoản</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 130%;">
                <div class="modal-header">
                    <h4>Thêm Tài khoản</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                    <form method="POST" action="{{route('taikhoan.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="manvAdd">Tên đăng nhập</label>
                                    <input type="text" name="TENDN" id="manvAdd" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="passwd">Password</label>
                                    <input  type="password" name="password" id="passwd" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="passwd2">Nhập lại Password</label>
                                    <input  type="password" name="password2" id="passwd2" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="gioitinhAdd">Giới tính</label>
                                    <select name="QUYEN" id="gioitinhAdd" class="form-control" >
                                        <option value="admin">Admin</option>
                                        <option value="ql">Quản lý</option>
                                        <option value="nv">Nhân viên</option>
                                    </select>
                                </div>
                               
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                         
                        </div>

                    </form>


                </div>
            </div>

        </div>

    </div>
</div>