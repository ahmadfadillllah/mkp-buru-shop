<!-- partial:partials/_footer.html -->
<footer
    class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
    <p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://adhyy.my.id" target="_blank">INDRIA WATI FARANGE</a>.
    </p>
    <p class="text-muted">With Ahmad Fadillah</p>
</footer>
<!-- partial -->

</div>
</div>
<!-- core:js -->
<script src="{{ asset('admin/template') }}/assets/vendors/core/core.js"></script>
<!-- endinject -->

<!-- core:js -->
<script src="{{ asset('admin/template') }}/assets/vendors/core/core.js"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="{{ asset('admin/template') }}/assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="{{ asset('admin/template') }}/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{ asset('admin/template') }}/assets/vendors/feather-icons/feather.min.js"></script>
<script src="{{ asset('admin/template') }}/assets/js/template.js"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{ asset('admin/template') }}/assets/js/data-table.js"></script>
<!-- End custom js for this page -->

<!-- Plugin js for this page -->
<script src="{{ asset('admin/template') }}/assets/vendors/jquery-validation/jquery.validate.min.js"></script>
<script src="{{ asset('admin/template') }}/assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="{{ asset('admin/template') }}/assets/vendors/inputmask/jquery.inputmask.min.js"></script>
<script src="{{ asset('admin/template') }}/assets/vendors/select2/select2.min.js"></script>
<script src="{{ asset('admin/template') }}/assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
<script src="{{ asset('admin/template') }}/assets/vendors/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script src="{{ asset('admin/template') }}/assets/vendors/dropzone/dropzone.min.js"></script>
<script src="{{ asset('admin/template') }}/assets/vendors/dropify/dist/dropify.min.js"></script>
<script src="{{ asset('admin/template') }}/assets/vendors/pickr/pickr.min.js"></script>
<script src="{{ asset('admin/template') }}/assets/vendors/moment/moment.min.js"></script>
<script src="{{ asset('admin/template') }}/assets/vendors/flatpickr/flatpickr.min.js"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{ asset('admin/template') }}/assets/vendors/feather-icons/feather.min.js"></script>
<script src="{{ asset('admin/template') }}/assets/js/template.js"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="{{ asset('admin/template') }}/assets/js/form-validation.js"></script>
<script src="{{ asset('admin/template') }}/assets/js/bootstrap-maxlength.js"></script>
<script src="{{ asset('admin/template') }}/assets/js/inputmask.js"></script>
<script src="{{ asset('admin/template') }}/assets/js/select2.js"></script>
<script src="{{ asset('admin/template') }}/assets/js/typeahead.js"></script>
<script src="{{ asset('admin/template') }}/assets/js/tags-input.js"></script>
<script src="{{ asset('admin/template') }}/assets/js/dropzone.js"></script>
<script src="{{ asset('admin/template') }}/assets/js/dropify.js"></script>
<script src="{{ asset('admin/template') }}/assets/js/pickr.js"></script>
<script src="{{ asset('admin/template') }}/assets/js/flatpickr.js"></script>
<!-- End custom js for this page -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    function onChangeSelect(url, id, name) {
        // send ajax request to get the cities of the selected province and append to the select tag
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                id: id
            },
            success: function (data) {
                $('#' + name).empty();
                $('#' + name).append('<option>==Pilih Salah Satu==</option>');
                $.each(data, function (key, value) {
                    $('#' + name).append('<option value="' + key + '">' + value + '</option>');
                });
            }
        });
    }
    $(function () {
        $('#provinsi').on('change', function () {
            onChangeSelect('{{ route("cities") }}', $(this).val(), 'kota');
        });
        $('#kota').on('change', function () {
            onChangeSelect('{{ route("districts") }}', $(this).val(), 'kecamatan');
        })
        $('#kecamatan').on('change', function () {
            onChangeSelect('{{ route("villages") }}', $(this).val(), 'desa');
        })
    });

</script>

</body>

</html>
