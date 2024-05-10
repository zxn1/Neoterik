<div class="container-fluid py-4">
  <div class="card">
    <div class="card-header d-flex p-3 bg-gradient-primary">
      <h6 class="my-auto text-white">Petaan Input Statik</h6>
    </div>
    <div class="card-body mb-4 py-2">
      <di class="row">
        <div class="col-md-6">
            <div class="d-flex flex-column h-100 mb-2">
                <p class="mb-1 pt-2 text-bold">Pilih Kluster</p>
                <select class="form-control select2" aria-label="Default select example" id="selection-kluster">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-column h-100 mb-2">
            <p class="mb-1 pt-2 text-bold">Pilih Topik</p>
            <select class="form-control select2" aria-label="Default select example" id="selection-tp">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            </div>
        </div>
      </di>
    </div>
  </div>
</div>

<div class="container-fluid py-4">
  <div class="card">
  <div class="card-header d-flex p-3 bg-gradient-primary">
    <h6 class="my-auto text-white flex-grow-1">Penyelenggaraan Tahap Penguasaan</h6>
    <button class="btn text-white btn-sm mb-0 ms-auto" onclick="clearDynamicInputs()">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
        </svg> &nbsp;
        Set Semula
    </button>
  </div>

    <div class="card-body py-2">

        <div class="row pt-3">
            <h6 class="mb-2">Tentukan Tahap Penguasaan (Maksima 6 TP)</h6>

            <div class="custom row" id="tahap-penguasaan">
            </div>

        </div>
        <div class="text-end p-2 pb-3">
            <button class="btn btn-outline-primary btn-sm mb-0">Kemaskini TP</button>
        </div>
    </div>
</div>