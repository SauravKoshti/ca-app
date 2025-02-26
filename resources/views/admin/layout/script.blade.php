<!-- Core JS Files -->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.full.min.js"></script>
<!-- Additional Plugins -->
<script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Bootstrap Notify -->
<script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<!-- Sweet Alert -->
<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $("#basic-datatables").DataTable({});
        $(".datepicker").datepicker({
            dateFormat: "dd-mm-yy"
        }).attr("placeholder", "DD-MM-YY");


        $(".remove_data").click(function(e) {
            let id = e.currentTarget.id;
            console.log(e.currentTarget.getAttribute("data-type"));

            let type = e.currentTarget.getAttribute("data-type");;

            swal({
                title: "Enter Your Password",
                content: {
                    element: "input",
                    attributes: {
                        type: "password",
                        placeholder: "Enter Password",
                        id: "password-field",
                        className: "form-control",
                        autocomplete: "new-password",
                    },
                },
                buttons: {
                    cancel: {
                        visible: true,
                        className: "btn btn-danger",
                    },
                    confirm: {
                        className: "btn btn-success",
                    },
                },
            }).then((value) => {
                if (value) {
                    let password = document.getElementById("password-field").value;

                    fetch('/confirm-password', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]')
                                    .getAttribute('content'),
                            },
                            body: JSON.stringify({
                                password: password,
                                id: id,
                                type: type
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                swal("Success", data.message, "success");
                                setTimeout(() => {
                                    location.reload();
                                }, 1000); // Reload after 1 second
                            } else {
                                swal("Error", data.message, "error");
                            }
                        });
                }
            });
        });
    });
    layout: {
        topStart: {
            buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
        }
    }
    $(".select2-multiple").select2({
        theme: "bootstrap",
        placeholder: "Select a User",
        containerCssClass: ':all:'
    });

    function successMessage(message) {
        var content = {};
        content.message = '';
        content.title = message;
        content.icon = "fa fa-bell";
        $.notify(content, {
            type: 'success',
            placement: {
                from: 'top',
                align: 'center',
            },
            time: 1000,
            delay: 5000, // Notification disappears after 5 seconds
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        });
    }
    @if (session('success'))
        successMessage("{{ session('success') }}");
    @endif
</script>
