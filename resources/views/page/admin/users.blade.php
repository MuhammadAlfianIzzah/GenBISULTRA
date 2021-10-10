<x-dash-layout>
    <x-slot name="title_page">
        Users manage
    </x-slot>

    <div class="bg-white container py-3 mx-3 d-flex justify-content-center row">
        <div class="col-12">
            @if ($message = Session::get('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                    <use xlink:href="#exclamation-triangle-fill" /></svg>

                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                    <use xlink:href="#info-fill" /></svg>
                {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @endif
        </div>
        <div class="col-12">
            <table class="table shadow-sm rounded-3" style="overflow: hidden;">

                <thead class="text-white" style="background-color: #c5e3f6">

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NAME</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">#ROLES</th>
                        <th scope="col">action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <form action="" method="POST">
                            @csrf
                            @method("post")
                            <td>
                                <div class="d-flex gap-1">
                                    @php
                                    $count=0;
                                    $active = [
                                    "super"=>false,
                                    "dpt_head"=>false,
                                    "admin"=>false,
                                    "user" =>false
                                    ];

                                    foreach ($user->roles as $r) {
                                    if(array_key_exists($r->name,$active)){
                                    $active[$r->name] = true;
                                    }

                                    }
                                    @endphp


                                    @foreach ($roles as $role) <div class="form-check">
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <input class="form-check-input" name="role[{{$count}}]{{$role->name}}" type="checkbox" value="{{$role->name}}" id="{{$role->name.$user->name}}" {{$active[$role->name]?"checked":""}}>

                                        <label class="form-check-label" for="{{$role->name.$user->name}}">
                                            {{$role->name== "dpt_head"?"Ketua departemen":$role->name}}
                                        </label>

                                    </div>
                                    @php
                                    $count++;
                                    @endphp
                                    @endforeach

                                </div>

                            </td>
                            <td>
                                <div class="d-flex">
                                    <button class="btn text-white btn-info">Change</button>
                                </div>
                            </td>
                        </form>

                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</x-dash-layout>
