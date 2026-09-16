<!-- Position Card Component -->
@props(['position'])

<div class="card">
    <!-- Card Header with Status -->
    <div class="flex items-start justify-between mb-4">
        <div class="flex-1">
            <h3 class="text-lg font-bold text-gray-900">{{ $position['course_name'] }}</h3>
            <p class="text-sm text-gray-500">{{ $position['course_code'] }}</p>
        </div>
        <x-status-badge :status="$position['status']" />
    </div>

    <!-- Professor Info -->
    <div class="mb-4 pb-4 border-b border-gray-200">
        <p class="text-sm text-gray-600">
            <span class="font-semibold text-gray-900">👨‍🏫 อาจารย์ผู้สอน:</span> {{ $position['professor_name'] }}
        </p>
    </div>

    <!-- Job Description -->
    <div class="mb-4">
        <h4 class="text-sm font-semibold text-gray-900 mb-2">📋 รายละเอียดงาน</h4>
        <p class="text-sm text-gray-700 line-clamp-2">{{ $position['job_description'] }}</p>
    </div>

    <!-- Qualifications -->
    <div class="mb-4">
        <h4 class="text-sm font-semibold text-gray-900 mb-2">✓ คุณสมบัติของผู้สมัคร</h4>
        <p class="text-sm text-gray-700">{{ $position['qualifications'] }}</p>
    </div>

    <!-- Key Info Grid -->
    <div class="grid grid-cols-2 gap-4 mb-4 pb-4 border-b border-gray-200">
        <!-- Open Positions -->
        <div class="bg-gray-50 rounded-lg p-3">
            <p class="text-xs text-gray-600 font-medium">จำนวนที่เปิดรับ</p>
            <p class="text-lg font-bold text-sky-600">{{ $position['open_positions'] }} ตำแหน่ง</p>
        </div>

        <!-- Duration -->
        <div class="bg-gray-50 rounded-lg p-3">
            <p class="text-xs text-gray-600 font-medium">ระยะเวลารับสมัคร</p>
            <p class="text-xs font-semibold text-gray-900">
                {{ \Carbon\Carbon::parse($position['start_date'])->format('d/m') }} - 
                {{ \Carbon\Carbon::parse($position['end_date'])->format('d/m/Y') }}
            </p>
        </div>
    </div>

    <!-- Action Button -->
    <div class="flex gap-2">
        @if($position['status'] === 'open')
            <a href="/positions/{{ $position['id'] }}" class="btn btn-primary flex-1">
                ดูรายละเอียดและสมัคร
            </a>
        @else
            <button disabled class="btn bg-gray-300 text-gray-500 flex-1 cursor-not-allowed">
                ปิดการสมัครแล้ว
            </button>
        @endif
    </div>
</div>
