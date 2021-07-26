<div>
    <select name="birthday-year" wire:model="year" wire:change="onChange">
      <option></option>
      @for($i=1900; $i <= date('Y'); $i++)
        <option value="{{ $i }}">Year: {{ $i }}</option>
      @endfor
    </select>
    <select name="birthday-month" wire:model="month" wire:change="onChange">
      <option></option>
      @for($i=1; $i <=12; $i++)
        <option value="{{ $i }}">Month: {{ $i }}</option>
      @endfor
    </select>
    <select name="birthday-day" wire:model="day" wire:change="onChange">
      <option></option>
      @for($i=1; $i <= $last_day_of_month; $i++)
        <option value="{{ $i }}">Day: {{ $i }}</option>
      @endfor
    </select>

    <p>
      Your age is
      @if($age > -1)
        <span>
          {{ $age }}
        </span>
      @else
        <span>{{$year}}, {{ $month }},{{ $day }}</span>
      @endif
    </p>

    <div>
      <a href="https://blog.capilano-fw.com/?p=4466" target="_blank">参考サイト</a>
      <p>
        "composer require calebporzio/livewire"ではなく<br>
        "composer require livewire/livewire"がいい
      </p>
    </div>
</div>
