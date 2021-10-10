<x-dash-layout>
    <x-slot name="title_page">DashboardKu</x-slot>
    <div class="bg-white container py-4">
        <div class="row">
            <div class="col-7"></div>
            <div class="col-5">
                <div class="my-3 p-3 bg-body">
                    <h6 class="border-bottom pb-2 mb-0">Users</h6>
                    @foreach ($users as $user)

                    <div class="d-flex text-muted pt-3">
                        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                        </svg>

                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between">
                                <strong class="text-gray-dark">{{$user->name}}</strong>
                                @if(Cache::has('user-is-online-' . $user->id))
                                <a href="#">Online</a>
                                @else
                                <a href="#">Offline</a>

                                @endif

                            </div>
                            <span class="d-block">{{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>

                        </div>
                    </div>
                    @endforeach
                    <small class="d-block text-end mt-3">
                        <a href="#">All suggestions</a>
                    </small>
                </div>

            </div>

        </div>

    </div>

</x-dash-layout>
