@extends('layouts.app')
@section('content')
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendor/fullcalendar/dist/fullcalendar.min.css') }}"> --}}
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Schedule</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboards</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Schedule</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-12 calendar fc fc-unthemed fc-ltr" id="calendar"></div>
        </div>
    </div>


    <div class="modal fade" id="new-event" tabindex="-1" role="dialog" aria-labelledby="new-event-label"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-secondary" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="new-event--form" data-gtm-form-interact-id="0">
                        <div class="form-group has-danger">
                            <label class="form-control-label">Event title</label>
                            <input type="text" class="form-control form-control-alternative new-event--title"
                                placeholder="Event Title" data-gtm-form-interact-field-id="0">
                        </div>
                        <div class="form-group mb-0">
                            <label class="form-control-label d-block mb-3">Status color</label>
                            <div class="btn-group btn-group-toggle btn-group-colors event-tag" data-toggle="buttons">
                                <label class="btn bg-info"><input type="radio" name="event-tag" value="bg-info"
                                        autocomplete="off" checked=""></label>
                                <label class="btn bg-warning active"><input type="radio" name="event-tag"
                                        value="bg-warning" autocomplete="off"></label>
                                <label class="btn bg-danger"><input type="radio" name="event-tag" value="bg-danger"
                                        autocomplete="off"></label>
                                <label class="btn bg-success"><input type="radio" name="event-tag" value="bg-success"
                                        autocomplete="off"></label>
                                <label class="btn bg-default"><input type="radio" name="event-tag" value="bg-default"
                                        autocomplete="off"></label>
                                <label class="btn bg-primary"><input type="radio" name="event-tag" value="bg-primary"
                                        autocomplete="off"></label>
                            </div>
                        </div>
                        <input type="hidden" class="new-event--start" value="2023-06-28">
                        <input type="hidden" class="new-event--end" value="2023-06-28">
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary new-event--add">Add event</button>
                    <button type="button" class="btn btn-link ml-auto" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    @push('custom_js')
        <script src='{{ asset('assets/vendor/fullcalendar/dist/index.global.js') }}'></script>
        <script src='{{ asset('assets/vendor/fullcalendar/dist/fullcalendar.min.js') }}'></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prevYear,prev,next,nextYear today',
                        center: 'title',
                        right: 'dayGridMonth,dayGridWeek,dayGridDay'
                    },
                    initialDate: '2023-01-12',
                    navLinks: true, // can click day/week names to navigate views
                    editable: true,
                    dayMaxEvents: true, // allow "more" link when too many events
                    events: [

                        {
                            title: 'All Day Event',
                            start: '2023-01-01',
                            end: '2023-01-03'
                        },

                    ]
                });

                calendar.render();
            });
        </script>
    @endpush
@endsection
