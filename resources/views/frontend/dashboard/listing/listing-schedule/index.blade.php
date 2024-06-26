@extends('frontend.layouts.master')

@section('contents')
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                    @include('frontend.dashboard.sidebar')

                </div>
                <div class="col-lg-9">
                    <div class="dashboard_content">
                        <div class="my_listing">
                            <a href="{{ route('user.listing.index') }}" class="btn btn-sm btn-primary"><i
                                    class="fas fa-chevron-left"></i></a>
                            <h4 style="justify-content: space-between">Listing Schedule ({{ $listingTitle->title }})
                                <a href="{{ route('user.listing-schedule.create', $listingId) }}"
                                    class="btn btn-success">Create</a>
                            </h4>
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('body').on('click', '.delete-item', function(e) {
            e.preventDefault();

            let url = $(this).attr('href');
            console.log(url);


            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.status === "success") {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: response.message,
                                    icon: "success"
                                });
                                window.location.reload();
                            } else if (response.status === "error") {
                                Swal.fire({
                                    title: "Something went wrong",
                                    text: response.message,
                                    icon: "eror"
                                });
                                window.location.reload();
                            }
                        },
                        eror: function(xhr, status, eror) {
                            console.log(eror)
                        }
                    })
                }
            });
        })
    </script>
@endpush
