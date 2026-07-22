<div class="modal fade" id="importExcelModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">

        <form action="{{ route('personal-information.import') }}" method="POST" enctype="multipart/form-data"
            id="importForm">

            @csrf

            <div class="modal-content">

                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">
                        Import Excel
                    </h5>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="modal-body">

                    <div id="dropZone" class="border border-2 border-success rounded text-center p-5">

                        <i class="bi bi-cloud-arrow-up display-4 text-success"></i>

                        <h5 class="mt-3">
                            Drag & Drop Excel File
                        </h5>

                        <p class="text-muted">
                            or
                        </p>

                        <input type="file" id="excelFile" name="file" accept=".xlsx,.xls,.csv"
                            class="form-control mb-3">

                        <small class="text-muted">
                            Supported formats: .xlsx, .xls, .csv
                        </small>

                    </div>

                    <div id="selectedFile" class="alert alert-success mt-3 d-none">
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button class="btn btn-success">
                        Import File
                    </button>

                </div>

            </div>

        </form>

    </div>
</div>
