<!DOCTYPE html>
<html>

<head>
    <title>Dosen</title>
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
                        <h4 class="modal-title">Dosen</h4>
                    </div>

                    <div class="modal-body">
                        <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input v-model="nama" type="text" class="form-control" placeholder="Masukan Nama">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input v-model="email" type="text" class="form-control" placeholder="Masukan Email">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button @click.prevent="storeDosen" type="submit"
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="item in data_dosen">
                                <tr>
                                    <td>@{{ item.nama }}</td>
                                    <td>@{{ item.email }}</td>
                                    <td>@{{ item.created_at }}</td>
                                    <td>@{{ item.updated_at }}</td>
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
        el: '#appVue',
        data: {
            data_dosen: [],
            nama: null,
            email: null,
            id_edit: null
        },
        mounted() {
            this.getData();
        },
        methods: {
            getData: function() {
                var url = "{{ url('get-dosen') }}";

                axios.get(url)
                    .then(res => {
                        console.log(res);
                        this.data_dosen = res.data;
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
            storeDosen: function() {
                var form_data = new FormData();
                form_data.append("nama", this.nama);
                form_data.append("email", this.email);
                form_data.append("id_edit", this.id_edit);

                var url = "{{ url('store-dosen') }}";

                axios.post(url, form_data)
                    .then(res => {
                        $('#modalTambahData').modal('hide');
                        alert('Success');
                        this.nama = null;
                        this.email = null;

                        this.getData();
                    })
                    .catch(err => {
                        alert('error');
                        console.log(err);
                    })
            },
            editData: function(id) {
                this.id_edit = id;

                var url = "{{ url('get-dosen') }}" + '/' + id;

                axios.put(url)
                    .then(res => {
                        var dosen = res.data;
                        this.nama = dosen.nama;
                        this.email = dosen.email;

                        this.tambahData();
                    })
                    .catch(err => {
                        alert('error');
                        console.log(err);
                    })
            },
            hapusData: function(id) {
                var url = "{{ url('hapus-dosen') }}" + '/' + id;

                axios.delete(url)
                    .then(res => {
                        console.log(res);
                        this.getData();
                    })
                    .catch(err => {
                        alert("error");
                        console.log(err);
                    })
            }
        }
    })
    </script>
</body>

</html>