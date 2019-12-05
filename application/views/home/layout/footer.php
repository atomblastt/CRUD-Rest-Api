</div>
</body>
</html>

<div id="mobilModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="mobil_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Data Mobil</h4>
                </div>
                <div class="modal-body">
                    <label>Nomor Kerangka</label>
                    <input type="text" name="no_kerangka" id="no_kerangka" class="form-control" />
                    <span id="nomor_kerangka_error" class="text-danger"></span>
                    <br>
                    <label>Nomor Polisi</label>
                    <input type="text" name="no_polisi" id="no_polisi" class="form-control" />
                    <span id="nomor_polisi_error" class="text-danger"></span>
                    <br>
                    <label>Merek</label>
                    <input type="text" name="merek" id="merek" class="form-control" />
                    <br>
                    <label>Tipe</label>
                    <input type="text" name="tipe" id="tipe" class="form-control" />
                    <br>
                    <label>Tahun</label>
                    <input type="text" name="tahun" id="tahun" class="form-control" />
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_mobil" id="id_mobil" />
                    <input type="hidden" name="data_action" id="data_action" value="Insert" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Simpan" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url() ?>assets/home/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" language="javascript" >

  $(document).ready(function(){
      
      function get_data()
      {
          $.ajax({
              url:"<?php echo base_url(); ?>mobil/action",
              method:"POST",
              data:{data_action:'get'},
              success:function(data)
              {
                  // console.log(data);
                  $('tbody').html(data);
              }
          });
      }

      get_data();

        $('#add_button').click(function(){
          $('#mobil_form')[0].reset();
          $('.modal-title').text("Tambah Data Mobil");
          $('#action').val('Simpan');
          $('#data_action').val("Insert");
          $('#mobilModal').modal('show');
      });

      $(document).on('submit', '#mobil_form', function(event){
          event.preventDefault();
          $.ajax({
              url:"<?php echo base_url() . 'mobil/action' ?>",
              method:"POST",
              data:$(this).serialize(),
              dataType:"json",
              success:function(data)
              {
                  if(data.success)
                  {
                      $('#mobil_form')[0].reset();
                      $('#mobilModal').modal('hide');
                      get_data();
                      if($('#data_action').val() == "Insert")
                      {
                          $('#success_message').html(`
                            <div class="alert alert-success" role="alert" id="alert-success-insert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                                  Data Berhasil di Tambahkan </div>
                            `);
                      }
                  }

                  if(data.error)
                  {
                      $('#nomor_kerangka_error').html(data.nomor_kerangka_error);
                      $('#last_name_error').html(data.nomor_polisi_error);
                  }
              }
          })
      });

      $(document).on('click', '.edit', function(){
          var id_mobil = $(this).attr('id');
          $.ajax({
              url:"<?php echo base_url(); ?>mobil/action",
              method:"POST",
              data:{id_mobil:id_mobil, data_action:'get_id'},
              dataType:"json",
              success:function(data)
              {
                  // console.log(data);
                  $('#mobilModal').modal('show');
                  $('#no_kerangka').val(data.no_kerangka);
                  $('#no_polisi').val(data.no_polisi);
                  $('#merek').val(data.merek);
                  $('#tipe').val(data.tipe);
                  $('#tahun').val(data.tahun);
                  $('.modal-title').text('Edit Data Mobil');
                  $('#id_mobil').val(id_mobil);
                  $('#action').val('Edit');
                  $('#data_action').val('Edit');
              }
          })
      });

      $(document).on('click', '.delete', function(){
          var id_mobil = $(this).attr('id');
          if(confirm("Yakin Ingin Menghapus Data Ini?"))
          {
              $.ajax({
                  url:"<?php echo base_url(); ?>mobil/action",
                  method:"POST",
                  data:{id_mobil:id_mobil, data_action:'Delete'},
                  dataType:"json",
                  success:function(data)
                  {
                      if(data.success)
                      {
                          $('#success_message').html(`
                            <div class="alert alert-success" role="alert" id="alert-success-delete">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                                  Data Berhasil di Hapus </div>
                            `);
                          get_data();
                      }
                  }
              })
          }
      });

      function searchCar() {
        var criteria = document.getElementById('mySelect').value
          var cari = document.getElementById('search-input').value
          if (criteria == 'all') {
            get_data()
          }else{
          $.ajax({
              url:"<?php echo base_url(); ?>mobil/action",
              method:"POST",
              data:{criteria:criteria, cari:cari, data_action:'search'},
              success:function(data){
                // console.log(data);
                $('tbody').html(data);
                // alert('kshdgfbsdjfuisdn');

              }
            })
        }
      }

      $(document).on('click', '#search-btn', function(){
          searchCar();
        });

      $(document).on('keyup', '#search-input', function(event){
        if(event.keyCode === 13){
          searchCar();
        }
        });
      
    window.setTimeout(function() { $("#alert-success-insert").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); }, 3000);
    window.setTimeout(function() { $("#alert-success-delete").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); }, 3000);
  });      

  </script>