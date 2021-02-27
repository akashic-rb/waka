    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Danh mục</h2>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <!-- /. ROW  -->
            <div class="row text-center pad-top">
              <div class="card-header"></div>
              <div class="card-body" style="margin: 0 15px">
              <a href="index.php?act=add_category"><button type="button" class="btn btn-success"><i class="fa fa-plus" style="color:white"></i> Danh mục mới</button></a>
                <table id="myTable" class="table table-bordered table-dark">
                  <thead style="background-color: rgba(0, 0, 0, 0.3);">
                    <tr>
                      <th scope="col" style="text-align: center;">ID</th>
                      <th scope="col" style="text-align: center;">Tên</th>
                      <th scope="col" style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($categories as $cate) {
                      echo '
                      <tr>
                      <td>'.$cate['id'].'</td>
                      <td>'.$cate['name'].'</td>
                      <td><a href="index.php?act=del_category&cid='.$cate['id'].'"><i class="fa fa-eraser" style="font-size:24px"></i></a> | <a href="index.php?act=edit_category&cid='.$cate['id'].'"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
                      </tr>
                      ';
                    }
                    ?>
                  </tbody>
                </table>
          </div>
        <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
      </div>