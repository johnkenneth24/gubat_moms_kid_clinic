@extends('layouts/app-auth/contentNavbarLayout')

@section('title', 'Appointment Checkup')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">

@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')
        <div class="row mt-2">
            <div class="col-lg-12">
                <div class="card p-2">
                    <div class="card-header d-flex align-items-center justify-content-between ">
                      <div class="card-title p-0 mb-0 d-flex align-item-center"><a href="{{ route('med-history.index') }}"
                        class="btn p-0"><i class='bx bx-arrow-back'></i></a>
                    <h5 class="card-header ms-2 p-0 text-uppercase" style="line-height: 1.5;">Medical History
                        Information</h5>
                </div>
                        <div class="card-tool">
                            {{-- <a href="" class="btn btn-primary" style="color: #ffff;">ADD WALK-IN APPOINTMENT</a> --}}
                        </div>
                    </div>
                    <div class="card-body">
                                            <div class="row">
                                                <div class="row mt-2">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Weight</label>
                                                            <input readonly type="number" id=""
                                                                class="form-control text-end @error('weight') is-invalid @enderror"
                                                                value="{{ $book_app->bookAppConsult->weight }}"
                                                                placeholder="" name="weight">
                                                            @error('weight')
                                                                <div class="invalid-feedback mt-0"
                                                                    style="display: inline-block !important;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label">Height</label>
                                                            <input readonly type="number" id=""
                                                                class="form-control text-end @error('height') is-invalid @enderror"
                                                                value="{{ $book_app->bookAppConsult->height }}"
                                                                placeholder="" name="height">
                                                            @error('height')
                                                                <div class="invalid-feedback mt-0"
                                                                    style="display: inline-block !important;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                          <label class="form-label">Blood Pressure</label>
                                                          <input readonly type="text" id=""
                                                              class="form-control text-end @error('height') is-invalid @enderror"
                                                              value="{{ $book_app->bookAppConsult->blood_pressure }}"
                                                              placeholder="" name="height">
                                                          @error('height')
                                                              <div class="invalid-feedback mt-0"
                                                                  style="display: inline-block !important;">
                                                                  {{ $message }}
                                                              </div>
                                                          @enderror
                                                      </div>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                              <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="" class="form-label">Medication Intake</label>
                                                    <textarea disabled class="form-control @error('vaccine_received') is-invalid @enderror" name="vaccine_received"
                                                        id="" rows="3" placeholder="Type here...">{{ $book_app->bookAppConsult->medication_intake }}</textarea>
                                                    @error('vaccine_received')
                                                        <div class="invalid-feedback mt-0"
                                                            style="display: inline-block !important;">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-group">
                                                  <label for="" class="form-label">Vaccine Received</label>
                                                  <textarea disabled class="form-control @error('vaccine_received') is-invalid @enderror" name="vaccine_received"
                                                      id="" rows="3" placeholder="Type here...">{{ $book_app->bookAppConsult->vaccine_received }}</textarea>
                                                  @error('vaccine_received')
                                                      <div class="invalid-feedback mt-0"
                                                          style="display: inline-block !important;">
                                                          {{ $message }}
                                                      </div>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="" class="form-label">Diagnosis</label>
                                                <textarea disabled class="form-control @error('vaccine_received') is-invalid @enderror" name="vaccine_received"
                                                    id="" rows="3" placeholder="Type here...">{{ $book_app->bookAppConsult->diagnosis }}</textarea>
                                                @error('vaccine_received')
                                                    <div class="invalid-feedback mt-0"
                                                        style="display: inline-block !important;">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                            </div>
                    </div>
                </div>
            </div>
        </div>


        </div>
    </form>
@endsection

@section('page-script')
    <script>
        $(document).ready(function() {
            $("#birthdate").on("change", function() {
                const birthdate = new Date($(this).val());
                const currentDate = new Date();
                const age = currentDate.getFullYear() - birthdate.getFullYear();

                // Check if the birthday hasn't occurred this year yet
                if (
                    currentDate.getMonth() < birthdate.getMonth() ||
                    (currentDate.getMonth() === birthdate.getMonth() &&
                        currentDate.getDate() < birthdate.getDate())
                ) {
                    age--;
                }

                $("#age").val(age);
            });
        });
    </script>
@endsection
