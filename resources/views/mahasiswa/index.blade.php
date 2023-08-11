<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">

    <title>Mahasiswa</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>

<body class="antialiased">
    <div class="container" id="appVue">
        <div class="modal fade" id="modalTambahData" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close btn-danger rounded border-danger" data-dismiss="modal"
                            @click="closeModal">×</button>
                        <h4 class="modal-title">Mahasiswa</h4>
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
                                    <input v-model="email" type="text" class="form-control"
                                        placeholder="Masukan Email"></input>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button @click.prevent="storeMahasiswa" type="submit"
                                    class="btn btn-primary mt-2">Submit</button>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                            <template>
                                <tr v-for="item in data_mahasiswa">
                                    <td>@{{item.nama}}</td>
                                    <td>@{{item.email}}</td>
                                    <td>@{{item.created_at}}</td>
                                    <td>@{{item.updated_at}}</td>
                                    <td>
                                        <button @click.prevent="editData(item.id)"
                                            class="btn btn-xs btn-warning">Edit</button>

                                        <button v-on:click.prevent="hapusData(item.id)"
                                            class="btn btn-xs btn-danger">Hapus</button>
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
            data_mahasiswa: [],
            nama: null,
            email: null,
            id_edit: null
        },
        mounted() {
            this.getData();
        },
        methods: {
            getData: function() {
                var url = "{{ url('get-mahasiswa') }}";

                axios.get(url)
                    .then(res => {
                        console.log(res);
                        this.data_mahasiswa = res.data;
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
            storeMahasiswa: function() {
                var form_data = new FormData();
                form_data.append("nama", this.nama);
                form_data.append("email", this.email);
                form_data.append("id_edit", this.id_edit);

                var url = "{{ url('store-mahasiswa') }}";

                axios.post(url, form_data)
                    .then((res) => {
                        $('#modalTambahData').modal('hide');
                        alert("Success");
                        this.nama = null;
                        this.email = null;
                        this.id_edit = null;

                        this.getData();
                    })
                    .catch(err => {
                        alert('error');
                        console.log(err);
                    })
            },
            editData: function(id) {
                this.id_edit = id;

                var url = "{{ url('get-mahasiswa') }}" + '/' + id;

                axios.put(url)
                    .then(res => {
                        var mahasiswa = res.data;
                        this.nama = mahasiswa.nama;
                        this.email = mahasiswa.email;

                        this.tambahData();
                    })
                    .catch(err => {
                        alert('error');
                        console.log(err);
                    })
            },
            hapusData: function(id) {
                var url = "{{ url('hapus-mahasiswa') }}" + '/' + id;
                axios.delete(url)
                    .then(resp => {
                        console.log(resp);
                        this.getData();
                    })
                    .catch(err => {
                        alert('error');
                        console.log(err);
                    });
            }
        }
    })
    </script>
</body>

</html>