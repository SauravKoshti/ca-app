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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
<!-- SheetJS for Excel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<!-- jsPDF & autoTable for PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

    $(document).ready(function() {
        $("#mobile").on("input", function() {
            let value = $(this).val().replace(/\D/g, ""); 
            if (value.length > 10) value = value.substring(0, 10);
            $(this).val(value); 
        });
        $("#basic-datatables").DataTable({
            ordering: false
        });
        $(".datepicker").datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true
        }).attr("placeholder", "DD-MM-YYYY");
    });

    function removeData(id, type) {
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
                            }, 1000);
                        } else {
                            swal("Error", data.message, "error");
                        }
                    });
            }
        });
    }

    function editData(url) {
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
                            action: 'edit'
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            swal("Success", data.message, "success");
                            setTimeout(() => {
                                window.location.href = url;
                            }, 1000);
                        } else {
                            swal("Error", data.message, "error");
                        }
                    });
            }
        });
    }
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
    @if(session('success'))
    successMessage("{{ session('success') }}");
    @endif

    function uploadFile() {
        let progressBar = document.getElementById('progressBar');
        let fileInput = document.getElementById('fileInput');
        if (fileInput.files.length === 0) {
            alert('Please select a file first.');
            return;
        }

        let progress = 0;
        let interval = setInterval(() => {
            progress += 10;
            progressBar.style.width = progress + '%';
            progressBar.setAttribute('aria-valuenow', progress);
            if (progress >= 100) {
                clearInterval(interval);
                alert('File uploaded successfully!');
            }
        }, 300);
    }
</script>

<script>
    let currentDate = new Date();
    let currentMonth = currentDate.getMonth() + 1; // JS months are 0-based

    let currentYear = new Date().getFullYear() + 1;
    let selectBox = document.getElementById("financial_year");
    let filterBox = document.getElementById("downloadYearSelect");
    let documentFilterBox = document.getElementById("documentDownloadYearSelect");
    let date = new Date();
    let year = date.getFullYear();
    let month = date.getMonth() + 1; 

    let financialYear = month < 4 ? `${year - 1}-${year}` : `${year}-${year + 1}`;
    let currentFinancialYear = currentMonth < 4 ? `${currentYear - 1}-${currentYear}` : `${currentYear}-${currentYear + 1}`;

    // Generate financial years (Example: 2022-2023, 2023-2024)
    for (let year = currentYear; year >= 2000; year--) {
        let financialYear = `${year - 1}-${year}`;
        let option = new Option(financialYear, financialYear);
        if (selectBox) {
            selectBox.add(option);
            if (financialYear === currentFinancialYear) {
                var years = financialYear.split("-"); 
                var startDate = new Date(years[0], 3,
                    1);
                var endDate = new Date(years[1], 2, 31); 
                if (startDate && endDate) {
                    $("#date_from").datepicker("destroy").datepicker({
                        dateFormat: "dd/mm/yy",
                        minDate: startDate,
                        maxDate: endDate
                    }).val($.datepicker.formatDate("dd/mm/yy", startDate));
                    $("#date_to").datepicker("destroy").datepicker({
                        dateFormat: "dd/mm/yy",
                        minDate: startDate,
                        maxDate: endDate
                    }).val($.datepicker.formatDate("dd/mm/yy", endDate));
                }
                option.selected = true;
            }
        }
    }
    for (let year = currentYear; year >= 2000; year--) {
        let financialYear = `${year - 1}-${year}`;
        let option = new Option(financialYear, financialYear);
        if (filterBox) {
            filterBox.add(option);
            if (financialYear === currentFinancialYear) {
                option.selected = true;
            }
        }
    }

    for (let year = currentYear; year >= 2000; year--) {
        let financialYear = `${year - 1}-${year}`;
        let option = new Option(financialYear, financialYear);
        if (documentFilterBox) {
            documentFilterBox.add(option);
            if (financialYear === currentFinancialYear) {
                option.selected = true;
            }
        }
    }
</script>
