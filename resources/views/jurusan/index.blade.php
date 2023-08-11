<!DOCTYPE html>
<html>

<head>
    <title>Jurusan</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container" id="appVue">
        <div class="modal fade" id="modalTambahData" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close btn-danger rounded border-danger" data-dismiss="modal"
                            @click.prevent="closeModal">×</button>
                        <h4 class="modal-title">Jurusan</h4>
                    </div>

                    <div class="modal-body">
                        <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Fakultas</label>
                                    <input v-model="fakultas" type="text" class="form-control"
                                        placeholder="Masukan Fakultas">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Jurusan</label>
                                    <input v-model="jurusan" type="text" class="form-control"
                                        placeholder="Masukan Jurusan">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button @click.prevent="storeJurusan" type="submit"
                                    class="btn btn-primary mt-3">Submit</button>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            @click.prevent="closeModal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-md btn-primary mt-3" @click.prevent="tambahData">Tambah</button>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Fakultas</th>
                                <th>Jurusan</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="item in data_jurusan">
                                <tr>
                                    <td>@{{ item . fakultas }}</td>
                                    <td>@{{ item . jurusan }}</td>
                                    <td>@{{ item . created_at }}</td>
                                    <td>@{{ item . updated_at }}</td>
                                    <td>
                                        <button @click.prevent="editData(item.id)" class="btn btn-xs btn-warning">Edit
                                        </button>
                                        <button @click.prevent="hapusData(item.id)" class="btn btn-xs btn-danger">Hapus
                                        </button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
    var vue = new Vue({
        el: "#appVue",
        data: {
            data_jurusan: [],
            fakultas: null,
            jurusan: null,
            id_edit: null
        },
        mounted() {
            this.getData();
        },
        methods: {
            getData: function() {
                var url = "{{ url('get-jurusan') }}";

                axios.get(url)
                    .then(res => {
                        console.log(res);
                        this.data_jurusan = res.data;
                    })
                    .catch(err => {
                        console.log(err);
                    })
            },
            tambahData: function() {
                $('#modalTambahData').modal('show');
            },
            closeModal: function() {
                $('#modalTambahData').modal('hide');
            },
            storeJurusan: function() {
                var form_data = new FormData();
                form_data.append("fakultas", this.fakultas);
                form_data.append("jurusan", this.jurusan);
                form_data.append("id_edit", this.id_edit);

                var url = "{{ url('store-jurusan') }}";

                axios.post(url, form_data)
                    .then(res => {
                        $('#modalTambahData').modal('hide');
                        alert('Success');
                        this.fakultas = null;
                        this.jurusan = null;

                        this.getData();
                    })
                    .catch(err => {
                        alert('error');
                        console.log(err);
                    })
            },
            editData: function(id) {
                this.id_edit = id;

                var url = "{{ url('get-jurusan') }}" + '/' + id;

                axios.put(url)
                    .then(res => {
                        var jurusan = res.data;
                        this.fakultas = jurusan.fakultas;
                        this.jurusan = jurusan.jurusan;

                        this.tambahData();
                    })
                    .catch(err => {
                        alert('error');
                        console.log(err);
                    })
            },
            hapusData: function(id) {
                var url = "{{ url('hapus-jurusan') }}" + '/' + id;

                axios.delete(url)
                    .then(res => {
                        console.log(res);
                        this.getData();
                    })
                    .catch(err => {
                        alert('error');
                        console.log(err);
                    })
            }
        }
    })
    </script>
</body>

</html>