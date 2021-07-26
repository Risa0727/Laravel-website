<div>
  <h1 class="mb-3">Age Calculator from your birthday</h1>
  <p>Today: {{ date("Y-m-d")}}</p>
  <table class="table">
    <tbody>
    <tr>
      <th scope="row"><label for="year">Year:</label></th>
      <td>
        <select id="year" class="w-50 p-1 rounded" name="birthday-year" wire:model="year" wire:change="onChange">
          <option></option>
          @for($i=1940; $i <= date('Y'); $i++)
            <option value="{{ $i }}">{{ $i }}</option>
          @endfor
        </select>
      </td>
    </tr>
    <tr>
      <th scope="row"><label for="mon">Month:</label></th>
      <td>
        <select id="mon" class="w-50 p-1 rounded" name="birthday-month" wire:model="month" wire:change="onChange">
          <option></option>
          @for($i=1; $i <=12; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
          @endfor
        </select>
      </td>
    </tr>
    <tr>
      <th scope="row"><label for="day">Day:</label></th>
      <td>
        <select id="day" class="w-50 p-1 rounded" name="birthday-day" wire:model="day" wire:change="onChange">
          <option></option>
          @for($i=1; $i <= $last_day_of_month; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
          @endfor
        </select>
      </td>
    </tr>
    <tr>
      <td colspan="2" class="text-start text-wrap age">
        <p class="fs-4">
        Your age is
        @if($age > -1)
          <span class="">
            {{ $age }}
            @if($age == 1 || $age == 0)
              year old!
            @else
              years old!!
            @endif
          </span>
        @endif
      </p>
      </td>
    </tr>
    </tbody>
  </table>

  @auth
    @if (Auth::user()->id == 1)
    <div>
      <a href="https://blog.capilano-fw.com/?p=4466" target="_blank">参考サイト</a>
      <p>
        "composer require calebporzio/livewire"ではなく<br>
        "composer require livewire/livewire"がいい
      </p>
    </div>
    @endif
  @endauth
</div>
