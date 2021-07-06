@extends('layout')
@section('content')

{{-- <div class="container"> --}}
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Non-Working Day Setting</div>
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif

          <form method="post"action="{{ route('update-holiday-setting') }}">
            @csrf
            <table class="table table-borderd">
              <tr>
                <th>Monday</th>
                <td>
                  <input type="radio" name="flag_mon" value="{{ $FLAG_OPEN }}"
                    {{ ($setting->isOpenMonday()) ? 'checked' : '' }} id="flag_mon_open" />
                  <label for="flag_mon_open">Open</label>
                  <input type="radio" name="flag_mon" value="{{ $FLAG_CLOSE }}"
                    {{ ($setting->isCloseMonday()) ? 'checked' : '' }} id="flag_mon_close" />
                  <label for="flag_mon_close">Close</label>
                </td>
              </tr>
              <tr>
                <th>Tuesday</th>
                <td>
                  <input type="radio" name="flag_tue" value="{{ $FLAG_OPEN }}"
                    {{ ($setting->isOpenTuesday()) ? 'checked' : '' }} id="flag_tue_open" />
                  <label for="flag_tue_open">Open</label>
                  <input type="radio" name="flag_tue" value="{{ $FLAG_CLOSE }}"
                    {{ ($setting->isCloseTuesday()) ? 'checked' : '' }} id="flag_tue_close" />
                  <label for="flag_tue_close">Close</label>
                </td>
              </tr>
              <tr>
                <th>Wednesday</th>
                <td>
                  <input type="radio" name="flag_wed" value="{{ $FLAG_OPEN }}"
                    {{ ($setting->isOpenWednesday()) ? 'checked' : '' }} id="flag_wed_open" />
                  <label for="flag_wed_open">Open</label>
                  <input type="radio" name="flag_wed" value="{{ $FLAG_CLOSE }}"
                    {{ ($setting->isCloseWednesday()) ? 'checked' : '' }} id="flag_wed_close" />
                  <label for="flag_wed_close">Close</label>
                </td>
              </tr>
              <tr>
                <th>Thursday</th>
                <td>
                  <input type="radio" name="flag_thu" value="{{ $FLAG_OPEN }}"
                    {{ ($setting->isOpenThursday()) ? 'checked' : '' }} id="flag_thu_open" />
                  <label for="flag_thu_open">Open</label>
                  <input type="radio" name="flag_thu" value="{{ $FLAG_CLOSE }}"
                    {{ ($setting->isCloseThursday()) ? 'checked' : '' }} id="flag_thu_close" />
                  <label for="flag_thu_close">Close</label>
                </td>
              </tr>
              <tr>
                <th>Friday</th>
                <td>
                  <input type="radio" name="flag_fri" value="{{ $FLAG_OPEN }}"
                    {{ ($setting->isOpenFriday()) ? 'checked' : '' }} id="flag_fri_open" />
                  <label for="flag_fri_open">Open</label>
                  <input type="radio" name="flag_fri" value="{{ $FLAG_CLOSE }}"
                    {{ ($setting->isCloseFriday()) ? 'checked' : '' }} id="flag_fri_close" />
                  <label for="flag_fri_close">Close</label>
                </td>
              </tr>
              <tr>
                <th>Saturday</th>
                <td>
                  <input type="radio" name="flag_sat" value="{{ $FLAG_OPEN }}"
                    {{ ($setting->isOpenSaturday()) ? 'checked' : '' }} id="flag_sat_open" />
                  <label for="flag_sat_open">Open</label>
                  <input type="radio" name="flag_sat" value="{{ $FLAG_CLOSE }}"
                    {{ ($setting->isCloseSaturday()) ? 'checked' : '' }} id="flag_sat_close" />
                  <label for="flag_sat_close">Close</label>
                </td>
              </tr>
              <tr>
                <th>Sunday</th>
                <td>
                  <input type="radio" name="flag_sun" value="{{ $FLAG_OPEN }}"
                    {{ ($setting->isOpenSunday()) ? 'checked' : '' }} id="flag_sun_open" />
                  <label for="flag_sun_open">Open</label>
                  <input type="radio" name="flag_sun" value="{{ $FLAG_CLOSE }}"
                    {{ ($setting->isCloseSunday()) ? 'checked' : '' }} id="flag_sun_close" />
                  <label for="flag_sun_close">Close</label>
                </td>
              </tr>
              <tr>
              <th>Holiday</th>
              <td>
                <input type="radio" name="flag_holiday" value="{{ $FLAG_OPEN }}"
                  {{ ($setting->isOpenHoliday()) ? 'checked' : '' }} id="flag_holiday_open" />
                <label for="flag_holiday_open">Open</label>
                <input type="radio" name="flag_holiday" value="{{ $FLAG_CLOSE }}"
                  {{ ($setting->isCloseHoliday()) ? 'checked' : '' }} id="flag_holiday_close" />
                <label for="flag_holiday_close">Close</label>
              </td>
            </tr>
            </table>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
{{-- </div> --}}


@endsection
