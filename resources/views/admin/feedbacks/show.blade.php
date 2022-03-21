@extends('admin.layouts.index')


@section('content')


<div class="content-wrapper">
    <div class="content-header">


        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h5><b>{{ $feedback->name }}</b></h5>
                </div>

                <div class="card-body">
                    <h5 class="card-title"> <b>From:</b> {{ $feedback->email }}</h5>
                    <p class="card-text"> <b>Subject:</b> {{ $feedback->subject }}</p>
                    <p class="mt-5"> <b>Message:</b> {{ $feedback->message }} </p>
                </div>


                <div class="d-flex pb-4">

                    <div class="ml-4">
                        <form action="{{ route('admin.feedback.destroy', $feedback->id) }}" method="POST" class="deletePost">
                            @csrf
                            @method("delete")

                            <button class="btn btn-outline-danger" type="submit">
                                Delete
                            </button>

                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection
