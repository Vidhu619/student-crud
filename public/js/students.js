$(document).ready(function () {
initTooltips();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let table = $('#studentsTable').DataTable({
        ajax: '/students/list',
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'email' },
            { data: 'phone' },
            { data: 'course' },
            {
                data: null,
               render: function (data) {

                console.log(window.userRole);

                    if (window.userRole === 'admin') {
                            return `
                        <i class="bi bi-pencil-square text-warning editBtn"
                        data-id="${data.id}"
                        style="cursor:pointer; font-size:18px;"
                        title="Edit"></i>

                        &nbsp;&nbsp;

                        <i class="bi bi-trash text-danger deleteBtn"
                        data-id="${data.id}"
                        style="cursor:pointer; font-size:18px;"
                        title="Delete"></i>
                    `;

                    }

                        return `
                        <i class="bi bi-pencil-square text-secondary"
                        style="font-size:18px; cursor:not-allowed;"
                        data-bs-toggle="tooltip"
                        title="No permission"></i>

                        &nbsp;&nbsp;

                        <i class="bi bi-trash text-secondary"
                        style="font-size:18px; cursor:not-allowed;"
                        data-bs-toggle="tooltip"
                        title="No permission"></i>
                    `;


                }
            }
        ]
    });

    // Open modal for add
    $('#addStudentBtn').click(function () {
        clearForm();
        clearErrors();
        $('#studentModal').modal('show');
    });

    // Save student (create/update)
    $('#saveStudentBtn').click(function () {
        clearErrors();

        let id = $('#student_id').val();

        let data = {
            name: $('#name').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            course: $('#course').val()
        };

        let url = '/students';
        let method = 'POST';

        if (id) {
            url = '/students/' + id;
            method = 'PUT';
        }

        $.ajax({
            url: url,
            method: method,
            data: data,
            success: function (res) {
                showAlert('success', res.message);
                $('#studentModal').modal('hide');
                table.ajax.reload();
            },
            error: function (xhr) {
                 if (xhr.status === 422) {
        let errors = xhr.responseJSON.errors;

        $.each(errors, function (field, messages) {
            $('#error-' + field).html(messages[0]);
            $('#' + field).addClass('is-invalid');
        });
                } else {
                    showAlert('danger', 'Something went wrong');
                }
            }
        });

    });

    // Edit student
    $(document).on('click', '.editBtn', function () {
        clearErrors();
        let id = $(this).data('id');

        $.get('/students/list', function (res) {
            let student = res.data.find(s => s.id == id);

            $('#student_id').val(student.id);
            $('#name').val(student.name);
            $('#email').val(student.email);
            $('#phone').val(student.phone);
            $('#course').val(student.course);

            $('#studentModal').modal('show');
        });
    });

    // Delete student
    $(document).on('click', '.deleteBtn', function () {

        if (!confirm('Delete this student?')) return;

        let id = $(this).data('id');

        $.ajax({
            url: '/students/' + id,
            method: 'DELETE',
            success: function (res) {
                showAlert('success', res.message);
                table.ajax.reload();
            }
        });

    });

    function clearForm() {
        $('#student_id').val('');
        $('#studentForm')[0].reset();
    }
    function clearErrors() {
    $('[id^="error-"]').html('');
    $('.form-control').removeClass('is-invalid');
}
function initTooltips() {
    $('[data-bs-toggle="tooltip"]').tooltip();
}


    function showAlert(type, msg) {
        $('#alertBox').html(`<div class="alert alert-${type}">${msg}</div>`);
        setTimeout(() => $('#alertBox').html(''), 3000);
    }

});
