<div class="container">
    <div class="row mt-3 justify-content-center">
    </div>
    <div id="success_message"></div>  

   <div class="row">
        <div class="col-md-6">
           <button type="button" id="add_button" class="btn btn-info">Tambah Mobil</button>
        </div><br><br>
              <form>
                Search Criteria
              <select id="mySelect" class="btn btn-secondary dropdown-toggle" name="criteria">
                <option value="all">All</option>
                <option value="no_kerangka">Nomor Kerangka</option>
                <option value="no_polisi">Nomor Polisi</option>
                <option value="merek">Merek</option>
                <option value="tipe">Tipe</option>
                <option value="tahun">Tahun</option>
              </select>
            </form>

        <div class="col-md-3">
            <div class="input-group mb-3">
                <!-- <input type="text" name="criteria" hidden=""> -->
              <input type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2" id="search-input" name="cari">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" id="search-btn" type="button">search</button>
              </div>
            </div>
        </div>
      <table class="table">
        <thead class="thead-dark">
            <th scope="col">Nomor Kerangka</th>
            <th scope="col">Nomor Polisi</th>
            <th scope="col">Merek</th>
            <th scope="col">Tipe</th>
            <th scope="col">Tahun</th>
            <th>Action</th>
        </thead>
        <tbody id="cari-mobil">
        </tbody>
      </table>
   </div>
</div>