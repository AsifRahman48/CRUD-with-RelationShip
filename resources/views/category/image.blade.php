<div>
    <a href="{{ asset('storage/'.$row->image) }}" target="_blank">
    <img src="{{ !is_null($row->image ?? null) ? Storage::url($row->image) : '' }}" alt="{{ $row->name }}"
         loading="lazy" style="width: 80px; height: 80px; border-radius: 50em; object-fit: cover;">
    </a>
</div>
