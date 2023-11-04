class DataTableCRUD {
    constructor(tableId, tableColumns, modalId = null) {
        this.tableId = tableId;
        this.tableColumns = tableColumns;
        this.modalId = modalId;
        this.datatable = null

        this.init();
    }

    init() {
        this.initDataTable();
        this.loadDataTable();
        this.bindEventHandlers();
    }

    initDataTable() {
        this.datatable = $(this.tableId).DataTable({
            ordering: false,
            processing: true,
            serverSide: true,
            ajax: {
                url: $(this.tableId).data('href'),
                data: (d) => {
                    this.populateDataParams(d);
                },
                xhr: function () {
                    var xhr = new XMLHttpRequest();

                    xhr.addEventListener("progress", function (e) {
                        if (e.lengthComputable) {
                            var progress = (e.loaded / e.total) * 100;
                            loaderProgressEl.style.width = progress + "%";
                        }
                    }, false);

                    return xhr;
                },
                beforeSend: function () {
                    startLoader();
                },
                complete: function () {
                    finishLoader();
                },
                error: function () {
                    finishLoader();
                }
            },
            columns: tableColumns,
            createdRow: (row, data, dataIndex) => {
                this.handleRowClick(row, data);
                // this.applyRowStyles(row, data);
            }
        });
    }

    populateDataParams(data) {
    }

    handleRowClick(row, data) {
        let commentVisible = false;
        if (data.expandRowLink) {
            $(row).on('click', function (e) {
                let tr = e.target.closest('tr');
                if (commentVisible) {
                    tr.nextElementSibling.remove();
                    commentVisible = false;
                } else {
                    tr.insertAdjacentHTML('afterend', data.expandRowLink);
                    commentVisible = true;
                }
            })
        }
        if (data.editRowLink) {
            $(row).on('click', function () {
                var linkUrl = data.editRowLink;
                window.location.href = linkUrl;
            });
        }
    }

    applyRowStyles(row, data) {
    }

    loadDataTable() {
        this.datatable.ajax.reload();
    }

    bindEventHandlers() {
        if (this.modalId) {
            this.bindModalEventHandlers();
        }

        $(document).on('click', '.deleteRow', (e) => {
            let url = $(e.target).attr('data-href');
            if (url == undefined) {
                url = $(e.target).parent().attr('data-href');
            }
            this.handleDeleteRowClick(url);
        });

        $(document).on('click', '#refreshData', () => {
            this.loadDataTable();
        });

    }

    bindModalEventHandlers() {
        new DataTableCRUDModal(this.modalId, this.datatable);
    }

    handleDeleteRowClick(url) {
        $('#deleteRowForm').attr('action', url);
        swal({
            title: "Delete",
            text: "You will not be able to recover this data from the database!",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        }, async () => {
            try {
                const response = await axios.delete(url, $('#deleteRowForm').serialize());
                if (response.data.success) {
                    swal(response.data.message);
                    this.loadDataTable();
                }
            } catch (error) {
                toastr.error(data.message || 'An error occurred');
            }
        });
    }
}

class DataTableCRUDModal {
    constructor(modalId, datatable = null) {
        this.modalId = modalId;
        this.datatable = datatable;

        this.bindEventHandlers();
    }

    initModal(content) {
        const modalOptions = {
            show: true,
            backdrop: 'static',
            keyboard: false,
        };

        const modal = $(this.modalId);

        modal.html(content);
        modal.modal(modalOptions);
        modal.find('form').parsley();
        modal.on('hidden.bs.modal', (e) => {
            modal.removeData('bs.modal');
            modal.html('');
        });

    }

    bindEventHandlers() {
        const _this = this;
        // Open Add/Edit modal form
        $(document).on('click', '.ajaxFormModal', function (e) {
            e.stopPropagation();
            const href = $(this).data('href');
            if (href) {
                let selectedDate = $('#selectedDate').val() ?? '';
                $.get(href + selectedDate)
                    .done((content) => {
                        _this.initModal(content)
                    })
                    .fail(_this.handleError);
            }
        });

        // Add/Edit data via ajax/axios
        $(document).on('click', '#ajaxModalFormBtn', async () => {
            // Disable button and change button text
            $('#ajaxModalFormBtn').html('<i class="fa fa-spinner fa-spin"></i> <span>Please wait...</span>').attr('disabled', 'disabled');

            const form = $(_this.modalId).find('form');
            form.find('.parsley-error').removeClass('parsley-error');
            form.find('.parsley-errors-list').html('');
            try {
                const response = await axios.post(form.attr('action'), form.serialize());
                if (response.data.success) {
                    $(_this.modalId).modal('hide');
                    toastr.success(response.data.message || 'Data added successfully');
                    _this.datatable != null ? _this.datatable.ajax.reload() : '';
                    $('#refreshData').trigger('click');
                } else {
                    toastr.error(response.data.message || 'Could not add data');
                }
            } catch (error) {
                _this.handleError(error);
            }
        });
    }

    handleError(error) {
        // Disable button and change button text
        $('#ajaxModalFormBtn').html('Submit').attr('disabled', false);
        if (error.response) {
            const {
                status,
                data
            } = error.response;
            if (status === 422) {
                const errors = data.errors || {};
                Object.keys(errors).forEach((field) => {
                    const errorMessage = errors[field][0];
                    $(`#${field}_error`).html(`<li class="parsley-required">${errorMessage}</li>`);
                    $(`input[name=${field}]`).addClass('parsley-error');
                });
            } else {
                toastr.error(data.message || 'An error occurred');
            }
        } else {
            toastr.error('Network error: could not reach server');
        }
    }
}