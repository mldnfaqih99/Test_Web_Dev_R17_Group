<!-- Modal Add -->
<div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="ModalAddLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalAddLabel">New Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{URL::to('addData')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="inputNamaAdd">Nama</span>
                        <input type="text" id="NamaAdd" name="NamaAdd" class="form-control" aria-describedby="inputNamaAdd" value="" required>
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="inputJabatanAdd">Jabatan</span>
                        <input type="text" id="JabatanAdd" name="JabatanAdd" class="form-control" aria-describedby="inputJabatanAdd" value="" required>
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="inputJenisKelaminAdd">Jenis Kelamin</span>
                        <select id="JenisKelaminAdd" name="JenisKelaminAdd" class="form-control" aria-describedby="selectJenisKelaminAdd" required>
                            <option value="Laki-laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="inputAlamatAdd">Alamat</span>
                        <input type="text" id="AlamatAdd" name="AlamatAdd" class="form-control" aria-describedby="inputAlamatAdd" value="" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="ModalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalEditLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{URL::to('editData')}}" method="POST">
                @csrf
                <input type="hidden" id="idnya" name="id" readonly="true">
                <div class="modal-body">
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="inputNamaEdit">Nama</span>
                        <input type="text" id="NamaEdit" name="NamaEdit" class="form-control" aria-describedby="inputNamaEdit" value="">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="inputJabatanEdit">Jabatan</span>
                        <input type="text" id="JabatanEdit" name="JabatanEdit" class="form-control" aria-describedby="inputJabatanEdit" value="">
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="inputJenisKelaminEdit">Jenis Kelamin</span>
                        <select id="JenisKelaminEdit" name="JenisKelaminEdit" class="form-control" aria-describedby="selectJenisKelaminEdit">
                            <option value="Laki-laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="inputAlamatEdit">Alamat</span>
                        <input type="text" id="AlamatEdit" name="AlamatEdit" class="form-control" aria-describedby="inputAlamatEdit" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Delete -->
<div class="modal fade" id="ModalDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalDeleteLabel">Delete Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Are you sure you want to delete this data?</h5>
            </div>
            <form action="{{URL::to('deleteData')}}" method="POST">
                @csrf
                <input type="hidden" id="idnya" name="id" readonly="true">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
