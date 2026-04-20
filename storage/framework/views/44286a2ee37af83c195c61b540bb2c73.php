<?php $__env->startSection('content'); ?>

    
    <div class="page-header">
        <div class="page-title">
            <h1>Company Payment Submission List</h1>
            <p>Record and track all company payment submissions</p>
        </div>
        <div class="page-actions">
            <a href="javascript:void(0)" class="btn-primary-custom"
               data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="bi bi-plus-lg"></i> NEW COMPANY PAYMENT SUBMISSION
            </a>
        </div>
    </div>

    
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">

                <!-- HEADER -->
                <div class="modal-header" style="background:#1a3a6b;color:#fff;">
                    <h5 class="modal-title" style="font-size:13px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;">
                        <i class="bi bi-receipt me-2"></i> COMPANY PAYMENT SUBMISSION
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- BODY -->
                <div class="modal-body">
                    <div class="row g-4">

                        <!-- LEFT SIDE -->
                        <div class="col-md-5">

                            <div style="background:#fff;border-radius:12px;padding:16px;box-shadow:0 2px 10px rgba(0,0,0,.06);">

                                <h6 style="font-weight:700;color:#1a3a6b;">
                                    <i class="bi bi-qr-code"></i> Scan & Pay
                                </h6>

                                <p style="font-size:12px;color:#6c757d;">
                                    Scan QR and complete payment
                                </p>

                                <div style="text-align:center;margin:15px 0;">
                                    <img src="https://smartboatecosystem.com/Main/public/admin/assets/images/HindolMukherjeeQRCode.png"
                                        style="width:180px;border-radius:10px;cursor:pointer;"
                                        onclick="openQrModal(this.src)">
                                    <p style="font-size:11px;color:#888;margin-top:6px;">Click to enlarge</p>
                                </div>

                                <hr>

                                <div style="font-size:12px;line-height:1.8;color:#444;">

                                    <p><b>📞 Contact:</b> 82502 57091</p>
                                    <p><b>📧 Email:</b> smartboatofficial@gmail.com</p>

                                    <p style="color:#dc3545;font-weight:600;margin-top:10px;">
                                        After payment upload screenshot & transaction ID
                                    </p>

                                </div>

                            </div>

                        </div>

                        <!-- RIGHT SIDE -->
                        <div class="col-md-7">

                            <form method="POST" action="<?php echo e(route('member.smartwallet.companyPayment.store')); ?>"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <div style="background:#fff;border-radius:12px;padding:16px;box-shadow:0 2px 10px rgba(0,0,0,.06);">

                                    <h6 style="font-weight:700;color:#1a3a6b;">
                                        Payment Details
                                    </h6>

                                    <div class="row g-3 mt-1">

                                        <div class="col-12">
                                            <label class="form-label">Member ID</label>
                                            <input type="text" class="form-control" name="member_id" placeholder="Search member">
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Payment Amount</label>
                                            <input type="number" step="0.01" class="form-control" name="amount" placeholder="Enter amount">
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Transaction ID</label>
                                            <input type="text" class="form-control" name="transaction_id" placeholder="Enter transaction ID">
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Payment Screenshot</label>
                                            <input type="file" class="form-control" name="qr_file">
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Comment (Optional)</label>
                                            <textarea class="form-control" name="comment" rows="2"></textarea>
                                        </div>

                                    </div>

                                    <button type="submit"
                                            style="margin-top:15px;width:100%;background:#1a3a6b;color:#fff;
                                                border:none;padding:10px;border-radius:8px;font-weight:600;">
                                        Submit Payment Request
                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>
                </div>

                <!-- FOOTER -->
                <div class="modal-footer" style="border-top:0.5px solid #dee2e6;">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                </div>

            </div>
        </div>
    </div>
    
    
    <div id="qrModal"
     style="display:none;position:fixed;inset:0;
            background:rgba(0,0,0,.85);
            z-index:9999;
            align-items:center;
            justify-content:center;">

        <div style="position:relative;">

            <img id="qrModalImg"
                style="max-width:90vw;max-height:90vh;
                        background:#fff;
                        padding:10px;
                        border-radius:12px;">

            <button onclick="closeQrModal()"
                    style="position:absolute;top:-12px;right:-12px;
                        width:34px;height:34px;border-radius:50%;
                        background:#dc3545;color:#fff;border:none;">
                ×
            </button>

        </div>
    </div>
    
    <div class="modal fade" id="transactionPasswordModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Transaction Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="password" id="transactionPasswordInput" class="form-control" placeholder="Enter password">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="confirmTransactionPasswordBtn" class="btn btn-primary">Submit</button>
            </div>

            </div>
        </div>
    </div>

    
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-2"
             style="background:#1a3a6b;color:#fff;">
            <span><i class="bi bi-clock-history me-2"></i>Sender Request History</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive p-3">                

                <table id="sendWalletBalanceRequestHistoryTable"
                       class="table table-bordered mb-0"
                       style="font-size:13px;width:100%;">
                    <thead style="background:#2c5f2e;color:#fff;">
                        <tr>
                            <th style="width:40px;text-align:center;">
                                <input type="checkbox" id="selectAll"
                                       style="cursor:pointer;width:15px;height:15px;">
                            </th>
                            <th>#</th>
                            <th>Member</th>
                            <th>Date &amp; Time</th>
                            <th>Sent Amount</th>
                            <th>Status</th>
                            <th class="text-center" style="width:80px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('member.smartwallet.chatbox', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('member.smartwallet.chat-script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->startPush('scripts'); ?>

<script>
    function openQrModal(src) {
        document.getElementById('qrModalImg').src = src;
        document.getElementById('qrModal').style.display = 'flex';
    }

    function closeQrModal() {
        document.getElementById('qrModal').style.display = 'none';
    }

    document.addEventListener('click', function(e) {
        let modal = document.getElementById('qrModal');
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
$(document).ready(function () {
    
    // ════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════
    // ------------------------------------------------ START OPEN NEW SENDING WALLET bALANCE MODAL----------------------------------------------------------------
    $('#addModal').on('shown.bs.modal', function () {
        $('#sendWalletBalanceRequestForm')[0].reset();

        $('#memberName').html('');
        $('#selfwalletBalanceInput').val('');
        $('#memberIdInputForWalletRequestSend').val('');
        $('#submitSendWalletBalanceBtn').prop('disabled', true);

        $('#memberDropdown').hide();
        loadMembers();
    });

    function loadMembers() {
        $.ajax({
            url: "<?php echo e(route('member.smartwallet.userToUser.members')); ?>",
            type: "GET",
            dataType: "json",

            beforeSend: function () {
                $('#memberDropdown').html(`
                    <div style="padding:10px;font-size:12px;color:#6c757d;">
                        Loading members...
                    </div>
                `).show();
            },

            success: function (data) {

                memberCache = data.results || []; //  cache store
                $('#selfwalletBalanceInput').val(data.selfwalletBalance);
                renderMemberDropdown(memberCache);
            },

            error: function () {
                $('#memberDropdown').html(`
                    <div style="padding:10px;color:#dc3545;font-size:12px;">
                        Something went wrong. Try again.
                    </div>
                `).show();
            }
        });
    }
    function renderMemberDropdown(list) {
        let html = '';

        if (list.length > 0) {

            $.each(list, function (i, m) {

                let name = m.name.trim().toLowerCase();
                name = name.charAt(0).toUpperCase() + name.slice(1);

                html += `
                    <div class="member-item"
                        style="padding:10px 12px;border-bottom:1px solid #eee;cursor:pointer;
                            display:flex;justify-content:space-between;align-items:center;"
                        data-id="${m.memberID}"
                        data-name="${name}">

                        <div>
                            <div style="font-weight:600;color:#1a3a6b;font-size:13px;">
                                ${name}
                            </div>                           
                        </div>

                        <span style="background:#e6f1fb;color:#0c447c;
                                    padding:2px 8px;border-radius:12px;
                                    font-size:11px;font-weight:600;">
                            ${m.memberID}
                        </span>

                    </div>
                `;
            });

        } else {
            html = `<div style="padding:10px;color:#dc3545;font-size:12px;">No members found</div>`;
        }

        $('#memberDropdown').html(html).show();
    }
    // ------------------------------------------------END OPEN NEW REQUEST MODAL----------------------------------------------------------------
    // ════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════
   
    // ════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════
    // ------------------------------------------------START CHOSSE MEMBER FROM LIST ON NEW REQUEST MODAL----------------------------------------------------------------
    $(document).on('click', '.member-item', function () {

        let id      = $(this).data('id');
        let name    = $(this).data('name');
        let balance = $(this).data('balance') ?? 0;

        $('#memberSearchInputForWalletRequestSend').val(name + ' - ' + id);
        $('#memberIdInputForWalletRequestSend').val(id);        

        $('#memberDropdown').hide();

        $('#memberName').html(
            `<span style="color:#27500a;font-weight:600;">✔ ${name} | ${id}</span>`
        );
    });
    // ------------------------------------------------END CHOSSE MEMBER FROM LIST ON NEW REQUEST MODAL----------------------------------------------------------------
    // ════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════
    
    // ════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════
    // ------------------------------------------------START CHECKING VALID REQUESTBALANCE ON NEW REQUEST MODAL----------------------------------------------------------------
    $(document).on('input', '#sendBalanceInput', function () {

        let requestAmount = parseFloat($(this).val()) || 0;
        let walletBalance = parseFloat($('#selfwalletBalanceInput').val()) || 0;

        if (requestAmount > walletBalance) {
            toastr.error('Send amount cannot be greater than wallet balance');

            $(this).val(walletBalance); 
        }
    });
    // ------------------------------------------------END CHECKING VALID REQUESTBALANCE ON NEW REQUEST MODAL----------------------------------------------------------------
    // ════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════
   

    // ════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════
    //----------------------------------------------START CHECK FORM DATA FOR ENABLE/DISABLE SUBMIT BUTTOM-------------------------------------------------------
    function checkForm() {
        let memberID = $('#memberIdInputForWalletRequestSend').val().trim();
        let requestAmount = $('#sendBalanceInput').val().trim();        
        let walletBalance = parseFloat($('#selfwalletBalanceInput').val()) || 0;

        if (memberID !== '' && requestAmount !== '' && parseFloat(requestAmount) > 0 && parseFloat(requestAmount) <= walletBalance) {
            $('#submitSendWalletBalanceBtn').prop('disabled', false);
        } else {
            $('#submitSendWalletBalanceBtn').prop('disabled', true);
        }
    }
    // Page load par check
    checkForm();
    $('#memberDropdown').on('click', function () {
        checkForm();
    });
    $('#sendBalanceInput').on('keyup change', function () {
        checkForm();
    });
    //----------------------------------------------END CHECK FORM DATA FOR ENABLE/DISABLE SUBMIT BUTTOM-------------------------------------------------------
    // ════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════

    // ════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════
    //---------------------------------------------------------START NEW SENDING WALLET bALANCE FORM SUBMIT------------------------------------------------------------------------------
    $('#submitSendWalletBalanceBtn').on('click', function () {

        $('#transactionPasswordInput').val('');
        let tpModal = new bootstrap.Modal(document.getElementById('transactionPasswordModal'));
        tpModal.show();

    });

    $('#confirmTransactionPasswordBtn').on('click', function () {

        let password = $('#transactionPasswordInput').val();

        if (!password) {
            toastr.error('Transaction password required');
            return;
        }

        let form = $('#sendWalletBalanceRequestForm');
        let btn  = $('#submitSendWalletBalanceBtn');

        bootstrap.Modal.getInstance(document.getElementById('transactionPasswordModal')).hide();

        btn.prop('disabled', true).html('Processing...');

        $.ajax({
            url: form.attr('action'),
            type: "POST",
            data: form.serialize() + '&transaction_password=' + password,

            success: function (res) {

                btn.prop('disabled', false).html('Send Wallet Balance');

                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    html: res.message
                });
                $('#selfwalletBalanceForNavBar').html(
                    '<i class="bi bi-wallet2 me-1"></i> ₹' + res.selfwalletBalance
                );
                $('#addModal').modal('hide');
                $('#sendWalletBalanceRequestHistoryTable').DataTable().ajax.reload(null, false);

                form[0].reset();
            },

            error: function (xhr) {

                btn.prop('disabled', false).html('Send Wallet Balance');

                let msg = 'Something went wrong!';

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    msg = xhr.responseJSON.message;
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: msg
                });
            }
        });

    });
    //---------------------------------------------------------END NEW SENDING WALLET bALANCE FORM SUBMIT------------------------------------------------------------------------------
    // ════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════
     
    // ════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════
    // ---------------------------------------------- START SECTION DATABASE CALL , EXCEL , PDF DOWNLOAD , SEARCHING , PRINT ----------------------------------
    $('#sendWalletBalanceRequestHistoryTable').DataTable({
        processing: true,
        serverSide: false,
        ajax: "<?php echo e(route('member.smartwallet.userToUser.senderList')); ?>",
        columns: [
            { data: 'checkbox', orderable:false, searchable:false },
            { data: 'DT_RowIndex' },
            { data: 'member' },
            { data: 'date' },
            { data: 'amount' },
            { data: 'status' },
            { data: 'actions', orderable:false, searchable:false }
        ],
        order: [[3, 'desc']],
        pageLength: 25,
        lengthMenu: [[10,25,50,100,-1],[10,25,50,100,'All']],
        columnDefs: [
            { orderable:false, searchable:false, targets:[0,6] }
        ],
        
        buttons: [
            {
                extend:'excelHtml5',
                text:'<i class="bi bi-file-earmark-excel me-1"></i>Excel',
                className:'buttons-excel',
                title:'Send Smart Wallet Request History',
                exportOptions:{ 
                    columns:[1,2,3,4,5] ,
                    format: {
                        body: function (data, row, column, node) {

                            // Column 2 (index 1 or 2 depending on your table setup)
                            if (column === 1) {

                                // Convert HTML to text
                                let name = $(node).find('div').eq(0).text().trim();
                                let memberId = $(node).find('div').eq(1).text().trim();

                                return `${name} - ${memberId}`;
                            }

                            return $(node).text().trim();
                        }
                    }
                }
            },
            {
                extend:'pdfHtml5',
                text:'<i class="bi bi-file-earmark-pdf me-1"></i>PDF',
                className:'buttons-pdf',
                title:'Send Smart Wallet Request History',
                orientation:'landscape',
                pageSize:'A4',
                exportOptions:{ 
                    columns:[1,2,3,4,5] ,
                    format: {
                        body: function (data, row, column, node) {

                            // Column 2 (index 1 or 2 depending on your table setup)
                            if (column === 1) {

                                // Convert HTML to text
                                let name = $(node).find('div').eq(0).text().trim();
                                let memberId = $(node).find('div').eq(1).text().trim();

                                return `${name} - ${memberId}`;
                            }

                            return $(node).text().trim();
                        }
                    }
                }
            },
            {
                extend:'print',
                text:'<i class="bi bi-printer me-1"></i>Print',
                className:'buttons-print',
                title:'Send Smart Wallet Request History',
                exportOptions:{ 
                    columns:[1,2,3,4,5] ,
                    format: {
                        body: function (data, row, column, node) {

                            // Column 2 (index 1 or 2 depending on your table setup)
                            if (column === 1) {

                                // Convert HTML to text
                                let name = $(node).find('div').eq(0).text().trim();
                                let memberId = $(node).find('div').eq(1).text().trim();

                                return `${name} - ${memberId}`;
                            }

                            return $('<div>').html(data).text().trim();
                        }
                    }
                }
            }
        ],
        language:{
            search:'<i class="bi bi-search"></i>',
            searchPlaceholder:'Search requests…',
            lengthMenu:'Show _MENU_ entries',
            info:'Showing _START_ to _END_ of _TOTAL_ records',
            infoEmpty:'No records found',
            paginate:{ previous:'‹', next:'›' }
        },
        dom:"<'row mb-2'<'col-sm-4'l><'col-sm-4'B><'col-sm-4 d-flex justify-content-end'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row mt-2'<'col-sm-5'i><'col-sm-7 d-flex justify-content-end'p>>",
    });
    // ---------------------------------------------- END SECTION DATABASE CALL , EXCEL , PDF DOWNLOAD , SEARCHING , PRINT ----------------------------------
    // ════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════
    
    // ════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════
    // ---------------------------------------------------------START MEMBER NAME SEARCH------------------------------------------------------------------------------
    $(document).on('keyup', '#memberSearchInputForWalletRequestSend', function () {

        let keyword = $(this).val().toLowerCase().trim();

        if (!keyword) {
            renderMemberDropdown(memberCache);
            return;
        }

        let filtered = memberCache.filter(m => {

            let name = (m.name || '').toLowerCase();
            let id = (m.memberID || '').toLowerCase();

            return name.includes(keyword) || id.includes(keyword);
        });

        renderMemberDropdown(filtered);
    });
    // ---------------------------------------------------------END MEMBER NAME SEARCH------------------------------------------------------------------------------
    // ════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════════
    

    

});

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('member.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\xampp\htdocs\SmartBoat\ecosystemnew\resources\views/member/smartwallet/companyPayment.blade.php ENDPATH**/ ?>