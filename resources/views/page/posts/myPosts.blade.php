<x-dash-layout>
    <div class="col-8">
        <a href="{{ route('create-posts') }}" class="btn btn-primary"> <i class="fas fa-pen"></i> Create Posts</a>
    </div>

    <div class="bg-white container py-3 mx-3 d-flex justify-content-center row">
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

        <div class="col-12">
            @if(!$posts->isEmpty())
            <table class="table shadow-sm rounded-3" style="overflow: hidden;">

                <thead class="text-white" style="background-color: #c5e3f6">

                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">kategori</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Thumbnail</th>
                        @if (!Auth::check() || Auth::user()->hasRole("user"))

                        <th>
                            status
                        </th>
                        @endif

                        @role(['admin',"super"])
                        <th>izin</th>
                        @endrole
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @php

                    // $i=1;
                    $i= ($posts->currentpage()-1)* $posts->perpage() + 1;

                    @endphp
                    @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td><a target="_blank" href="/post/{{$post->slug}}">{{$post->title}}</a></td>
                        <td>{{$post->category_posts->name}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>
                            <img style="width: 100px" src="{{ asset("storage/$post->thumbnail") }}" alt="{{$post->slug}}" class="img-thumbnail">
                        </td>
                        @if (!Auth::check() || Auth::user()->hasRole("user"))

                        <td>
                            @if($post->is_active == true)
                            <div class="btn btn-success disabled"> <i class="fas fa-check-square"></i></div>
                            @else
                            <div class="btn btn-danger disabled"> <i class="fas fa-clock"></i></div>
                            @endif
                        </td>
                        @endif
                        @role(['admin','super'])
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route("izin-posts",[$post->slug,"accept"]) }}" class="btn btn-success {{$post->is_active == true? "disabled":""}}"><i class="far fa-check-circle"></i></a>
                                <a href="{{ route("izin-posts",[$post->slug,"null"]) }}" class="btn btn-danger {{$post->is_active == true? "":"disabled"}}"><i class="fa fa-times"></i></a>

                            </div>
                        </td>
                        @endrole
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('edit-posts',"$post->slug") }}" class="btn btn-primary">Edit</a>

                                <form action="{{ route('delete-posts',"$post->slug") }}" style="display: inline;" method="POST">

                                    @csrf
                                    @method("delete")
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$post->slug}}">
                                        Delete
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="delete{{$post->slug}}" tabindex="-1" aria-labelledby="delete{{$post->slug}}Label" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    Yakin ingin menghapus?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </td>
                    </tr>
                    @php
                    $i++
                    @endphp
                    @endforeach
                </tbody>
            </table>
            {{$posts->links()}}

            @else
            <div class="alert alert-warning d-flex justify-content-center" role="alert">
                No post
            </div>
            @endif
        </div>


    </div>
</x-dash-layout>
