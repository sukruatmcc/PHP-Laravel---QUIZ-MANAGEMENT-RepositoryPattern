@extends('admin.layouts.master')
@section('title')
    Questions
@endsection
@section('breadCrumbTitle')
    Questions
@endsection
@section('breadCrumbMenu')
    Questions
@endsection

@section('content')
    <div class="container">
        @include('admin.layouts.success')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="width: 200px; border:none">
                        <a href="{{ route('question.add',$questions[0]->id) }}" class="btn btn-block btn-info btn-flat">Add Question</a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Question</th>
                                    <th>A</th>
                                    <th>B</th>
                                    <th>C</th>
                                    <th>D</th>
                                    <th>Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions[0]->question as $question)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ Str::limit($question->question, 30, '...') }}</td>
                                        <td>{{ $question->a }}</td>
                                        <td>{{ $question->b }}</td>
                                        <td>{{ $question->c }}</td>
                                        <td>{{ $question->d }}</td>
                                        <td>{{ $question->answer }}</td>
                                        <td>
                                            <button type="button" style="border:none" class="text-danger destroy"
                                                data-action="{{ route('question.destroy',$question->id) }}"
                                                data-id="{{ $question->id }}"><i class="fa-solid fa-trash"></i></button>
                                            <a href="{{ route('question.edit',$question->id) }}"><i
                                                    class="fa-regular fa-pen-to-square"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Question</th>
                                    <th>A</th>
                                    <th>B</th>
                                    <th>C</th>
                                    <th>D</th>
                                    <th>Answer</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
