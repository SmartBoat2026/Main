@extends('member.layouts.app')

@section('content')


<div class="profile-wrap">

  {{-- LEFT COLUMN --}}
  <div class="left-col">

    {{-- Avatar Card --}}
    <div class="p-card avatar-card">
      <div class="avatar-circle">{{ strtoupper(substr($member->name, 0, 1)) }}</div>
      <h6 class="fw-bold mb-0">{{ $member->name }}</h6>
      <p class="text-muted mb-3" style="font-size:12px;">{{ $member->memberID }}</p>
      <div class="stat-grid">
        <div class="stat-box">
          <p class="stat-label">Smart Points</p>
          <p class="stat-val text-success">{{ number_format($member->smart_point, 4) }}</p>
        </div>
        <div class="stat-box">
          <p class="stat-label">Smart Qty</p>
          <p class="stat-val text-primary">{{ $member->smart_quanity ?: '0.0000' }}</p>
        </div>
        <div class="stat-box" style="grid-column:span 2;">
          <p class="stat-label">Smart Wallet Balance</p>
          <p class="stat-val text-success">₹{{ number_format($smartWalletBalance ?? 0, 2) }}</p>
        </div>
      </div>
    </div>


{{-- QR Card --}}
<div class="p-card doc-card">
  <p class="doc-title mt-3">QR Code</p>
  <div class="qr-wrap" onclick="document.getElementById('qrModal').style.display='flex'"
       style="cursor:pointer;position:relative;">
    <img src="https://smartboatecosystem.com/Main/public/admin/assets/images/HindolMukherjeeQRCode.png"
         alt="QR Code"
         style="width:200px;height:200px;object-fit:contain;">
    <span style="position:absolute;bottom:8px;right:8px;background:rgba(0,0,0,0.45);color:#fff;
                 font-size:10px;padding:2px 7px;border-radius:20px;">
      🔍 Tap to view
    </span>
  </div>
  <p class="qr-label">Admin QR Code &nbsp;·&nbsp; Tap to zoom</p>
</div>

{{-- ═══════════ QR MODAL ═══════════ --}}
<div id="qrModal"
     onclick="this.style.display='none'"
     style="display:none;position:fixed;inset:0;z-index:9999;
            background:rgba(0,0,0,0.65);
            align-items:center;justify-content:center;flex-direction:column;
            padding:20px;">

  <div onclick="event.stopPropagation()"
       style="background:#fff;border-radius:16px;padding:28px 24px;
              max-width:340px;width:100%;text-align:center;
              box-shadow:0 20px 60px rgba(0,0,0,0.3);">

    {{-- Close Button --}}
    <div style="text-align:right;margin-bottom:8px;">
      <span onclick="document.getElementById('qrModal').style.display='none'"
            style="cursor:pointer;font-size:20px;color:#6c757d;line-height:1;">✕</span>
    </div>

    {{-- QR Image Zoomed --}}
    <img src="https://smartboatecosystem.com/Main/public/admin/assets/images/HindolMukherjeeQRCode.png"
         alt="QR Code"
         style="width:240px;height:240px;object-fit:contain;border-radius:8px;">

    {{-- Divider --}}
    <hr style="margin:16px 0;border-color:#dee2e6;">

    {{-- Message --}}
    <div style="background:#fff8e1;border:1px solid #ffe082;border-radius:10px;padding:14px 16px;">
      <p style="font-size:13px;font-weight:700;color:#b45309;margin:0 0 6px;">
        📢 After Payment
      </p>
      <p style="font-size:13px;color:#374151;margin:0;line-height:1.6;">
        After completing your payment, please contact us at:
      </p>
      <p style="font-size:18px;font-weight:700;color:#1a3a6b;margin:8px 0 0;letter-spacing:.03em;">
        📞 82502 57091
      </p>
      <p style="font-size:11px;color:#6c757d;margin:4px 0 0;">
        to add wallet amount to your account.
      </p>
    </div>

    {{-- Close Button --}}
    <button onclick="document.getElementById('qrModal').style.display='none'"
            style="margin-top:16px;width:100%;padding:10px;background:#1a3a6b;
                   color:#fff;border:none;border-radius:8px;font-size:13px;
                   font-weight:600;cursor:pointer;">
      Close
    </button>

  </div>
</div>

  </div>

  {{-- RIGHT CARD --}}
  <div class="p-card right-card">

    <h6 class="fw-bold mb-1" style="color:#1a3a6b;">Member Profile</h6>
    <p class="text-muted mb-3" style="font-size:12px;">Personal &amp; account information</p>

    {{-- Joining Date + Status --}}
    <div class="wallet-strip">
      <div>
        <p style="font-size:11px;color:#6c757d;margin:0 0 2px;">Joining Date</p>
        <p style="font-size:14px;font-weight:600;margin:0;">{{ $member->joining_date }}</p>
      </div>
      <div>
        <p style="font-size:11px;color:#6c757d;margin:0 0 2px;">Referral Code</p>
        <p style="font-size:14px;font-weight:600;margin:0;">{{ $member->referral_code }}</p>
      </div>
      <div class="text-end">
        <p style="font-size:11px;color:#6c757d;margin:0 0 4px;">Status</p>
        @if($member->status == 1)
          <span class="badge bg-success">Active</span>
        @elseif($member->status == 2)
          <span class="badge bg-warning text-dark">Pending</span>
        @else
          <span class="badge bg-danger">Blocked</span>
        @endif
      </div>
    </div>

    {{-- Transaction Table Header --}}
    <h6 class="fw-bold mb-1" style="color:#1a3a6b;font-size:13px;">Transaction History</h6>
    <p class="text-muted mb-3" style="font-size:11px;">
      All credit &amp; debit transactions linked to your account ({{ $member->memberID }})
    </p>


    {{-- Table --}}
    <div style="overflow-x:auto;">
      <table class="txn-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Action</th>
            <th>Amount</th>
            <th>Type</th>
            <th>Status</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          @forelse($transactions as $i => $txn)
          <tr>
            <td style="color:#6c757d;width:40px;">{{ $i + 1 }}</td>

            <td>{{ $txn->action }}</td>

            <td style="font-weight:600;">
              @if(strtolower($txn->type) === 'credit')
                <span class="text-success">+₹{{ number_format($txn->amount, 2) }}</span>
              @else
                <span class="text-danger">-₹{{ number_format($txn->amount, 2) }}</span>
              @endif
            </td>

            <td>
              @if(strtolower($txn->type) === 'credit')
                <span class="badge-credit">Credit</span>
              @else
                <span class="badge-debit">Debit</span>
              @endif
            </td>

            <td>
              @if($txn->status == 1)
                <span class="badge-success-status">Success</span>
              @else
                <span style="background:#f3f4f6;color:#6b7280;padding:3px 9px;border-radius:20px;font-size:11px;font-weight:600;">Pending</span>
              @endif
            </td>

            <td style="color:#6c757d;white-space:nowrap;">
              {{ \Carbon\Carbon::parse($txn->created_at)->format('d M Y, h:i A') }}
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6">
              <div class="empty-txn">
                <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="#6c757d" style="margin-bottom:10px;opacity:.4;">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6M3 17h18"/>
                </svg>
                <p>No transactions found for <strong>{{ $member->memberID }}</strong></p>
              </div>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>

</div>
@endsection
