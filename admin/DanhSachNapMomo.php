
<?php include('head.php');?>
<?php include('nav.php');?>


        <div class="row mb-2">
          <div class="col-sm-6">
        
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DANH SÁCH NẠP MOMO AUTO</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                <table id="datatable1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th class="text-center">STT</th>
                      <th class="text-center">MÃ GD</th>
                      <th class="text-center">USERNAME</th>
                      <th class="text-center">SDT</th>
                      <th class="text-center">NAME</th>
                      <th class="text-center">AMOUNT</th>
                      <th class="text-center">NỘI DUNG</th>
                      <th class="text-center">THỜI GIAN</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
$i = 0;
$result = mysqli_query($ketnoi,"SELECT * FROM momo ORDER BY id desc ");
while($row = mysqli_fetch_assoc($result))
{
?>
                    <tr>
                      <td class="text-center"><?=$i;?> <?php $i++;?></td>
                      <td class="text-center"><?=$row['tranId'];?></td>
                      <td class="text-center"><?=$row['username'];?></td>
                      <td class="text-center"><?=$row['partnerId'];?></td>
                      <td class="text-center"><?=$row['partnerName'];?></td>
                      <td class="text-center"><?=format_cash($row['amount']);?></td>
                      <td class="text-center"><?=$row['comment'];?></td>
                      <td class="text-center"><?=$row['time'];?></td>
                    </tr>
<?php }?>
                  </tbody>
                </table>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
     
<?php include('foot.php');?>