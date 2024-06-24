<div class="text-center text-xl mt-3" wire:poll.1s>

    @if ($timer)
    <h1>
        لقد مر على طلبك : <span>{{ date('H:i:s', $timer->created_at->diffInMinutes() * 60) }}</span>
    </h1>
    @endif
    
    <h2 class="text-red-500 text-sm mt-3">في حال لم يتم الرد على طلبك في غضون يومين سيلغى الطلب مباشرة</h2>
</div>
