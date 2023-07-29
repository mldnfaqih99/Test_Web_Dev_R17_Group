<script>
    $( document ).ready(function() {
        var Data = @json($TData);
        var count = Object.keys(Data).length;
        if(count != 0){
            $('#addData').show();
        }else{
            $('#addData').hide();
        }
    });

    var table = $('#Datatables').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        scrollX: '150px',
        ajax: "{{ URL::to('/getDatatables') }}",
        columns: [
            {data: 'Nama', name: 'Nama'},
            {data: 'Jabatan', name: 'Jabatan'},
            {data: 'JenisKelamin', name: 'JenisKelamin'},
            {data: 'Alamat', name: 'Alamat'},
            {data: 'modify', name: 'modify', orderable: false, searchable: false},
            {data: 'delete', name: 'delete', orderable: false, searchable: false},
        ],
        order: [0, 'desc'],
    });

    function SubmitURLS(){
        urls = $('#APIURLS').val();
        var attachField = {
            "urls": urls
        };
        if(urls != ''){
            $.ajax({
                type: "GET",
                url: "{{ URL::to('/insertDataFromURL') }}",
                data: attachField,
                cache: false,
                success: function (data) {
                    if(data['msg'] == 1){
                        $('#addData').show();
                    }
                    swal.fire({
                        title: data['title'],
                        icon: data['icon'],
                        text: data['text']
                    }).then(() => {
                        if(data['msg'] == 1){
                            location.reload();
                        }
                    })
                },
                error: function (xhr) {
                    var err = JSON.parse(xhr.responseText);
                    var error = err.errors;
                    swal.fire({
                        title: "Invalid",
                        icon: 'error',
                        text: error['urls'][0]
                    })
                }
            });
        }else{
            swal.fire({
                title: "Invalid",
                icon: 'error',
                text: "URL is required"
            })
        }
    }

    //Delete Data
    $(document).on("click", ".delData", function () {
        var id = $(this).data("id");
        var parseData = $("#ModalDelete");
        parseData.find("#idnya").val(id);
        console.log(id);
    });

    //Edit Data
    $(document).on("click", ".EditData", function () {
        var Data = @json($TData);
        var id = $(this).data("id");
        let filter = Data.filter(d => 
            d.id == id
        )
        var parseData = $("#ModalEdit");
        parseData.find("#idnya").val(id);
        parseData.find("#NamaEdit").val(filter[0]['nama']);
        parseData.find("#JabatanEdit").val(filter[0]['jabatan']);
        parseData.find("#JenisKelaminEdit").val(filter[0]['jenis_kelamin']);
        parseData.find("#AlamatEdit").val(filter[0]['alamat']);
    });
</script>